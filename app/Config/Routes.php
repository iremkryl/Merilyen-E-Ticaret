<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| Genel Sayfalar
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Home::index');

$routes->get('/about', 'PageController::about');
$routes->get('/contact', 'PageController::contact');
$routes->post('/contact/send', 'PageController::sendContact');

$routes->get('/blog', 'PageController::blog');
$routes->get('/blog/detail/(:segment)', 'PageController::blogDetail/$1');

$routes->get('/sayilarla-merilyen', 'PageController::stats');


/*
|--------------------------------------------------------------------------
| Ürünler
|--------------------------------------------------------------------------
*/

$routes->get('/products', 'ProductController::index');
$routes->get('/product/detail/(:num)', 'ProductController::detail/$1');


/*
|--------------------------------------------------------------------------
| Kimlik Doğrulama
|--------------------------------------------------------------------------
*/

$routes->get('/login', 'AuthController::login');
$routes->post('/login-post', 'AuthController::loginPost');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/register', 'AuthController::register');
$routes->post('/register-post', 'AuthController::registerPost');

$routes->get('/forgot-password', 'AuthController::forgotPassword');
$routes->post('/forgot-password-post', 'AuthController::forgotPasswordPost');

$routes->get('/reset-password/(:num)', 'AuthController::resetPassword/$1');
$routes->post('/reset-password-post/(:num)', 'AuthController::resetPasswordPost/$1');


/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/

$routes->get('/profile', 'AuthController::profile');
$routes->post('/profile/update', 'AuthController::updateProfile');
$routes->post('/profile/password', 'AuthController::changePassword');
$routes->post('/profile/deactivate', 'AuthController::deactivateAccount');


/*
|--------------------------------------------------------------------------
| Favoriler
|--------------------------------------------------------------------------
*/

$routes->get('/favorites', 'ProductController::favorites');
$routes->get('/favorite/remove/(:num)', 'ProductController::removeFavorite/$1');

// Hem normal link hem AJAX istekleri çalışsın diye match kullanıyoruz.
$routes->match(['get', 'post'], '/favorite/toggle/(:num)', 'ProductController::toggleFavorite/$1');


/*
|--------------------------------------------------------------------------
| Sepet ve Ödeme
|--------------------------------------------------------------------------
*/

$routes->get('/cart', 'CartController::index');

// Hem eski GET link mantığı hem yeni AJAX POST mantığı çalışır.
$routes->match(['get', 'post'], '/cart/add/(:num)', 'CartController::add/$1');

$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');
$routes->post('/cart/update/(:num)', 'CartController::updateQuantity/$1');

$routes->get('/cart/increase/(:num)', 'CartController::increase/$1');
$routes->get('/cart/decrease/(:num)', 'CartController::decrease/$1');

$routes->post('/cart/checkout', 'CartController::checkout');


/*
|--------------------------------------------------------------------------
| Kullanıcı Adresleri
|--------------------------------------------------------------------------
*/

$routes->get('/addresses', 'AddressController::index');
$routes->get('/addresses/create', 'AddressController::create');
$routes->post('/addresses/store', 'AddressController::store');

$routes->get('/addresses/edit/(:num)', 'AddressController::edit/$1');
$routes->post('/addresses/update/(:num)', 'AddressController::update/$1');

$routes->get('/addresses/delete/(:num)', 'AddressController::delete/$1');
$routes->get('/addresses/default/(:num)', 'AddressController::makeDefault/$1');


/*
|--------------------------------------------------------------------------
| Kullanıcı Siparişleri
|--------------------------------------------------------------------------
*/

$routes->get('/my-orders', 'OrderController::myOrders');
$routes->get('/my-orders/cancel/(:num)', 'OrderController::cancel/$1');
$routes->get('/my-orders/receive/(:num)', 'OrderController::receive/$1');


/*
|--------------------------------------------------------------------------
| Admin Paneli
|--------------------------------------------------------------------------
| Bu gruptaki tüm route'lar adminFilter ile korunur.
*/

$routes->group('admin', ['filter' => 'adminFilter'], static function ($routes) {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    $routes->get('', 'AdminController::index');


    /*
    |--------------------------------------------------------------------------
    | Admin Ürün Yönetimi
    |--------------------------------------------------------------------------
    */

    $routes->get('products', 'AdminController::products');
    $routes->get('products/create', 'AdminController::createProduct');
    $routes->post('products/store', 'AdminController::storeProduct');

    $routes->get('products/edit/(:num)', 'AdminController::editProduct/$1');
    $routes->post('products/update/(:num)', 'AdminController::updateProduct/$1');

    $routes->get('products/delete/(:num)', 'AdminController::deleteProduct/$1');


    /*
    |--------------------------------------------------------------------------
    | Admin Sipariş Yönetimi
    |--------------------------------------------------------------------------
    */

    $routes->get('orders', 'AdminController::orders');
    $routes->get('orders/detail/(:num)', 'AdminController::orderDetail/$1');
    $routes->post('orders/status/(:num)', 'AdminController::updateOrderStatus/$1');


    /*
    |--------------------------------------------------------------------------
    | Admin Kullanıcı Yönetimi
    |--------------------------------------------------------------------------
    */

    $routes->get('users', 'AdminController::users');
    $routes->post('users/status/(:num)', 'AdminController::updateUserStatus/$1');
    $routes->get('users/delete/(:num)', 'AdminController::deleteUser/$1');


    /*
    |--------------------------------------------------------------------------
    | Admin Mesaj Yönetimi
    |--------------------------------------------------------------------------
    */

    $routes->get('messages', 'AdminController::messages');
    $routes->get('messages/read/(:num)', 'AdminController::markMessageRead/$1');


    /*
    |--------------------------------------------------------------------------
    | Admin İçerik / Blog Yönetimi
    |--------------------------------------------------------------------------
    */

    $routes->get('blogs', 'AdminController::blogs');
    $routes->get('blogs/create', 'AdminController::createBlog');
    $routes->post('blogs/store', 'AdminController::storeBlog');

    $routes->get('blogs/edit/(:num)', 'AdminController::editBlog/$1');
    $routes->post('blogs/update/(:num)', 'AdminController::updateBlog/$1');

    $routes->get('blogs/status/(:num)', 'AdminController::toggleBlogStatus/$1');
    $routes->get('blogs/delete/(:num)', 'AdminController::deleteBlog/$1');

});