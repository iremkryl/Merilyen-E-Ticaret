-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 May 2026, 18:07:00
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `merilyen_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT 'Duyuru',
  `post_date` date NOT NULL,
  `status` enum('active','passive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `summary`, `content`, `image`, `category`, `post_date`, `status`, `created_at`) VALUES
(1, 'Merhaba Müşterilerimiz', 'Yeni kurulduk.', 'Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar Detaylar ', '1778743244_8074d7942cae84e846b4.webp', 'Duyuru', '2026-05-14', 'passive', '2026-05-14 10:20:44'),
(2, 'KUPON TANIMLANDI!', '2025-2026 Güz Dönemi Web Tasarım Dersi Öğrencilerine Özel Fırsat!', 'El emeğiyle örülmüş ürünler sizlerle buluşuyor! 2025-2026 Güz Dönemi Web Tasarım Dersini alan öğrencilere özel hazırladığımız bu fırsatta, her ürün özenle ve sevgiyle tasarlandı. Her parça tamamen benzersiz; günlük kullanımda hem şıklığınızı tamamlayacak hem de el emeğinin değerini hissettirecek.\r\n\r\nAlışveriş sırasında \"WEB\" kuponunu kullanarak bu fırsattan yararlanabilirsiniz. Kontenjan sınırlı, bu yüzden elinizi çabuk tutun! Her ürün, el emeği ile işlenmiş, özel bir tasarım olduğu için tarzınıza eşsiz bir dokunuş katacak. Küçük bir kupon ile büyük bir mutluluk kazanmak için bu fırsatı kaçırmayın!', '1778745056_e8df08fd41e36699091a.webp', 'Duyuru', '2025-12-07', 'active', '2026-05-14 10:50:56'),
(3, 'Yeni Yıl Geliyor!', 'Yılbaşı için özel tasarlanmış el emeği çantalar ve yelekler yakında sınırlı sayıda satışta olacak! Şimdiden bildirimlerini kurmayı unutma. Geri Sayım başladı! Şu gün satışa çıkacak: 9 Aralık 2025', 'Yılbaşı için özel tasarlanmış el emeği çantalar ve yelekler çok yakında sınırlı sayıda satışa sunulacak! Her bir ürün, özenle ve sevgiyle hazırlanmış benzersiz tasarımlardan oluşuyor. Bu özel koleksiyon, hem sevdiklerinize hediye edebileceğiniz hem de kendi stilinizi tamamlayabileceğiniz parçaları içeriyor.\r\n\r\nSatış günü 9 Aralık 2025 olarak belirlendi, bu yüzden şimdiden bildirimlerinizi kurmayı unutmayın ve geri sayımı takip edin! Sınırlı sayıda ürünler sunulacağı için hızlı davranmak çok önemli. Koleksiyonu keşfetmek, el emeğinin sıcaklığını hissetmek ve yeni yıl ruhunu yaşamak için hazır olun. Instagram üzerinden bizle iletişime geçerek, satış öncesi özel bilgi alabilir veya kişiye özel sipariş taleplerinizi iletebilirsiniz.', '1778745100_8b0d1c4eeda690712aa7.webp', 'Duyuru', '2025-12-01', 'active', '2026-05-14 10:51:40'),
(4, 'Yeni Ürün Duyurusu: YELEK Geldi!', 'Yeni yeleklerimiz stoklarda! Her biri el emeğiyle özenle hazırlanmış bu özel tasarımlar, stilinize eşsiz bir dokunuş katıyor. Şimdilik stoklarımız ve bedenlerimiz sınırlı, ancak çok yakında koleksiyonumuz yeni renkler ve modellerle genişleyecek. Kendinize ya da sevdiklerinize özel bir parça seçmek için şimdi göz atın!', 'Yeni sezon el emeği yeleklerimiz mağazamızda sizleri bekliyor! Her yelek, özenle örülmüş, benzersiz ve tamamen el emeği bir tasarım. Şimdilik stok ve çeşitler sınırlı olsa da çok yakında koleksiyonumuzu yeni renkler ve modellerle genişleteceğiz.\r\n\r\nBu süreçte, Instagram hesabımız üzerinden bizimle iletişime geçerek kişiye özel sipariş de verebilirsiniz. İster beden, ister renk tercihiniz olsun, yeleğinizi sizin için özel olarak hazırlayabiliriz. El emeğinin sıcaklığını ve eşsiz tasarımları keşfetmek için şimdi koleksiyonumuza göz atın ve kendi tarzınızı tamamlayın!', '1778745130_c9d8ebb9a09bbd5eb585.webp', 'Duyuru', '2025-11-26', 'active', '2026-05-14 10:52:10'),
(5, 'BLACK FRİDAY! 11.11 Kapıda!', '11.11 ve Black Friday fırsatları başladı! El emeği çantalar, yelekler ve aksesuarlar sınırlı süreli indirimlerle seni bekliyor. Kaçırma!', 'Alışverişin en heyecanlı zamanı geldi! 11.11 ve Black Friday indirimleri kapsamında el emeği çantalar, yelekler ve aksesuarlarımız özel fiyatlarla sizlerle. Her parça, özenle hazırlanmış ve benzersiz tasarımlardan oluşuyor.\r\n\r\nStoklar sınırlı, bu yüzden fırsatları kaçırmamak için erken davranmak önemli. İster kendiniz için, ister sevdiklerinize hediye olarak seçebileceğiniz ürünler bu özel indirimlerle çok daha cazip. Hem el emeğinin değerini yaşayın, hem de stilinizi uygun fiyatlarla tamamlayın!', '1778745160_c4b15ad0465d52dd48de.webp', 'Duyuru', '2025-11-04', 'active', '2026-05-14 10:52:40'),
(6, '2025\'e Özel 2500₺ Üzeri Kargo Ücretsiz!', '2025’in son gününe kadar 2.500 ₺ ve üzeri alışverişlerde kargo bedava! Kaçırmayın!', '2025’in son gününe kadar 2.500 ₺ ve üzeri alışverişlerde kargo bedava! Kaçırmayın!', '1778745210_02ff2aa243f5fbdc4034.webp', 'Duyuru', '2025-11-02', 'active', '2026-05-14 10:53:30'),
(7, 'İnstagram Hesabımız Açıldı!', 'Yeni yeleklerimiz stoklarda! Her biri el emeğiyle özenle hazırlanmış bu özel tasarımlar, stilinize eşsiz bir dokunuş katıyor. Şimdilik stoklarımız ve bedenlerimiz sınırlı, ancak çok yakında koleksiyonumuz yeni renkler ve modellerle genişleyecek. Kendinize ya da sevdiklerinize özel bir parça seçmek için şimdi göz atın!', 'Yeni yeleklerimiz stoklarda! Her biri el emeğiyle özenle hazırlanmış bu özel tasarımlar, stilinize eşsiz bir dokunuş katıyor. Şimdilik stoklarımız ve bedenlerimiz sınırlı, ancak çok yakında koleksiyonumuz yeni renkler ve modellerle genişleyecek. Kendinize ya da sevdiklerinize özel bir parça seçmek için şimdi göz atın!', '1778745273_ac7499f5f66689b7d905.webp', 'Duyuru', '2025-10-15', 'active', '2026-05-14 10:54:33'),
(8, 'El emeği çantalarımızın yolculuğunu keşfedin!', 'Her çanta sadece bir ürün değil, el emeğinin ve sabrın hikayesini taşıyan bir sanat eseri. Siz sahip olduğunuzda, bu özel yolculuğun bir parçası olmuş oluyorsunuz. Her adımda sevgi ve özen saklı…', 'Her çantamız, büyük bir sevgi ve titizlikle hazırlanıyor. Önce toptancılardan özenle seçilmiş ipler ve aksesuarlar temin ediliyor. Astar için uygun kumaşlar özenle seçiliyor ve çantanın temeli hazırlanıyor.\r\n\r\n\r\nSonrasında, çantalar tek tek örülüyor, astar ile birleştiriliyor ve seçilen aksesuarlar özenle takılıyor. Her parça tamamlandıktan sonra, satış için özenle fotoğraflanıyor ve vitrinimizde yerini alıyor. Satıldığında ise paketlenip kargo ile sahibine ulaşıyor.\r\n\r\n\r\nHer çanta sadece bir ürün değil, el emeğinin ve sabrın hikayesini taşıyan bir sanat eseri. Siz sahip olduğunuzda, bu özel yolculuğun bir parçası olmuş oluyorsunuz. Her adımda sevgi ve özen saklı…', '1778745325_5bb826de9da0c7052289.webp', 'Duyuru', '2025-08-23', 'active', '2026-05-14 10:55:25'),
(9, 'Aramıza Hoşgeldiniz', 'Merhabalar,', 'HOŞGELDİN', '1778883383_ceb6983bf11f1e574f89.png', 'Duyuru', '2026-05-15', 'passive', '2026-05-16 01:16:23'),
(10, 'AÇILDIK!', 'Bizi takip et!', 'Bizi takip etmeyi unutmamalısın!', '1779204684_0e5d4f879b6e9ab2c794.png', 'Duyuru', '2026-05-19', 'passive', '2026-05-19 18:31:24'),
(11, 'Atölyemizde Buluşalım: \"El Emeği\" Günü!', 'Sizleri, ürünlerimizin can bulduğu kalbimize, atölyemize davet ediyoruz. Birlikte örelim, sohbet edelim ve zanaatın sıcaklığını paylaşalım. Yerler sınırlıdır, hemen yerinizi ayırtın!', 'Sevgili Merilyen Ailesi,\r\n\r\nZanaatın ve paylaşımın sıcaklığını en derinden hissetmek için sizi, ürünlerimizin her ilmeğinin, her dikişinin atıldığı kalbimize, atölyemize davet ediyoruz.\r\n\r\n\"El Emeği Günü\" kapsamında, hem markamızın arkasındaki kadınları tanıma şansı bulacak, hem de kendi \"göz nuru\" projenizi başlatabileceksiniz.\r\n\r\nEtkinlik Detayları:\r\n\r\nTarih: 1 Haziran 2026\r\n\r\nSaat: 13.00\r\n\r\nYer: Merilyen Atölyesi\r\n\r\nEtkinlik Akışı:\r\n\r\n* Hoş Geldiniz Çayı ve Hikayemiz: Atölyemizi gezerken, markamızın ilham verici hikayesini ve geleneksel zanaatları koruma misyonumuzu birinci ağızdan dinleyin.\r\n\r\n* Temel Örgü Teknikleri Atölyesi: İster yeni başlıyor olun ister tekniklerinizi geliştirmek isteyin, uzman ekibimizle birlikte küçük bir proje üzerinde çalışın. (Tığ ve temel iplikler tarafımızca sağlanacaktır.)\r\n\r\n* Yeni Koleksiyon Ön İzlemesi: Yaklaşan koleksiyonumuzun en yeni \"yeleklerini\" ve \"çantalarını\" herkesten önce görün ve deneyin.\r\n\r\n* Sohbet ve İkramlar: Sıcak çayımız ve ev yapımı kurabiyelerimiz eşliğinde, aynı tutkuyu paylaşan yeni insanlarla tanışın.\r\n\r\nLütfen Unutmayın:\r\n\r\nAtölye alanımız sınırlı olduğundan, bu buluşma için sadece [Sayı] kişilik kontenjanımız bulunmaktadır. Lütfen Instagram (@hulyaorguevi_) üzerinden doğrudan mesaj göndererek yerinizi ayırtın.\r\n\r\nBirlikte örmek ve paylaşmak için sabırsızlanıyoruz!\r\n\r\nMerilyen Ekibi', '1779379527_b2fe25b9ad9ca8502445.png', 'Duyuru', '2026-05-21', 'active', '2026-05-21 19:05:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('active','passive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Kol Çantası', 'active'),
(2, 'Çapraz Çanta', 'active'),
(3, 'El Çantası', 'active'),
(4, 'Sırt Çantası', 'active'),
(5, 'Yelek', 'active');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `is_read`) VALUES
(1, NULL, 'deneme@deneme.com', 'Merhaba, toplu sipariş için mail üzerinden iletişime geçebilir misiniz?', '2026-05-13 20:50:14', 1),
(2, NULL, 'deneme2@deneme.com', 'Merhabalar, geri dönüşünüzü bekliyorum...', '2026-05-13 21:09:37', 1),
(3, NULL, 'meva@gmail.com', 'Bana ulaşır mısınız?', '2026-05-15 22:11:32', 0),
(4, NULL, 'ceyda@gmail.com', 'Özel sipariş için iletişime geçebilir misiniz?', '2026-05-20 09:42:58', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(2, 3, 22, '2026-05-12 21:23:08'),
(5, 3, 19, '2026-05-12 21:26:19'),
(6, 3, 20, '2026-05-12 21:41:38'),
(11, 1, 10, '2026-05-12 23:00:30'),
(15, 4, 19, '2026-05-15 22:12:44'),
(16, 4, 14, '2026-05-19 14:53:18'),
(19, 1, 6, '2026-05-19 16:04:31'),
(20, 1, 3, '2026-05-19 16:04:33'),
(21, 5, 20, '2026-05-20 10:13:59'),
(22, 5, 19, '2026-05-20 10:14:01'),
(24, 1, 20, '2026-05-20 20:53:11'),
(25, 5, 18, '2026-05-20 20:56:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `used_balance` decimal(10,2) DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','approved','supplying','packing','shipped','on_the_way','distributing','delivered','received','cancelled') DEFAULT 'pending',
  `shipping_address` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_status` varchar(50) DEFAULT 'paid',
  `card_last4` varchar(4) DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `used_balance`, `paid_amount`, `status`, `shipping_address`, `created_at`, `payment_status`, `card_last4`, `coupon_code`, `discount_amount`) VALUES
(1, 6, 1400.00, 0.00, 1400.00, 'received', 'Ad Soyad: Ömer\r\nTelefon: 1234\r\nİl: Mersin\r\nİlçe: İçel\r\nAdres: Mersin\r\nNot: Teşekkürler :)\r\nÜrün Ara Toplamı: 1,350.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 1,400.00 TL', '2026-05-12 19:45:43', 'paid', '3456', NULL, 0.00),
(2, 3, 51.00, 0.00, 51.00, 'delivered', 'Ad Soyad: Gizem Karayel\r\nTelefon: 1234\r\nİl: İstanbul\r\nİlçe: Kartal\r\nAdres: Karlıktepe\r\nNot: \r\nÜrün Ara Toplamı: 1.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 51.00 TL', '2026-05-12 22:22:10', 'paid', '3456', NULL, 0.00),
(3, 5, 1550.00, 0.00, 1550.00, 'distributing', 'Ad Soyad: Ceyda\r\nTelefon: Kırımtay\r\nİl: İstanbul\r\nİlçe: Pendik\r\nAdres: no12\r\nNot: \r\nÜrün Ara Toplamı: 1,500.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 1,550.00 TL', '2026-05-13 02:43:27', 'paid', '3456', NULL, 0.00),
(4, 4, 1550.00, 0.00, 1550.00, 'on_the_way', 'Ad Soyad: Meva Şener\r\nTelefon: 123456789\r\nİl: Ankara\r\nİlçe: Çankaya\r\nAdres: ODTÜ\r\nNot: :)\r\nÜrün Ara Toplamı: 1,500.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 1,550.00 TL', '2026-05-16 01:14:25', 'paid', '3456', NULL, 0.00),
(5, 4, 700.00, 0.00, 700.00, 'shipped', 'Ad Soyad: Meva Şener\r\nTelefon: 123456789\r\nİl: Ankara\r\nİlçe: Çankaya\r\nAdres: ODTÜ\r\nNot: Hediye paketi lütfen.\r\nÜrün Ara Toplamı: 650.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 700.00 TL', '2026-05-19 17:46:18', 'paid', '3456', NULL, 0.00),
(6, 4, 650.00, 0.00, 650.00, 'delivered', 'Adres Başlığı: Yurt\r\nAd Soyad: Meva Şener\r\nTelefon: 123456789\r\nİl: Ankara\r\nİlçe: Çankaya\r\nAdres: ODTÜ\r\nKargo Notu: -\r\nÜrün Ara Toplamı: 600.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 650.00 TL', '2026-05-19 20:14:16', 'paid', '3456', NULL, 0.00),
(7, 4, 650.00, 0.00, 650.00, 'received', 'Adres Başlığı: Yurt\r\nAd Soyad: Meva Şener\r\nTelefon: 123456789\r\nİl: Ankara\r\nİlçe: Çankaya\r\nAdres: ODTÜ\r\nKargo Notu: -\r\nÜrün Ara Toplamı: 600.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 50.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 650.00 TL', '2026-05-19 20:37:01', 'paid', '3456', NULL, 0.00),
(8, 3, 2800.00, 0.00, 2800.00, 'cancelled', 'Adres Başlığı: Ev\r\nAd Soyad: Gizem Karayel\r\nTelefon: 05123456789\r\nİl: İstanbul\r\nİlçe: Kartal\r\nAdres: Karlıktepe mah.\r\nKargo Notu: -\r\nÜrün Ara Toplamı: 2,800.00 TL\r\nKupon Kodu: -\r\nKupon İndirimi: 0.00 TL\r\nKargo Ücreti: 0.00 TL\r\nBakiyeden Kullanılan: 0.00 TL\r\nKarttan Ödenen: 2,800.00 TL', '2026-05-19 20:55:52', 'refunded_to_balance', '3456', NULL, 0.00),
(9, 4, 550.00, 550.00, 0.00, 'approved', 'Adres Başlığı: Yurt\nAd Soyad: Meva Şener\nTelefon: 123456789\nİl: Ankara\nİlçe: Çankaya\nAdres: ODTÜ\nKargo Notu: -\nÜrün Ara Toplamı: 1,000.00 TL\nKupon Kodu: web\nKupon İndirimi: 500.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 550.00 TL\nKarttan Ödenen: 0.00 TL', '2026-05-19 22:09:56', 'paid', NULL, 'web', 500.00),
(10, 5, 1050.00, 0.00, 1050.00, 'packing', 'Adres Başlığı: Okul\nAd Soyad: Ceyda Kırımtay\nTelefon: 05111111111\nİl: İstanbul\nİlçe: Pendik\nAdres: Yeditepe Üniversitesi\nKargo Notu: -\nÜrün Ara Toplamı: 1,000.00 TL\nKupon Kodu: -\nKupon İndirimi: 0.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 0.00 TL\nKarttan Ödenen: 1,050.00 TL', '2026-05-20 13:16:16', 'paid', '3456', NULL, 0.00),
(11, 5, 800.00, 0.00, 800.00, 'approved', 'Adres Başlığı: Okul\nAd Soyad: Ceyda Kırımtay\nTelefon: 05111111111\nİl: İstanbul\nİlçe: Pendik\nAdres: Yeditepe Üniversitesi\nKargo Notu: Hediye paketi lütfen.\nÜrün Ara Toplamı: 1,500.00 TL\nKupon Kodu: web\nKupon İndirimi: 750.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 0.00 TL\nKarttan Ödenen: 800.00 TL', '2026-05-21 00:02:05', 'paid', '3456', 'web', 750.00),
(12, 1, 2050.00, 2050.00, 0.00, 'pending', 'Adres Başlığı: Ev\nAd Soyad: Admin\nTelefon: 05111111111\nİl: İstanbul\nİlçe: Kartal\nAdres: no12\nKargo Notu: -\nÜrün Ara Toplamı: 2,000.00 TL\nKupon Kodu: -\nKupon İndirimi: 0.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 2,050.00 TL\nKarttan Ödenen: 0.00 TL', '2026-05-21 00:12:17', 'paid', NULL, NULL, 0.00),
(13, 7, 53.00, 0.00, 53.00, 'cancelled', 'Adres Başlığı: pasif\nAd Soyad: pasif\nTelefon: 05111111111\nİl: İstanbul\nİlçe: Kartal\nAdres: pasif\nKargo Notu: -\nÜrün Ara Toplamı: 3.00 TL\nKupon Kodu: -\nKupon İndirimi: 0.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 0.00 TL\nKarttan Ödenen: 53.00 TL', '2026-05-21 01:37:27', 'refunded_to_balance', '3456', NULL, 0.00),
(14, 5, 1400.00, 0.00, 1400.00, 'pending', 'Adres Başlığı: İş\nAd Soyad: Ceyda Kırımtay\nTelefon: 05123456789\nİl: İstanbul\nİlçe: Kartal\nAdres: Pendik\nKargo Notu: -\nÜrün Ara Toplamı: 1,350.00 TL\nKupon Kodu: -\nKupon İndirimi: 0.00 TL\nKargo Ücreti: 50.00 TL\nBakiyeden Kullanılan: 0.00 TL\nKarttan Ödenen: 1,400.00 TL', '2026-05-21 18:31:47', 'paid', '6543', NULL, 0.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 19, 1, 350.00),
(2, 1, 18, 1, 1000.00),
(3, 2, 22, 1, 1.00),
(4, 3, 10, 1, 1500.00),
(5, 4, 10, 1, 1500.00),
(6, 5, 20, 1, 650.00),
(7, 6, 16, 1, 600.00),
(8, 7, 4, 1, 600.00),
(9, 8, 2, 2, 400.00),
(10, 8, 8, 2, 1000.00),
(11, 9, 11, 1, 1000.00),
(12, 10, 18, 1, 1000.00),
(13, 11, 10, 1, 1500.00),
(14, 12, 10, 1, 2000.00),
(15, 13, 23, 1, 3.00),
(16, 14, 19, 2, 350.00),
(17, 14, 20, 1, 650.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','passive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `image`, `status`, `created_at`, `is_featured`) VALUES
(1, 1, 'Renkli Kol Çantası', 'Çok renkli kol çantası, günlük kullanım için idealdir.', 500.00, 3, 'renkli-kol.webp', 'passive', '2026-05-03 17:04:53', 0),
(2, 1, 'Beyaz Kol Çantası', 'Düz beyaz kol çantası, günlük kullanım için idealdir. Popcorn modeldir.', 400.00, 8, 'beyaz-kol.webp', 'active', '2026-04-20 01:47:50', 0),
(3, 3, 'Kahverengi El Çantası', 'Kahverengi el çantası, günlük kullanım için idealdir.', 400.00, 7, 'kahverengi-el.webp', 'active', '2026-04-24 15:43:09', 0),
(4, 1, 'Mavi Beyaz Kol Çantası', 'Çift renkli şık kol çantası, günlük kullanım için idealdir. Supla ip kullanılmıştır.', 600.00, 6, 'mavi-beyaz-kol.webp', 'active', '2026-05-09 09:47:45', 0),
(5, 2, 'Mavi Çapraz Çanta', 'Mavi şık çapraz çanta, günlük kullanım için idealdir. Supla ip kullanılmıştır.', 600.00, 9, 'mavi-capraz.webp', 'active', '2026-05-17 11:57:15', 0),
(6, 5, 'Lacivert Beyaz Yelek', 'Koyu mavi ve beyaz şık yeleğimiz, günlük kullanım için idealdir.', 1000.00, 5, 'lacivert-yelek.webp', 'active', '2026-05-06 10:16:19', 0),
(7, 1, 'Renkli Motifli Kol Çantası', 'Renkli motifli kol çantası, günlük kullanım için idealdir.', 650.00, 10, 'renkli-kol-motifli.webp', 'active', '2026-04-28 06:53:14', 0),
(8, 5, 'Gri Yelek', 'Gri uzun şık yeleğimiz, günlük kullanım için idealdir.', 1000.00, 4, 'gri-yelek.webp', 'active', '2026-05-01 05:42:52', 0),
(9, 1, 'Gri Kol Çantası', 'Gri uzun şık çantamız, günlük kullanım için idealdir.', 800.00, 5, 'gri-kol.webp', 'active', '2026-05-14 13:53:52', 0),
(10, 4, 'Taba Rengi Sırt Çantası', 'Taba rengi sırt çantamız, günlük kullanım için idealdir. Tığ örgüsü ile yapılmış, askısı çıtçıtı ve iç astarı mevcuttur.', 2000.00, 2, 'kiremit-sirt.webp', 'active', '2026-04-26 11:56:05', 1),
(11, 5, 'Siyah Motifli Yelek', 'Siyah yeleğimiz, günlük kullanım için idealdir. Renkli motiflerden oluşmaktadır.', 1000.00, 3, 'siyah-yelek.webp', 'active', '2026-05-09 20:58:59', 0),
(12, 3, 'Krem Bordo El Çantası', 'El çantamız günlük kullanım için idealdir. İki renkten oluşmaktadır. Çift katmanlı örgü şekli çalışıldığından kullanılan iplik sayısı fazladır.', 1200.00, 5, 'krem-bordo-el.webp', 'active', '2026-04-27 18:34:29', 0),
(13, 3, 'Renkli El Çantası', 'El çantamız günlük kullanım için idealdir. Renkli iplerden oluşmaktadır.', 300.00, 10, 'renkli-el.webp', 'active', '2026-05-17 11:22:48', 0),
(14, 1, 'Yeşil Beyaz Kol Çantası', 'Şık kol çantamız günlük kullanım için idealdir.', 700.00, 6, 'yeşil-beyaz-kol.webp', 'active', '2026-05-01 16:21:10', 1),
(15, 2, 'Kahverengi Çapraz Çanta', 'Çapraz çantamız günlük kullanım için idealdir. Koyu ve açık kahverengi ipliklerle çalışılmıştır.', 600.00, 5, 'kahverengi-çapraz.webp', 'active', '2026-04-21 07:35:21', 0),
(16, 1, 'Renkli Kol Çantası', 'Kol çantamız günlük kullanım için idealdir. Çok renkli ipliklerle çalışılmıştır.', 600.00, 6, 'renkli-kolcanta.webp', 'active', '2026-04-27 12:19:22', 0),
(17, 2, 'Sarı Çapraz Çanta', 'Çapraz çantamız günlük kullanım için idealdir.', 550.00, 8, 'sari-capraz.webp', 'active', '2026-05-07 13:08:20', 0),
(18, 5, 'Renkli Yelek', 'Beyaz ve renkli yeleğimiz günlük kullanım için idealdir.', 1000.00, 3, 'renkli-yelek.webp', 'active', '2026-05-13 10:02:15', 0),
(19, 3, 'Mavi El Çantası', 'El çantamız günlük kullanım için idealdir.', 350.00, 6, 'mavi-el.webp', 'active', '2026-05-06 15:46:09', 0),
(20, 1, 'Renkli Kol Çantası', 'Kol çantamız günlük kullanım için idealdir. Çok renkli ipliklerle çalışılmıştır.', 650.00, 4, 'renkli-kol-canta.webp', 'active', '2026-05-03 08:35:03', 1),
(22, 5, 'deneme', 'deneme', 1.00, -2, '1778454893_bb080a6ca293d1741336.png', 'active', '2026-04-28 12:28:57', 0),
(23, 1, 'deneme 2', 'deneme', 3.00, 1, '1779316458_904f32f3515257f65ebb.png', 'passive', '2026-05-21 01:34:18', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'renkli-kol.webp'),
(2, 2, 'beyaz-kol.webp'),
(3, 3, 'kahverengi-el.webp'),
(4, 4, 'mavi-beyaz-kol.webp'),
(5, 5, 'mavi-capraz.webp'),
(6, 6, 'lacivert-yelek.webp'),
(7, 7, 'renkli-kol-motifli.webp'),
(8, 8, 'gri-yelek.webp'),
(9, 9, 'gri-kol.webp'),
(10, 10, 'kiremit-sirt.webp'),
(11, 11, 'siyah-yelek.webp'),
(12, 12, 'krem-bordo-el.webp'),
(13, 13, 'renkli-el.webp'),
(14, 14, 'yeşil-beyaz-kol.webp'),
(15, 15, 'kahverengi-çapraz.webp'),
(16, 16, 'renkli-kolcanta.webp'),
(17, 17, 'sari-capraz.webp'),
(18, 18, 'renkli-yelek.webp'),
(19, 19, 'mavi-el.webp'),
(20, 20, 'renkli-kol-canta.webp'),
(21, 22, '1778454893_bb080a6ca293d1741336.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `status` enum('active','passive','frozen') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`, `phone`, `address`, `balance`, `status`, `created_at`, `profile_image`) VALUES
(1, 'Admin', 'Admin', 'admin@merilyen.com', '$2y$10$p2GMENMmncNimduQre8SJ.547szpmpvgS58Xq/sG7ZZIEF2UbaZWu', 'admin', NULL, NULL, 2950.00, 'active', '2026-05-11 00:19:57', NULL),
(2, 'İrem', 'Karayel', 'iremkarayel.ik@gmail.com', '$2y$10$SZKIhuJxBbU9PO04PmZlWO7giR7YWqL0MYz1jzyLsd9ljY8rYCzQS', 'user', '05068745300', 'İstanbul', 0.00, 'active', '2026-05-11 00:36:40', NULL),
(3, 'Gizem', 'Karayel', 'gizemkryl@merilyen.com', '$2y$10$qDOGKY6LbhfctFGIuwxfceGfWryu0BO1V/ug6AfurtryNtsxnyUBK', 'user', '05351234567', 'İstanbul', 2800.00, 'active', '2026-05-12 21:33:46', NULL),
(4, 'Meva', 'Şener', 'meva@gmail.com', '$2y$10$IRL0A0UGy.BO8ZrgGcWuFezh0LtdHNJij1oYt8gOrwLhSWD42pp56', 'user', '123456789', 'ODTÜ Ankara', 100.00, 'active', '2026-05-16 01:12:29', NULL),
(5, 'Ceyda', 'Kırımtay', 'ceyda@gmail.com', '$2y$10$bDV4dRcwZ.8Eyy14fcBX3eLVqdViXGnINbzOFOKnH294xQqN55Y36', 'user', '05987654321', 'İstanbul', 0.00, 'active', '2026-05-19 21:09:16', NULL),
(6, 'Ömer', 'Avşar', 'omer@gmail.com', '$2y$10$mH/S/9dSPWLpe1xR3nfow.WdeTN4YfXG3D8dsKP5W9nWBMK5zT3nq', 'user', '05112223344', 'Mersin', 0.00, 'active', '2026-05-21 00:06:14', NULL),
(7, 'Pasif', 'Kullanıcı', 'pasif@gmail.com', '$2y$10$od2fFaybCEP38oXcm2.y7OdrKKNPxU8KY.QJ53i6ZOZZfWON5KTly', 'user', '05012345678', 'Pasif', 0.00, 'passive', '2026-05-21 01:33:06', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `full_address` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `title`, `full_name`, `phone`, `city`, `district`, `full_address`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 4, 'Yurt', 'Meva Şener', '123456789', 'Ankara', 'Çankaya', 'ODTÜ', 1, '2026-05-19 17:12:02', '2026-05-19 17:16:58'),
(2, 3, 'Ev', 'Gizem Karayel', '05123456789', 'İstanbul', 'Kartal', 'Karlıktepe mah.', 1, '2026-05-19 17:54:48', '2026-05-19 17:54:48'),
(3, 5, 'Okul', 'Ceyda Kırımtay', '05111111111', 'İstanbul', 'Pendik', 'Yeditepe Üniversitesi', 1, '2026-05-20 10:14:54', '2026-05-20 10:14:54'),
(4, 1, 'Ev', 'Admin', '05111111111', 'İstanbul', 'Kartal', 'no12', 1, '2026-05-20 21:12:08', '2026-05-20 21:12:08'),
(5, 7, 'pasif', 'pasif', '05111111111', 'İstanbul', 'Kartal', 'pasif', 0, '2026-05-20 22:36:58', '2026-05-20 22:36:58'),
(6, 5, 'İş', 'Ceyda Kırımtay', '05123456789', 'İstanbul', 'Kartal', 'Pendik', 0, '2026-05-21 15:29:04', '2026-05-21 15:29:04');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Tablo kısıtlamaları `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
