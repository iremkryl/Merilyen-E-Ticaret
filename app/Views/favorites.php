<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Merilyen ❤️ Favorilerim</title>
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
        .favorite-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
            transition: 0.25s;
            height: 100%;
        }

        .favorite-card:hover {
            transform: translateY(-5px);
        }

        .favorite-image {
            width: 100%;
            height: 310px;
            object-fit: cover;
        }

        .favorite-content {
            padding: 20px;
        }

        .favorite-price {
            color: #717fe0;
            font-size: 20px;
            font-weight: 700;
        }
    </style>
</head>

<body class="animsition">

    <?php
    $products = $products ?? [];

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
                            </li>

                            <li class="label1" data-label1="İndirim">
                                <a href="<?= base_url('/cart') ?>">Sepetiniz</a>
                            </li>

                            <?php if (session()->get('isLoggedIn')): ?>
                                <li>
                                    <a href="<?= base_url('/my-orders') ?>">Siparişlerim</a>
                                </li>

                            <?php endif; ?>

                            <li><a href="<?= base_url('/blog') ?>">Blog</a></li>
                            <li><a href="<?= base_url('/about') ?>">Hakkımızda</li>
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
                            data-notify="<?= $favCount ?>">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>

                        <a href="<?= base_url('/cart') ?>"
                            class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="<?= array_sum(array_column(session()->get('cart') ?? [], 'quantity')) ?>">
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
                Favorilerim
            </span>
        </div>
    </div>

    <section class="bg0 p-t-75 p-b-85">
        <div class="container">

            <div class="p-b-35">
                <h3 class="ltext-103 cl5">
                    Favorilerim
                </h3>

                <p class="stext-102 cl6 p-t-10">
                    Beğendiğiniz ürünleri burada görüntüleyebilir, sepete ekleyebilir veya favorilerinizden çıkarabilirsiniz.
                </p>
            </div>

            <?php if (empty($products)): ?>

                <div class="text-center p-t-50 p-b-50">
                    <h4 class="mtext-105 cl2 p-b-15">
                        Henüz favori ürününüz yok.
                    </h4>

                    <p class="stext-102 cl6 p-b-25">
                        Ürünler sayfasındaki kalp ikonuna basarak favorilerinizi oluşturabilirsiniz.
                    </p>

                    <a href="<?= base_url('/products') ?>"
                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                        style="width:190px; margin:auto;">
                        Ürünleri Keşfet
                    </a>
                </div>

            <?php else: ?>

                <div class="row">

                    <?php foreach ($products as $product): ?>

                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                            <div class="favorite-card">

                                <img src="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
                                    class="favorite-image"
                                    alt="IMG-PRODUCT">

                                <div class="favorite-content">

                                    <h5 class="mtext-105 cl2 p-b-10">
                                        <?= esc((string)($product['name'] ?? '')) ?>
                                    </h5>

                                    <p class="stext-102 cl6" style="min-height:70px;">
                                        <?= esc((string)($product['description'] ?? '')) ?>
                                    </p>

                                    <div class="favorite-price p-b-15">
                                        <?= number_format($product['price'] ?? 0, 2) ?> ₺
                                    </div>

                                    <div class="d-flex flex-wrap gap-2">

                                        <a href="#"
                                            class="btn btn-outline-dark btn-sm js-show-product-modal"
                                            data-id="<?= $product['id'] ?? 0 ?>"
                                            data-name="<?= esc((string)($product['name'] ?? '')) ?>"
                                            data-price="<?= number_format($product['price'] ?? 0, 2) ?> ₺"
                                            data-desc="<?= esc((string)($product['description'] ?? '')) ?>"
                                            data-img="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
                                            data-stock="<?= $product['stock'] ?? 0 ?>">
                                            İncele
                                        </a>

                                        <?php if (($product['stock'] ?? 0) > 0): ?>
                                            <a href="<?= base_url('/cart/add/' . ($product['id'] ?? 0)) ?>"
                                                class="btn btn-sm text-white"
                                                style="background:#717fe0;">
                                                Sepete Ekle
                                            </a>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                Stokta Yok
                                            </button>
                                        <?php endif; ?>

                                        <a href="<?= base_url('/favorite/remove/' . ($product['id'] ?? 0)) ?>"
                                        class="btn btn-outline-danger btn-sm">
                                            Çıkar
                                        </a>

                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>
    </section>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">

                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="<?= base_url('images/icons/icon-close.png') ?>" alt="CLOSE">
                </button>

                <div class="row">

                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="" alt="IMG-PRODUCT">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">

                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Ürün Adı
                            </h4>

                            <span class="mtext-106 cl2">
                                0.00 ₺
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Ürün açıklaması
                            </p>

                            <p id="modalStockMessage"
                                style="display:none; margin-top:12px; font-weight:600; color:#dc3545;">
                            </p>

                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">

                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input id="modalQuantityInput"
                                                class="mtext-104 cl3 txt-center num-product"
                                                type="number"
                                                value="1"
                                                min="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <a href="#"
                                            id="modalAddCartBtn"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Sepete Ekle
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
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
    document.querySelectorAll('.js-show-product-modal').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const id = this.dataset.id || 0;
            const name = this.dataset.name || 'Ürün';
            const price = this.dataset.price || '0.00 ₺';
            const desc = this.dataset.desc || '';
            const img = this.dataset.img || '';
            const stock = Number(this.dataset.stock || 0);

            document.querySelector('.js-name-detail').textContent = name;
            document.querySelector('.mtext-106').textContent = price;
            document.querySelector('.stext-102').textContent = desc;

            const quantityInput = document.getElementById('modalQuantityInput');
            const stockMessage = document.getElementById('modalStockMessage');
            const modalAddCartBtn = document.getElementById('modalAddCartBtn');

            if (quantityInput) {
                quantityInput.value = 1;
                quantityInput.min = 1;
                quantityInput.max = stock;

                quantityInput.oninput = function () {
                    let value = Number(this.value || 1);

                    if (value > stock) {
                        this.value = stock;

                        if (stockMessage) {
                            stockMessage.style.display = 'block';
                            stockMessage.textContent = 'Stok sınırına ulaştınız.';
                        }
                    }

                    if (value < 1) {
                        this.value = 1;
                    }
                };
            }

            if (stockMessage) {
                if (stock <= 0) {
                    stockMessage.style.display = 'block';
                    stockMessage.textContent = 'Tükendi';
                } else if (stock <= 3) {
                    stockMessage.style.display = 'block';
                    stockMessage.textContent = 'Son ' + stock + ' ürün!';
                } else {
                    stockMessage.style.display = 'none';
                    stockMessage.textContent = '';
                }
            }

            if (modalAddCartBtn && quantityInput) {
                if (stock <= 0) {
                    modalAddCartBtn.style.pointerEvents = 'none';
                    modalAddCartBtn.style.opacity = '0.5';
                    modalAddCartBtn.textContent = 'Stokta Yok';
                    modalAddCartBtn.onclick = null;
                } else {
                    modalAddCartBtn.style.pointerEvents = 'auto';
                    modalAddCartBtn.style.opacity = '1';
                    modalAddCartBtn.textContent = 'Sepete Ekle';

                    modalAddCartBtn.onclick = function(event) {
                        event.preventDefault();

                        let quantity = Number(quantityInput.value || 1);

                        if (quantity < 1) quantity = 1;
                        if (quantity > stock) quantity = stock;

                        window.location.href = "<?= base_url('/cart/add') ?>/" + id + "?quantity=" + quantity;
                    };
                }
            }

            const gallery = $('.slick3');

            if (gallery.hasClass('slick-initialized')) {
                gallery.slick('unslick');
            }

            gallery.html(`
                <div class="item-slick3" data-thumb="${img}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${img}" alt="IMG-PRODUCT">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${img}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `);

            if (typeof gallery.slick === 'function') {
                gallery.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    dots: true,
                    appendDots: $('.wrap-slick3-dots'),
                    appendArrows: $('.wrap-slick3-arrows')
                });
            }

            $('.js-modal1').addClass('show-modal1');
        });
    });
    </script>

</body>

</html>