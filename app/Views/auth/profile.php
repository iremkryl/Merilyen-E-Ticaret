<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Profilim</title>
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

        .profile-img {
            width: 135px;
            height: 135px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #717fe0;
        }

        .stat-box {
            background: #faf8ff;
            border-radius: 18px;
            padding: 22px;
            text-align: center;
            height: 100%;
        }

        .stat-box h3 {
            color: #717fe0;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 12px;
            height: 46px;
        }

        .email-help {
            font-size: 13px;
            color: #777;
            margin-top: 6px;
        }
    </style>
</head>

<body class="animsition">

    <?php
    /**
     * View değişkenleri controller'dan gelir. Intelephense bunları her zaman göremediği için
     * burada güvenli hale getiriyoruz.
     */

    if (!function_exists('profile_view_string')) {
        /**
         * @param mixed $value
         */
        function profile_view_string($value): string
        {
            if (is_string($value) || is_numeric($value)) {
                return (string)$value;
            }

            return '';
        }
    }

    if (!function_exists('profile_view_float')) {
        /**
         * @param mixed $value
         */
        function profile_view_float($value): float
        {
            if (is_numeric($value)) {
                return (float)$value;
            }

            return 0.0;
        }
    }

    if (!function_exists('profile_view_html')) {
        /**
         * @param mixed $value
         */
        function profile_view_html($value): string
        {
            return htmlspecialchars(profile_view_string($value), ENT_QUOTES, 'UTF-8');
        }
    }

    if (!isset($user) || !is_array($user)) {
        $user = [];
    }

    $orderCount = isset($orderCount) ? (int)$orderCount : 0;
    $favoriteCount = isset($favoriteCount) ? (int)$favoriteCount : 0;
    $totalSpent = profile_view_float($totalSpent ?? 0);

    $userName = profile_view_string($user['name'] ?? '');
    $userSurname = profile_view_string($user['surname'] ?? '');
    $userEmail = profile_view_string($user['email'] ?? '');
    $profileImage = profile_view_string($user['profile_image'] ?? '');
    $createdAt = profile_view_string($user['created_at'] ?? '');
    $userBalance = profile_view_float($user['balance'] ?? 0);

    $sessionNameRaw = session()->get('user_name');
    $sessionSurnameRaw = session()->get('user_surname');

    $sessionName = is_scalar($sessionNameRaw) ? (string)$sessionNameRaw : '';
    $sessionSurname = is_scalar($sessionSurnameRaw) ? (string)$sessionSurnameRaw : '';
    $userFullName = trim($sessionName . ' ' . $sessionSurname);

    if ($userFullName === '') {
        $userFullName = trim($userName . ' ' . $userSurname);
    }

    $userFullNameHtml = htmlspecialchars($userFullName, ENT_QUOTES, 'UTF-8');
    $avatarName = trim($userName . ' ' . $userSurname);

    $createdTimestamp = $createdAt !== '' ? strtotime($createdAt) : false;
    $createdDate = $createdTimestamp ? date('d.m.Y', $createdTimestamp) : '-';

    $successFlashRaw = session()->getFlashdata('success');
    $errorFlashRaw = session()->getFlashdata('error');

    $successFlash = is_scalar($successFlashRaw) ? (string)$successFlashRaw : '';
    $errorFlash = is_scalar($errorFlashRaw) ? (string)$errorFlashRaw : '';

    $favCount = 0;

    if (session()->get('isLoggedIn')) {
        $db = \Config\Database::connect();

        $favCount = $db->table('favorites')
            ->where('user_id', session()->get('user_id'))
            ->countAllResults();
    }

    $cartRaw = session()->get('cart');
    $cart = is_array($cartRaw) ? $cartRaw : [];
    $cartCount = 0;

    foreach ($cart as $cartItem) {
        if (is_array($cartItem)) {
            $cartCount += (int)($cartItem['quantity'] ?? 0);
        }
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
                        <a href="#" class="flex-c-m trans-04 p-lr-25">Yardım & SSS</a>

                        <a href="<?= base_url('/profile') ?>" class="flex-c-m trans-04 p-lr-25">
                            <?= $userFullNameHtml ?>
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

                    <!-- Menu desktop -->
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

                    <!-- Icon header -->
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

            <span class="stext-109 cl4">
                Profilim
            </span>
        </div>
    </div>

    <?php if ($successFlash !== ''): ?>
        <div class="container p-t-25">
            <div class="alert alert-success" style="border-radius:14px;">
                <?= profile_view_html($successFlash) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($errorFlash !== ''): ?>
        <div class="container p-t-25">
            <div class="alert alert-danger" style="border-radius:14px;">
                <?= profile_view_html($errorFlash) ?>
            </div>
        </div>
    <?php endif; ?>

    <section class="bg0 p-t-75 p-b-85">
        <div class="container">

            <div class="p-b-35">
                <h3 class="ltext-103 cl5">Profilim</h3>
                <p class="stext-102 cl6 p-t-10">
                    Hesap bilgilerinizi görüntüleyebilir, profilinizi ve şifrenizi güncelleyebilirsiniz.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-4 m-b-30">
                    <div class="profile-card text-center">

                        <?php if ($profileImage !== ''): ?>
                            <img src="<?= base_url('images/profiles/' . rawurlencode($profileImage)) ?>" class="profile-img" alt="Profil Fotoğrafı">
                        <?php else: ?>
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($avatarName) ?>&background=717fe0&color=fff"
                                class="profile-img" alt="Profil Fotoğrafı">
                        <?php endif; ?>

                        <h4 class="mtext-105 cl2 p-t-20">
                            <?= profile_view_html($userName) ?>
                            <?= profile_view_html($userSurname) ?>
                        </h4>

                        <p class="stext-102 cl6">
                            <?= profile_view_html($userEmail) ?>
                        </p>

                        <p class="stext-102 cl6">
                            Kayıt Tarihi:
                            <?= profile_view_html($createdDate) ?>
                        </p>

                        <div class="p-t-20">
                            <a href="<?= base_url('/my-orders') ?>" class="btn btn-outline-dark btn-sm">
                                Siparişlerim
                            </a>

                            <a href="<?= base_url('/favorites') ?>" class="btn btn-outline-danger btn-sm">
                                Favorilerim
                            </a>

                            <a href="<?= base_url('/addresses') ?>" class="btn btn-outline-primary btn-sm m-t-8">
                                Adreslerim
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="row m-b-30">
                        <div class="col-md-3 m-b-15">
                            <div class="stat-box">
                                <h3><?= $orderCount ?></h3>
                                <p class="stext-102 cl6">Toplam Sipariş</p>
                            </div>
                        </div>

                        <div class="col-md-3 m-b-15">
                            <div class="stat-box">
                                <h3><?= $favoriteCount ?></h3>
                                <p class="stext-102 cl6">Favori Ürün</p>
                            </div>
                        </div>

                        <div class="col-md-3 m-b-15">
                            <div class="stat-box">
                                <h3><?= number_format($totalSpent, 0) ?> ₺</h3>
                                <p class="stext-102 cl6">Toplam Harcama</p>
                            </div>
                        </div>

                        <div class="col-md-3 m-b-15">
                            <div class="stat-box">
                                <h3><?= number_format($userBalance, 2) ?> ₺</h3>
                                <p class="stext-102 cl6">Bakiyem</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-card m-b-30">
                        <h4 class="mtext-105 cl2 p-b-20">Profil Bilgileri</h4>

                        <form action="<?= base_url('/profile/update') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6 m-b-20">
                                    <label>Ad</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="<?= profile_view_html($userName) ?>"
                                           required>
                                </div>

                                <div class="col-md-6 m-b-20">
                                    <label>Soyad</label>
                                    <input type="text"
                                           name="surname"
                                           class="form-control"
                                           value="<?= profile_view_html($userSurname) ?>"
                                           required>
                                </div>
                            </div>

                            <div class="m-b-20">
                                <label>E-posta</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="<?= profile_view_html($userEmail) ?>"
                                       required>

                                <div class="email-help">
                                    E-posta adresinizi güncellerseniz sonraki girişlerinizde yeni e-posta adresinizi kullanmanız gerekir.
                                </div>
                            </div>

                            <div class="m-b-20">
                                <label>Profil Fotoğrafı</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                style="border:none;">
                                Profili Güncelle
                            </button>

                        </form>
                    </div>

                    <div class="profile-card">
                        <h4 class="mtext-105 cl2 p-b-20">Şifre Değiştir</h4>

                        <form action="<?= base_url('/profile/password') ?>" method="post">

                            <div class="m-b-20">
                                <label>Mevcut Şifre</label>
                                <input type="password" name="old_password" class="form-control" required>
                            </div>

                            <div class="m-b-20">
                                <label>Yeni Şifre</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-dark">
                                Şifreyi Güncelle
                            </button>

                        </form>
                    </div>

                    <div class="profile-card m-t-30" style="border:1px solid #ffd6d6;">
                        <h4 class="mtext-105 cl2 p-b-12">
                            Hesap Durumu
                        </h4>

                        <p class="stext-102 cl6 p-b-15">
                            Hesabınızı pasif hale getirirseniz tekrar giriş yapamazsınız.
                            Hesabınızı yeniden açmak için yönetici ile iletişime geçmeniz gerekir.
                        </p>

                        <form action="<?= base_url('/profile/deactivate') ?>" method="post"
                            onsubmit="return confirm('Hesabınızı pasif hale getirmek istediğinize emin misiniz?')">

                            <button type="submit" class="btn btn-outline-danger">
                                Hesabımı Pasif Hale Getir
                            </button>

                        </form>
                    </div>

                </div>

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
