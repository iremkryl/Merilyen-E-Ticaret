<?php
$addresses = $addresses ?? [];

$favCount = 0;
$cartCount = 0;

if (session()->get('isLoggedIn')) {
    $db = \Config\Database::connect();

    $favCount = $db->table('favorites')
        ->where('user_id', session()->get('user_id'))
        ->countAllResults();
}

$cart = session()->get('cart') ?? [];

foreach ($cart as $item) {
    $cartCount += $item['quantity'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Adreslerim</title>
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
        .profile-card {
            background: white;
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
        }

        .address-card {
            background: white;
            border-radius: 22px;
            padding: 24px;
            height: 100%;
            border: 1px solid #f0ecff;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.06);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .address-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(113, 127, 224, 0.14);
            border-color: #dcd6ff;
        }

        .address-card::before {
            content: "";
            width: 5px;
            height: 100%;
            background: #717fe0;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: all 0.25s ease;
        }

        .address-card:hover::before {
            opacity: 1;
        }

        .address-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: #faf8ff;
            color: #717fe0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .address-title {
            font-weight: 700;
            color: #222;
            font-size: 18px;
        }

        .default-badge {
            background: #717fe0;
            color: white;
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .address-info {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
        }

        .empty-box {
            background: #faf8ff;
            border-radius: 22px;
            padding: 55px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: white;
            color: #717fe0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin: 0 auto 18px;
            box-shadow: 0 8px 22px rgba(113, 127, 224, 0.12);
        }

        .btn-purple {
            background: #717fe0;
            border: none;
            color: white;
            border-radius: 12px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .btn-purple:hover {
            background: #5f6ed8;
            color: white;
            transform: translateY(-2px);
        }

        .btn-soft-purple {
            border: 1px solid #717fe0;
            color: #717fe0;
            background: white;
            border-radius: 12px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .btn-soft-purple:hover {
            background: #faf8ff;
            color: #5f6ed8;
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

                    <a href="<?= base_url('/profile') ?>" class="flex-c-m trans-04 p-lr-25">
                        <?= esc((string)(session()->get('user_name') . ' ' . session()->get('user_surname'))) ?>
                    </a>

                    <a href="<?= base_url('/logout') ?>" class="flex-c-m trans-04 p-lr-25">
                        Çıkış Yap
                    </a>

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

                        <li>
                            <a href="<?= base_url('/my-orders') ?>">Siparişlerim</a>
                        </li>

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
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= $favCount ?>">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>

                    <a href="<?= base_url('/cart') ?>"
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= $cartCount ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                </div>

            </nav>
        </div>
    </div>
</header>

<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?= base_url('/') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Anasayfa
            <i class="fa fa-angle-right m-l-9 m-r-10"></i>
        </a>

        <a href="<?= base_url('/profile') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Profilim
            <i class="fa fa-angle-right m-l-9 m-r-10"></i>
        </a>

        <span class="stext-109 cl4">
            Adreslerim
        </span>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="container p-t-25">
        <div class="alert alert-success" style="border-radius:14px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="container p-t-25">
        <div class="alert alert-danger" style="border-radius:14px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>

<section class="bg0 p-t-75 p-b-85">
    <div class="container">

        <div class="d-flex justify-content-between align-items-start flex-wrap p-b-35">
            <div>
                <h3 class="ltext-103 cl5">Adreslerim</h3>
                <p class="stext-102 cl6 p-t-10">
                    Siparişlerde kullanacağınız teslimat adreslerinizi buradan görüntüleyebilir ve düzenleyebilirsiniz.
                </p>
            </div>

            <div class="p-t-10">
                <a href="<?= base_url('/profile') ?>" class="btn-soft-purple m-r-8">
                    Profile Dön
                </a>

                <a href="<?= base_url('/addresses/create') ?>" class="btn-purple">
                    Yeni Adres Ekle
                </a>
            </div>
        </div>

        <div class="profile-card">

            <?php if (empty($addresses)): ?>

                <div class="empty-box">
                    <div class="empty-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <h4 class="mtext-105 cl2">Henüz kayıtlı adresiniz yok</h4>

                    <p class="stext-102 cl6 p-t-10 p-b-20">
                        Sipariş verebilmek için en az bir teslimat adresi eklemeniz gerekir.
                    </p>

                    <a href="<?= base_url('/addresses/create') ?>" class="btn-purple">
                        İlk Adresimi Ekle
                    </a>
                </div>

            <?php else: ?>

                <div class="row">

                    <?php foreach ($addresses as $address): ?>

                        <div class="col-md-6 col-lg-4 m-b-30">
                            <div class="address-card">

                                <div class="d-flex justify-content-between align-items-start m-b-20">
                                    <div class="d-flex align-items-center">
                                        <div class="address-icon m-r-12">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <div>
                                            <div class="address-title">
                                                <?= esc((string)($address['title'] ?? 'Adres')) ?>
                                            </div>

                                            <small class="text-muted">
                                                Teslimat Adresi
                                            </small>
                                        </div>
                                    </div>

                                    <?php if (!empty($address['is_default'])): ?>
                                        <span class="default-badge">
                                            Varsayılan
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="address-info m-b-20">
                                    <p class="m-b-4">
                                        <strong>Ad Soyad:</strong>
                                        <?= esc((string)($address['full_name'] ?? '')) ?>
                                    </p>

                                    <p class="m-b-4">
                                        <strong>Telefon:</strong>
                                        <?= esc((string)($address['phone'] ?? '')) ?>
                                    </p>

                                    <p class="m-b-4">
                                        <strong>İl / İlçe:</strong>
                                        <?= esc((string)($address['city'] ?? '')) ?>
                                        /
                                        <?= esc((string)($address['district'] ?? '')) ?>
                                    </p>

                                    <p class="m-b-0">
                                        <?= esc((string)($address['full_address'] ?? '')) ?>
                                    </p>
                                </div>

                                <div class="d-flex flex-wrap">
                                    <a href="<?= base_url('/addresses/edit/' . $address['id']) ?>"
                                       class="btn btn-sm btn-outline-primary m-r-6 m-b-6">
                                        Düzenle
                                    </a>

                                    <?php if (empty($address['is_default'])): ?>
                                        <a href="<?= base_url('/addresses/default/' . $address['id']) ?>"
                                           class="btn btn-sm btn-outline-dark m-r-6 m-b-6">
                                            Varsayılan Yap
                                        </a>
                                    <?php endif; ?>

                                    <a href="<?= base_url('/addresses/delete/' . $address['id']) ?>"
                                       class="btn btn-sm btn-outline-danger m-b-6"
                                       onclick="return confirm('Bu adres silinsin mi?')">
                                        Sil
                                    </a>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

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
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Sipariş Takibi</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">İade & Değişim</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Mesafeli Satış Sözleşmesi</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Sık Sorulan Sorular</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Bize Ulaşın</h4>
                <p class="stext-107 cl7 size-201">
                    Atölye Adresimiz: Çiçek Mahallesi, El Emeği Sokak No:12, Kartal / İstanbul<br>
                    Telefon: 0 (500) 123 45 67
                </p>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Bizden Haberler</h4>
                <p class="stext-107 cl7 size-201">
                    Haberlerimiz, özel tekliflerimiz ve favori stillerimiz hakkında ilk siz bilgi sahibi olun.
                </p>
            </div>

        </div>

        <p class="stext-107 cl6 txt-center p-t-20">
            Tüm hakları saklıdır &copy;<?= date('Y') ?> | İrem Karayel
        </p>
    </div>
</footer>

<script src="<?= base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= base_url('vendor/animsition/js/animsition.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/popper.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('js/main.js') ?>"></script>

</body>
</html>