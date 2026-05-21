<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\CategoryModel;

class AdminController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $userModel = new UserModel();

        $data = [
            'productCount' => $productModel->countAllResults(),
            'userCount'    => $userModel->where('role', 'user')->countAllResults(),
            'orderCount' => \Config\Database::connect()->table('orders')->countAllResults(),
            'adminName'    => session()->get('user_name'),
            'messageCount' => \Config\Database::connect()->table('contact_messages')->where('is_read', 0)->countAllResults(),
            'blogCount' => \Config\Database::connect()->table('blog_posts')->countAllResults()
        ];

        return view('admin/dashboard', $data);
    }

    public function products()
    {
        $productModel = new ProductModel();

        $search = $this->request->getGet('search');

        if (!empty($search)) {
            $products = $productModel
                ->like('name', $search)
                ->orLike('description', $search)
                ->orderBy('id', 'DESC')
                ->findAll();
        } else {
            $products = $productModel
                ->orderBy('id', 'DESC')
                ->findAll();
        }

        return view('admin/products', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function createProduct()
    {
        $categoryModel = new CategoryModel();

        $data['categories'] = $categoryModel
            ->where('status', 'active')
            ->findAll();

        return view('admin/create_product', $data);
    }

    public function storeProduct()
    {
        $productModel = new ProductModel();

        $image = $this->request->getFile('image');

        $imageName = '';

        if ($image && $image->isValid()) {

            $imageName = $image->getRandomName();

            $image->move(FCPATH . 'images', $imageName);
        }

        $productModel->insert([
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $imageName,
            'status'      => $this->request->getPost('status'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0
        ]);

        return redirect()->to('/admin/products');
    }

    public function deleteProduct(int $id)
    {
        $productModel = new ProductModel();

        $productModel->delete($id);

        return redirect()->to('/admin/products');
    }

    public function editProduct(int $id)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $data['product'] = $productModel->find($id);
        $data['categories'] = $categoryModel
            ->where('status', 'active')
            ->findAll();

        return view('admin/edit_product', $data);
    }

    public function updateProduct(int $id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);

        $imageName = $product['image'];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'images', $imageName);
        }

        $productModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $imageName,
            'status'      => $this->request->getPost('status'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0
        ]);

        return redirect()->to('/admin/products');
    }

    public function orders()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('orders');

        $builder->select('orders.*, users.name as user_name, users.surname as user_surname');
        $builder->join('users', 'users.id = orders.user_id');

        $builder->orderBy('orders.id', 'DESC');

        $orders = $builder->get()->getResultArray();

        $totalRevenue = $db->table('orders')
            ->selectSum('total_price')
            ->whereNotIn('status', ['cancelled'])
            ->get()
            ->getRowArray();

        return view('admin/orders', [
            'orders' => $orders,
            'totalRevenue' => $totalRevenue['total_price'] ?? 0
        ]);
    }

    public function updateOrderStatus(int $id)
    {
        $status = $this->request->getPost('status');

        $allowedStatuses = [
            'pending',
            'approved',
            'supplying',
            'packing',
            'shipped',
            'on_the_way',
            'distributing',
            'delivered',
            'received',
            'cancelled'
        ];

        if (!in_array($status, $allowedStatuses)) {
            $status = 'pending';
        }

        $db = \Config\Database::connect();

        $db->table('orders')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        return redirect()->to('/admin/orders');
    }

    public function orderDetail(int $id)
    {
        $db = \Config\Database::connect();

        $order = $db->table('orders')
            ->select('orders.*, users.name as user_name, users.surname as user_surname, users.email as user_email')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->where('orders.id', $id)
            ->get()
            ->getRowArray();

        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Sipariş bulunamadı.');
        }

        $items = $db->table('order_items')
            ->select('order_items.*, products.name as product_name, products.image as product_image')
            ->join('products', 'products.id = order_items.product_id', 'left')
            ->where('order_items.order_id', $id)
            ->get()
            ->getResultArray();

        return view('admin/order_detail', [
            'order' => $order,
            'items' => $items
        ]);
    }

    public function users()
    {
        $userModel = new UserModel();

        $users = $userModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/users', [
            'users' => $users
        ]);
    }

    public function updateUserStatus(int $id)
    {
        $status = $this->request->getPost('status');

        $allowedStatuses = ['active', 'passive', 'frozen'];

        if (!in_array($status, $allowedStatuses, true)) {
            return redirect()->to('/admin/users')->with('error', 'Geçersiz kullanıcı durumu.');
        }

        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Kullanıcı bulunamadı.');
        }

        if (($user['role'] ?? '') === 'admin') {
            return redirect()->to('/admin/users')->with('error', 'Admin kullanıcının durumu değiştirilemez.');
        }

        if ($status === 'active') {
            $db->table('users')
                ->where('id', $id)
                ->update([
                    'status' => 'active'
                ]);

            return redirect()->to('/admin/users')->with('success', 'Kullanıcı hesabı aktif hale getirildi.');
        }

        $blockingStatuses = [
            'approved',
            'supplying',
            'packing',
            'shipped',
            'on_the_way',
            'distributing',
            'delivered'
        ];

        $blockingOrderCount = $db->table('orders')
            ->where('user_id', $id)
            ->whereIn('status', $blockingStatuses)
            ->countAllResults();

        if ($blockingOrderCount > 0) {
            return redirect()->to('/admin/users')->with(
                'error',
                'Bu kullanıcının onaylanmış veya devam eden siparişi bulunduğu için hesabı pasif/dondurulmuş yapılamaz.'
            );
        }

        $pendingOrders = $db->table('orders')
            ->where('user_id', $id)
            ->where('status', 'pending')
            ->get()
            ->getResultArray();

        $refundTotal = 0;

        $db->transStart();

        foreach ($pendingOrders as $order) {
            $orderId = (int)($order['id'] ?? 0);
            $refundTotal += (float)($order['total_price'] ?? 0);

            $items = $db->table('order_items')
                ->where('order_id', $orderId)
                ->get()
                ->getResultArray();

            foreach ($items as $item) {
                $productId = (int)($item['product_id'] ?? 0);
                $quantity = (int)($item['quantity'] ?? 0);

                if ($productId > 0 && $quantity > 0) {
                    $db->table('products')
                        ->set('stock', 'stock + ' . $quantity, false)
                        ->where('id', $productId)
                        ->update();
                }
            }

            $db->table('orders')
                ->where('id', $orderId)
                ->update([
                    'status' => 'cancelled',
                    'payment_status' => 'refunded_to_balance'
                ]);
        }

        if ($refundTotal > 0) {
            $db->table('users')
                ->set('balance', 'balance + ' . $refundTotal, false)
                ->where('id', $id)
                ->update();
        }

        $db->table('users')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        $db->transComplete();

        if (!$db->transStatus()) {
            return redirect()->to('/admin/users')->with('error', 'Kullanıcı durumu güncellenirken bir hata oluştu.');
        }

        if (!empty($pendingOrders)) {
            return redirect()->to('/admin/users')->with(
                'success',
                'Kullanıcı durumu güncellendi. Onay bekleyen siparişleri iptal edildi ve tutarlar bakiyesine aktarıldı.'
            );
        }

        return redirect()->to('/admin/users')->with('success', 'Kullanıcı durumu güncellendi.');
    }

    public function profile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();

        $user = $userModel->find(session()->get('user_id'));

        return view('auth/profile', [
            'user' => $user
        ]);
    }

    public function deleteUser(int $id)
    {
        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Kullanıcı bulunamadı.');
        }

        if (($user['role'] ?? '') === 'admin') {
            return redirect()->to('/admin/users')->with('error', 'Admin kullanıcı silinemez.');
        }

        $orderCount = $db->table('orders')
            ->where('user_id', $id)
            ->countAllResults();

        if ($orderCount > 0) {
            $db->table('users')
                ->where('id', $id)
                ->update([
                    'status' => 'passive'
                ]);

            return redirect()->to('/admin/users')
                ->with('error', 'Bu kullanıcının siparişleri olduğu için silinmedi; hesabı pasif hale getirildi.');
        }

        $db->table('favorites')
            ->where('user_id', $id)
            ->delete();

        $db->table('user_addresses')
            ->where('user_id', $id)
            ->delete();

        $db->table('users')
            ->where('id', $id)
            ->delete();

        return redirect()->to('/admin/users')->with('success', 'Kullanıcı başarıyla silindi.');
    }

    public function messages()
    {
        $db = \Config\Database::connect();

        $messages = $db->table('contact_messages')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/messages', [
            'messages' => $messages
        ]);
    }

    public function markMessageRead(int $id)
    {
        $db = \Config\Database::connect();

        $db->table('contact_messages')
            ->where('id', $id)
            ->update([
                'is_read' => 1
            ]);

        return redirect()->to('/admin/messages');
    }

    public function blogs()
    {
        $db = \Config\Database::connect();

        $posts = $db->table('blog_posts')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/blogs', [
            'posts' => $posts
        ]);
    }

    public function createBlog()
    {
        return view('admin/create_blog');
    }

    public function storeBlog()
    {
        $imageName = '';

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('images', $imageName);
        }

        $db = \Config\Database::connect();

        $allowedCategories = ['Duyuru', 'Ana Duyuru', 'Blog'];
        $category = $this->request->getPost('category');

        if (!in_array($category, $allowedCategories, true)) {
            $category = 'Duyuru';
        }

        $db->table('blog_posts')->insert([
            'title'     => $this->request->getPost('title'),
            'summary'   => $this->request->getPost('summary'),
            'content'   => $this->request->getPost('content'),
            'category'  => $category,
            'post_date' => $this->request->getPost('post_date'),
            'status'    => $this->request->getPost('status'),
            'image'     => $imageName
        ]);

        return redirect()->to('/admin/blogs');
    }

    public function deleteBlog(int $id)
    {
        $db = \Config\Database::connect();

        $db->table('blog_posts')
            ->where('id', $id)
            ->delete();

        return redirect()->to('/admin/blogs');
    }

    public function editBlog(int $id)
    {
        $db = \Config\Database::connect();

        $post = $db->table('blog_posts')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$post) {
            return redirect()->to('/admin/blogs');
        }

        return view('admin/edit_blog', [
            'post' => $post
        ]);
    }

    public function updateBlog(int $id)
    {
        $db = \Config\Database::connect();

        $post = $db->table('blog_posts')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$post) {
            return redirect()->to('/admin/blogs');
        }

        $allowedCategories = ['Duyuru', 'Ana Duyuru', 'Blog'];
        $category = $this->request->getPost('category');

        if (!in_array($category, $allowedCategories, true)) {
            $category = 'Duyuru';
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'summary' => $this->request->getPost('summary'),
            'content' => $this->request->getPost('content'),
            'category'  => $category,
            'post_date' => $this->request->getPost('post_date'),
            'status' => $this->request->getPost('status')
        ];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('images', $newName);
            $data['image'] = $newName;
        }

        $db->table('blog_posts')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('/admin/blogs');
    }

    public function toggleBlogStatus(int $id)
    {
        $db = \Config\Database::connect();

        $post = $db->table('blog_posts')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$post) {
            return redirect()->to('/admin/blogs');
        }

        $newStatus = ($post['status'] ?? '') === 'active' ? 'passive' : 'active';

        $db->table('blog_posts')
            ->where('id', $id)
            ->update([
                'status' => $newStatus
            ]);

        return redirect()->to('/admin/blogs');
    }
}
