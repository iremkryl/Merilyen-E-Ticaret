<!DOCTYPE html>
<html lang="tr">

<head>
	<title>Merilyen ❤️</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />

	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('fonts/iconic/css/material-design-iconic-font.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('fonts/linearicons-v1.0.0/icon-font.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/animate/animate.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/css-hamburgers/hamburgers.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/animsition/css/animsition.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/daterangepicker/daterangepicker.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/slick/slick.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/MagnificPopup/magnific-popup.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css') ?>">
	<!--===============================================================================================-->
	<style>
		/* GENEL */
		.wrap-menu-desktop {
			box-shadow: none !important;
			border-bottom: none !important;
		}

		.how-shadow1 {
			box-shadow: none !important;
		}

		/* ANA SLIDER */
		.section-slide,
		.section-slide .wrap-slick1,
		.section-slide .slick1,
		.section-slide .item-slick1 {
			background-color: #fff !important;
		}

		.section-slide .item-slick1 {
			background-size: cover !important;
			background-repeat: no-repeat !important;
			background-position: center center !important;
		}

		.home-main-slider-title,
		.home-main-slider-summary {
			text-shadow: 0 3px 14px rgba(255, 255, 255, 0.85);
		}

		.home-main-slider-title {
			max-width: 720px;
		}

		.home-main-slider-summary {
			max-width: 620px;
		}

		/* KÜÇÜK DUYURU SLIDER */
		.sec-banner,
		.announcement-slider,
		.announcement-slider .item,
		.announcement-slider .slick-slide {
			background: #fff !important;
		}

		.home-announcement-card {
			width: 100%;
			height: 260px;
			background: #fff !important;
			overflow: hidden;
			position: relative;
			display: flex !important;
			align-items: center !important;
			justify-content: center !important;
		}

		.home-announcement-card img {
			width: 100% !important;
			height: 100% !important;
			object-fit: cover !important;
			object-position: center center !important;
			display: block;
		}

		.home-announcement-title {
			max-width: 90%;
			line-height: 1.15;
			color: #222;
			text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
		}

		.home-announcement-card .block1-txt {
			background: transparent !important;
		}

		.home-announcement-card:hover .block1-txt {
			background: rgba(255, 255, 255, 0.08) !important;
		}

		/* ÖNE ÇIKAN ÜRÜNLER */
		.home-featured-products {
			background: #fff;
		}

		.home-featured-products .block2 {
			transition: all 0.25s ease;
		}

		.home-featured-products .block2:hover {
			transform: translateY(-4px);
		}

		.home-featured-badge {
			position: absolute;
			top: 14px;
			left: 14px;
			background: #717fe0;
			color: #fff;
			padding: 7px 13px;
			border-radius: 30px;
			font-size: 12px;
			font-weight: 700;
			z-index: 10;
			box-shadow: 0 8px 18px rgba(113, 127, 224, 0.25);
		}

		/* YENİ ÜRÜNLER */
		.home-new-products {
			background: #fafafa;
		}

		.home-new-products .block2 {
			transition: all 0.25s ease;
		}

		.home-new-products .block2:hover {
			transform: translateY(-4px);
		}

		.home-new-badge {
			position: absolute;
			top: 14px;
			left: 14px;
			background: #222;
			color: #fff;
			padding: 7px 13px;
			border-radius: 30px;
			font-size: 12px;
			font-weight: 700;
			z-index: 10;
			box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
		}

		@media (max-width: 768px) {
			.home-announcement-card {
				height: 230px;
			}

			.home-featured-img,
			.home-new-img {
				height: 280px;
			}
		}

		/* ÖNE ÇIKAN ÜRÜNLER - beyaz boşluk olmadan kaplasın */
		.home-featured-img {
			width: 100%;
			height: 330px;
			border-radius: 18px;
			overflow: hidden;
			position: relative;
			background: transparent !important;
		}

		.home-featured-img img {
			width: 100% !important;
			height: 100% !important;
			object-fit: cover !important;
			object-position: center center !important;
			display: block;
		}

		/* YENİ ÜRÜNLER - beyaz boşluk olmadan kaplasın */
		.home-new-img {
			width: 100%;
			height: 330px;
			border-radius: 18px;
			overflow: hidden;
			position: relative;
			background: transparent !important;
		}

		.home-new-img img {
			width: 100% !important;
			height: 100% !important;
			object-fit: cover !important;
			object-position: center center !important;
			display: block;
		}

		@media (max-width: 768px) {

			.home-featured-img,
			.home-new-img {
				height: 280px;
			}
		}

		.merilyen-toast {
			position: fixed;
			top: 24px;
			right: 24px;
			min-width: 260px;
			max-width: 360px;
			background: #fff;
			color: #333;
			border-radius: 16px;
			box-shadow: 0 14px 36px rgba(0, 0, 0, 0.16);
			padding: 15px 18px;
			z-index: 999999;
			display: none;
			border-left: 5px solid #717fe0;
			font-size: 14px;
			line-height: 1.45;
		}

		.merilyen-toast.success {
			border-left-color: #28a745;
		}

		.merilyen-toast.error {
			border-left-color: #dc3545;
		}

		@media (max-width: 576px) {
			.merilyen-toast {
				left: 15px;
				right: 15px;
				top: 18px;
				min-width: auto;
				max-width: none;
			}
		}


		/* SON DÜZENLEME: Menü alt çizgisi tamamen kalksın */
		header,
		.container-menu-desktop,
		.wrap-menu-desktop,
		.limiter-menu-desktop,
		.how-shadow1 {
			box-shadow: none !important;
			border-bottom: none !important;
		}

		.main-menu > li > a::after,
		.main-menu > li.active-menu > a::after {
			display: none !important;
		}

		/* SON DÜZENLEME: Duyurularda dış beyazlık/çerçeve olmasın */
		.sec-banner,
		.announcement-slider,
		.announcement-slider .item,
		.announcement-slider .slick-slide,
		.announcement-slider .slick-list,
		.announcement-slider .slick-track {
			background: transparent !important;
		}

		.home-announcement-card {
			background: transparent !important;
			border: none !important;
			box-shadow: none !important;
			border-radius: 0 !important;
			overflow: hidden;
		}

		.home-announcement-card img {
			width: 100% !important;
			height: 100% !important;
			object-fit: cover !important;
			object-position: center center !important;
			display: block !important;
			border: none !important;
			box-shadow: none !important;
		}

		.home-announcement-card .block1-txt {
			background: rgba(0, 0, 0, 0) !important;
			transition: all 0.25s ease !important;
		}

		.home-announcement-card:hover .block1-txt {
			background: rgba(0, 0, 0, 0.30) !important;
		}

		.home-announcement-card .block1-txt-child2 {
			display: none !important;
		}

		.home-announcement-title {
			color: #fff !important;
			text-shadow: 0 3px 12px rgba(0, 0, 0, 0.45) !important;
			opacity: 0;
			transform: translateY(10px);
			transition: all 0.25s ease;
		}

		.home-announcement-card:hover .home-announcement-title {
			opacity: 1;
			transform: translateY(0);
		}

		/* HOME ÜRÜN MODALI */
		.home-product-modal {
			position: fixed;
			inset: 0;
			background: rgba(0, 0, 0, 0.55);
			z-index: 999998;
			display: none;
			align-items: center;
			justify-content: center;
			padding: 22px;
		}

		.home-product-modal.active {
			display: flex;
		}

		.home-product-modal-card {
			width: 100%;
			max-width: 900px;
			background: #fff;
			border-radius: 22px;
			box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
			position: relative;
			overflow: hidden;
			animation: homeProductModalIn 0.22s ease;
		}

		@keyframes homeProductModalIn {
			from {
				opacity: 0;
				transform: translateY(18px) scale(0.98);
			}

			to {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
		}

		.home-product-modal-close {
			position: absolute;
			top: 16px;
			right: 18px;
			width: 38px;
			height: 38px;
			border-radius: 50%;
			border: none;
			background: #f4f4f4;
			color: #333;
			font-size: 22px;
			line-height: 1;
			cursor: pointer;
			z-index: 2;
			transition: all 0.2s ease;
		}

		.home-product-modal-close:hover {
			background: #717fe0;
			color: #fff;
		}

		.home-product-modal-img-wrap {
			width: 100%;
			height: 100%;
			min-height: 430px;
			background: #f8f8f8;
			overflow: hidden;
		}

		.home-product-modal-img-wrap img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center center;
			display: block;
		}

		.home-product-modal-content {
			padding: 42px 38px;
		}

		.home-product-modal-title {
			font-size: 26px;
			font-weight: 700;
			color: #222;
			margin-bottom: 12px;
		}

		.home-product-modal-price {
			font-size: 20px;
			font-weight: 700;
			color: #717fe0;
			display: block;
			margin-bottom: 18px;
		}

		.home-product-modal-desc {
			color: #666;
			line-height: 1.7;
			margin-bottom: 18px;
		}


		.home-product-modal-actions {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			gap: 14px;
		}

		.home-product-modal-qty {
			width: 145px;
			height: 45px;
			border: 1px solid #e6e6e6;
			border-radius: 23px;
			display: flex;
			overflow: hidden;
		}

		.home-product-modal-qty button {
			width: 42px;
			border: none;
			background: #f5f5f5;
			color: #333;
			cursor: pointer;
			transition: all 0.2s ease;
		}

		.home-product-modal-qty button:hover {
			background: #717fe0;
			color: #fff;
		}

		.home-product-modal-qty input {
			width: 61px;
			border: none;
			text-align: center;
			font-weight: 600;
			outline: none;
		}

		.home-product-modal-add {
			height: 45px;
			border: none;
			border-radius: 23px;
			background: #717fe0;
			color: #fff;
			font-weight: 700;
			padding: 0 28px;
			cursor: pointer;
			transition: all 0.25s ease;
		}

		.home-product-modal-add:hover {
			background: #5f6ed8;
			transform: translateY(-1px);
		}

		.home-product-modal-add:disabled {
			background: #aaa;
			cursor: not-allowed;
			transform: none;
		}


		.home-product-modal-img-wrap img {
			cursor: zoom-in;
			transition: transform 0.25s ease;
		}

		.home-product-modal-img-wrap img:hover {
			transform: scale(1.03);
		}

		.product-image-zoom-modal {
			position: fixed;
			inset: 0;
			background: rgba(0, 0, 0, 0.78);
			z-index: 1000000;
			display: none;
			align-items: center;
			justify-content: center;
			padding: 24px;
		}

		.product-image-zoom-modal.active {
			display: flex;
		}

		.product-image-zoom-card {
			position: relative;
			max-width: 92vw;
			max-height: 92vh;
		}

		.product-image-zoom-card img {
			max-width: 100%;
			max-height: 92vh;
			object-fit: contain;
			border-radius: 18px;
			box-shadow: 0 20px 70px rgba(0, 0, 0, 0.35);
			background: #fff;
		}

		.product-image-zoom-close {
			position: absolute;
			top: -16px;
			right: -16px;
			width: 42px;
			height: 42px;
			border-radius: 50%;
			border: none;
			background: #fff;
			color: #222;
			font-size: 26px;
			line-height: 1;
			cursor: pointer;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
			transition: all 0.2s ease;
		}

		.product-image-zoom-close:hover {
			background: #717fe0;
			color: #fff;
		}

		@media (max-width: 768px) {
			.home-product-modal-card {
				max-height: 92vh;
				overflow-y: auto;
			}

			.home-product-modal-img-wrap {
				min-height: 280px;
				height: 280px;
			}

			.home-product-modal-content {
				padding: 30px 24px;
			}

			.home-product-modal-title {
				font-size: 22px;
			}

			.home-product-modal-actions {
				align-items: stretch;
				flex-direction: column;
			}

			.home-product-modal-qty,
			.home-product-modal-add {
				width: 100%;
			}

			.home-product-modal-qty input {
				flex: 1;
			}
		}


	</style>
</head>

<body class="animsition">

	<?php
	$homeUserNameRaw = session()->get('user_name');
	$homeUserSurnameRaw = session()->get('user_surname');

	$homeUserName = is_scalar($homeUserNameRaw) ? (string)$homeUserNameRaw : '';
	$homeUserSurname = is_scalar($homeUserSurnameRaw) ? (string)$homeUserSurnameRaw : '';

	$homeUserFullNameHtml = htmlspecialchars(
		trim($homeUserName . ' ' . $homeUserSurname),
		ENT_QUOTES,
		'UTF-8'
	);
	?>

	<div id="merilyenToast" class="merilyen-toast"></div>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
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
								<?= $homeUserFullNameHtml ?>
							</a>

							<a href="<?= base_url('/logout') ?>" class="flex-c-m trans-04 p-lr-25">
								Çıkış Yap
							</a>

						<?php else: ?>

							<a href="<?= base_url('/login') ?>" class="flex-c-m trans-04 p-lr-25">
								Giriş Yap
							</a>

						<?php endif; ?>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							TR
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							TL
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="<?= base_url('/') ?>" class="logo">
						<img src="<?= base_url('images/icons/logo-1m.png') ?>" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
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
							data-notify="<?= $favoriteCount ?? 0 ?>">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>

						<a href="<?= base_url('/cart') ?>"
							class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
							data-notify="<?= $cartCount ?? 0 ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo mobile -->
			<div class="logo-mobile">
				<a href="<?= base_url('/') ?>">
					<img src="<?= base_url('images/icons/logo-1m.png') ?>" alt="IMG-LOGO">
				</a>
			</div>

			<!-- Icon header -->
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
					data-notify="<?= $favoriteCount ?? 0 ?>">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
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
								<?= $homeUserFullNameHtml ?>
							</a>

							<a href="<?= base_url('/logout') ?>" class="flex-c-m p-lr-10 trans-04">
								Çıkış Yap
							</a>

						<?php else: ?>

							<a href="<?= base_url('/login') ?>" class="flex-c-m p-lr-10 trans-04">
								Giriş Yap
							</a>

						<?php endif; ?>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							TR
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							TL
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">

				<li class="active-menu">
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

		<!-- Ürün Arama -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?= base_url('images/icons/icon-close2.png') ?>" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Arama...">
				</form>
			</div>
		</div>
	</header>

	<!-- Sepet -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Sepetiniz
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Toplam: 0₺
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?= base_url('/cart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Sepeti Görüntüle
						</a>

						<a href="<?= base_url('/cart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Ödemeye Geç
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- ANA SLIDER -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">

				<?php if (!empty($heroSliders)): ?>

					<?php foreach ($heroSliders as $index => $slide): ?>

						<?php
						$slideImage = !empty($slide['image'])
							? base_url('images/' . $slide['image'])
							: base_url('images/slide-01.webp');

						$animations = [
							['fadeInDown', 'fadeInUp', 'zoomIn'],
							['rollIn', 'lightSpeedIn', 'slideInUp'],
							['rotateInDownLeft', 'rotateInUpRight', 'rotateIn']
						];

						$animationSet = $animations[$index % count($animations)];
						?>

						<div class="item-slick1"
							style="background-image: url('<?= $slideImage ?>');">

							<div class="container h-full">
								<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

									<div class="layer-slick1 animated visible-false"
										data-appear="<?= $animationSet[0] ?>"
										data-delay="0">
										<span class="ltext-101 cl2 respon2 home-main-slider-summary">
											<?= esc((string)($slide['summary'] ?? 'Merilyen')) ?>
										</span>
									</div>

									<div class="layer-slick1 animated visible-false"
										data-appear="<?= $animationSet[1] ?>"
										data-delay="500">
										<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1 home-main-slider-title">
											<?= esc((string)($slide['title'] ?? 'Ana Duyuru')) ?>
										</h2>
									</div>

									<div class="layer-slick1 animated visible-false"
										data-appear="<?= $animationSet[2] ?>"
										data-delay="1000">
										<a href="<?= base_url('/blog') ?>"
											class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											Detayları Gör
										</a>
									</div>

								</div>
							</div>
						</div>

					<?php endforeach; ?>

				<?php else: ?>

					<div class="item-slick1"
						style="background-image: url('<?= base_url('images/slide-01.webp') ?>');">

						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

								<div class="layer-slick1 animated visible-false"
									data-appear="fadeInDown"
									data-delay="0">
									<span class="ltext-101 cl2 respon2">
										Yeni Yıl Koleksiyonu 2026
									</span>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="fadeInUp"
									data-delay="500">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										YENİ ÜRÜNLER
									</h2>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="zoomIn"
									data-delay="1000">
									<a href="<?= base_url('/products') ?>"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Ürünleri İncele
									</a>
								</div>

							</div>
						</div>
					</div>

					<div class="item-slick1"
						style="background-image: url('<?= base_url('images/slide-02.webp') ?>');">

						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

								<div class="layer-slick1 animated visible-false"
									data-appear="rollIn"
									data-delay="0">
									<span class="ltext-101 cl2 respon2">
										Özgün Hediye Setlerimiz
									</span>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="lightSpeedIn"
									data-delay="500">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										El Emeği
									</h2>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="slideInUp"
									data-delay="1000">
									<a href="<?= base_url('/products') ?>"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Şimdi Al
									</a>
								</div>

							</div>
						</div>
					</div>

					<div class="item-slick1"
						style="background-image: url('<?= base_url('images/slide-03.webp') ?>');">

						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

								<div class="layer-slick1 animated visible-false"
									data-appear="rotateInDownLeft"
									data-delay="0">
									<span class="ltext-101 cl2 respon2">
										Kendi Stilini Yarat
									</span>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="rotateInUpRight"
									data-delay="500">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										Bize Ulaş
									</h2>
								</div>

								<div class="layer-slick1 animated visible-false"
									data-appear="rotateIn"
									data-delay="1000">
									<a href="<?= base_url('/contact') ?>"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										1 Haftada Teslim
									</a>
								</div>

							</div>
						</div>
					</div>

				<?php endif; ?>

			</div>
		</div>
	</section>


	<!-- DUYURU SLIDER -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">

			<div class="announcement-slider">

				<?php if (!empty($announcements)): ?>
					<?php foreach ($announcements as $announcement): ?>

						<?php
						$announcementImage = !empty($announcement['image'])
							? base_url('images/' . $announcement['image'])
							: base_url('images/duyuru-1.webp');
						?>

						<div class="item">
							<div class="block1 wrap-pic-w home-announcement-card">
								<img src="<?= $announcementImage ?>" alt="DUYURU">

								<a href="<?= base_url('/blog') ?>"
									class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-30 p-tb-30 trans-03 respon3">

									<div class="block1-txt-child1 flex-col-l">
										<span class="block1-name ltext-102 trans-04 p-b-8 home-announcement-title">
											<?= esc((string)($announcement['title'] ?? 'Duyuru')) ?>
										</span>
									</div>

									<div class="block1-txt-child2 p-b-4 trans-05">
										<div class="block1-link stext-101 cl2 trans-09">
											Detay
										</div>
									</div>

								</a>
							</div>
						</div>

					<?php endforeach; ?>
				<?php else: ?>

					<div class="item">
						<div class="block1 wrap-pic-w home-announcement-card">
							<img src="<?= base_url('images/duyuru-1.webp') ?>" alt="DUYURU">

							<a href="<?= base_url('/blog') ?>"
								class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-30 p-tb-30 trans-03 respon3">

								<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8 home-announcement-title">
										Merilyen Duyuruları
									</span>
								</div>

								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl2 trans-09">
										Detay
									</div>
								</div>

							</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="slider-more-wrapper flex-c-m p-t-30 p-b-30">
		<a href="<?= base_url('/blog') ?>" class="slider-more-btn stext-102 cl0 bg3 bor1 hov-btn2 p-lr-30 p-tb-10 trans-04">
			Daha Fazla Duyuru
		</a>
	</div>

	<!-- ÖNE ÇIKAN ÜRÜNLER -->
	<section class="bg0 p-t-60 p-b-90 home-featured-products">
		<div class="container">

			<div class="p-b-35 text-center">
				<h3 class="ltext-103 cl5">
					Öne Çıkan Ürünler
				</h3>

				<p class="stext-102 cl6 p-t-10">
					Merilyen’in seçili ve özel ürünlerini keşfedin.
				</p>
			</div>

			<?php if (!empty($featuredProducts)): ?>

				<div class="row">

					<?php foreach ($featuredProducts as $product): ?>

						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35">

							<div class="block2">

								<div class="block2-pic hov-img0 home-featured-img" style="position:relative;">

									<img src="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
										alt="<?= esc((string)($product['name'] ?? 'Ürün')) ?>">

									<div class="home-featured-badge">
										★ Öne Çıkan
									</div>

									<a href="#"
										class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 home-product-open"
										data-product-id="<?= (int)($product['id'] ?? 0) ?>"
										data-product-name="<?= esc((string)($product['name'] ?? 'Ürün'), 'attr') ?>"
										data-product-price="<?= number_format((float)($product['price'] ?? 0), 2) ?> ₺"
										data-product-image="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
										data-product-description="<?= esc((string)($product['description'] ?? 'Ürün açıklaması bulunmuyor.'), 'attr') ?>"
										data-product-stock="<?= (int)($product['stock'] ?? 0) ?>">
										İncele
									</a>

								</div>

								<div class="block2-txt flex-w flex-t p-t-14">

									<div class="block2-txt-child1 flex-col-l">
										<a href="#"
											class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 home-product-open"
											data-product-id="<?= (int)($product['id'] ?? 0) ?>"
											data-product-name="<?= esc((string)($product['name'] ?? 'Ürün'), 'attr') ?>"
											data-product-price="<?= number_format((float)($product['price'] ?? 0), 2) ?> ₺"
											data-product-image="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
											data-product-description="<?= esc((string)($product['description'] ?? 'Ürün açıklaması bulunmuyor.'), 'attr') ?>"
											data-product-stock="<?= (int)($product['stock'] ?? 0) ?>">
											<?= esc((string)($product['name'] ?? 'Ürün')) ?>
										</a>

										<span class="stext-105 cl3">
											<?= number_format($product['price'] ?? 0, 2) ?> ₺
										</span>
									</div>

									<?php $isFavorite = in_array($product['id'] ?? 0, $favoriteIds ?? []); ?>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#"
											class="btn-addwish-b2 dis-block pos-relative favorite-toggle <?= $isFavorite ? 'js-addedwish-b2' : '' ?>"
											data-product-id="<?= $product['id'] ?? 0 ?>">

											<img class="icon-heart1 dis-block trans-04"
												src="<?= base_url('images/icons/icon-heart-01.png') ?>"
												alt="ICON">

											<img class="icon-heart2 dis-block trans-04 ab-t-l"
												src="<?= base_url('images/icons/icon-heart-02.png') ?>"
												alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="flex-c-m p-t-20">
					<a href="<?= base_url('/products') ?>"
						class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-30 trans-04">
						Tüm Ürünleri Gör
					</a>
				</div>

			<?php else: ?>

				<div class="text-center p-t-20">
					<p class="stext-102 cl6">
						Henüz öne çıkarılan ürün bulunmuyor.
					</p>

					<a href="<?= base_url('/products') ?>"
						class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-30 trans-04 d-inline-flex m-t-15">
						Ürünleri İncele
					</a>
				</div>

			<?php endif; ?>

		</div>
	</section>

	<!-- YENİ ÜRÜNLER -->
	<section class="p-t-60 p-b-90 home-new-products">
		<div class="container">

			<div class="p-b-35 text-center">
				<h3 class="ltext-103 cl5">
					Yeni Ürünler
				</h3>

				<p class="stext-102 cl6 p-t-10">
					Merilyen’e yeni eklenen ürünleri keşfedin.
				</p>
			</div>

			<?php if (!empty($newProducts)): ?>

				<div class="row">

					<?php foreach ($newProducts as $product): ?>

						<?php $isFavorite = in_array($product['id'] ?? 0, $favoriteIds ?? []); ?>

						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35">

							<div class="block2">

								<div class="block2-pic hov-img0 home-new-img">

									<img src="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
										alt="<?= esc((string)($product['name'] ?? 'Ürün')) ?>">

									<a href="#"
										class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 home-product-open"
										data-product-id="<?= (int)($product['id'] ?? 0) ?>"
										data-product-name="<?= esc((string)($product['name'] ?? 'Ürün'), 'attr') ?>"
										data-product-price="<?= number_format((float)($product['price'] ?? 0), 2) ?> ₺"
										data-product-image="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
										data-product-description="<?= esc((string)($product['description'] ?? 'Ürün açıklaması bulunmuyor.'), 'attr') ?>"
										data-product-stock="<?= (int)($product['stock'] ?? 0) ?>">
										İncele
									</a>

								</div>

								<div class="block2-txt flex-w flex-t p-t-14">

									<div class="block2-txt-child1 flex-col-l">
										<a href="#"
											class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 home-product-open"
											data-product-id="<?= (int)($product['id'] ?? 0) ?>"
											data-product-name="<?= esc((string)($product['name'] ?? 'Ürün'), 'attr') ?>"
											data-product-price="<?= number_format((float)($product['price'] ?? 0), 2) ?> ₺"
											data-product-image="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
											data-product-description="<?= esc((string)($product['description'] ?? 'Ürün açıklaması bulunmuyor.'), 'attr') ?>"
											data-product-stock="<?= (int)($product['stock'] ?? 0) ?>">
											<?= esc((string)($product['name'] ?? 'Ürün')) ?>
										</a>

										<span class="stext-105 cl3">
											<?= number_format($product['price'] ?? 0, 2) ?> ₺
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#"
											class="btn-addwish-b2 dis-block pos-relative favorite-toggle <?= $isFavorite ? 'js-addedwish-b2' : '' ?>"
											data-product-id="<?= $product['id'] ?? 0 ?>">

											<img class="icon-heart1 dis-block trans-04"
												src="<?= base_url('images/icons/icon-heart-01.png') ?>"
												alt="ICON">

											<img class="icon-heart2 dis-block trans-04 ab-t-l"
												src="<?= base_url('images/icons/icon-heart-02.png') ?>"
												alt="ICON">
										</a>
									</div>

								</div>

							</div>

						</div>

					<?php endforeach; ?>

				</div>

				<div class="flex-c-m p-t-20">
					<a href="<?= base_url('/products') ?>"
						class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-30 trans-04">
						Tüm Ürünleri Gör
					</a>
				</div>

			<?php else: ?>

				<div class="text-center p-t-20">
					<p class="stext-102 cl6">
						Henüz yeni ürün bulunmuyor.
					</p>
				</div>

			<?php endif; ?>

		</div>
	</section>

	<!-- Footer -->
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
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
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

						<a href="https://www.instagram.com/hulyaorguevi_?igsh=MTFxNnB0ZTNmbTZqeg==" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
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
						Haberlerimiz, özel tekliflerimiz ve favori stillerimiz hakkında ilk siz bilgi sahibi olun. <br> <br>
					</p>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="eposta@ornek.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
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
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Tüm hakları saklıdır &copy;<script>
						document.write(new Date().getFullYear());
					</script> | İrem Karayel | <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>

	<!-- HOME ÜRÜN DETAY MODALI -->
	<div id="homeProductModal" class="home-product-modal" aria-hidden="true">
		<div class="home-product-modal-card">
			<button type="button" id="homeProductModalClose" class="home-product-modal-close" aria-label="Kapat">
				&times;
			</button>

			<div class="row no-gutters">
				<div class="col-md-6">
					<div class="home-product-modal-img-wrap">
						<img id="homeProductModalImage" src="" alt="Ürün görseli">
					</div>
				</div>

				<div class="col-md-6">
					<div class="home-product-modal-content">
						<h4 id="homeProductModalName" class="home-product-modal-title">
							Ürün
						</h4>

						<span id="homeProductModalPrice" class="home-product-modal-price">
							0.00 ₺
						</span>

						<p id="homeProductModalDescription" class="home-product-modal-desc">
							Ürün açıklaması bulunmuyor.
						</p>

						<div class="home-product-modal-actions">
							<div class="home-product-modal-qty">
								<button type="button" id="homeProductQtyMinus">
									<i class="zmdi zmdi-minus"></i>
								</button>

								<input type="number" id="homeProductQtyInput" value="1" min="1" readonly>

								<button type="button" id="homeProductQtyPlus">
									<i class="zmdi zmdi-plus"></i>
								</button>
							</div>

							<button type="button" id="homeProductAddToCart" class="home-product-modal-add" data-product-id="">
								Sepete Ekle
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ÜRÜN GÖRSEL BÜYÜTME MODALI -->
	<div id="productImageZoomModal" class="product-image-zoom-modal" aria-hidden="true">
		<div class="product-image-zoom-card">
			<button type="button" id="productImageZoomClose" class="product-image-zoom-close" aria-label="Kapat">
				&times;
			</button>
			<img id="productImageZoomImg" src="" alt="Ürün görseli">
		</div>
	</div>


	<style>
		.btn-stats-floating {
			position: fixed;
			bottom: 30px;
			left: 30px;
			z-index: 99999;
			/* Diğer öğelerin üzerinde durması için */
			background-color: #717fe0;
			/* Tema rengi */
			color: white !important;
			padding: 12px 25px;
			border-radius: 50px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: Arial, sans-serif;
			/* Font problemi olmaması için standart font */
			font-size: 15px;
			font-weight: bold;
			text-decoration: none;
			transition: all 0.3s;
			cursor: pointer;
		}

		.btn-stats-floating i {
			margin-right: 8px;
			font-size: 18px;
		}

		.btn-stats-floating:hover {
			background-color: #333;
			/* Mouse üzerine gelince koyu renk */
			transform: translateY(-5px);
			/* Hafif yukarı kalkma efekti */
			color: #fff !important;
		}

		/* Mobil uyumluluk: Mobilde biraz küçültelim */
		@media (max-width: 768px) {
			.btn-stats-floating {
				bottom: 15px;
				left: 15px;
				padding: 10px 15px;
				font-size: 13px;
			}
		}
	</style>

	<a href="<?= base_url('/sayilarla-merilyen') ?>" class="btn-stats-floating">
		<i class="fa fa-bar-chart"></i>
		Sayılarla Merilyen
	</a>

	<!-- Sayfa Başına Dön Butonu -->
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
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?= base_url('vendor/daterangepicker/daterangepicker.js') ?>"></script>
	<script src="<?= base_url('vendor/slick/slick.min.js') ?>"></script>
	<script src="<?= base_url('js/slick-custom.js') ?>"></script>

	<script src="<?= base_url('vendor/parallax100/parallax100.js') ?>"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('vendor/MagnificPopup/jquery.magnific-popup.min.js') ?>"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('vendor/isotope/isotope.pkgd.min.js') ?>"></script>
	<script src="<?= base_url('vendor/sweetalert/sweetalert.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('vendor/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('js/main.js') ?>"></script>
	<!-- Banner Duyuruların sağ-sola gidebilmesi için-->
	<script>
		$(document).ready(function() {
			$('.announcement-slider').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				autoplay: true,
				autoplaySpeed: 2500,
				arrows: true,
				dots: false,
				responsive: [{
						breakpoint: 992,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 576,
						settings: {
							slidesToShow: 1
						}
					}
				]
			});
		});
	</script>

	<script>
		function showMerilyenToast(message, type = 'success') {
			const toast = document.getElementById('merilyenToast');

			if (!toast) return;

			toast.className = 'merilyen-toast ' + type;
			toast.innerHTML = message;
			toast.style.display = 'block';

			clearTimeout(window.merilyenToastTimer);

			window.merilyenToastTimer = setTimeout(function() {
				toast.style.display = 'none';
			}, 2600);
		}

		function animateHeaderIcon(elementId) {
			const icon = document.getElementById(elementId);

			if (!icon) return;

			icon.style.transition = '0.2s';
			icon.style.transform = 'scale(1.25)';

			setTimeout(() => {
				icon.style.transform = 'scale(1)';
			}, 200);
		}

		document.addEventListener('click', function(e) {
			const favoriteButton = e.target.closest('.favorite-toggle');

			if (!favoriteButton) {
				return;
			}

			e.preventDefault();

			const productId = favoriteButton.dataset.productId;

			fetch("<?= base_url('/favorite/toggle') ?>/" + productId, {
					method: "GET",
					headers: {
						"X-Requested-With": "XMLHttpRequest"
					}
				})
				.then(response => response.json())
				.then(data => {
					if (data.loginRequired) {
						window.location.href = "<?= base_url('/login') ?>";
						return;
					}

					if (data.success) {
						if (data.isFavorite) {
							favoriteButton.classList.add('js-addedwish-b2');
						} else {
							favoriteButton.classList.remove('js-addedwish-b2');
						}

						const headerIcon = document.getElementById('favoriteHeaderIcon');

						if (headerIcon) {
							headerIcon.setAttribute('data-notify', data.favoriteCount);
							animateHeaderIcon('favoriteHeaderIcon');
						}

						document.querySelectorAll('a.icon-header-noti[href="<?= base_url('/favorites') ?>"]').forEach(function(icon) {
							icon.setAttribute('data-notify', data.favoriteCount);
						});

						const message = data.isFavorite ? 'Favorilere eklendi.' : 'Favorilerden çıkarıldı.';
						const productName = data.productName || '';

						showMerilyenToast((productName ? '<strong>' + productName + '</strong><br>' : '') + message, 'success');
					}
				})
				.catch(error => {
					console.log('Favori hatası:', error);
					showMerilyenToast('Favori işlemi sırasında hata oluştu.', 'error');
				});
		});
	</script>

	<script>
		function updateHomeCartCount(cartCount) {
			document.querySelectorAll('a.icon-header-noti[href="<?= base_url('/cart') ?>"]').forEach(function(icon) {
				icon.setAttribute('data-notify', cartCount);
			});
		}

		function openHomeProductModal(button) {
			const modal = document.getElementById('homeProductModal');

			if (!modal) return;

			const productId = button.dataset.productId || '';
			const productName = button.dataset.productName || 'Ürün';
			const productPrice = button.dataset.productPrice || '0.00 ₺';
			const productImage = button.dataset.productImage || '';
			const productDescription = button.dataset.productDescription || 'Ürün açıklaması bulunmuyor.';
			const productStock = parseInt(button.dataset.productStock || '0', 10);

			const modalImage = document.getElementById('homeProductModalImage');
			const modalName = document.getElementById('homeProductModalName');
			const modalPrice = document.getElementById('homeProductModalPrice');
			const modalDescription = document.getElementById('homeProductModalDescription');
			const modalQtyInput = document.getElementById('homeProductQtyInput');
			const modalAddButton = document.getElementById('homeProductAddToCart');

			if (modalImage) {
				modalImage.src = productImage;
				modalImage.alt = productName;
			}

			if (modalName) {
				modalName.textContent = productName;
			}

			if (modalPrice) {
				modalPrice.textContent = productPrice;
			}

			if (modalDescription) {
				modalDescription.textContent = productDescription;
			}

			if (modalQtyInput) {
				modalQtyInput.value = '1';
				modalQtyInput.max = productStock > 0 ? productStock : 1;
			}

			if (modalAddButton) {
				modalAddButton.dataset.productId = productId;
				modalAddButton.dataset.productName = productName;
				modalAddButton.dataset.productStock = productStock;
				modalAddButton.disabled = productStock <= 0;
				modalAddButton.textContent = productStock > 0 ? 'Sepete Ekle' : 'Stokta Yok';
			}

			modal.classList.add('active');
			modal.setAttribute('aria-hidden', 'false');
		}

		function closeHomeProductModal() {
			const modal = document.getElementById('homeProductModal');

			if (!modal) return;

			modal.classList.remove('active');
			modal.setAttribute('aria-hidden', 'true');
		}

		function ajaxHomeAddToCart(productId, quantity) {
			const formData = new FormData();
			formData.append('quantity', quantity);

			return fetch("<?= base_url('/cart/add') ?>/" + productId, {
				method: "POST",
				headers: {
					"X-Requested-With": "XMLHttpRequest"
				},
				body: formData
			})
			.then(function(response) {
				if (!response.ok) {
					throw new Error('Sepete ekleme isteği başarısız oldu. HTTP: ' + response.status);
				}

				return response.json();
			});
		}

		document.addEventListener('click', function(e) {
			const productOpenButton = e.target.closest('.home-product-open');

			if (!productOpenButton) {
				return;
			}

			e.preventDefault();
			openHomeProductModal(productOpenButton);
		});

		const homeProductModalClose = document.getElementById('homeProductModalClose');
		const homeProductModal = document.getElementById('homeProductModal');
		const homeProductQtyMinus = document.getElementById('homeProductQtyMinus');
		const homeProductQtyPlus = document.getElementById('homeProductQtyPlus');
		const homeProductQtyInput = document.getElementById('homeProductQtyInput');
		const homeProductAddToCart = document.getElementById('homeProductAddToCart');

		if (homeProductModalClose) {
			homeProductModalClose.addEventListener('click', closeHomeProductModal);
		}

		if (homeProductModal) {
			homeProductModal.addEventListener('click', function(e) {
				if (e.target === homeProductModal) {
					closeHomeProductModal();
				}
			});
		}

		if (homeProductQtyMinus && homeProductQtyInput) {
			homeProductQtyMinus.addEventListener('click', function() {
				let quantity = parseInt(homeProductQtyInput.value || '1', 10);

				if (quantity > 1) {
					quantity--;
				}

				homeProductQtyInput.value = quantity;
			});
		}

		if (homeProductQtyPlus && homeProductQtyInput && homeProductAddToCart) {
			homeProductQtyPlus.addEventListener('click', function() {
				let quantity = parseInt(homeProductQtyInput.value || '1', 10);
				const stock = parseInt(homeProductAddToCart.dataset.productStock || '1', 10);

				if (quantity < stock) {
					quantity++;
				} else {
					showMerilyenToast('Stok sınırına ulaştınız.', 'error');
				}

				homeProductQtyInput.value = quantity;
			});
		}

		if (homeProductAddToCart && homeProductQtyInput) {
			homeProductAddToCart.addEventListener('click', function() {
				const productId = homeProductAddToCart.dataset.productId;
				const productName = homeProductAddToCart.dataset.productName || 'Ürün';
				const quantity = parseInt(homeProductQtyInput.value || '1', 10);

				if (!productId) {
					showMerilyenToast('Ürün bilgisi alınamadı.', 'error');
					return;
				}

				homeProductAddToCart.disabled = true;
				homeProductAddToCart.textContent = 'Ekleniyor...';

				ajaxHomeAddToCart(productId, quantity)
					.then(function(data) {
						if (data.loginRequired) {
							window.location.href = "<?= base_url('/login') ?>";
							return;
						}

						if (data.success) {
							updateHomeCartCount(data.cartCount || 0);
							showMerilyenToast('<strong>' + productName + '</strong><br>Sepete eklendi.', 'success');
						} else {
							showMerilyenToast(data.message || 'Ürün sepete eklenemedi.', 'error');
						}
					})
					.catch(function(error) {
						console.log('Sepete ekleme hatası:', error);
						showMerilyenToast('Ürün sepete eklenemedi.', 'error');
					})
					.finally(function() {
						const stock = parseInt(homeProductAddToCart.dataset.productStock || '0', 10);
						homeProductAddToCart.disabled = stock <= 0;
						homeProductAddToCart.textContent = stock > 0 ? 'Sepete Ekle' : 'Stokta Yok';
					});
			});
		}


		const productImageZoomModal = document.getElementById('productImageZoomModal');
		const productImageZoomImg = document.getElementById('productImageZoomImg');
		const productImageZoomClose = document.getElementById('productImageZoomClose');
		const homeProductModalImage = document.getElementById('homeProductModalImage');

		function openProductImageZoom(src, altText) {
			if (!productImageZoomModal || !productImageZoomImg || !src) {
				return;
			}

			productImageZoomImg.src = src;
			productImageZoomImg.alt = altText || 'Ürün görseli';
			productImageZoomModal.classList.add('active');
			productImageZoomModal.setAttribute('aria-hidden', 'false');
		}

		function closeProductImageZoom() {
			if (!productImageZoomModal) {
				return;
			}

			productImageZoomModal.classList.remove('active');
			productImageZoomModal.setAttribute('aria-hidden', 'true');
		}

		if (homeProductModalImage) {
			homeProductModalImage.addEventListener('click', function() {
				openProductImageZoom(this.src, this.alt);
			});
		}

		if (productImageZoomClose) {
			productImageZoomClose.addEventListener('click', closeProductImageZoom);
		}

		if (productImageZoomModal) {
			productImageZoomModal.addEventListener('click', function(e) {
				if (e.target === productImageZoomModal) {
					closeProductImageZoom();
				}
			});
		}

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				closeProductImageZoom();
				closeHomeProductModal();
			}
		});
	</script>

</body>

</html>