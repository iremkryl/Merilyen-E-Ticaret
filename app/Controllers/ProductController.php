<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $request = service('request');

        $sortRaw = $request->getGet('sort');
        $stockRaw = $request->getGet('stock');
        $minRaw = $request->getGet('min');
        $maxRaw = $request->getGet('max');
        $categoryRaw = $request->getGet('category');
        $searchRaw = $request->getGet('search');

        $sort = is_scalar($sortRaw) ? (string)$sortRaw : 'default';
        $stockFilter = is_scalar($stockRaw) ? (string)$stockRaw : 'all';
        $category = is_scalar($categoryRaw) ? (string)$categoryRaw : '';
        $search = is_scalar($searchRaw) ? trim((string)$searchRaw) : '';

        $minPrice = is_numeric($minRaw) ? (float)$minRaw : null;
        $maxPrice = is_numeric($maxRaw) ? (float)$maxRaw : null;

        $builder = $db->table('products');
        $builder->select('products.*, categories.name AS category_name');
        $builder->join('categories', 'categories.id = products.category_id', 'left');
        $builder->where('products.status', 'active');

        if ($search !== '') {
            $builder->groupStart()
                ->like('products.name', $search)
                ->orLike('products.description', $search)
                ->groupEnd();
        }

        if ($category !== '') {
            $categoryMap = [
                'kol' => 'Kol Çantası',
                'capraz' => 'Çapraz Çanta',
                'elcantasi' => 'El Çantası',
                'sirtcantasi' => 'Sırt Çantası',
                'yelek' => 'Yelek'
            ];

            if (isset($categoryMap[$category])) {
                $builder->where('categories.name', $categoryMap[$category]);
            }
        }

        if ($minPrice !== null) {
            $builder->where('products.price >=', $minPrice);
        }

        if ($maxPrice !== null) {
            $builder->where('products.price <=', $maxPrice);
        }

        if ($stockFilter === 'available') {
            $builder->where('products.stock >', 0);
        } elseif ($stockFilter === 'low') {
            $builder->where('products.stock >', 0);
            $builder->where('products.stock <=', 3);
        } elseif ($stockFilter === 'soldout') {
            $builder->where('products.stock <=', 0);
        }

        if ($sort === 'price_asc') {
            $builder->orderBy('products.price', 'ASC');
            $builder->orderBy('products.id', 'DESC');
        } elseif ($sort === 'price_desc') {
            $builder->orderBy('products.price', 'DESC');
            $builder->orderBy('products.id', 'DESC');
        } elseif ($sort === 'stock_asc') {
            $builder->orderBy('products.stock', 'ASC');
            $builder->orderBy('products.id', 'DESC');
        } elseif ($sort === 'stock_desc') {
            $builder->orderBy('products.stock', 'DESC');
            $builder->orderBy('products.id', 'DESC');
        } elseif ($sort === 'newest') {
            $builder->orderBy('products.created_at', 'DESC');
            $builder->orderBy('products.id', 'DESC');
        } else {
            $builder->orderBy('products.id', 'DESC');
        }

        $products = $builder->get()->getResultArray();

        $favoriteIds = [];
        $favoriteCount = 0;

        if (session()->get('isLoggedIn')) {
            $favorites = $db->table('favorites')
                ->where('user_id', session()->get('user_id'))
                ->get()
                ->getResultArray();

            $favoriteIds = array_map('intval', array_column($favorites, 'product_id'));
            $favoriteCount = count($favoriteIds);
        }

        return view('products', [
            'products' => $products,
            'favoriteIds' => $favoriteIds,
            'favoriteCount' => $favoriteCount,
            'filters' => [
                'sort' => $sort,
                'stock' => $stockFilter,
                'min' => $minPrice !== null ? (string)$minPrice : '',
                'max' => $maxPrice !== null ? (string)$maxPrice : '',
                'category' => $category,
                'search' => $search
            ]
        ]);
    }

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

    public function toggleFavorite(int $productId)
    {
        if (!session()->get('isLoggedIn')) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'loginRequired' => true
                ]);
            }

            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        $favorite = $db->table('favorites')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get()
            ->getRowArray();

        if ($favorite) {
            $db->table('favorites')
                ->where('id', $favorite['id'])
                ->delete();

            $isFavorite = false;
        } else {
            $db->table('favorites')->insert([
                'user_id' => $userId,
                'product_id' => $productId
            ]);

            $isFavorite = true;
        }

        $favoriteCount = $db->table('favorites')
            ->where('user_id', $userId)
            ->countAllResults();

        $product = $db->table('products')
            ->select('name')
            ->where('id', $productId)
            ->get()
            ->getRowArray();

        return $this->response->setJSON([
            'success' => true,
            'isFavorite' => $isFavorite,
            'favoriteCount' => $favoriteCount,
            'productName' => (string)($product['name'] ?? ''),
            'message' => $isFavorite ? 'Ürün favorilere eklendi.' : 'Ürün favorilerden çıkarıldı.'
        ]);
    }

    public function favorites()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $products = $db->table('favorites')
            ->select('products.*')
            ->join('products', 'products.id = favorites.product_id')
            ->where('favorites.user_id', session()->get('user_id'))
            ->orderBy('favorites.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('favorites', [
            'products' => $products
        ]);
    }

    public function removeFavorite(int $productId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $db->table('favorites')
            ->where('user_id', session()->get('user_id'))
            ->where('product_id', $productId)
            ->delete();

        return redirect()->to('/favorites');
    }

    public function receiveOrder(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $db->table('orders')
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->where('status', 'distributing')
            ->update([
                'status' => 'delivered'
            ]);

        return redirect()->to('/my-orders');
    }
}