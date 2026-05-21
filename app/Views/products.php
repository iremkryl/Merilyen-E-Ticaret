<!DOCTYPE html>
<html lang="en">

<head>
	<title>Merilyen ❤️ Ürünlerimiz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/m-icon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

	<style>
		.merilyen-toast {
			position: fixed;
			top: 25px;
			right: 25px;
			z-index: 1000001;
			display: none;
			min-width: 240px;
			max-width: 340px;
			background: #717fe0;
			color: #fff;
			padding: 14px 20px;
			border-radius: 14px;
			box-shadow: 0 12px 32px rgba(0, 0, 0, 0.18);
			font-weight: 600;
			line-height: 1.5;
		}

		.merilyen-toast.error {
			background: #dc3545;
		}

		/* ÜRÜN DETAY MODALI - Home ile aynı tasarım */
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
			cursor: zoom-in;
			transition: transform 0.25s ease;
		}

		.home-product-modal-img-wrap img:hover {
			transform: scale(1.03);
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
			margin-bottom: 22px;
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

			.merilyen-toast {
				left: 15px;
				right: 15px;
				max-width: none;
			}
		}
	</style>

</head>

<body class="animsition">

	<?php
	$products = $products ?? [];
	$favoriteIds = $favoriteIds ?? [];
	$favoriteCount = $favoriteCount ?? 0;
	$cartCount = array_sum(array_column(session()->get('cart') ?? [], 'quantity'));
	$userNameRaw = session()->get('user_name');
	$userSurnameRaw = session()->get('user_surname');

	$userName = is_scalar($userNameRaw) ? (string)$userNameRaw : '';
	$userSurname = is_scalar($userSurnameRaw) ? (string)$userSurnameRaw : '';

	$userFullName = trim($userName . ' ' . $userSurname);

	$userFullNameHtml = htmlspecialchars($userFullName, ENT_QUOTES, 'UTF-8');
	?>

	<div id="merilyenToast" class="merilyen-toast"></div>

	<!-- Header -->
	<header class="header-v4">
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

							<a href="<?= base_url('/my-orders') ?>" class="flex-c-m trans-04 p-lr-25">
								<?= $userFullNameHtml ?>
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

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="images/icons/logo-1m.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="<?= base_url('/') ?>">Anasayfa</a>
							</li>

							<li class="active-menu">
								<a href="<?= base_url('/product') ?>">Ürünler</a>
								<ul class="sub-menu">
									<li><a href="product#kol">Kol Çantası</a></li>
									<li><a href="product#capraz">Çapraz Çanta</a></li>
									<li><a href="product#elcantasi">El Çantası</a></li>
									<li><a href="product#sirtcantasi">Sırt Çantası</a></li>
									<li><a href="product#yelek">Yelek</a></li>
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
							data-notify="<?= $cartCount ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-1m.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
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

						<a href="<?= base_url('/login') ?>" class="flex-c-m p-lr-10 trans-04">
							Giriş Yap
						</a>

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
				<li>
					<<a href="<?= base_url('/') ?>">Anasayfa</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="<?= base_url('/products') ?>">Ürünler</a>
						<li>
							<a href="<?= base_url('/products?category=1') ?>">Kol Çantası</a>
						</li>

						<li>
							<a href="<?= base_url('/products?category=2') ?>">Çapraz Çanta</a>
						</li>

						<li>
							<a href="<?= base_url('/products?category=3') ?>">El Çantası</a>
						</li>

						<li>
							<a href="<?= base_url('/products?category=4') ?>">Sırt Çantası</a>
						</li>

						<li>
							<a href="<?= base_url('/products?category=5') ?>">Yelek</a>
						</li>
				</li>

				<li>
					<a href="<?= base_url('/cart') ?>" class="label1 rs1" data-label1="indirim">Sepetiniz</a>
				</li>

				<li>
					<<a href="<?= base_url('/blog') ?>">Blog</a>
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
					<img src="images/icons/icon-close2.png" alt="CLOSE">
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

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tüm Ürünler
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".kol">
						Kol Çantası
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".capraz">
						Çapraz Çanta
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".elcantasi">
						El Çantası
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".sirtcantasi">
						Sırt Çantası
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".yelek">
						Yelekler
					</button>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filtrele
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Ara
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<form action="<?= base_url('/products') ?>" method="get" style="width:100%;">
							<input class="mtext-107 cl2 size-114 plh2 p-r-15"
								type="text"
								name="search"
								value="<?= esc((string)($search ?? '')) ?>"
								placeholder="Ürün ara...">
						</form>
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sırala
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Varsayılan
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popüler
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Değerlendirme
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										En Yeni
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										En Düşük Fiyat
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										En Yüksek Fiyat
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Fiyat
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Hepsi
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										₺0 - ₺500
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										₺500 - ₺1000
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										₺1000 - ₺1500
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										₺1500 - ₺2000
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										₺20000+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Etiketler
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									El Yapımı
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Günlük
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Özel Tasarım
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Hediyelik
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Renkli / Desenli
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="row isotope-grid">
				<?php foreach ($products as $product): ?>

					<?php
					$categoryClass = '';

					if ($product['category_name'] === 'Kol Çantası') {
						$categoryClass = 'kol';
					} elseif ($product['category_name'] === 'Çapraz Çanta') {
						$categoryClass = 'capraz';
					} elseif ($product['category_name'] === 'El Çantası') {
						$categoryClass = 'elcantasi';
					} elseif ($product['category_name'] === 'Sırt Çantası') {
						$categoryClass = 'sirtcantasi';
					} elseif ($product['category_name'] === 'Yelek') {
						$categoryClass = 'yelek';
					}
					?>

					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= $categoryClass ?>">

						<?php $isFavorite = in_array($product['id'] ?? 0, $favoriteIds); ?>

						<div class="block2">

						<div class="block2-pic hov-img0" style="position:relative;">

							<img src="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
								alt="IMG-PRODUCT">

							<?php if(($product['stock'] ?? 0) <= 0): ?>
								<div style="position:absolute; top:15px; left:15px; background:#dc3545; color:white; padding:6px 12px; border-radius:30px; font-size:12px; font-weight:600; z-index:99;">
									TÜKENDİ
								</div>
							<?php elseif(($product['stock'] ?? 0) <= 3): ?>
								<div style="position:absolute; top:15px; left:15px; background:#ff9800; color:white; padding:6px 12px; border-radius:30px; font-size:12px; font-weight:600; z-index:99;">
									SON <?= $product['stock'] ?> ÜRÜN
								</div>
							<?php endif; ?>

							<a href="#"
							class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-product-modal"
							data-id="<?= $product['id'] ?? 0 ?>"
							data-name="<?= esc((string)($product['name'] ?? '')) ?>"
							data-price="<?= number_format($product['price'] ?? 0, 2) ?> ₺"
							data-desc="<?= esc((string)($product['description'] ?? '')) ?>"
							data-img="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
							data-stock="<?= $product['stock'] ?? 0 ?>">
								İncele
							</a>

						</div>

							<div class="block2-txt flex-w flex-t p-t-14">

								<div class="block2-txt-child1 flex-col-l">

									<a href="#"
										class="stext-104 cl4 hov-cl1 trans-04 p-b-6 js-show-product-modal"
										data-id="<?= $product['id'] ?? 0 ?>"
										data-name="<?= esc((string)($product['name'] ?? '')) ?>"
										data-price="<?= number_format($product['price'] ?? 0, 2) ?> ₺"
										data-desc="<?= esc((string)($product['description'] ?? '')) ?>"
										data-stock="<?= $product['stock'] ?? 0 ?>"
										data-img="<?= base_url('images/' . ($product['image'] ?? '')) ?>">
										<?= esc((string)($product['name'] ?? '')) ?>
									</a>

									<span class="stext-105 cl3">
										<?= number_format($product['price'] ?? 0, 2) ?> ₺
									</span>

									<?php if (($product['stock'] ?? 0) <= 0): ?>
										<span class="badge bg-danger mt-2">TÜKENDİ</span>
									<?php endif; ?>

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

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>


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
							<a href="product#kol" class="stext-107 cl7 hov-cl1 trans-04">
								Kol Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="product#capraz" class="stext-107 cl7 hov-cl1 trans-04">
								Çapraz Çanta
							</a>
						</li>

						<li class="p-b-10">
							<a href="product#elcantasi" class="stext-107 cl7 hov-cl1 trans-04">
								El Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="product#sirtcantasi" class="stext-107 cl7 hov-cl1 trans-04">
								Sırt Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="product#yelek" class="stext-107 cl7 hov-cl1 trans-04">
								Yelekler (NEW)
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
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Sipariş Takibi
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								İade & Değişim
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Mesafeli Satış Sözleşmesi
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Sık Sorulan Sorular
							</a>
						</li>

						<li class="p-b-10">
							<a href="sayilarla-merilyen.html" class="stext-107 cl7 hov-cl1 trans-04">
								Sayılarla Merilyen (NEW)
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
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					Tüm hakları saklıdır &copy;<script>
						document.write(new Date().getFullYear());
					</script> | İrem Karayel | <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
				</p>
			</div>
		</div>
	</footer>


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

	<!-- ÜRÜN DETAY MODALI -->
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

	<!-- JS Kütüphaneleri ===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
	<script src="js/main.js"></script>

	<!--- Menüden seçerek filtreleme -->
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const currentHash = window.location.hash.replace("#", "");

			if (currentHash) {
				const filterButton = document.querySelector(`[data-filter=".${currentHash}"]`);

				if (filterButton) {
					filterButton.click(); // isotope filtrelemeyi yapar
				}
			}
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
			}, 2400);
		}

		function updateCartHeaderCount(cartCount) {
			document.querySelectorAll('a.icon-header-noti[href="<?= base_url('/cart') ?>"]').forEach(function(icon) {
				icon.setAttribute('data-notify', cartCount);
			});
		}

		function ajaxProductAddToCart(productId, quantity) {
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

		function openHomeProductModalFromButton(button) {
			const modal = document.getElementById('homeProductModal');

			if (!modal) return;

			const productId = button.dataset.id || '';
			const productName = button.dataset.name || 'Ürün';
			const productPrice = button.dataset.price || '0.00 ₺';
			const productImage = button.dataset.img || '';
			const productDescription = button.dataset.desc || 'Ürün açıklaması bulunmuyor.';
			const productStock = parseInt(button.dataset.stock || '0', 10);

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
				modalDescription.textContent = productDescription || 'Ürün açıklaması bulunmuyor.';
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

		function openProductImageZoom(src, altText) {
			const zoomModal = document.getElementById('productImageZoomModal');
			const zoomImg = document.getElementById('productImageZoomImg');

			if (!zoomModal || !zoomImg || !src) {
				return;
			}

			zoomImg.src = src;
			zoomImg.alt = altText || 'Ürün görseli';
			zoomModal.classList.add('active');
			zoomModal.setAttribute('aria-hidden', 'false');
		}

		function closeProductImageZoom() {
			const zoomModal = document.getElementById('productImageZoomModal');

			if (!zoomModal) {
				return;
			}

			zoomModal.classList.remove('active');
			zoomModal.setAttribute('aria-hidden', 'true');
		}

		document.addEventListener('click', function(e) {
			const button = e.target.closest('.js-show-product-modal');

			if (!button) {
				return;
			}

			e.preventDefault();
			openHomeProductModalFromButton(button);
		});

		const homeProductModalClose = document.getElementById('homeProductModalClose');
		const homeProductModal = document.getElementById('homeProductModal');
		const homeProductQtyMinus = document.getElementById('homeProductQtyMinus');
		const homeProductQtyPlus = document.getElementById('homeProductQtyPlus');
		const homeProductQtyInput = document.getElementById('homeProductQtyInput');
		const homeProductAddToCart = document.getElementById('homeProductAddToCart');
		const homeProductModalImage = document.getElementById('homeProductModalImage');
		const productImageZoomModal = document.getElementById('productImageZoomModal');
		const productImageZoomClose = document.getElementById('productImageZoomClose');

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

				ajaxProductAddToCart(productId, quantity)
					.then(function(data) {
						if (data.loginRequired) {
							window.location.href = "<?= base_url('/login') ?>";
							return;
						}

						if (!data.success) {
							showMerilyenToast(data.message || 'Ürün sepete eklenemedi.', 'error');
							return;
						}

						updateCartHeaderCount(data.cartCount || 0);
						document.querySelectorAll('a.icon-header-noti[href="<?= base_url('/cart') ?>"]').forEach(function(icon) {
							icon.style.transition = '0.2s';
							icon.style.transform = 'scale(1.25)';

							setTimeout(function() {
								icon.style.transform = 'scale(1)';
							}, 200);
						});
						showMerilyenToast('<strong>' + productName + '</strong><br>Ürün sepete eklendi.', 'success');
					})
					.catch(function(error) {
						console.log('Sepete ekleme hatası:', error);
						showMerilyenToast('Sepete ekleme sırasında hata oluştu.', 'error');
					})
					.finally(function() {
						const stock = parseInt(homeProductAddToCart.dataset.productStock || '0', 10);
						homeProductAddToCart.disabled = stock <= 0;
						homeProductAddToCart.textContent = stock > 0 ? 'Sepete Ekle' : 'Stokta Yok';
					});
			});
		}

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				closeProductImageZoom();
				closeHomeProductModal();
			}
		});
	</script>

	<script>
		document.querySelectorAll('.favorite-toggle').forEach(function(button) {
			button.addEventListener('click', function(e) {
				e.preventDefault();

				const productId = this.dataset.productId;
				const favoriteButton = this;

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
						}
					})
					.catch(error => {
						console.log('Favori hatası:', error);
					});
			});
		});
	</script>

	<script>
		function animateHeaderIcon(elementId) {

			const icon = document.getElementById(elementId);

			if (!icon) return;

			icon.style.transition = '0.2s';
			icon.style.transform = 'scale(1.25)';

			setTimeout(() => {
				icon.style.transform = 'scale(1)';
			}, 200);
		}
	</script>

</body>

</html>