<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // En üstteki büyük ana slider
        $heroSliders = $db->table('blog_posts')
            ->where('status', 'active')
            ->where('category', 'Ana Duyuru')
            ->orderBy('post_date', 'DESC')
            ->limit(3)
            ->get()
            ->getResultArray();

        // Anasayfadaki küçük duyuru sliderı
        $announcements = $db->table('blog_posts')
            ->where('status', 'active')
            ->where('category', 'Duyuru')
            ->orderBy('post_date', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // Anasayfada gösterilecek öne çıkan ürünler
        $featuredProducts = $db->table('products')
            ->where('status', 'active')
            ->where('stock >', 0)
            ->where('is_featured', 1)
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get()
            ->getResultArray();

        // Yeni ürünler: created_at tarihine göre sıralanır.
        // Aynı created_at değerine sahip ürünlerde id ikinci sıralama kriteridir.
        $newProducts = $db->table('products')
            ->where('status', 'active')
            ->where('stock >', 0)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get()
            ->getResultArray();

        // Favori bilgileri
        $favoriteIds = [];
        $favoriteCount = 0;

        if (session()->get('isLoggedIn')) {
            $favorites = $db->table('favorites')
                ->where('user_id', session()->get('user_id'))
                ->get()
                ->getResultArray();

            $favoriteIds = array_map('intval', array_column($favorites, 'product_id'));
            $favoriteCount = count($favorites);
        }

        // Sepet ürün adedi
        $cartRaw = session()->get('cart');
        $cart = is_array($cartRaw) ? $cartRaw : [];

        $cartCount = 0;

        foreach ($cart as $item) {
            if (is_array($item)) {
                $cartCount += (int)($item['quantity'] ?? 0);
            }
        }

        return view('home', [
            'heroSliders'      => $heroSliders,
            'announcements'    => $announcements,
            'featuredProducts' => $featuredProducts,
            'newProducts'      => $newProducts,
            'favoriteIds'      => $favoriteIds,
            'favoriteCount'    => $favoriteCount,
            'cartCount'        => $cartCount
        ]);
    }
}