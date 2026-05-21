<?php
$address = $address ?? null;

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
    <title>Merilyen ❤️ Adres Düzenle</title>
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
            padding: 32px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
        }

        .form-section-title {
            font-weight: 700;
            color: #717fe0;
            font-size: 15px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .address-helper-card {
            background: #faf8ff;
            border: 1px solid #eee8ff;
            border-radius: 20px;
            padding: 24px;
            height: 100%;
        }

        .helper-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: white;
            color: #717fe0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 22px rgba(113, 127, 224, 0.12);
            margin-bottom: 18px;
        }

        .form-control {
            height: 52px;
            border-radius: 12px;
            border: 1px solid #ddd;
            padding-left: 15px;
        }

        .form-control:focus {
            border-color: #717fe0;
            box-shadow: 0 0 0 0.15rem rgba(113, 127, 224, 0.15);
        }

        textarea.form-control {
            height: 130px;
            resize: none;
            padding-top: 13px;
        }

        label {
            font-weight: 600;
            color: #333;
            margin-bottom: 7px;
        }

        .default-box {
            background: #faf8ff;
            border: 1px solid #e5ddff;
            border-radius: 16px;
            padding: 17px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .default-box input {
            width: 18px;
            height: 18px;
        }

        .default-box label {
            margin: 0;
            cursor: pointer;
        }

        .btn-purple {
            background: #717fe0;
            border: none;
            color: white;
            border-radius: 12px;
            padding: 11px 22px;
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
            padding: 11px 22px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .btn-soft-purple:hover {
            background: #faf8ff;
            color: #5f6ed8;
        }

        .empty-box {
            background: #faf8ff;
            border-radius: 22px;
            padding: 55px 25px;
            text-align: center;
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

                        <li class="active-menu">
                            <a href="<?= base_url('/profile') ?>">Profilim</a>
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

        <a href="<?= base_url('/addresses') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Adreslerim
            <i class="fa fa-angle-right m-l-9 m-r-10"></i>
        </a>

        <span class="stext-109 cl4">
            Adres Düzenle
        </span>
    </div>
</div>

<section class="bg0 p-t-75 p-b-85">
    <div class="container">

        <?php if (!$address): ?>

            <div class="profile-card">
                <div class="empty-box">
                    <h4 class="mtext-105 cl2">Adres bilgisi bulunamadı</h4>

                    <p class="stext-102 cl6 p-t-10 p-b-20">
                        Bu adres silinmiş olabilir veya size ait olmayabilir.
                    </p>

                    <a href="<?= base_url('/addresses') ?>" class="btn-purple">
                        Adreslerime Dön
                    </a>
                </div>
            </div>

        <?php else: ?>

            <div class="p-b-35">
                <h3 class="ltext-103 cl5">Adres Düzenle</h3>
                <p class="stext-102 cl6 p-t-10">
                    Kayıtlı teslimat adresinizi güncelleyebilirsiniz.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-8 m-b-30">
                    <div class="profile-card">

                        <form action="<?= base_url('/addresses/update/' . $address['id']) ?>" method="post">

                            <div class="form-section-title">
                                <i class="fa fa-map-marker"></i>
                                Adres Bilgileri
                            </div>

                            <div class="form-group m-b-20">
                                <label>Adres Başlığı</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="<?= esc((string)($address['title'] ?? '')) ?>"
                                       required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group m-b-20">
                                    <label>Ad Soyad</label>
                                    <input type="text"
                                           name="full_name"
                                           class="form-control"
                                           value="<?= esc((string)($address['full_name'] ?? '')) ?>"
                                           required>
                                </div>

                                <div class="col-md-6 form-group m-b-20">
                                    <label>Telefon</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           value="<?= esc((string)($address['phone'] ?? '')) ?>"
                                           required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group m-b-20">
                                    <label>İl</label>
                                    <input type="text"
                                           name="city"
                                           class="form-control"
                                           value="<?= esc((string)($address['city'] ?? '')) ?>"
                                           required>
                                </div>

                                <div class="col-md-6 form-group m-b-20">
                                    <label>İlçe</label>
                                    <input type="text"
                                           name="district"
                                           class="form-control"
                                           value="<?= esc((string)($address['district'] ?? '')) ?>"
                                           required>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label>Açık Adres</label>
                                <textarea name="full_address"
                                          class="form-control"
                                          required><?= esc((string)($address['full_address'] ?? '')) ?></textarea>
                            </div>

                            <div class="default-box m-b-25">
                                <input type="checkbox"
                                       name="is_default"
                                       value="1"
                                       id="is_default"
                                    <?= !empty($address['is_default']) ? 'checked' : '' ?>>

                                <label for="is_default">
                                    Bu adresi varsayılan teslimat adresim yap
                                </label>
                            </div>

                            <div class="d-flex flex-wrap">
                                <button type="submit" class="btn-purple m-r-8 m-b-8">
                                    Adresi Güncelle
                                </button>

                                <a href="<?= base_url('/addresses') ?>" class="btn-soft-purple m-b-8">
                                    Vazgeç
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="col-lg-4 m-b-30">
                    <div class="address-helper-card">
                        <div class="helper-icon">
                            <i class="fa fa-info"></i>
                        </div>

                        <h5 class="mtext-102 cl2 p-b-10">
                            Düzenleme Notu
                        </h5>

                        <p class="stext-102 cl6">
                            Adresinizi güncelledikten sonra yeni siparişlerinizde bu bilgiler kullanılır.
                            Daha önce oluşturulmuş siparişlerin teslimat bilgileri değişmez.
                        </p>

                        <a href="<?= base_url('/addresses') ?>" class="stext-101 cl1 hov-cl1 trans-04">
                            Kayıtlı adreslerime dön
                        </a>
                    </div>
                </div>

            </div>

        <?php endif; ?>

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