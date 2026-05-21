<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function sendContact()
    {
        $db = \Config\Database::connect();

        $db->table('contact_messages')->insert([
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/contact')->with('success', 'Mesajınız başarıyla gönderildi.');
    }

    public function blog()
    {
        $db = \Config\Database::connect();

        // Blog sayfasında Ana Duyuru görünmesin.
        // Sadece normal duyurular ve blog içerikleri görünsün.
        $posts = $db->table('blog_posts')
            ->where('status', 'active')
            ->whereIn('category', ['Duyuru', 'Blog'])
            ->orderBy('post_date', 'DESC')
            ->get()
            ->getResultArray();

        // Blog sağındaki öne çıkarılan ürünler
        $featuredProducts = $db->table('products')
            ->where('status', 'active')
            ->where('stock >', 0)
            ->where('is_featured', 1)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get()
            ->getResultArray();

        return view('pages/blog', [
            'posts' => $posts,
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function blogDetail(string $slug)
    {
        $allowedPages = [
            'kupon-duyurusu',
            'yeni-yil',
            'yeni-urun',
            'black-friday',
            'kargo-bedava'
        ];

        if (!in_array($slug, $allowedPages)) {
            return redirect()->to('/blog');
        }

        return view('pages/blog-detail-' . $slug);
    }

    public function stats()
    {
        $db = \Config\Database::connect();

        $totalProducts = $db->table('products')
            ->countAllResults();

        $activeProducts = $db->table('products')
            ->where('status', 'active')
            ->countAllResults();

        $featuredProducts = $db->table('products')
            ->where('is_featured', 1)
            ->countAllResults();

        $totalUsers = $db->table('users')
            ->where('role', 'user')
            ->countAllResults();

        $deliveredOrders = $db->table('orders')
            ->whereIn('status', ['delivered', 'received'])
            ->countAllResults();

        $totalOrders = $db->table('orders')
            ->whereNotIn('status', ['cancelled'])
            ->countAllResults();

        $revenueRow = $db->table('orders')
            ->selectSum('total_price')
            ->whereNotIn('status', ['cancelled'])
            ->get()
            ->getRowArray();

        $totalRevenue = $revenueRow['total_price'] ?? 0;

        $totalContents = $db->table('blog_posts')
            ->where('status', 'active')
            ->countAllResults();

        $totalFavorites = $db->table('favorites')
            ->countAllResults();

        // Sepet ve favori sayısı header için
        $favCount = 0;

        if (session()->get('isLoggedIn')) {
            $favCount = $db->table('favorites')
                ->where('user_id', session()->get('user_id'))
                ->countAllResults();
        }

        $cart = session()->get('cart') ?? [];
        $cartCount = 0;

        foreach ($cart as $item) {
            $cartCount += $item['quantity'] ?? 0;
        }

        return view('pages/stats', [
            'totalProducts'    => $totalProducts,
            'activeProducts'   => $activeProducts,
            'featuredProducts' => $featuredProducts,
            'totalUsers'       => $totalUsers,
            'deliveredOrders'  => $deliveredOrders,
            'totalOrders'      => $totalOrders,
            'totalRevenue'     => $totalRevenue,
            'totalContents'    => $totalContents,
            'totalFavorites'   => $totalFavorites,
            'favCount'         => $favCount,
            'cartCount'        => $cartCount
        ]);
    }
}