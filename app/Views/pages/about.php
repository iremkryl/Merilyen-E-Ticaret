<!DOCTYPE html>
<html lang="en">

<head>
	<title>Merilyen ❤️ Hakkımızda </title>
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

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

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							TR
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							₺
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

							<li>
								<a href="<?= base_url('/products') ?>">Ürünler</a>
								<ul class="sub-menu">
									<li><a href="<?= base_url('/products') ?>#kol">Kol Çantası</a></li>
									<li><a href="<?= base_url('/products') ?>#capraz">Çapraz Çanta</a></li>
									<li><a href="<?= base_url('/products') ?>#elcantasi">El Çantası</a></li>
									<li><a href="<?= base_url('/products') ?>#sirtcantasi">Sırt Çantası</a></li>
									<li><a href="<?= base_url('/products') ?>#yelek">Yelek</a></li>
								</ul>
							</li>

							<li class="label1" data-label1="İndirim">
								<a href="<?= base_url('/cart') ?>">Sepetiniz</a>
							</li>

							<?php if (session()->get('isLoggedIn')): ?>
								<li><a href="<?= base_url('/my-orders') ?>">Siparişlerim</a></li>
							<?php endif; ?>

							<li>
								<a href="<?= base_url('/blog') ?>">Blog</a>
							</li>

							<li class="active-menu">
								<a href="<?= base_url('/about') ?>">Hakkımızda</a>
							</li>

							<li>
								<a href="<?= base_url('/contact') ?>">İletişim</a>
							</li>
						</ul>
					</div>

					<?php
					$favCount = 0;

					if (session()->get('isLoggedIn')) {
						$db = \Config\Database::connect();

						$favCount = $db->table('favorites')
							->where('user_id', session()->get('user_id'))
							->countAllResults();
					}
					?>

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
							data-notify="<?= array_sum(array_column(session()->get('cart') ?? [], 'quantity')) ?>">
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
				<a href="<?= base_url('/') ?>"><img src="images/icons/logo-1m.png" alt="IMG-LOGO"></a>
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

						<a href="https://iremkryl.github.io/merilyenstore/admin/html/auth-login-basic.html" class="flex-c-m p-lr-10 trans-04">
							Giriş Yap
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							TR
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							₺
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url('/') ?>">Anasayfa</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="<?= base_url('/products') ?>">Ürünler</a>
					<ul class="sub-menu">
						<li><a href="<?= base_url('/products') ?>#kol">Kol Çantası</a></li>
						<li><a href="<?= base_url('/products') ?>#capraz">Çapraz Çanta</a></li>
						<li><a href="<?= base_url('/products') ?>#elcantasi">El Çantası</a></li>
						<li><a href="<?= base_url('/products') ?>#sirtcantasi">Sırt Çantası</a></li>
						<li><a href="<?= base_url('/products') ?>#yelek">Yelek</a></li>
					</ul>
				</li>

				<li>
					<a href="<?= base_url('/cart') ?>" class="label1 rs1" data-label1="indirim">Sepetiniz</a>
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


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/siyahbeyaz-capraz.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Hakkımızda
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Biz Kimiz?
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Her şey bir iğne, bir parça kumaş ve büyük bir tutkuyla başladı. 35 yıl önce lise çağlarında filizlenen bu el emeği sevdası, hayatın tüm zorluklarına rağmen hiç sönmedi. İş hayatından ayrılmak zorunda kaldığında bile üretme tutkusu ona yol gösterdi; kurslarla, yeni tekniklerle kendini hep geliştirdi. Sağlık sorunları nedeniyle makine nakışına veda etse de, tesadüfen eline aldığı bir tığ, ona yepyeni bir dünyanın kapılarını açtı. O günden sonra tığ, onun en yakın yol arkadaşı oldu; her ilmekte sevgiyi ve sabrı yeniden dokudu.
						</p>
						<br>
						<p class="stext-113 cl6 p-b-26">
							Şimdi o hünerli eller; birbirinden zarif çantalar, yelekler, yumuşacık bebek kıyafetleri ve eşsiz aksesuarlar üretiyor. Bunlar sadece birer eşya değil; her biri anne şefkatiyle yoğrulmuş, sabırla işlenmiş sanat eserleri... Bizler, 'anne eli' değmiş bu ürünlerin sıcaklığını ve hikayesini sizlerle buluşturmak için buradayız. Çünkü inanıyoruz ki, sevgiyle örülen her parça, gittiği yere mutluluk götürür. Ve sevgi, paylaştıkça çoğalır. 🌿
							<br>
						<p class="stext-114 cl6 p-r-40 p-b-11">
							Bu sayfa, bize asla vazgeçmemeyi öğreten o güzel kadın, Annem için... İyi ki varsın. ❤️
						</p>
						<br>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/biz.webp" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Misyon & Vizyonumuz
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Her bir ilmeğin, sabrın ve emeğin bir hikâye anlattığına inanıyoruz. <br>
							Bizim amacımız; kadın emeğinin gücünü görünür kılmak, geleneksel el işçiliğini modern tasarımlarla buluşturup, el emeğinin değerini den hatırlatmaktır. İnsanlara “emekle yapılanın farkını” hissettirmeyi hedefliyoruz. <br> <br>
							Hayalimiz; el emeğini sevenleri bir araya getiren, üretmeyi yaşam biçimi haline getiren bir topluluk oluşturmak ve bu alanda ilham veren bir marka olmaktır.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11" style="font-size: 22px;">
								Dünyada her şey kadının eseridir.
							</p>

							<span class="stext-111 cl8" style="font-size: 18px;">
								- Gazi Mustafa Kemal ATATÜRK
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/bizkimiz.webp" alt="IMG">
						</div>
					</div>
				</div>
			</div>
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
							<a href="<?= base_url('/products') ?>#kol" class="stext-107 cl7 hov-cl1 trans-04">
								Kol Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?= base_url('/products') ?>#capraz" class="stext-107 cl7 hov-cl1 trans-04">
								Çapraz Çanta
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?= base_url('/products') ?>#elcantasi" class="stext-107 cl7 hov-cl1 trans-04">
								El Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?= base_url('/products') ?>#sirtcantasi" class="stext-107 cl7 hov-cl1 trans-04">
								Sırt Çantası
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?= base_url('/products') ?>#yelek" class="stext-107 cl7 hov-cl1 trans-04">
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

	<?= base_url('/sayilarla-merilyen') ?> class="btn-stats-floating">
		<i class="fa fa-bar-chart"></i>
		Sayılarla Merilyen
	</a>


	<!-- Sayfa Başına Dön Butonu -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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

</body>

</html>