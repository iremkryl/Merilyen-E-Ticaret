<?php
$posts = $posts ?? [];
$featuredProducts = $featuredProducts ?? [];

$favCount = 0;
$cartCount = 0;

if (session()->get('isLoggedIn')) {
    $db = \Config\Database::connect();

    $favCount = $db->table('favorites')
        ->where('user_id', session()->get('user_id'))
        ->countAllResults();
}

$cart = session()->get('cart') ?? [];

foreach ($cart as $cartItem) {
    $cartCount += (int)($cartItem['quantity'] ?? 0);
}

// Blog sayfalama sistemi: her sayfada 5 kayıt
$perPage = 5;
$totalPosts = count($posts);
$totalPages = max(1, (int)ceil($totalPosts / $perPage));

$currentPage = (int)($_GET['page'] ?? 1);

if ($currentPage < 1) {
    $currentPage = 1;
}

if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

$offset = ($currentPage - 1) * $perPage;
$pagedPosts = array_slice($posts, $offset, $perPage);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>">
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
        .blog-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .blog-modal.show {
            display: flex;
        }

        .blog-modal-box {
            background: white;
            max-width: 850px;
            width: 100%;
            max-height: 90vh;
            overflow: auto;
            border-radius: 22px;
            padding: 30px;
            position: relative;
        }

        .blog-modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: #222;
            z-index: 2;
        }

        .blog-modal-img {
            width: 100%;
            max-height: 360px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 20px;
        }

        .blog-card-img {
            width: 100%;
            height: 430px;
            object-fit: cover;
            display: block;
        }

        .blog-category-badge {
            display: inline-block;
            background: #f4f0ff;
            color: #717fe0;
            border-radius: 30px;
            padding: 6px 13px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .blog-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            padding-top: 10px;
        }

        .blog-pagination a,
        .blog-pagination span {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e6e6e6;
            color: #555;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.25s ease;
            background: #fff;
        }

        .blog-pagination a:hover,
        .blog-pagination .active-page {
            background: #717fe0;
            color: #fff;
            border-color: #717fe0;
        }

        .blog-pagination .page-arrow {
            width: auto;
            padding: 0 16px;
            border-radius: 30px;
        }

        .featured-product-img {
            width: 90px;
            height: 110px;
            object-fit: cover;
            border-radius: 8px;
            background: #f5f5f5;
        }

        .side-menu {
            position: sticky;
            top: 95px;
        }

        .blog-empty-box {
            background: #faf8ff;
            border-radius: 18px;
            padding: 50px 25px;
        }

        @media (max-width: 991px) {
            .side-menu {
                position: static;
            }

            .blog-card-img {
                height: 340px;
            }
        }

        @media (max-width: 768px) {
            .blog-modal {
                padding: 15px;
            }

            .blog-modal-box {
                padding: 22px;
                border-radius: 18px;
            }

            .blog-card-img {
                height: 260px;
            }

            .p-r-45 {
                padding-right: 0 !important;
            }

            .blog-pagination a,
            .blog-pagination span {
                width: 38px;
                height: 38px;
                font-size: 13px;
            }

            .blog-pagination .page-arrow {
                padding: 0 12px;
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
                            <?= esc((string)(session()->get('user_name') . ' ' . session()->get('user_surname'))) ?>
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
                            <li>
                                <a href="<?= base_url('/my-orders') ?>">Siparişlerim</a>
                            </li>
                        <?php endif; ?>

                        <li class="active-menu">
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
               data-notify="<?= $favCount ?>">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>

            <a href="<?= base_url('/cart') ?>"
               class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
               data-notify="<?= $cartCount ?>">
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
                            <?= esc((string)(session()->get('user_name') ?? 'Profilim')) ?>
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
                <a href="<?= base_url('/cart') ?>" class="label1 rs1" data-label1="indirim">
                    Sepetiniz
                </a>
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

                <input class="plh3" type="text" name="search" placeholder="Arama...">
            </form>
        </div>
    </div>
</header>

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
         style="background-image: url('<?= base_url('images/siyahbeyaz.png') ?>');">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section>

<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">

                    <?php if (empty($posts)): ?>
                        <div class="text-center p-t-50 p-b-50 blog-empty-box">
                            <h4>Henüz duyuru bulunmuyor.</h4>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($pagedPosts as $post): ?>
                        <?php
                        $date = strtotime($post['post_date'] ?? date('Y-m-d'));
                        $day = date('d', $date);
                        $monthYear = date('m.Y', $date);

                        $postImage = !empty($post['image'])
                            ? base_url('images/' . $post['image'])
                            : base_url('images/siyahbeyaz.png');
                        ?>

                        <div class="p-b-63">
                            <a href="#"
                               class="hov-img0 how-pos5-parent js-blog-modal"
                               data-title="<?= esc((string)($post['title'] ?? ''), 'attr') ?>"
                               data-content="<?= esc((string)($post['content'] ?? ''), 'attr') ?>"
                               data-summary="<?= esc((string)($post['summary'] ?? ''), 'attr') ?>"
                               data-image="<?= esc($postImage, 'attr') ?>"
                               data-category="<?= esc((string)($post['category'] ?? 'Duyuru'), 'attr') ?>"
                               data-date="<?= esc((string)($post['post_date'] ?? ''), 'attr') ?>">

                                <img src="<?= $postImage ?>"
                                     class="blog-card-img"
                                     alt="<?= esc((string)($post['title'] ?? 'Blog')) ?>">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <span class="ltext-107 cl2 txt-center">
                                        <?= $day ?>
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        <?= $monthYear ?>
                                    </span>
                                </div>
                            </a>

                            <div class="p-t-32">
                                <span class="blog-category-badge">
                                    <?= esc((string)($post['category'] ?? 'Duyuru')) ?>
                                </span>

                                <h4 class="p-b-15">
                                    <a href="#"
                                       class="ltext-108 cl2 hov-cl1 trans-04 js-blog-modal"
                                       data-title="<?= esc((string)($post['title'] ?? ''), 'attr') ?>"
                                       data-content="<?= esc((string)($post['content'] ?? ''), 'attr') ?>"
                                       data-summary="<?= esc((string)($post['summary'] ?? ''), 'attr') ?>"
                                       data-image="<?= esc($postImage, 'attr') ?>"
                                       data-category="<?= esc((string)($post['category'] ?? 'Duyuru'), 'attr') ?>"
                                       data-date="<?= esc((string)($post['post_date'] ?? ''), 'attr') ?>">
                                        <?= esc((string)($post['title'] ?? '')) ?>
                                    </a>
                                </h4>

                                <p class="stext-117 cl6">
                                    <?= esc((string)($post['summary'] ?? '')) ?>
                                </p>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">By</span> İrem Karayel
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            <?= esc((string)($post['category'] ?? 'Duyuru')) ?>
                                        </span>
                                    </span>

                                    <a href="#"
                                       class="stext-101 cl2 hov-cl1 trans-04 m-tb-10 js-blog-modal"
                                       data-title="<?= esc((string)($post['title'] ?? ''), 'attr') ?>"
                                       data-content="<?= esc((string)($post['content'] ?? ''), 'attr') ?>"
                                       data-summary="<?= esc((string)($post['summary'] ?? ''), 'attr') ?>"
                                       data-image="<?= esc($postImage, 'attr') ?>"
                                       data-category="<?= esc((string)($post['category'] ?? 'Duyuru'), 'attr') ?>"
                                       data-date="<?= esc((string)($post['post_date'] ?? ''), 'attr') ?>">
                                        Devamını Oku
                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <?php if ($totalPosts > $perPage): ?>
                        <div class="blog-pagination">

                            <?php if ($currentPage > 1): ?>
                                <a class="page-arrow" href="<?= base_url('/blog') . '?page=' . ($currentPage - 1) ?>">
                                    Önceki
                                </a>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <?php if ($i === $currentPage): ?>
                                    <span class="active-page"><?= $i ?></span>
                                <?php else: ?>
                                    <a href="<?= base_url('/blog') . '?page=' . $i ?>">
                                        <?= $i ?>
                                    </a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($currentPage < $totalPages): ?>
                                <a class="page-arrow" href="<?= base_url('/blog') . '?page=' . ($currentPage + 1) ?>">
                                    Sonraki
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">

                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">Kategoriler</h4>

                        <ul>
                            <li class="bor18">
                                <a href="<?= base_url('/products#kol') ?>"
                                   class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Kol Çantası
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="<?= base_url('/products#elcantasi') ?>"
                                   class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    El Çantası
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="<?= base_url('/products#capraz') ?>"
                                   class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Çapraz Çanta
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="<?= base_url('/products#sirtcantasi') ?>"
                                   class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Sırt Çantası
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="<?= base_url('/products#yelek') ?>"
                                   class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Yelekler
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Öne Çıkan Ürünler
                        </h4>

                        <ul>
                            <?php if (empty($featuredProducts)): ?>
                                <li class="stext-115 cl6">
                                    Şu anda öne çıkan ürün yok.
                                </li>
                            <?php else: ?>
                                <?php foreach ($featuredProducts as $featured): ?>
                                    <li class="flex-w flex-t p-b-30">
                                        <a href="<?= base_url('/product/detail/' . ($featured['id'] ?? 0)) ?>"
                                           class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                            <img src="<?= base_url('images/' . ($featured['image'] ?? '')) ?>"
                                                 alt="<?= esc((string)($featured['name'] ?? 'Ürün')) ?>"
                                                 class="featured-product-img">
                                        </a>

                                        <div class="size-215 flex-col-t p-t-8">
                                            <a href="<?= base_url('/product/detail/' . ($featured['id'] ?? 0)) ?>"
                                               class="stext-116 cl8 hov-cl1 trans-04">
                                                <?= esc((string)($featured['name'] ?? '')) ?>
                                            </a>

                                            <span class="stext-116 cl6 p-t-20">
                                                <?= number_format($featured['price'] ?? 0, 2) ?> ₺
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<div class="blog-modal" id="blogModal">
    <div class="blog-modal-box">
        <span class="blog-modal-close" id="blogModalClose">&times;</span>

        <img id="modalBlogImage" class="blog-modal-img" src="" alt="BLOG">

        <p class="stext-111 cl6">
            <span id="modalBlogDate"></span> | <span id="modalBlogCategory"></span>
        </p>

        <h3 class="ltext-109 cl2 p-b-20" id="modalBlogTitle"></h3>

        <p class="stext-117 cl6" id="modalBlogContent" style="white-space:pre-line;"></p>
    </div>
</div>

<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Kategoriler
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="<?= base_url('/products#kol') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Kol Çantası
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/products#capraz') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Çapraz Çanta
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/products#elcantasi') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            El Çantası
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/products#sirtcantasi') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Sırt Çantası
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/products#yelek') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Yelekler
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Yardım
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="<?= base_url('/my-orders') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Sipariş Takibi
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            İade & Değişim
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Mesafeli Satış Sözleşmesi
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/contact') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Sık Sorulan Sorular
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= base_url('/sayilarla-merilyen') ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Sayılarla Merilyen
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Bize Ulaşın
                </h4>

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

                    <a href="https://www.instagram.com/hulyaorguevi_?igsh=MTFxNnB0ZTNmbTZqeg=="
                       class="fs-18 cl7 hov-cl1 trans-04 m-r-16"
                       target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Bizden Haberler
                </h4>

                <p class="stext-107 cl7 size-201">
                    Haberlerimiz, özel tekliflerimiz ve favori stillerimiz hakkında ilk siz bilgi sahibi olun.
                </p>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7"
                               type="text"
                               name="email"
                               placeholder="eposta@ornek.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button type="button"
                                class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
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

<script>
    document.querySelectorAll('.js-blog-modal').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            document.getElementById('modalBlogTitle').textContent = this.dataset.title || '';
            document.getElementById('modalBlogContent').textContent = this.dataset.content || '';
            document.getElementById('modalBlogImage').src = this.dataset.image || '';
            document.getElementById('modalBlogDate').textContent = this.dataset.date || '';
            document.getElementById('modalBlogCategory').textContent = this.dataset.category || '';

            document.getElementById('blogModal').classList.add('show');
        });
    });

    const blogModalClose = document.getElementById('blogModalClose');
    const blogModal = document.getElementById('blogModal');

    if (blogModalClose && blogModal) {
        blogModalClose.addEventListener('click', function() {
            blogModal.classList.remove('show');
        });

        blogModal.addEventListener('click', function(e) {
            if (e.target.id === 'blogModal') {
                this.classList.remove('show');
            }
        });
    }
</script>

</body>

</html>
