<?php
$totalProducts = $totalProducts ?? 0;
$activeProducts = $activeProducts ?? 0;
$featuredProducts = $featuredProducts ?? 0;
$totalUsers = $totalUsers ?? 0;
$deliveredOrders = $deliveredOrders ?? 0;
$totalOrders = $totalOrders ?? 0;
$totalRevenue = $totalRevenue ?? 0;
$totalContents = $totalContents ?? 0;
$totalFavorites = $totalFavorites ?? 0;
$favCount = $favCount ?? 0;
$cartCount = $cartCount ?? 0;
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ İstatistikler</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('fonts/iconic/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('fonts/linearicons-v1.0.0/icon-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/animsition/css/animsition.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css') ?>">

    <style>
        .border-statistic {
            border: 1px solid #e6e6e6;
            border-radius: 14px;
            transition: all 0.3s;
            background: #fff;
            min-height: 205px;
        }

        .border-statistic:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
            border-color: #717fe0;
        }

        .chart-bar {
            width: 60px;
            background: #e6e6e6;
            border-radius: 5px 5px 0 0;
        }

        .stats-note {
            background: #faf8ff;
            border: 1px solid #eee8ff;
            border-radius: 18px;
            padding: 25px;
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
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Yardım & SSS
                    </a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('/profile') ?>" class="flex-c-m trans-04 p-lr-25">
                            <?= esc((string)(session()->get('user_name') ?? 'Profilim')) ?>
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
                    <a href="#" class="flex-c-m trans-04 p-lr-25">₺</a>
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

                    <a href="<?= base_url('/cart') ?>"
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= $cartCount ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>

                    <a href="<?= base_url('/favorites') ?>"
                       class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                       data-notify="<?= $favCount ?>">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>

            </nav>
        </div>
    </div>
</header>

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
         style="background-image: url('<?= base_url('images/sayilarla.png') ?>');">
    <h2 class="ltext-105 cl0 txt-center">
        Sayılarla Merilyen
    </h2>
</section>

<section class="bg0 p-t-75 p-b-120">
    <div class="container">

        <div class="row p-b-60">
            <div class="col-12 text-center">
                <h3 class="mtext-111 cl2">
                    Emek, tutku ve sayılarla büyüyen hikayemiz.
                </h3>

                <p class="stext-113 cl6 p-t-10">
                    Merilyen’in ürün, sipariş ve kullanıcı istatistikleri.
                </p>
            </div>
        </div>

        <div class="row p-b-60">

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-shopping-basket"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$deliveredOrders ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Teslim Edilen Sipariş</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-heart"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$totalUsers ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Kayıtlı Müşteri</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-archive"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$activeProducts ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Aktif Ürün</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-star"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$featuredProducts ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Öne Çıkan Ürün</p>
                </div>
            </div>

        </div>

        <div class="row p-b-60">

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-list"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$totalProducts ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Toplam Ürün</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$totalOrders ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Geçerli Sipariş</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$totalContents ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Aktif İçerik</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 p-b-30">
                <div class="p-t-20 p-b-20 text-center border-statistic">
                    <div class="fs-50 cl1 p-b-10">
                        <i class="fa fa-try"></i>
                    </div>
                    <span class="ltext-102 cl2 counter" data-target="<?= (int)$totalRevenue ?>">0</span>
                    <p class="stext-113 cl6 p-t-10">Toplam Ciro</p>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 p-b-40">
                <h3 class="mtext-111 cl2 p-b-30">Proje Özellikleri</h3>

                <div class="stats-note">
                    <p class="stext-113 cl6">
                        Bu sistemde kullanıcılar ürünleri inceleyebilir, favorilerine ekleyebilir,
                        sepet oluşturabilir, kayıtlı adres seçerek sipariş verebilir ve sipariş durumunu takip edebilir.
                    </p>

                    <p class="stext-113 cl6">
                        Admin panelinde ürün, kullanıcı, sipariş, içerik ve iletişim mesajları yönetilebilir.
                    </p>

                    <p class="stext-113 cl6 m-b-0">
                        Sipariş iptallerinde tutar kullanıcı bakiyesine aktarılır; yeni alışverişte önce bu bakiye kullanılır.
                    </p>
                </div>
            </div>

            <div class="col-md-6 p-b-40 text-center">
                <h3 class="mtext-111 cl2 p-b-40">Sistem Kullanım Özeti</h3>

                <div style="display:flex; justify-content:center; align-items:flex-end; height:250px; gap:30px; border-bottom: 2px solid #e6e6e6; padding-bottom: 10px;">

                    <div style="display:flex; flex-direction:column; align-items:center; height:100%; justify-content:flex-end;">
                        <span class="stext-107 cl6 p-b-10"><?= (int)$totalUsers ?></span>
                        <div class="chart-bar" style="height:45%; background:#e6e6e6;"></div>
                        <span class="stext-107 cl2 p-t-10">User</span>
                    </div>

                    <div style="display:flex; flex-direction:column; align-items:center; height:100%; justify-content:flex-end;">
                        <span class="stext-107 cl6 p-b-10"><?= (int)$totalProducts ?></span>
                        <div class="chart-bar" style="height:65%; background:#ccc;"></div>
                        <span class="stext-107 cl2 p-t-10">Ürün</span>
                    </div>

                    <div style="display:flex; flex-direction:column; align-items:center; height:100%; justify-content:flex-end;">
                        <span class="stext-107 cl6 p-b-10"><?= (int)$totalOrders ?></span>
                        <div class="chart-bar" style="height:90%; background:#717fe0;"></div>
                        <span class="stext-107 cl2 p-t-10">Sipariş</span>
                    </div>

                </div>

                <p class="stext-113 cl6 p-t-20">
                    Veritabanındaki güncel kayıtlar üzerinden oluşturulan sistem özeti.
                </p>
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

<script>
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        counter.innerText = '0';

        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const current = +counter.innerText;
            const increment = Math.max(1, target / 160);

            if (current < target) {
                counter.innerText = `${Math.ceil(current + increment)}`;
                setTimeout(updateCounter, 18);
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });
</script>

</body>
</html>