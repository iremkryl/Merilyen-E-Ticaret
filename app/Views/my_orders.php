<?php
if (!function_exists('my_orders_html')) {
    /**
     * @param mixed $value
     */
    function my_orders_html($value): string
    {
        if (is_string($value) || is_numeric($value)) {
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }

        return '';
    }
}

if (!function_exists('my_orders_money')) {
    /**
     * @param mixed $value
     */
    function my_orders_money($value): string
    {
        return number_format(is_numeric($value) ? (float)$value : 0, 2) . ' ₺';
    }
}

if (!function_exists('my_orders_date')) {
    /**
     * @param mixed $value
     */
    function my_orders_date($value): string
    {
        if (!is_string($value) && !is_numeric($value)) {
            return '-';
        }

        $timestamp = strtotime((string)$value);

        if ($timestamp === false) {
            return '-';
        }

        return date('d.m.Y H:i', $timestamp);
    }
}

if (!isset($orders) || !is_array($orders)) {
    $orders = [];
}

$favCount = 0;
$cartCount = 0;

$cartRaw = session()->get('cart');
$cart = is_array($cartRaw) ? $cartRaw : [];

foreach ($cart as $cartItem) {
    if (!is_array($cartItem)) {
        continue;
    }

    $cartCount += is_numeric($cartItem['quantity'] ?? null)
        ? (int)$cartItem['quantity']
        : 0;
}

if (session()->get('isLoggedIn')) {
    $db = \Config\Database::connect();

    $favCount = (int)$db->table('favorites')
        ->where('user_id', session()->get('user_id'))
        ->countAllResults();
}

$userNameRaw = session()->get('user_name');
$userSurnameRaw = session()->get('user_surname');

$userName = is_scalar($userNameRaw) ? (string)$userNameRaw : '';
$userSurname = is_scalar($userSurnameRaw) ? (string)$userSurnameRaw : '';

$userFullName = trim($userName . ' ' . $userSurname);

$successRaw = session()->getFlashdata('success');
$errorRaw = session()->getFlashdata('error');

$successMessage = is_scalar($successRaw) ? (string)$successRaw : '';
$errorMessage = is_scalar($errorRaw) ? (string)$errorRaw : '';

$statusText = [
    'pending'      => 'Onay Bekliyor',
    'approved'     => 'Onaylandı',
    'supplying'    => 'Ürünleriniz Tedarik Ediliyor',
    'packing'      => 'Ürünleriniz Kutulanıyor',
    'shipped'      => 'Kargoya Verildi',
    'on_the_way'   => 'Size Doğru Yola Çıktı',
    'distributing' => 'Dağıtımda',
    'delivered'    => 'Ürünleriniz Size Teslim Edilmiştir',
    'received'     => 'Teslim Alındı',
    'cancelled'    => 'İptal Edildi'
];

$statusClass = [
    'pending'      => 'badge-status badge-pending',
    'approved'     => 'badge-status badge-approved',
    'supplying'    => 'badge-status badge-process',
    'packing'      => 'badge-status badge-process',
    'shipped'      => 'badge-status badge-shipping',
    'on_the_way'   => 'badge-status badge-shipping',
    'distributing' => 'badge-status badge-shipping',
    'delivered'    => 'badge-status badge-delivered',
    'received'     => 'badge-status badge-received',
    'cancelled'    => 'badge-status badge-cancelled'
];

$invoiceAllowedStatuses = [
    'approved',
    'supplying',
    'packing',
    'shipped',
    'on_the_way',
    'distributing',
    'delivered',
    'received'
];
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Siparişlerim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/iconic/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/linearicons-v1.0.0/icon-font.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/animate/animate.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/animsition/css/animsition.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/util.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">

    <style>
        .orders-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .orders-table {
            margin-bottom: 0;
        }

        .orders-table thead {
            background: #717fe0;
            color: white;
        }

        .orders-table th,
        .orders-table td {
            vertical-align: middle;
        }

        .order-address {
            white-space: pre-line;
            max-width: 380px;
            color: #666;
            font-size: 14px;
            line-height: 1.55;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.25;
        }

        .badge-pending {
            background: #fff4d6;
            color: #8a6500;
        }

        .badge-approved {
            background: #e8efff;
            color: #315ec4;
        }

        .badge-process {
            background: #e6f8fb;
            color: #13788a;
        }

        .badge-shipping {
            background: #eeeeee;
            color: #444;
        }

        .badge-delivered,
        .badge-received {
            background: #e9f8ee;
            color: #237a3d;
        }

        .badge-cancelled {
            background: #fff0f0;
            color: #b83232;
        }

        .empty-orders-box {
            background: #faf8ff;
            border-radius: 18px;
            padding: 45px 20px;
            text-align: center;
        }

        .action-btn {
            border-radius: 20px;
            font-weight: 600;
            padding: 7px 13px;
            margin: 2px;
        }

        .invoice-btn {
            border-radius: 20px;
            font-weight: 600;
            padding: 7px 13px;
            margin: 2px;
        }

        .order-action-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            align-items: center;
        }

        .mobile-order-card {
            display: none;
        }

        .mobile-order-item {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
            padding: 20px;
            margin-bottom: 18px;
            border: 1px solid #f0ecff;
        }

        .mobile-order-row {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            padding: 9px 0;
            border-bottom: 1px dashed #e9e9e9;
        }

        .mobile-order-row:last-child {
            border-bottom: none;
        }

        .mobile-order-label {
            color: #777;
            font-size: 13px;
            font-weight: 600;
            min-width: 96px;
        }

        .mobile-order-value {
            color: #333;
            font-size: 14px;
            text-align: right;
            word-break: break-word;
        }

        .invoice-info-text {
            display: inline-block;
            color: #888;
            font-size: 13px;
            margin: 4px 0;
        }

        @media (max-width: 991px) {
            .desktop-orders-table {
                display: none;
            }

            .mobile-order-card {
                display: block;
            }

            .order-page-actions {
                justify-content: center;
            }

            .order-action-stack {
                justify-content: flex-start;
            }
        }

        @media (max-width: 768px) {
            .orders-title-area {
                text-align: center;
            }

            .orders-title-area .stext-102 {
                max-width: 330px;
                margin-left: auto;
                margin-right: auto;
            }

            .mobile-order-row {
                flex-direction: column;
                gap: 4px;
            }

            .mobile-order-value {
                text-align: left;
            }
        }
    </style>
</head>

<body class="animsition">

<header class="header-v4">
    <div class="container-menu-desktop">
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    2500 TL VE ÜZERİ KARGO ÜCRETSİZ
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">Yardım & SSS</a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('/profile') ?>" class="flex-c-m trans-04 p-lr-25">
                            <?= my_orders_html($userFullName !== '' ? $userFullName : 'Profilim') ?>
                        </a>

                        <a href="<?= base_url('/logout') ?>" class="flex-c-m trans-04 p-lr-25">
                            Çıkış Yap
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('/login') ?>" class="flex-c-m trans-04 p-lr-25">
                            Giriş Yap
                        </a>
                    <?php endif; ?>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">TR</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">TL</a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">

                <a href="<?= base_url('/') ?>" class="logo">
                    <img src="<?= base_url('images/icons/logo-1m.png') ?>" alt="IMG-LOGO">
                </a>

                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="<?= base_url('/') ?>">Anasayfa</a>
                        </li>

                        <li>
                            <a href="<?= base_url('/products') ?>">Ürünler</a>
                            <ul class="sub-menu">
                                <li><a href="<?= base_url('/products#kol') ?>">Kol Çantası</a></li>
                                <li><a href="<?= base_url('/products#capraz') ?>">Çapraz Çanta</a></li>
                                <li><a href="<?= base_url('/products#elcantasi') ?>">El Çantası</a></li>
                                <li><a href="<?= base_url('/products#sirtcantasi') ?>">Sırt Çantası</a></li>
                                <li><a href="<?= base_url('/products#yelek') ?>">Yelek</a></li>
                            </ul>
                        </li>

                        <li class="label1" data-label1="İndirim">
                            <a href="<?= base_url('/cart') ?>">Sepetiniz</a>
                        </li>

                        <?php if (session()->get('isLoggedIn')): ?>
                            <li class="active-menu">
                                <a href="<?= base_url('/my-orders') ?>">Siparişlerim</a>
                            </li>
                        <?php endif; ?>

                        <li><a href="<?= base_url('/blog') ?>">Blog</a></li>
                        <li><a href="<?= base_url('/about') ?>">Hakkımızda</a></li>
                        <li><a href="<?= base_url('/contact') ?>">İletişim</a></li>
                    </ul>
                </div>

                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <a href="<?= base_url('/favorites') ?>"
                       id="favoriteHeaderIcon"
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= (int)$favCount ?>">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>

                    <a href="<?= base_url('/cart') ?>"
                       id="cartHeaderIcon"
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= (int)$cartCount ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                </div>

            </nav>
        </div>
    </div>

    <div class="wrap-header-mobile">
        <div class="logo-mobile">
            <a href="<?= base_url('/') ?>">
                <img src="<?= base_url('images/icons/logo-1m.png') ?>" alt="IMG-LOGO">
            </a>
        </div>

        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <a href="<?= base_url('/favorites') ?>"
               class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
               data-notify="<?= (int)$favCount ?>">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>

            <a href="<?= base_url('/cart') ?>"
               class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
               data-notify="<?= (int)$cartCount ?>">
                <i class="zmdi zmdi-shopping-cart"></i>
            </a>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    2500 TL VE ÜZERİ KARGO ÜCRETSİZ
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">Yardım & SSS</a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('/profile') ?>" class="flex-c-m p-lr-10 trans-04">
                            <?= my_orders_html($userFullName !== '' ? $userFullName : 'Profilim') ?>
                        </a>

                        <a href="<?= base_url('/logout') ?>" class="flex-c-m p-lr-10 trans-04">
                            Çıkış Yap
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('/login') ?>" class="flex-c-m p-lr-10 trans-04">
                            Giriş Yap
                        </a>
                    <?php endif; ?>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">TR</a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">TL</a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="<?= base_url('/') ?>">Anasayfa</a>
            </li>

            <li>
                <a href="<?= base_url('/products') ?>">Ürünler</a>
                <ul class="sub-menu-m">
                    <li><a href="<?= base_url('/products#kol') ?>">Kol Çantası</a></li>
                    <li><a href="<?= base_url('/products#capraz') ?>">Çapraz Çanta</a></li>
                    <li><a href="<?= base_url('/products#elcantasi') ?>">El Çantası</a></li>
                    <li><a href="<?= base_url('/products#sirtcantasi') ?>">Sırt Çantası</a></li>
                    <li><a href="<?= base_url('/products#yelek') ?>">Yelek</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="<?= base_url('/cart') ?>" class="label1 rs1" data-label1="indirim">Sepetiniz</a>
            </li>

            <?php if (session()->get('isLoggedIn')): ?>
                <li>
                    <a href="<?= base_url('/my-orders') ?>">Siparişlerim</a>
                </li>
            <?php endif; ?>

            <li>
                <a href="<?= base_url('/blog') ?>">Blog</a>
            </li>

            <li>
                <a href="<?= base_url('/about') ?>">Hakkımızda</a>
            </li>

            <li>
                <a href="<?= base_url('/contact') ?>">İletişim</a>
            </li>
        </ul>
    </div>

    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="<?= base_url('images/icons/icon-close2.png') ?>" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="<?= base_url('/products') ?>" method="get">
                <button class="flex-c-m trans-04" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="q" placeholder="Arama...">
            </form>
        </div>
    </div>
</header>

<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?= base_url('/') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Anasayfa
            <i class="fa fa-angle-right m-l-9 m-r-10"></i>
        </a>

        <span class="stext-109 cl4">
            Siparişlerim
        </span>
    </div>
</div>

<?php if ($successMessage !== ''): ?>
    <div class="container p-t-25">
        <div class="alert alert-success" style="border-radius:14px;">
            <?= my_orders_html($successMessage) ?>
        </div>
    </div>
<?php endif; ?>

<?php if ($errorMessage !== ''): ?>
    <div class="container p-t-25">
        <div class="alert alert-danger" style="border-radius:14px;">
            <?= my_orders_html($errorMessage) ?>
        </div>
    </div>
<?php endif; ?>

<section class="bg0 p-t-75 p-b-85">
    <div class="container">

        <div class="orders-title-area p-b-30">
            <h3 class="ltext-103 cl5">
                Siparişlerim
            </h3>

            <p class="stext-102 cl6 p-t-10">
                Sipariş durumlarınızı takip edebilir, uygun aşamadaki siparişleri iptal edebilir, faturanızı görüntüleyebilir veya teslim aldığınızı onaylayabilirsiniz.
            </p>
        </div>

        <?php if (empty($orders)): ?>

            <div class="orders-card p-lr-30 p-tb-40">
                <div class="empty-orders-box">
                    <h4 class="mtext-105 cl2 p-b-10">
                        Henüz siparişiniz bulunmuyor
                    </h4>

                    <p class="stext-102 cl6 p-b-20">
                        Ürünleri inceleyerek ilk siparişinizi oluşturabilirsiniz.
                    </p>

                    <a href="<?= base_url('/products') ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 d-inline-flex">
                        Ürünlere Git
                    </a>
                </div>
            </div>

        <?php else: ?>

            <div class="orders-card desktop-orders-table">
                <div class="table-responsive">
                    <table class="table table-hover align-middle orders-table">
                        <thead>
                            <tr>
                                <th>Sipariş No</th>
                                <th>Tutar</th>
                                <th>Durum</th>
                                <th>Adres</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Fatura</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                if (!is_array($order)) {
                                    continue;
                                }

                                $currentStatus = is_scalar($order['status'] ?? null)
                                    ? (string)$order['status']
                                    : 'pending';

                                $currentStatusText = $statusText[$currentStatus] ?? $currentStatus;
                                $currentStatusClass = $statusClass[$currentStatus] ?? 'badge-status badge-process';

                                $orderId = is_numeric($order['id'] ?? null) ? (int)$order['id'] : 0;
                                $orderTotal = is_numeric($order['total_price'] ?? null) ? (float)$order['total_price'] : 0;
                                $orderAddress = my_orders_html($order['shipping_address'] ?? '-');
                                $orderDate = my_orders_date($order['created_at'] ?? null);
                                $canViewInvoice = in_array($currentStatus, $invoiceAllowedStatuses, true);
                                ?>

                                <tr>
                                    <td>#<?= (int)$orderId ?></td>

                                    <td><?= my_orders_money($orderTotal) ?></td>

                                    <td>
                                        <span class="<?= my_orders_html($currentStatusClass) ?>">
                                            <?= my_orders_html($currentStatusText) ?>
                                        </span>
                                    </td>

                                    <td class="order-address">
                                        <?= $orderAddress !== '' ? $orderAddress : '-' ?>
                                    </td>

                                    <td>
                                        <?= my_orders_html($orderDate) ?>
                                    </td>

                                    <td>
                                        <div class="order-action-stack">

                                            <?php if ($canViewInvoice): ?>
                                                <a href="<?= base_url('/my-orders/invoice/' . $orderId) ?>"
                                                target="_blank"
                                                class="btn btn-sm btn-outline-dark invoice-btn">
                                                    Fatura Göster
                                                </a>
                                            <?php elseif ($currentStatus === 'cancelled'): ?>
                                                <span class="invoice-info-text">
                                                    Fatura yok
                                                </span>
                                            <?php else: ?>
                                                <span class="invoice-info-text">
                                                    Faturanız onaydan sonra aktif olacaktır.
                                                    <br>
                                                    Onaylanıncaya kadar, siparişinizi iptal edebilirsiniz.
                                                </span>
                                            <?php endif; ?>

                                            <?php if ($currentStatus === 'pending'): ?>

                                                <a href="<?= base_url('/my-orders/cancel/' . $orderId) ?>"
                                                   class="btn btn-sm btn-danger action-btn"
                                                   onclick="return confirm('Bu siparişi iptal etmek istediğinize emin misiniz? Tutar bakiyenize aktarılacaktır.')">
                                                    İptal Et
                                                </a>

                                            <?php elseif ($currentStatus === 'delivered'): ?>

                                                <a href="<?= base_url('/my-orders/receive/' . $orderId) ?>"
                                                   class="btn btn-sm btn-success action-btn">
                                                    Teslim Aldım
                                                </a>

                                            <?php elseif ($currentStatus === 'received'): ?>

                                                <span class="badge-status badge-received">
                                                    Teslim Alındı
                                                </span>

                                            <?php elseif ($currentStatus === 'cancelled'): ?>

                                                <span class="badge-status badge-cancelled">
                                                    İptal Edildi
                                                </span>

                                            <?php endif; ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mobile-order-card">
                <?php foreach ($orders as $order): ?>
                    <?php
                    if (!is_array($order)) {
                        continue;
                    }

                    $currentStatus = is_scalar($order['status'] ?? null)
                        ? (string)$order['status']
                        : 'pending';

                    $currentStatusText = $statusText[$currentStatus] ?? $currentStatus;
                    $currentStatusClass = $statusClass[$currentStatus] ?? 'badge-status badge-process';

                    $orderId = is_numeric($order['id'] ?? null) ? (int)$order['id'] : 0;
                    $orderTotal = is_numeric($order['total_price'] ?? null) ? (float)$order['total_price'] : 0;
                    $orderAddress = my_orders_html($order['shipping_address'] ?? '-');
                    $orderDate = my_orders_date($order['created_at'] ?? null);
                    $canViewInvoice = in_array($currentStatus, $invoiceAllowedStatuses, true);
                    ?>

                    <div class="mobile-order-item">
                        <div class="d-flex justify-content-between align-items-start m-b-15">
                            <div>
                                <h5 class="mtext-102 cl2 m-b-4">
                                    Sipariş #<?= (int)$orderId ?>
                                </h5>

                                <span class="<?= my_orders_html($currentStatusClass) ?>">
                                    <?= my_orders_html($currentStatusText) ?>
                                </span>
                            </div>

                            <strong class="mtext-102 cl2">
                                <?= my_orders_money($orderTotal) ?>
                            </strong>
                        </div>

                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Tarih</span>
                            <span class="mobile-order-value">
                                <?= my_orders_html($orderDate) ?>
                            </span>
                        </div>

                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Adres</span>
                            <span class="mobile-order-value" style="white-space:pre-line;">
                                <?= $orderAddress !== '' ? $orderAddress : '-' ?>
                            </span>
                        </div>

                        <div class="p-t-15 order-action-stack">

                            <?php if ($canViewInvoice): ?>
                                <a href="<?= base_url('/my-orders/invoice/' . $orderId) ?>"
                                target="_blank"
                                class="btn btn-sm btn-outline-dark invoice-btn">
                                    Fatura Göster
                                </a>
                            <?php elseif ($currentStatus === 'cancelled'): ?>
                                <span class="invoice-info-text">
                                    Fatura yok
                                </span>
                            <?php else: ?>
                                <span class="invoice-info-text">
                                    Fatura onaydan sonra
                                </span>
                            <?php endif; ?>

                            <?php if ($currentStatus === 'pending'): ?>

                                <a href="<?= base_url('/my-orders/cancel/' . $orderId) ?>"
                                   class="btn btn-sm btn-danger action-btn"
                                   onclick="return confirm('Bu siparişi iptal etmek istediğinize emin misiniz? Tutar bakiyenize aktarılacaktır.')">
                                    İptal Et
                                </a>

                            <?php elseif ($currentStatus === 'delivered'): ?>

                                <a href="<?= base_url('/my-orders/receive/' . $orderId) ?>"
                                   class="btn btn-sm btn-success action-btn">
                                    Teslim Aldım
                                </a>

                            <?php elseif ($currentStatus === 'received'): ?>

                                <span class="badge-status badge-received">
                                    Teslim Alındı
                                </span>

                            <?php elseif ($currentStatus === 'cancelled'): ?>

                                <span class="badge-status badge-cancelled">
                                    İptal Edildi
                                </span>

                            <?php else: ?>

                                <span class="text-muted">Bu aşamada kullanıcı işlemi bulunmuyor.</span>

                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <div class="p-t-30 d-flex order-page-actions">
            <a href="<?= base_url('/products') ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="width:180px;">
                Ürünlere Git
            </a>
        </div>

    </div>
</section>

<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Kategoriler</h4>
                <ul>
                    <li class="p-b-10"><a href="<?= base_url('/products#kol') ?>" class="stext-107 cl7 hov-cl1 trans-04">Kol Çantası</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/products#capraz') ?>" class="stext-107 cl7 hov-cl1 trans-04">Çapraz Çanta</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/products#elcantasi') ?>" class="stext-107 cl7 hov-cl1 trans-04">El Çantası</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/products#sirtcantasi') ?>" class="stext-107 cl7 hov-cl1 trans-04">Sırt Çantası</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/products#yelek') ?>" class="stext-107 cl7 hov-cl1 trans-04">Yelekler</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Yardım</h4>
                <ul>
                    <li class="p-b-10"><a href="<?= base_url('/my-orders') ?>" class="stext-107 cl7 hov-cl1 trans-04">Sipariş Takibi</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">İade & Değişim</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">Mesafeli Satış Sözleşmesi</a></li>
                    <li class="p-b-10"><a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">Sık Sorulan Sorular</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Bize Ulaşın</h4>
                <p class="stext-107 cl7 size-201">
                    Herhangi bir sorunuz mu var?
                    Bize atölyemizde uğrayarak ya da telefonla ulaşabilirsiniz.
                    <br> Atölye Adresimiz: Çiçek Mahallesi, El Emeği Sokak No:12, Kartal / İstanbul
                    <br> Telefon: 0 (500) 123 45 67
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/hulyaorguevi_?igsh=MTFxNnB0ZTNmbTZqeg==" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Bizden Haberler</h4>
                <p class="stext-107 cl7 size-201">
                    Haberlerimiz, özel tekliflerimiz ve favori stillerimiz hakkında ilk siz bilgi sahibi olun.
                </p>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="eposta@ornek.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button type="button" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Abone Ol
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="<?= base_url('images/icons/icon-pay-01.png') ?>" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="<?= base_url('images/icons/icon-pay-02.png') ?>" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="<?= base_url('images/icons/icon-pay-03.png') ?>" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="<?= base_url('images/icons/icon-pay-04.png') ?>" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="<?= base_url('images/icons/icon-pay-05.png') ?>" alt="ICON-PAY">
                </a>
            </div>

            <p class="stext-107 cl6 txt-center">
                Tüm hakları saklıdır &copy;<?= date('Y') ?> | İrem Karayel
            </p>
        </div>
    </div>
</footer>

<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<script src="<?= base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= base_url('vendor/animsition/js/animsition.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/popper.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('js/main.js') ?>"></script>

</body>

</html>