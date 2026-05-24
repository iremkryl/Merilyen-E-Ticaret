<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class OrderController extends BaseController
{
    public function myOrders()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $orders = $db->table('orders')
            ->where('user_id', session()->get('user_id'))
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('my_orders', [
            'orders' => $orders
        ]);
    }

    public function cancel(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();

        $userId = session()->get('user_id');

        $order = $orderModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$order) {
            return redirect()->to('/my-orders')->with('error', 'Sipariş bulunamadı.');
        }

        if ($order['status'] !== 'pending') {
            return redirect()->to('/my-orders')->with('error', 'Bu sipariş artık iptal edilemez. Sipariş admin tarafından onaylanmış.');
        }

        $db->transStart();

        // Sipariş tutarı kullanıcı bakiyesine geri yüklenir.
        $user = $userModel->find($userId);
        $currentBalance = (float)($user['balance'] ?? 0);
        $refundAmount = (float)$order['total_price'];

        $userModel->update($userId, [
            'balance' => $currentBalance + $refundAmount
        ]);

        // Stoklar geri yüklenir.
        $items = $orderItemModel
            ->where('order_id', $id)
            ->findAll();

        foreach ($items as $item) {
            $product = $productModel->find($item['product_id']);

            if ($product) {
                $productModel->update($item['product_id'], [
                    'stock' => ((int)$product['stock']) + ((int)$item['quantity'])
                ]);
            }
        }

        $orderModel->update($id, [
            'status' => 'cancelled',
            'payment_status' => 'refunded_to_balance'
        ]);

        $db->transComplete();

        if (!$db->transStatus()) {
            return redirect()->to('/my-orders')->with('error', 'Sipariş iptal edilirken hata oluştu.');
        }

        return redirect()->to('/my-orders')->with('success', 'Sipariş iptal edildi. Tutar kullanıcı bakiyenize aktarıldı.');
    }

    public function receive(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $orderModel = new OrderModel();

        $order = $orderModel
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$order) {
            return redirect()->to('/my-orders')->with('error', 'Sipariş bulunamadı.');
        }

        if ($order['status'] !== 'delivered') {
            return redirect()->to('/my-orders')->with('error', 'Bu sipariş henüz teslim edildi aşamasında değil.');
        }

        $orderModel->update($id, [
            'status' => 'received'
        ]);

        return redirect()->to('/my-orders')->with('success', 'Sipariş teslim alındı olarak işaretlendi.');
    }

    public function invoice(int $id)
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Faturayı görüntülemek için giriş yapmalısınız.');
        }

        $db = \Config\Database::connect();

        $order = $db->table('orders o')
            ->select('o.*, u.name as user_name, u.surname as user_surname, u.email as user_email')
            ->join('users u', 'u.id = o.user_id', 'left')
            ->where('o.id', $id)
            ->where('o.user_id', $userId)
            ->get()
            ->getRowArray();

        if (!$order) {
            return redirect()->to('/my-orders')->with('error', 'Sipariş bulunamadı.');
        }

        $status = (string)($order['status'] ?? 'pending');

        $allowedStatuses = [
            'approved',
            'supplying',
            'packing',
            'shipped',
            'on_the_way',
            'distributing',
            'delivered',
            'received'
        ];

        if (!in_array($status, $allowedStatuses, true)) {
            if ($status === 'cancelled') {
                return redirect()->to('/my-orders')->with('error', 'İptal edilen siparişler için fatura görüntülenemez.');
            }

            return redirect()->to('/my-orders')->with('error', 'Fatura, sipariş admin tarafından onaylandıktan sonra görüntülenebilir.');
        }

        $items = $db->table('order_items oi')
            ->select('oi.*, p.name as product_name, p.image as product_image')
            ->join('products p', 'p.id = oi.product_id', 'left')
            ->where('oi.order_id', $id)
            ->get()
            ->getResultArray();

        return view('orders/invoice', [
            'order' => $order,
            'items' => $items,
            'viewer' => 'user'
        ]);
    }
}