<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\UserModel;
use App\Models\UserAddressModel;

class CartController extends BaseController
{
    public function add(int $id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product || ($product['status'] ?? '') !== 'active') {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ürün satışta değil.'
                ]);
            }

            return redirect()->to('/products');
        }

        $quantityRaw = $this->request->getPost('quantity');

        if ($quantityRaw === null) {
            $quantityRaw = $this->request->getGet('quantity');
        }

        $quantity = (int)($quantityRaw ?? 1);

        if ($quantity < 1) {
            $quantity = 1;
        }

        $stock = (int)($product['stock'] ?? 0);

        if ($stock <= 0) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Bu ürün stokta yok.'
                ]);
            }

            return redirect()->to('/products')->with('error', 'Bu ürün stokta yok.');
        }

        if ($quantity > $stock) {
            $quantity = $stock;
        }

        $cart = session()->get('cart') ?? [];

        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$id])) {
            $newQuantity = (int)($cart[$id]['quantity'] ?? 0) + $quantity;

            if ($newQuantity > $stock) {
                $newQuantity = $stock;
            }

            $cart[$id]['quantity'] = $newQuantity;
            $cart[$id]['stock'] = $stock;
        } else {
            $cart[$id] = [
                'id'       => (int)$product['id'],
                'name'     => (string)$product['name'],
                'price'    => (float)$product['price'],
                'image'    => (string)($product['image'] ?? ''),
                'stock'    => $stock,
                'quantity' => $quantity
            ];
        }

        session()->set('cart', $cart);

        $cartCount = 0;

        foreach ($cart as $item) {
            if (is_array($item)) {
                $cartCount += (int)($item['quantity'] ?? 0);
            }
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Ürün sepete eklendi.',
                'productName' => (string)$product['name'],
                'quantity' => (int)$cart[$id]['quantity'],
                'cartCount' => $cartCount
            ]);
        }

        return redirect()->to('/cart');
    }

    public function index()
    {
        $cart = session()->get('cart') ?? [];

        $user = null;
        $addresses = [];

        if (session()->get('isLoggedIn')) {
            $userModel = new UserModel();
            $addressModel = new UserAddressModel();

            $user = $userModel->find(session()->get('user_id'));

            $addresses = $addressModel
                ->where('user_id', session()->get('user_id'))
                ->orderBy('is_default', 'DESC')
                ->orderBy('id', 'DESC')
                ->findAll();
        }

        return view('cart/index', [
            'cart'      => $cart,
            'user'      => $user,
            'addresses' => $addresses
        ]);
    }

    public function remove(int $id)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function increase(int $id)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $cart[$id]['stock']) {
                $cart[$id]['quantity']++;
            }
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function decrease(int $id)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function updateQuantity(int $id)
    {
        $quantity = (int) $this->request->getPost('quantity');

        $cart = session()->get('cart') ?? [];

        if (!isset($cart[$id])) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ürün sepette bulunamadı.'
                ]);
            }

            return redirect()->to('/cart');
        }

        if ($quantity < 1) {
            $quantity = 1;
        }

        $stock = (int)($cart[$id]['stock'] ?? 1);

        if ($quantity > $stock) {
            $quantity = $stock;
        }

        $cart[$id]['quantity'] = $quantity;

        session()->set('cart', $cart);

        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += ((float)$item['price']) * ((int)$item['quantity']);
        }

        $shippingPrice = $subtotal >= 2500 || $subtotal <= 0 ? 0 : 50;
        $finalTotal = $subtotal + $shippingPrice;

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'shippingPrice' => $shippingPrice,
                'finalTotal' => $finalTotal,
                'cartCount' => array_sum(array_column($cart, 'quantity'))
            ]);
        }

        return redirect()->to('/cart');
    }

    public function checkout()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Sipariş oluşturmak için giriş yapmalısınız.');
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Sepetiniz boş.');
        }

        $addressId = (int)$this->request->getPost('address_id');
        $note = trim((string)$this->request->getPost('note'));

        $cardHolder = trim((string)$this->request->getPost('card_holder'));

        $cardNumber = preg_replace(
            '/\D+/',
            '',
            (string)$this->request->getPost('card_number')
        );

        $cardExpire = trim((string)$this->request->getPost('card_expire'));

        $cardCvv = preg_replace(
            '/\D+/',
            '',
            (string)$this->request->getPost('card_cvv')
        );

        $db = \Config\Database::connect();

        $userModel = new UserModel();
        $addressModel = new UserAddressModel();
        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        $userId = session()->get('user_id');

        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Kullanıcı bulunamadı.');
        }

        $address = $addressModel
            ->where('id', $addressId)
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            return redirect()->to('/cart')->with('error', 'Lütfen geçerli bir teslimat adresi seçin.');
        }

        $grandTotal = 0;

        foreach ($cart as $item) {
            $product = $productModel->find($item['id']);

            if (!$product || $product['status'] !== 'active') {
                return redirect()->to('/cart')->with('error', 'Sepetinizde satışta olmayan ürün var.');
            }

            if ((int)$item['quantity'] > (int)$product['stock']) {
                return redirect()->to('/cart')->with('error', $product['name'] . ' ürünü için yeterli stok yok.');
            }

            $grandTotal += ((float)$item['price']) * ((int)$item['quantity']);
        }

        // Kupon sistemi: web yazılırsa ürün toplamından %50 indirim.
        // Kargo indirime dahil değildir.
        $couponCode = strtolower(trim((string)$this->request->getPost('applied_coupon_code')));

        $discountAmount = 0;

        if ($couponCode === 'web') {
            $discountAmount = $grandTotal * 0.50;
        } else {
            $couponCode = null;
        }

        // Kargo kuralı indirimsiz ürün toplamına göre çalışır.
        $shippingPrice = $grandTotal >= 2500 ? 0 : 50;

        $totalPrice = ($grandTotal - $discountAmount) + $shippingPrice;

        if ($totalPrice < 0) {
            $totalPrice = 0;
        }

        $userBalance = (float)($user['balance'] ?? 0);

        // Önce kullanıcının sistem bakiyesi harcanır.
        $usedBalance = min($userBalance, $totalPrice);

        // Kalan tutar karttan ödenmiş kabul edilir.
        $paidAmount = $totalPrice - $usedBalance;

        if ($paidAmount > 0) {
            if ($cardHolder === '' || mb_strlen($cardHolder, 'UTF-8') < 3) {
                return redirect()->to('/cart')->with('error', 'Kart üzerindeki isim en az 3 karakter olmalıdır.');
            }

            if (!preg_match('/^[\p{L}\s.\'-]+$/u', $cardHolder)) {
                return redirect()->to('/cart')->with('error', 'Kart üzerindeki isim yalnızca harflerden oluşmalıdır.');
            }

            if (!preg_match('/^\d{16}$/', $cardNumber)) {
                return redirect()->to('/cart')->with('error', 'Kart numarası 16 haneli olmalıdır.');
            }

            if (preg_match('/^(\d)\1{15}$/', $cardNumber)) {
                return redirect()->to('/cart')->with('error', 'Kart numarası geçerli görünmüyor.');
            }

            if (!preg_match('/^\d{2}\/\d{2}$/', $cardExpire)) {
                return redirect()->to('/cart')->with('error', 'Son kullanma tarihi AA/YY formatında olmalıdır.');
            }

            [$expireMonthRaw, $expireYearRaw] = explode('/', $cardExpire);

            $expireMonth = (int)$expireMonthRaw;
            $expireYear = 2000 + (int)$expireYearRaw;

            $currentMonth = (int)date('m');
            $currentYear = (int)date('Y');

            if ($expireMonth < 1 || $expireMonth > 12) {
                return redirect()->to('/cart')->with('error', 'Son kullanma ayı 01 ile 12 arasında olmalıdır.');
            }

            if ($expireYear < $currentYear || ($expireYear === $currentYear && $expireMonth <= $currentMonth)) {
                return redirect()->to('/cart')->with('error', 'Son kullanma tarihi içinde bulunduğumuz aydan ileri olmalıdır.');
            }

            if (!preg_match('/^\d{3}$/', $cardCvv)) {
                return redirect()->to('/cart')->with('error', 'CVV 3 haneli olmalıdır.');
            }
        }

        $cardLast4 = $paidAmount > 0 ? substr($cardNumber, -4) : null;

        $shippingAddress =
            "Adres Başlığı: " . $address['title'] . "\n" .
            "Ad Soyad: " . $address['full_name'] . "\n" .
            "Telefon: " . $address['phone'] . "\n" .
            "İl: " . $address['city'] . "\n" .
            "İlçe: " . $address['district'] . "\n" .
            "Adres: " . $address['full_address'] . "\n" .
            "Kargo Notu: " . ($note ?: '-') . "\n" .
            "Ürün Ara Toplamı: " . number_format($grandTotal, 2) . " TL\n" .
            "Kupon Kodu: " . ($couponCode ?: '-') . "\n" .
            "Kupon İndirimi: " . number_format($discountAmount, 2) . " TL\n" .
            "Kargo Ücreti: " . number_format($shippingPrice, 2) . " TL\n" .
            "Bakiyeden Kullanılan: " . number_format($usedBalance, 2) . " TL\n" .
            "Karttan Ödenen: " . number_format($paidAmount, 2) . " TL";

        $db->transStart();

        $orderId = $orderModel->insert([
            'user_id'          => $userId,
            'total_price'      => $totalPrice,
            'used_balance'     => $usedBalance,
            'paid_amount'      => $paidAmount,
            'payment_status'   => 'paid',
            'card_last4'       => $cardLast4,
            'coupon_code'      => $couponCode,
            'discount_amount'  => $discountAmount,
            'status'           => 'pending',
            'shipping_address' => $shippingAddress
        ]);

        foreach ($cart as $item) {
            $orderItemModel->insert([
                'order_id'   => $orderId,
                'product_id' => $item['id'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price']
            ]);

            $product = $productModel->find($item['id']);

            $newStock = max(0, ((int)$product['stock']) - ((int)$item['quantity']));

            $productModel->update($item['id'], [
                'stock' => $newStock
            ]);
        }

        // Kullanılan bakiye düşülür.
        $userModel->update($userId, [
            'balance' => $userBalance - $usedBalance
        ]);

        $db->transComplete();

        if (!$db->transStatus()) {
            return redirect()->to('/cart')->with('error', 'Sipariş oluşturulurken bir hata oluştu.');
        }

        session()->remove('cart');

        return redirect()->to('/my-orders')->with('success', 'Siparişiniz başarıyla oluşturuldu.');
    }
}
