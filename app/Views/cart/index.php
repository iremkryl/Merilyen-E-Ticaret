<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Sepetiniz</title>
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
    <link rel="stylesheet" href="<?= base_url('vendor/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/util.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">

    <style>
        .coupon-area {
            width: 100%;
        }

        .coupon-row {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            width: 100%;
        }

        .coupon-input-wrap {
            flex: 1;
            min-width: 230px;
        }

        .coupon-input {
            width: 100%;
            height: 56px;
            border: 1px solid #e6e6e6;
            border-radius: 30px;
            padding: 0 24px;
            font-size: 15px;
            color: #333;
            outline: none;
            text-transform: uppercase;
            transition: all 0.25s ease;
            background: #fff;
        }

        .coupon-input:focus {
            border-color: #717fe0;
            box-shadow: 0 0 0 0.15rem rgba(113, 127, 224, 0.13);
        }

        .coupon-apply-btn {
            height: 56px;
            padding: 0 30px;
            border-radius: 30px;
            border: 1px solid #e6e6e6;
            background: #f3f3f3;
            color: #222;
            font-weight: 700;
            transition: all 0.25s ease;
            white-space: nowrap;
            cursor: pointer;
        }

        .coupon-apply-btn:hover {
            background: #717fe0;
            color: #fff;
            border-color: #717fe0;
        }

        .coupon-message {
            margin-top: 12px;
            border-radius: 14px;
            padding: 12px 16px;
            font-size: 14px;
        }

        .coupon-message.success {
            background: #eefaf0;
            color: #287a3e;
        }

        .coupon-message.error {
            background: #fff1f1;
            color: #b83232;
        }

        .cart-payment-note {
            border-radius: 14px;
            border: none;
            line-height: 1.7;
        }

        .cart-empty-box {
            background: #faf8ff;
            border-radius: 18px;
            padding: 35px 20px;
        }


        .wrap-table-shopping-cart {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-shopping-cart {
            min-width: 760px;
        }

        .logo-mobile img {
            max-height: 52px;
            object-fit: contain;
        }

        .menu-mobile .sub-menu-m {
            display: none;
            padding-left: 20px;
            background: #f7f7f7;
        }

        .menu-mobile .sub-menu-m li a {
            padding: 10px 20px;
            display: block;
            color: #555;
        }

        .menu-mobile .sub-menu-m li a:hover {
            color: #717fe0;
        }

        @media (max-width: 991px) {
            .m-l-25.m-r--38 {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            .bor10 {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }

        @media (max-width: 768px) {
            .coupon-row {
                flex-direction: column;
                align-items: stretch;
            }

            .coupon-apply-btn {
                width: 100%;
            }
        }

        /* Sepet tablosu boşken veya küçük ekranda yatay scroll oluşmasın */
        .wrap-table-shopping-cart {
            overflow-x: hidden !important;
        }

        .table-shopping-cart {
            width: 100% !important;
            min-width: 100% !important;
            table-layout: fixed;
        }

        .table-shopping-cart .column-1 {
            width: 18%;
            padding-left: 25px;
        }

        .table-shopping-cart .column-2 {
            width: 25%;
        }

        .table-shopping-cart .column-3 {
            width: 18%;
        }

        .table-shopping-cart .column-4 {
            width: 22%;
        }

        .table-shopping-cart .column-5 {
            width: 17%;
            padding-right: 20px;
        }

        .table-shopping-cart td[colspan="5"] {
            width: 100% !important;
        }

        @media (max-width: 768px) {
            .table-shopping-cart .table_head {
                display: none;
            }

            .table-shopping-cart,
            .table-shopping-cart tbody,
            .table-shopping-cart tr,
            .table-shopping-cart td {
                display: block;
                width: 100% !important;
            }

            .table-shopping-cart .table_row {
                border-bottom: 1px solid #eee;
                padding: 18px 0;
            }

            .table-shopping-cart .column-1,
            .table-shopping-cart .column-2,
            .table-shopping-cart .column-3,
            .table-shopping-cart .column-4,
            .table-shopping-cart .column-5 {
                padding: 10px 20px !important;
                text-align: center;
            }

            .wrap-num-product {
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }

        .card-error-text {
            display: none;
            color: #d93025;
            font-size: 13px;
            margin-left: 8px;
            margin-bottom: 6px;
        }

        .card-error-text.show {
            display: block;
        }

        .card-input-invalid {
            border-color: #d93025 !important;
            box-shadow: 0 0 0 0.15rem rgba(217, 48, 37, 0.12) !important;
        }

        .card-input-valid {
            border-color: #2e9d4d !important;
            box-shadow: 0 0 0 0.15rem rgba(46, 157, 77, 0.10) !important;
        }
    </style>
</head>

<body class="animsition">

    <div id="toastMessage" style="
    display:none;
    position:fixed;
    top:25px;
    right:25px;
    background:#717fe0;
    color:white;
    padding:14px 22px;
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,0.18);
    z-index:99999;
    font-weight:600;
">
    </div>

    <?php
    if (!function_exists('cart_html')) {
        /**
         * @param mixed $value
         */
        function cart_html($value): string
        {
            if (is_string($value) || is_numeric($value)) {
                return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
            }

            return '';
        }
    }

    if (!isset($cart) || !is_array($cart)) {
        $cart = [];
    }

    if (!isset($user) || !is_array($user)) {
        $user = [];
    }

    if (!isset($addresses) || !is_array($addresses)) {
        $addresses = [];
    }

    $successRaw = session()->getFlashdata('success');
    $errorRaw = session()->getFlashdata('error');

    $successMessage = is_scalar($successRaw) ? (string)$successRaw : '';
    $errorMessage = is_scalar($errorRaw) ? (string)$errorRaw : '';

    $cartUserNameRaw = session()->get('user_name');
    $cartUserSurnameRaw = session()->get('user_surname');

    $cartUserName = is_scalar($cartUserNameRaw) ? (string)$cartUserNameRaw : '';
    $cartUserSurname = is_scalar($cartUserSurnameRaw) ? (string)$cartUserSurnameRaw : '';
    $cartUserFullNameHtml = cart_html(trim($cartUserName . ' ' . $cartUserSurname));

    $grandTotal = 0;

    foreach ($cart as $item) {
        if (!is_array($item)) {
            continue;
        }

        $grandTotal += ((float)($item['price'] ?? 0)) * ((int)($item['quantity'] ?? 1));
    }

    $shippingPrice = $grandTotal >= 2500 || $grandTotal <= 0 ? 0 : 50;
    $discountAmount = 0;
    $finalTotal = $grandTotal - $discountAmount + $shippingPrice;

    $userBalance = (float)($user['balance'] ?? 0);
    $balancePreview = min($userBalance, $finalTotal);
    $cardPreview = max(0, $finalTotal - $balancePreview);

    $cartCount = 0;
    foreach ($cart as $cartItem) {
        if (is_array($cartItem)) {
            $cartCount += (int)($cartItem['quantity'] ?? 0);
        }
    }

    $favCount = 0;

    if (session()->get('isLoggedIn')) {
        $db = \Config\Database::connect();

        $favCount = $db->table('favorites')
            ->where('user_id', session()->get('user_id'))
            ->countAllResults();
    }
    ?>

    <header class="header-v4">
        <div class="container-menu-desktop">
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        2500 TL VE ÜZERİ KARGO ÜCRETSİZ
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Yardım & SSS
                        </a>

                        <?php if (session()->get('isLoggedIn')): ?>

                            <a href="<?= base_url('/profile') ?>" class="flex-c-m trans-04 p-lr-25">
                                <?= $cartUserFullNameHtml ?>
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

                            <li class="active-menu label1" data-label1="İndirim">
                                <a href="<?= base_url('/cart') ?>">Sepetiniz</a>
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

                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <a href="<?= base_url('/favorites') ?>"
                            id="favoriteHeaderIcon"
                            class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="<?= $favCount ?>">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>

                        <a href="<?= base_url('/cart') ?>"
                            id="cartHeaderIcon"
                            class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="<?= $cartCount ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>
                    </div>

                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
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

                <a href="<?= base_url('/cart') ?>"
                    class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="<?= $cartCount ?? 0 ?>">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </a>

                <a href="<?= base_url('/favorites') ?>"
                    class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="<?= $favCount ?? 0 ?>">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        2500 TL VE ÜZERİ KARGO ÜCRETSİZ
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Yardım & SSS
                        </a>

                        <?php if (session()->get('isLoggedIn')): ?>
                            <a href="<?= base_url('/profile') ?>" class="flex-c-m p-lr-10 trans-04">
                                <?= $cartUserFullNameHtml !== '' ? $cartUserFullNameHtml : 'Profilim' ?>
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

                    <li>
                        <a href="<?= base_url('/profile') ?>">Profilim</a>
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

        <!-- Ürün Arama -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="<?= base_url('images/icons/icon-close2.png') ?>" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" action="<?= base_url('/products') ?>" method="get">
                    <button class="flex-c-m trans-04" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Arama...">
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
                Sepetiniz
            </span>
        </div>
    </div>

    <?php if ($successMessage !== ''): ?>
        <div class="container p-t-25">
            <div class="alert alert-success" style="border-radius:14px;">
                <?= cart_html($successMessage) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage !== ''): ?>
        <div class="container p-t-25">
            <div class="alert alert-danger" style="border-radius:14px;">
                <?= cart_html($errorMessage) ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">

                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Ürün</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Birim Fiyat</th>
                                    <th class="column-4">Adet</th>
                                    <th class="column-5">Toplam</th>
                                </tr>

                                <?php if (empty($cart)): ?>

                                    <tr class="table_row">
                                        <td colspan="5" class="p-4 text-center">
                                            <div class="cart-empty-box">
                                                <h5 class="mtext-102 cl2 p-b-10">
                                                    Sepetiniz boş
                                                </h5>

                                                <p class="stext-102 cl6 p-b-15">
                                                    Ürünleri inceleyerek sepetinize ürün ekleyebilirsiniz.
                                                </p>

                                                <a href="<?= base_url('/products') ?>"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 d-inline-flex">
                                                    Ürünlere Git
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php else: ?>

                                    <?php foreach ($cart as $item): ?>
                                        <?php
                                        $itemId = (int)($item['id'] ?? 0);
                                        $itemPrice = (float)($item['price'] ?? 0);
                                        $itemQuantity = (int)($item['quantity'] ?? 1);
                                        $itemStock = (int)($item['stock'] ?? 1);
                                        $itemTotal = $itemPrice * $itemQuantity;
                                        ?>

                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="<?= base_url('/cart/remove/' . $itemId) ?>"
                                                    onclick="return confirm('Bu ürünü sepetten silmek istediğinize emin misiniz?')">
                                                    <div class="how-itemcart1">
                                                        <img src="<?= base_url('images/' . ($item['image'] ?? '')) ?>" alt="IMG">
                                                    </div>
                                                </a>
                                            </td>

                                            <td class="column-2">
                                                <?= cart_html($item['name'] ?? 'Ürün') ?>
                                            </td>

                                            <td class="column-3">
                                                <?= number_format($itemPrice, 2) ?> ₺
                                            </td>

                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0 cart-counter"
                                                    data-id="<?= $itemId ?>"
                                                    data-price="<?= $itemPrice ?>"
                                                    data-stock="<?= $itemStock ?>">

                                                    <button type="button"
                                                        class="cl8 hov-btn3 trans-04 flex-c-m btn-decrease"
                                                        style="width:45px;">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </button>

                                                    <input class="mtext-104 cl3 txt-center num-product quantity-input"
                                                        type="number"
                                                        value="<?= $itemQuantity ?>"
                                                        readonly>

                                                    <button type="button"
                                                        class="cl8 hov-btn3 trans-04 flex-c-m btn-increase"
                                                        style="width:45px;">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </button>

                                                </div>
                                            </td>

                                            <td class="column-5 item-total">
                                                <?= number_format($itemTotal, 2) ?> ₺
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </table>
                        </div>

                        <?php if (!empty($cart)): ?>
                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="coupon-area">
                                    <div class="coupon-row">

                                        <div class="coupon-input-wrap">
                                            <input type="text"
                                                id="couponCodeInput"
                                                class="coupon-input"
                                                placeholder="KUPON">
                                        </div>

                                        <button type="button"
                                            id="applyCouponBtn"
                                            class="coupon-apply-btn">
                                            KUPONU UYGULA
                                        </button>

                                    </div>

                                    <div id="couponMessage"
                                        class="coupon-message success"
                                        style="display:none;">
                                        WEB kuponu uygulandı. Ürün toplamına %50 indirim tanımlandı.
                                    </div>

                                    <div id="couponError"
                                        class="coupon-message error"
                                        style="display:none;">
                                        Geçersiz kupon kodu.
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

                        <h4 class="mtext-109 cl2 p-b-30">
                            Sipariş Özeti
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Ara Toplam:
                                </span>
                            </div>

                            <div class="size-209">
                                <span id="subtotalText" class="mtext-110 cl2">
                                    <?= number_format($grandTotal, 2) ?> ₺
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Kupon İndirimi:
                                </span>
                            </div>

                            <div class="size-209">
                                <span id="discountText" class="mtext-110 cl2">
                                    0.00 ₺
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Kargo:
                                </span>
                            </div>

                            <div class="size-209">
                                <span id="shippingText" class="mtext-110 cl2">
                                    <?= number_format($shippingPrice, 2) ?> ₺
                                </span>

                                <p class="stext-111 cl6 p-t-8">
                                    2500 TL ve üzeri alışverişlerde kargo ücretsizdir.
                                </p>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Toplam:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span id="totalText" class="mtext-110 cl2">
                                    <?= number_format($finalTotal, 2) ?> ₺
                                </span>
                            </div>
                        </div>

                        <hr>

                        <h4 class="mtext-109 cl2 p-b-20">
                            Teslimat ve Ödeme
                        </h4>

                        <?php if (!session()->get('isLoggedIn')): ?>

                            <div class="alert alert-warning cart-payment-note">
                                Sipariş verebilmek için giriş yapmalısınız.
                            </div>

                            <a href="<?= base_url('/login') ?>"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Giriş Yap
                            </a>

                        <?php elseif (empty($addresses)): ?>

                            <div class="alert alert-warning cart-payment-note">
                                Sipariş verebilmek için önce kayıtlı adres eklemelisiniz.
                            </div>

                            <a href="<?= base_url('/addresses/create') ?>"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Adres Ekle
                            </a>

                        <?php else: ?>

                            <div id="paymentInfoBox" class="<?= $cardPreview > 0 ? 'alert alert-warning cart-payment-note' : 'alert alert-success cart-payment-note' ?>">
                                <strong>Bakiyeniz:</strong>
                                <span id="balanceAmount" data-balance="<?= $userBalance ?>">
                                    <?= number_format($userBalance, 2) ?> ₺
                                </span>
                                <br>

                                <strong>Bu siparişte bakiyeden kullanılacak:</strong>
                                <span id="usedBalanceText">
                                    <?= number_format($balancePreview, 2) ?> ₺
                                </span>
                                <br>

                                <strong>Karttan ödenecek:</strong>
                                <span id="cardAmountText">
                                    <?= number_format($cardPreview, 2) ?> ₺
                                </span>

                                <div id="paymentInfoMessage" class="p-t-8">
                                    <?php if ($cardPreview > 0): ?>
                                        Bakiyeniz siparişin tamamını karşılamıyor. Kalan tutar için kart ödeme bilgisi alınacaktır.
                                    <?php else: ?>
                                        Bakiyeniz sipariş tutarını karşılıyor. Kart bilgisi girmenize gerek yok.
                                    <?php endif; ?>
                                </div>
                            </div>

                            <form id="checkoutForm" action="<?= base_url('/cart/checkout') ?>" method="post">

                                <input type="hidden"
                                    name="applied_coupon_code"
                                    id="appliedCouponCode"
                                    value="">

                                <div class="m-b-15">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center m-b-8" style="gap:10px;">
                                        <label class="stext-110 cl2 m-b-0">
                                            Kayıtlı Teslimat Adresi
                                        </label>

                                        <div class="d-flex flex-wrap" style="gap:10px;">
                                            <a href="<?= base_url('/addresses/create') ?>" class="stext-110 cl1">
                                                + Yeni Adres Ekle
                                            </a>

                                            <a href="<?= base_url('/addresses') ?>" class="stext-110 cl1">
                                                Adreslerimi Yönet
                                            </a>
                                        </div>
                                    </div>

                                    <select name="address_id" class="form-control" required>
                                        <?php foreach ($addresses as $address): ?>
                                            <?php
                                            if (!is_array($address)) {
                                                continue;
                                            }

                                            $addressId = is_numeric($address['id'] ?? null) ? (int)$address['id'] : 0;
                                            $addressTitle = cart_html($address['title'] ?? 'Adres');
                                            $addressCity = cart_html($address['city'] ?? '');
                                            $addressDistrict = cart_html($address['district'] ?? '');
                                            $isDefault = (int)($address['is_default'] ?? 0) === 1;
                                            ?>

                                            <option value="<?= $addressId ?>" <?= $isDefault ? 'selected' : '' ?>>
                                                <?= $addressTitle ?> - <?= $addressCity ?>/<?= $addressDistrict ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <textarea class="stext-111 cl8 plh3 p-lr-15 p-tb-10"
                                        name="note"
                                        placeholder="Kargo Notu (opsiyonel)"
                                        style="width:100%; height:70px; border:none;"></textarea>
                                </div>

                                <div id="paymentIntro" class="p-t-10">
                                    <button type="button"
                                        id="finishShoppingBtn"
                                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                        <?= empty($cart) ? 'disabled' : '' ?>>
                                        Alışverişi Bitir
                                    </button>
                                </div>

                                <div id="cardPaymentArea" style="display:none;">

                                    <hr>

                                    <h5 class="mtext-101 cl2 p-b-15">
                                        Kart Ödeme Bilgileri
                                    </h5>

                                    <p class="stext-111 cl6 p-b-12">
                                        Bakiyeniz kullanıldıktan sonra kalan tutar karttan ödenmiş kabul edilir.
                                        Bu proje kapsamında ödeme işlemi simülasyondur.
                                    </p>

                                    <div class="bor8 bg0 m-b-8">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15 card-required"
                                            type="text"
                                            name="card_holder"
                                            id="cardHolderInput"
                                            placeholder="Kart Üzerindeki İsim"
                                            autocomplete="cc-name">
                                    </div>
                                    <small class="card-error-text" id="cardHolderError"></small>

                                    <div class="bor8 bg0 m-b-8 m-t-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15 card-required"
                                            type="text"
                                            name="card_number"
                                            id="cardNumberInput"
                                            placeholder="Kart Numarası (16 hane)"
                                            inputmode="numeric"
                                            maxlength="19"
                                            autocomplete="cc-number">
                                    </div>
                                    <small class="card-error-text" id="cardNumberError"></small>

                                    <div class="row m-t-12">
                                        <div class="col-md-6">
                                            <div class="bor8 bg0 m-b-8">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15 card-required"
                                                    type="text"
                                                    name="card_expire"
                                                    id="cardExpireInput"
                                                    placeholder="AA/YY"
                                                    inputmode="numeric"
                                                    maxlength="5"
                                                    autocomplete="cc-exp">
                                            </div>
                                            <small class="card-error-text" id="cardExpireError"></small>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bor8 bg0 m-b-8">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15 card-required"
                                                    type="text"
                                                    name="card_cvv"
                                                    id="cardCvvInput"
                                                    placeholder="CVV"
                                                    inputmode="numeric"
                                                    maxlength="3"
                                                    autocomplete="cc-csc">
                                            </div>
                                            <small class="card-error-text" id="cardCvvError"></small>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                        <?= empty($cart) ? 'disabled' : '' ?>>
                                        Kart Bilgileriyle Siparişi Tamamla
                                    </button>

                                </div>

                            </form>

                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

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
                        <li class="p-b-10"><a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">Sık Sorulan Sorular</a></li>
                        <li class="p-b-10"><a href="<?= base_url('/sayilarla-merilyen') ?>" class="stext-107 cl7 hov-cl1 trans-04">Sayılarla Merilyen</a></li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">Bize Ulaşın</h4>
                    <p class="stext-107 cl7 size-201">
                        Atölye Adresimiz: Çiçek Mahallesi, El Emeği Sokak No:12, Kartal / İstanbul<br>
                        Telefon: 0 (500) 123 45 67
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/hulyaorguevi_?igsh=MTFxNnB0ZTNmbTZqeg==" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
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
    <script src="<?= base_url('vendor/select2/select2.min.js') ?>"></script>
    <script src="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>

    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });

        window.currentSubtotal = <?= json_encode((float)$grandTotal) ?>;
        window.appliedCouponCode = '';
        window.currentFinalTotal = <?= json_encode((float)$finalTotal) ?>;
        window.currentCardAmount = <?= json_encode((float)$cardPreview) ?>;

        function showToast(message) {
            const toast = document.getElementById('toastMessage');

            if (!toast) return;

            toast.textContent = message;
            toast.style.display = 'block';

            setTimeout(function() {
                toast.style.display = 'none';
            }, 2200);
        }

        function updatePaymentPreview(total) {
            const balanceAmountEl = document.getElementById('balanceAmount');
            const usedBalanceEl = document.getElementById('usedBalanceText');
            const cardAmountEl = document.getElementById('cardAmountText');
            const paymentInfoBox = document.getElementById('paymentInfoBox');
            const paymentInfoMessage = document.getElementById('paymentInfoMessage');

            if (!balanceAmountEl || !usedBalanceEl || !cardAmountEl) return;

            const userBalance = parseFloat(balanceAmountEl.dataset.balance || 0);

            const usedBalance = Math.min(userBalance, total);
            const cardAmount = Math.max(0, total - usedBalance);

            window.currentCardAmount = cardAmount;

            usedBalanceEl.textContent = usedBalance.toFixed(2) + ' ₺';
            cardAmountEl.textContent = cardAmount.toFixed(2) + ' ₺';

            if (paymentInfoBox) {
                paymentInfoBox.classList.remove('alert-warning', 'alert-success');

                if (cardAmount > 0) {
                    paymentInfoBox.classList.add('alert-warning');

                    if (paymentInfoMessage) {
                        paymentInfoMessage.textContent = 'Bakiyeniz siparişin tamamını karşılamıyor. Kalan tutar için kart ödeme bilgisi alınacaktır.';
                    }
                } else {
                    paymentInfoBox.classList.add('alert-success');

                    if (paymentInfoMessage) {
                        paymentInfoMessage.textContent = 'Bakiyeniz sipariş tutarını karşılıyor. Kart bilgisi girmenize gerek yok.';
                    }
                }
            }
        }

        function calculateTotal() {
            const totalText = document.getElementById('totalText');
            const shippingText = document.getElementById('shippingText');
            const discountText = document.getElementById('discountText');

            const activeSubtotal = window.currentSubtotal ?? 0;

            const shipping = activeSubtotal >= 2500 || activeSubtotal <= 0 ? 0 : 50;

            let discount = 0;

            if (window.appliedCouponCode === 'web') {
                discount = activeSubtotal * 0.50;
            }

            const total = activeSubtotal - discount + shipping;

            window.currentFinalTotal = total;

            if (discountText) {
                discountText.textContent = discount.toFixed(2) + ' ₺';
            }

            if (shippingText) {
                shippingText.textContent = shipping.toFixed(2) + ' ₺';
            }

            if (totalText) {
                totalText.textContent = total.toFixed(2) + ' ₺';
            }

            updatePaymentPreview(total);
        }

        function updateCartTotalsFromRows() {
            let newSubtotal = 0;

            document.querySelectorAll('.cart-counter').forEach(function(counter) {
                const price = parseFloat(counter.dataset.price);
                const quantity = parseInt(counter.querySelector('.quantity-input').value);
                newSubtotal += price * quantity;
            });

            const subtotalText = document.getElementById('subtotalText');

            if (subtotalText) {
                subtotalText.textContent = newSubtotal.toFixed(2) + ' ₺';
            }

            window.currentSubtotal = newSubtotal;

            calculateTotal();
        }

        function syncQuantityWithSession(productId, quantity) {
            const formData = new FormData();
            formData.append('quantity', quantity);

            return fetch("<?= base_url('/cart/update') ?>/" + productId, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        showToast(data.message || 'Sepet güncellenemedi.');
                        return null;
                    }

                    document.querySelectorAll('a[href="<?= base_url('/cart') ?>"].icon-header-noti').forEach(function(cartIcon) {
                        cartIcon.setAttribute('data-notify', data.cartCount);
                    });

                    return data;
                })
                .catch(() => {
                    showToast('Sepet güncellenirken hata oluştu.');
                    return null;
                });
        }

        document.querySelectorAll('.btn-increase').forEach(function(button) {
            button.addEventListener('click', function() {
                const counter = button.closest('.cart-counter');
                const input = counter.querySelector('.quantity-input');

                const productId = counter.dataset.id;
                const stock = Number(counter.dataset.stock || 1);
                let quantity = Number(input.value || 1);

                if (quantity >= stock) {
                    input.value = stock;
                    showToast('Stok sınırına ulaştınız.');
                    return;
                }

                quantity++;
                input.value = quantity;

                const row = button.closest('tr');
                const itemTotal = row.querySelector('.item-total');
                const price = parseFloat(counter.dataset.price);

                itemTotal.textContent = (price * quantity).toFixed(2) + ' ₺';

                updateCartTotalsFromRows();
                syncQuantityWithSession(productId, quantity);
            });
        });

        document.querySelectorAll('.btn-decrease').forEach(function(button) {
            button.addEventListener('click', function() {
                const counter = button.closest('.cart-counter');
                const input = counter.querySelector('.quantity-input');

                const productId = counter.dataset.id;
                let quantity = Number(input.value || 1);

                if (quantity <= 1) {
                    showToast('Ürünü kaldırmak için görsele tıklayabilirsiniz.');
                    return;
                }

                quantity--;
                input.value = quantity;

                const row = button.closest('tr');
                const itemTotal = row.querySelector('.item-total');
                const price = parseFloat(counter.dataset.price);

                itemTotal.textContent = (price * quantity).toFixed(2) + ' ₺';

                updateCartTotalsFromRows();
                syncQuantityWithSession(productId, quantity);
            });
        });

        const couponCodeInput = document.getElementById('couponCodeInput');
        const applyCouponBtn = document.getElementById('applyCouponBtn');
        const appliedCouponCodeInput = document.getElementById('appliedCouponCode');
        const couponMessage = document.getElementById('couponMessage');
        const couponError = document.getElementById('couponError');

        if (applyCouponBtn && couponCodeInput && appliedCouponCodeInput) {
            applyCouponBtn.addEventListener('click', function() {
                const enteredCode = couponCodeInput.value.trim().toLowerCase();

                if (couponMessage) couponMessage.style.display = 'none';
                if (couponError) couponError.style.display = 'none';

                if (enteredCode === 'web') {
                    window.appliedCouponCode = 'web';
                    appliedCouponCodeInput.value = 'web';

                    if (couponMessage) {
                        couponMessage.style.display = 'block';
                    }

                    couponCodeInput.value = 'WEB';

                    calculateTotal();
                    showToast('Kupon uygulandı.');
                } else {
                    window.appliedCouponCode = '';
                    appliedCouponCodeInput.value = '';

                    if (couponError) {
                        couponError.style.display = 'block';
                    }

                    calculateTotal();
                    showToast('Geçersiz kupon kodu.');
                }
            });
        }

        function onlyDigits(value) {
            return String(value || '').replace(/\D/g, '');
        }

        function setCardFieldState(input, errorEl, message) {
            if (!input || !errorEl) return;

            input.classList.remove('card-input-invalid', 'card-input-valid');
            errorEl.classList.remove('show');
            errorEl.textContent = '';

            if (message) {
                input.classList.add('card-input-invalid');
                errorEl.textContent = message;
                errorEl.classList.add('show');
            } else if (input.value.trim() !== '') {
                input.classList.add('card-input-valid');
            }
        }

        function isExpiryFuture(expireValue) {
            const match = String(expireValue || '').match(/^(\d{2})\/(\d{2})$/);

            if (!match) {
                return false;
            }

            const month = parseInt(match[1], 10);
            const year = 2000 + parseInt(match[2], 10);

            if (month < 1 || month > 12) {
                return false;
            }

            const now = new Date();
            const currentMonth = now.getMonth() + 1;
            const currentYear = now.getFullYear();

            if (year > currentYear) {
                return true;
            }

            if (year === currentYear && month > currentMonth) {
                return true;
            }

            return false;
        }

        function validateCardPayment() {
            const holderInput = document.getElementById('cardHolderInput');
            const numberInput = document.getElementById('cardNumberInput');
            const expireInput = document.getElementById('cardExpireInput');
            const cvvInput = document.getElementById('cardCvvInput');

            const holderError = document.getElementById('cardHolderError');
            const numberError = document.getElementById('cardNumberError');
            const expireError = document.getElementById('cardExpireError');
            const cvvError = document.getElementById('cardCvvError');

            let isValid = true;

            const holder = holderInput ? holderInput.value.trim() : '';
            const cardNumber = numberInput ? onlyDigits(numberInput.value) : '';
            const expire = expireInput ? expireInput.value.trim() : '';
            const cvv = cvvInput ? onlyDigits(cvvInput.value) : '';

            if (holder.length < 3) {
                setCardFieldState(holderInput, holderError, 'Kart üzerindeki isim en az 3 karakter olmalıdır.');
                isValid = false;
            } else if (!/^[A-Za-zÇĞİÖŞÜçğıöşü\s.'-]+$/.test(holder)) {
                setCardFieldState(holderInput, holderError, 'Kart üzerindeki isim yalnızca harflerden oluşmalıdır.');
                isValid = false;
            } else {
                setCardFieldState(holderInput, holderError, '');
            }

            if (!/^\d{16}$/.test(cardNumber)) {
                setCardFieldState(numberInput, numberError, 'Kart numarası 16 haneli olmalıdır.');
                isValid = false;
            } else if (/^(\d)\1{15}$/.test(cardNumber)) {
                setCardFieldState(numberInput, numberError, 'Kart numarası geçerli görünmüyor.');
                isValid = false;
            } else {
                setCardFieldState(numberInput, numberError, '');
            }

            if (!/^\d{2}\/\d{2}$/.test(expire)) {
                setCardFieldState(expireInput, expireError, 'Son kullanma tarihi AA/YY formatında olmalıdır.');
                isValid = false;
            } else if (!isExpiryFuture(expire)) {
                setCardFieldState(expireInput, expireError, 'Son kullanma tarihi içinde bulunduğumuz aydan ileri olmalıdır.');
                isValid = false;
            } else {
                setCardFieldState(expireInput, expireError, '');
            }

            if (!/^\d{3}$/.test(cvv)) {
                setCardFieldState(cvvInput, cvvError, 'CVV 3 haneli olmalıdır.');
                isValid = false;
            } else {
                setCardFieldState(cvvInput, cvvError, '');
            }

            return isValid;
        }

        const cardNumberInput = document.getElementById('cardNumberInput');
        const cardExpireInput = document.getElementById('cardExpireInput');
        const cardCvvInput = document.getElementById('cardCvvInput');

        if (cardNumberInput) {
            cardNumberInput.addEventListener('input', function() {
                let digits = onlyDigits(this.value).slice(0, 16);

                this.value = digits.replace(/(.{4})/g, '$1 ').trim();
            });
        }

        if (cardExpireInput) {
            cardExpireInput.addEventListener('input', function() {
                let digits = onlyDigits(this.value).slice(0, 4);

                if (digits.length >= 3) {
                    this.value = digits.slice(0, 2) + '/' + digits.slice(2);
                } else {
                    this.value = digits;
                }
            });
        }

        if (cardCvvInput) {
            cardCvvInput.addEventListener('input', function() {
                this.value = onlyDigits(this.value).slice(0, 3);
            });
        }

        const finishShoppingBtn = document.getElementById('finishShoppingBtn');
        const paymentIntro = document.getElementById('paymentIntro');
        const cardPaymentArea = document.getElementById('cardPaymentArea');
        const checkoutForm = document.getElementById('checkoutForm');

        if (finishShoppingBtn && paymentIntro && cardPaymentArea && checkoutForm) {
            finishShoppingBtn.addEventListener('click', function() {
                calculateTotal();

                if (window.currentCardAmount > 0) {
                    paymentIntro.style.display = 'none';
                    cardPaymentArea.style.display = 'block';

                    document.querySelectorAll('.card-required').forEach(function(input) {
                        input.setAttribute('required', 'required');
                    });

                    showToast('Kalan tutar için kart bilgilerini giriniz.');
                } else {
                    document.querySelectorAll('.card-required').forEach(function(input) {
                        input.removeAttribute('required');
                    });

                    checkoutForm.submit();
                }
            });
        }

        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function(event) {
                calculateTotal();

                if (window.currentCardAmount > 0) {
                    if (!validateCardPayment()) {
                        event.preventDefault();
                        showToast('Lütfen kart bilgilerini geçerli şekilde doldurun.');
                    }
                }
            });
        }

        calculateTotal();
    </script>

</body>

</html>