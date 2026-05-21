<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $email = trim((string)$this->request->getPost('email'));
        $password = (string)$this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Bu e-posta adresiyle kayıtlı kullanıcı bulunamadı.');
        }

        if (($user['status'] ?? 'active') === 'passive') {
            return redirect()->back()->with('error', 'Bu kullanıcı hesabı pasif durumdadır.');
        }

        if (($user['status'] ?? 'active') === 'frozen') {
            return redirect()->back()->with('error', 'Bu kullanıcı hesabı dondurulmuştur. Yönetici ile iletişime geçiniz.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Şifre hatalı.');
        }

        session()->set([
            'user_id'      => $user['id'],
            'user_name'    => $user['name'],
            'user_surname' => $user['surname'],
            'user_email'   => $user['email'],
            'user_role'    => $user['role'],
            'user_image'   => $user['profile_image'] ?? null,
            'isLoggedIn'   => true
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/products');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $userModel = new UserModel();

        $email = trim((string)$this->request->getPost('email'));

        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Bu e-posta adresi zaten kayıtlı.');
        }

        $password = (string)$this->request->getPost('password');
        $passwordConfirm = (string)$this->request->getPost('password_confirm');

        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Şifreler birbiriyle uyuşmuyor.');
        }

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Şifre en az 6 karakter olmalıdır.');
        }

        $userModel->insert([
            'name'     => $this->request->getPost('name'),
            'surname'  => $this->request->getPost('surname'),
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => 'user',
            'phone'    => $this->request->getPost('phone'),
            'address'  => $this->request->getPost('address'),
            'balance'  => 0,
            'status'   => 'active'
        ]);

        return redirect()->to('/login')->with('success', 'Kayıt başarılı. Giriş yapabilirsiniz.');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function forgotPasswordPost()
    {
        $email = trim((string)$this->request->getPost('email'));

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Bu e-posta adresiyle kayıtlı kullanıcı bulunamadı.');
        }

        if (($user['status'] ?? 'active') !== 'active') {
            return redirect()->back()->with('error', 'Bu kullanıcı hesabı aktif değildir. Şifre sıfırlama işlemi yapılamaz.');
        }

        return redirect()->to('/reset-password/' . $user['id']);
    }

    public function resetPassword(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Kullanıcı bulunamadı.');
        }

        if (($user['status'] ?? 'active') !== 'active') {
            return redirect()->to('/login')->with('error', 'Bu kullanıcı hesabı aktif değildir.');
        }

        return view('auth/reset_password', [
            'user' => $user
        ]);
    }

    public function resetPasswordPost(int $id)
    {
        $password = (string)$this->request->getPost('password');
        $passwordConfirm = (string)$this->request->getPost('password_confirm');

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Kullanıcı bulunamadı.');
        }

        if (($user['status'] ?? 'active') !== 'active') {
            return redirect()->to('/login')->with('error', 'Bu kullanıcı hesabı aktif değildir.');
        }

        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Şifreler birbiriyle uyuşmuyor.');
        }

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Şifre en az 6 karakter olmalıdır.');
        }

        $userModel->update($id, [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Şifreniz başarıyla güncellendi. Yeni şifrenizle giriş yapabilirsiniz.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }

    public function profile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', session()->get('user_id'))
            ->get()
            ->getRowArray();

        if (!$user) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Kullanıcı bulunamadı.');
        }

        $orderCount = $db->table('orders')
            ->where('user_id', session()->get('user_id'))
            ->countAllResults();

        $favoriteCount = $db->table('favorites')
            ->where('user_id', session()->get('user_id'))
            ->countAllResults();

        $totalSpentRow = $db->table('orders')
            ->selectSum('total_price')
            ->where('user_id', session()->get('user_id'))
            ->where('status !=', 'cancelled')
            ->get()
            ->getRowArray();

        $totalSpent = $totalSpentRow['total_price'] ?? 0;

        return view('auth/profile', [
            'user'          => $user,
            'orderCount'    => $orderCount,
            'favoriteCount' => $favoriteCount,
            'totalSpent'    => $totalSpent
        ]);
    }

    public function updateProfile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new \App\Models\UserModel();

        $userId = (int) session()->get('user_id');

        $currentUser = $userModel->find($userId);

        if (!$currentUser) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Kullanıcı bulunamadı.');
        }

        $name = trim((string) $this->request->getPost('name'));
        $surname = trim((string) $this->request->getPost('surname'));
        $email = trim((string) $this->request->getPost('email'));

        if ($name === '' || $surname === '' || $email === '') {
            return redirect()->to('/profile')->with('error', 'Ad, soyad ve e-posta alanları boş bırakılamaz.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/profile')->with('error', 'Geçerli bir e-posta adresi giriniz.');
        }

        $existingUser = $userModel
            ->where('email', $email)
            ->where('id !=', $userId)
            ->first();

        if ($existingUser) {
            return redirect()->to('/profile')->with('error', 'Bu e-posta adresi başka bir kullanıcı tarafından kullanılıyor.');
        }

        $data = [
            'name'    => $name,
            'surname' => $surname,
            'email'   => $email
        ];

        $image = $this->request->getFile('profile_image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();

            $image->move('images/profiles', $newName);

            $data['profile_image'] = $newName;

            session()->set('user_image', $newName);
        }

        $userModel->update($userId, $data);

        session()->set([
            'user_name'    => $name,
            'user_surname' => $surname,
            'user_email'   => $email
        ]);

        return redirect()->to('/profile')->with('success', 'Profil bilgileriniz başarıyla güncellendi.');
    }

    public function changePassword()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $oldPassword = (string)$this->request->getPost('old_password');
        $newPassword = (string)$this->request->getPost('password');

        if (strlen($newPassword) < 6) {
            return redirect()->to('/profile')->with('error', 'Yeni şifre en az 6 karakter olmalıdır.');
        }

        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', session()->get('user_id'))
            ->get()
            ->getRowArray();

        if (!$user || !password_verify($oldPassword, $user['password'])) {
            return redirect()->to('/profile')->with('error', 'Mevcut şifreniz hatalı.');
        }

        $db->table('users')
            ->where('id', session()->get('user_id'))
            ->update([
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);

        return redirect()->to('/profile')->with('success', 'Şifreniz başarıyla güncellendi.');
    }

    public function deactivateAccount()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if (session()->get('user_role') === 'admin') {
            return redirect()->to('/profile')->with('error', 'Admin hesabı kullanıcı panelinden pasif hale getirilemez.');
        }

        $db = \Config\Database::connect();
        $userId = (int) session()->get('user_id');

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
            ->where('user_id', $userId)
            ->whereIn('status', $blockingStatuses)
            ->countAllResults();

        if ($blockingOrderCount > 0) {
            return redirect()->to('/profile')->with(
                'error',
                'Onaylanmış veya devam eden siparişiniz bulunduğu için hesabınızı şu anda pasif hale getiremezsiniz.'
            );
        }

        $pendingOrders = $db->table('orders')
            ->where('user_id', $userId)
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
                ->where('id', $userId)
                ->update();
        }

        $db->table('users')
            ->where('id', $userId)
            ->update([
                'status' => 'passive'
            ]);

        $db->transComplete();

        if (!$db->transStatus()) {
            return redirect()->to('/profile')->with('error', 'Hesabınız pasif hale getirilirken bir hata oluştu.');
        }

        session()->destroy();

        return redirect()->to('/login')->with(
            'success',
            'Hesabınız pasif hale getirildi. Onay bekleyen siparişleriniz iptal edildi ve ilgili tutarlar bakiyenize aktarıldı.'
        );
    }
}
