# Merilyen E-Ticaret Sitesi

Merilyen E-Ticaret Sitesi, CodeIgniter 4 MVC frameworkü kullanılarak geliştirilmiş, içerik yönetim sistemine sahip web tabanlı bir alışveriş uygulamasıdır. Proje; el emeği örgü çanta, sırt çantası, çapraz çanta, el çantası ve yelek gibi butik ürünlerin çevrim içi ortamda tanıtılması, sepete eklenmesi, siparişe dönüştürülmesi, ödeme sürecinin yönetilmesi ve admin paneli üzerinden kontrol edilmesi amacıyla geliştirilmiştir.

Bu proje, Kocaeli Üniversitesi Teknoloji Fakültesi Bilişim Sistemleri Mühendisliği Bölümü 2025-2026 Bahar Dönemi TBL304 Web Programlama dersi kapsamında hazırlanmıştır.

---

## Proje Linkleri

GitHub Repository:

```text
https://github.com/iremkryl/Merilyen-E-Ticaret
```

Canlı Web Sitesi:

```text
https://merilyen.infinityfreeapp.com/
```

---

## Proje Konusu

Merilyen, el emeği ürünlerin satışına yönelik geliştirilmiş bir e-ticaret sistemidir. Sistemde iki temel kullanıcı rolü bulunmaktadır:

- **Admin**
- **User**

User rolündeki kullanıcılar sisteme kayıt olabilir, giriş yapabilir, ürünleri inceleyebilir, favori listesi oluşturabilir, sepete ürün ekleyebilir, kayıtlı adres seçerek sipariş verebilir ve sipariş durumunu takip edebilir.

Admin rolündeki kullanıcılar ise ürünleri, siparişleri, kullanıcıları, blog/duyuru içeriklerini ve iletişim mesajlarını yönetebilir. Ayrıca siparişleri onaylayabilir ve sipariş hazırlık sürecini aşama aşama ilerletebilir.

---

## Kullanılan Teknolojiler

- PHP
- CodeIgniter 4
- MySQL
- phpMyAdmin
- HTML5
- CSS3
- Bootstrap
- JavaScript
- jQuery
- AJAX / Fetch API
- Git & GitHub
- GitHub Actions
- InfinityFree
- FTP Deploy

---

## Demo Admin Bilgileri

```text
E-posta: admin@merilyen.com
Şifre: 112233
```

Demo user bilgisi README içinde paylaşılmamıştır. Kullanıcı hesabı sistem üzerinden kayıt olunarak oluşturulabilir.

---

## Veritabanı Bilgisi

Projede kullanılan veritabanı adı:

```text
merilyen_db
```

SQL yedeği proje içinde aşağıdaki klasörde bulunmaktadır:

```text
database/merilyen_db.sql
```

Veritabanı yedeğinde proje isterlerine uygun olacak şekilde örnek demo verileri bulunmaktadır:

- En az 1 admin kullanıcı
- En az 5 user kullanıcı
- En az 20 ürün

---

## Temel Özellikler

### Kullanıcı Özellikleri

- Kullanıcı kayıt sistemi
- Kullanıcı giriş/çıkış sistemi
- Şifre sıfırlama
- Profil bilgilerini görüntüleme
- Ad, soyad ve e-posta güncelleme
- Profil fotoğrafı güncelleme
- Şifre değiştirme
- Kullanıcı hesabını pasif hale getirme
- Kayıtlı adres ekleme
- Kayıtlı adres düzenleme
- Varsayılan adres seçme
- Ürünleri görüntüleme
- Ürünlerin detaylarını modal üzerinden inceleme
- Ürün görselini büyüterek görüntüleme
- Ürünleri favorilere ekleme/çıkarma
- Ürünleri sepete ekleme
- Sepette ürün adedini artırma/azaltma
- Sepetten ürün çıkarma
- Kupon kullanma
- Kayıtlı adres seçerek sipariş verme
- Kullanıcı bakiyesinden ödeme yapma
- Bakiye yetersizse kart ödeme simülasyonu ile kalan tutarı ödeme
- Sipariş durumunu takip etme
- Admin onayından önce siparişi iptal etme
- İptal edilen sipariş tutarını kullanıcı bakiyesine iade alma
- Teslim edilen sipariş için “Teslim Aldım” işlemini yapma

---

### Admin Özellikleri

- Admin paneline giriş
- Dashboard üzerinden sistem özetlerini görüntüleme
- Ürün ekleme
- Ürün düzenleme
- Ürün silme
- Ürün aktif/pasif durumunu yönetme
- Ürün stok bilgisini yönetme
- Ürün fiyatı ve açıklamasını güncelleme
- Ürün görseli yükleme/güncelleme
- Ürünleri öne çıkarma
- Siparişleri listeleme
- Sipariş detayını görüntüleme
- Sipariş ödeme/fatura bilgilerini görüntüleme
- Sipariş durumunu manuel olarak değiştirme
- Siparişi “İleri” butonu ile bir sonraki aşamaya taşıma
- Kullanıcıları listeleme
- Kullanıcı durumunu aktif/pasif/dondurulmuş yapma
- Kullanıcı silme
- Siparişi olan kullanıcıyı silmek yerine pasif hale getirme
- Admin hesabını silme/pasif yapma işlemlerine karşı koruma
- İletişim mesajlarını görüntüleme
- Blog, duyuru ve ana duyuru içeriklerini yönetme
- İçerik ekleme, düzenleme, silme ve aktif/pasif yapma

---

## İçerik Yönetimi

Projede içerikler üç ana kategoriye ayrılmıştır:

```text
Ana Duyuru
Duyuru
Blog
```

- **Ana Duyuru:** Anasayfanın üst kısmındaki büyük slider alanında gösterilir.
- **Duyuru:** Anasayfadaki küçük duyuru alanlarında ve duyuru listesinde kullanılır.
- **Blog:** Ürünler, örgü/çanta yapımı ve bilgilendirici içerikler için kullanılır.

Blog sayfasında sayfalama sistemi bulunmaktadır. Her sayfada sınırlı sayıda içerik gösterilir ve kullanıcılar sayfalar arasında geçiş yapabilir.

---

## Ürün Sistemi

Ürünler admin panelinden eklenir ve yönetilir. Her ürün için aşağıdaki bilgiler tutulur:

- Ürün adı
- Kategori
- Açıklama
- Fiyat
- Stok
- Durum
- Ürün görseli
- Öne çıkarılma durumu
- Oluşturulma tarihi

Ürünler sayfasında filtreleme ve sıralama özellikleri bulunmaktadır:

- Kategoriye göre filtreleme
- Fiyat aralığına göre filtreleme
- Stok durumuna göre filtreleme
- En yeni ürünlere göre sıralama
- En düşük fiyata göre sıralama
- En yüksek fiyata göre sıralama
- Stok çoktan aza sıralama
- Stok azdan çoğa sıralama

Filtreleme işlemleri veritabanı sorguları üzerinden yapılmaktadır. Böylece fiyat, stok ve tarih sıralamaları güvenilir şekilde çalışmaktadır.

---

## Favori ve Sepet Sistemi

Favori ve sepete ekleme işlemleri AJAX destekli olarak geliştirilmiştir. Kullanıcı bir ürünü favoriye veya sepete eklediğinde sayfa yenilenmez; ilgili sayaçlar anlık olarak güncellenir ve kullanıcıya bildirim gösterilir.

Sepet sayfasında:

- Ürün listesi görüntülenir.
- Ürün adedi artırılıp azaltılabilir.
- Ürün sepetten kaldırılabilir.
- Ürün ara toplamı hesaplanır.
- Kargo ücreti hesaplanır.
- Kupon indirimi uygulanır.
- Genel toplam hesaplanır.
- Kayıtlı teslimat adresi seçilir.
- Bakiye ve kart ödeme akışı çalıştırılır.

---

## Kupon Sistemi

Projede kullanılan kupon kodu:

```text
WEB
```

Bu kupon, ürün ara toplamı üzerinden %50 indirim sağlar. Kargo ücretine indirim uygulanmaz.

Örnek:

```text
Ürün Ara Toplamı: 1500 TL
WEB Kuponu: %50 indirim
Kupon İndirimi: 750 TL
Kargo Ücreti: 50 TL
Genel Toplam: 800 TL
```

Kupon kontrolü yalnızca ön yüzde değil, backend tarafında da yapılmaktadır. Böylece kullanıcı JavaScript tarafını değiştirse bile indirim hesabı sunucu tarafında güvenli şekilde doğrulanır.

---

## Bakiye ve Ödeme Sistemi

Projede kullanıcı bakiyesi bulunmaktadır. Sipariş oluşturulurken sistem önce kullanıcının mevcut bakiyesini kullanır.

Ödeme mantığı:

```text
1. Kullanıcının bakiyesi sipariş tutarını karşılıyorsa kart bilgisi istenmez.
2. Kullanıcının bakiyesi sipariş tutarını karşılamıyorsa kalan tutar için kart ödeme alanı açılır.
3. İptal edilen siparişlerin tutarı kredi kartına değil kullanıcı bakiyesine iade edilir.
4. Sonraki alışverişte önce kullanıcı bakiyesi harcanır.
```

Kart ödeme alanında doğrulama kontrolleri yapılmaktadır:

- Kart üzerindeki isim en az 3 karakter olmalıdır.
- Kart numarası 16 haneli olmalıdır.
- Kart numarası ekranda 4’lü gruplar halinde formatlanır.
- CVV 3 haneli olmalıdır.
- Son kullanma tarihi AA/YY formatında olmalıdır.
- Son kullanma tarihi mevcut aydan ileri olmalıdır.
- Veritabanında kart numarasının tamamı tutulmaz, yalnızca son 4 hanesi saklanır.

---

## Sipariş Süreci

Sipariş durumları aşağıdaki gibidir:

```text
pending       → Onay Bekliyor
approved      → Onaylandı
supplying     → Ürünler Tedarik Ediliyor
packing       → Ürünler Kutulanıyor
shipped       → Kargoya Verildi
on_the_way    → Size Doğru Yola Çıktı
distributing  → Dağıtımda
delivered     → Teslim Edildi
received      → Teslim Alındı
cancelled     → İptal Edildi
```

Sipariş süreci şu şekilde çalışır:

1. Kullanıcı ürünleri sepete ekler.
2. Sepette ürün adetlerini ve kupon bilgisini düzenler.
3. Kayıtlı teslimat adreslerinden birini seçer.
4. Sistem önce kullanıcı bakiyesini kullanır.
5. Bakiye yetmezse kalan tutar için kart bilgisi ister.
6. Sipariş `pending` durumunda oluşturulur.
7. Admin siparişi onaylar.
8. Admin siparişi “İleri” butonu ile hazırlık ve kargo aşamalarında ilerletir.
9. Sipariş `delivered` durumuna geldiğinde kullanıcı “Teslim Aldım” butonuna basar.
10. Sipariş `received` durumuna geçerek tamamlanır.

Kullanıcı, siparişini yalnızca admin onaylamadan önce iptal edebilir. Admin siparişi onayladıktan sonra kullanıcı siparişi iptal edemez.

---

## Hesap Pasifleştirme İş Kuralları

Kullanıcı kendi hesabını pasif hale getirebilir. Ancak sipariş durumuna göre iş kuralları uygulanır:

- Kullanıcının yalnızca onay bekleyen siparişleri varsa bu siparişler iptal edilir, tutar bakiyeye iade edilir ve hesap pasif hale getirilir.
- Kullanıcının onaylanmış veya devam eden siparişi varsa hesap pasif hale getirilemez.
- Admin, siparişi olan kullanıcıyı silmek istediğinde kullanıcı tamamen silinmez, pasif hale getirilir.
- Admin hesabı pasif hale getirilemez, dondurulamaz ve silinemez.

---

## Admin Sipariş Detayı

Admin sipariş detay sayfasında aşağıdaki bilgiler gösterilir:

- Müşteri adı soyadı
- Müşteri e-posta adresi
- Sipariş durumu
- Sipariş tarihi
- Teslimat adresi
- Ürün ara toplamı
- Kupon kodu
- Kupon indirimi
- Kargo ücreti
- Genel toplam
- Bakiyeden kullanılan tutar
- Karttan ödenen tutar
- Ödeme durumu
- Kart son 4 hane bilgisi
- Siparişteki ürünler

Bu yapı, adminin siparişleri faturalandırma ve kargo sürecine hazırlama işlemlerini takip etmesini sağlar.

---

## Sayılarla Merilyen

Projede “Sayılarla Merilyen” isimli istatistik sayfası bulunmaktadır. Bu sayfada sistemdeki bazı sayısal veriler özet olarak gösterilir:

- Toplam ürün sayısı
- Aktif ürün sayısı
- Öne çıkan ürün sayısı
- Kayıtlı kullanıcı sayısı
- Teslim edilen sipariş sayısı
- Toplam ciro
- Blog/duyuru içerikleri
- Favori sayısı

---

## Veritabanı Tabloları

Projede kullanılan temel tablolar:

```text
users
user_addresses
products
product_images
categories
orders
order_items
favorites
blog_posts
contact_messages
```

Temel tablo görevleri:

- `users`: Kullanıcı ve admin hesap bilgileri
- `user_addresses`: Kullanıcı teslimat adresleri
- `products`: Ürün bilgileri
- `product_images`: Ürün görselleri
- `categories`: Ürün kategorileri
- `orders`: Sipariş ana bilgileri
- `order_items`: Sipariş ürün kalemleri
- `favorites`: Kullanıcı favori ürünleri
- `blog_posts`: Blog, duyuru ve ana duyuru içerikleri
- `contact_messages`: İletişim formu mesajları

---

## Kurulum Adımları

### 1. Projeyi Klonlama

```bash
git clone https://github.com/iremkryl/Merilyen-E-Ticaret.git
cd Merilyen-E-Ticaret
```

### 2. Composer Bağımlılıklarını Kurma

```bash
composer install
```

### 3. Ortam Dosyasını Hazırlama

Proje ana dizinindeki `env` dosyası kopyalanarak `.env` dosyası oluşturulur.

Windows için:

```bash
copy env .env
```

Linux/Mac için:

```bash
cp env .env
```

`.env` dosyasında aşağıdaki alanlar düzenlenir:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = merilyen_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Veritabanını İçe Aktarma

phpMyAdmin üzerinden yeni bir veritabanı oluşturulur:

```text
merilyen_db
```

Daha sonra proje içindeki SQL dosyası içe aktarılır:

```text
database/merilyen_db.sql
```

### 5. Projeyi Çalıştırma

Terminalde proje klasöründeyken:

```bash
php spark serve
```

Tarayıcıdan şu adrese gidilir:

```text
http://localhost:8080
```

---

## Canlı Ortam ve Yayınlama Notu

Bu proje PHP, CodeIgniter 4, MySQL, session yönetimi ve veritabanı işlemleri kullanan dinamik bir web uygulamasıdır. Bu nedenle yalnızca statik HTML/CSS/JavaScript dosyalarını yayınlayan GitHub Pages üzerinde çalıştırılamaz.

Proje, PHP ve MySQL desteği sunan InfinityFree ücretsiz hosting ortamında canlıya alınmıştır.

Canlı web sitesi:

```text
https://merilyen.infinityfreeapp.com/
```

Canlı ortama aktarım için GitHub Actions kullanılmıştır. GitHub reposuna yapılan push işleminden sonra workflow çalışmakta, proje dosyaları hazırlanmakta ve FTP üzerinden InfinityFree sunucusundaki `htdocs` dizinine yüklenmektedir.

Canlı ortam için yapılan temel düzenlemeler:

- CodeIgniter `public` içeriği web kökü olacak şekilde yapılandırılmıştır.
- Uygulama dosyaları `ci` klasörü altında konumlandırılmıştır.
- `index.php` içindeki uygulama yolu canlı ortam yapısına göre güncellenmiştir.
- `.env` dosyasındaki `app.baseURL` ve veritabanı bağlantı bilgileri InfinityFree bilgilerine göre düzenlenmiştir.
- MySQL veritabanı phpMyAdmin üzerinden içe aktarılmıştır.

Yerel geliştirme ve test sürecinde proje aşağıdaki komutla çalıştırılmıştır:

```bash
php spark serve
```

Not: Canlı ortamda CodeIgniter yapısı InfinityFree `htdocs` dizinine uyum sağlayacak şekilde düzenlenmiştir. `public` içeriği web kökü olarak kullanılmış, `app`, `vendor` ve `writable` klasörleri `ci` klasörü altında konumlandırılmıştır.

---

## Proje Klasör Yapısı

```text
Merilyen-E-Ticaret
│
├── app
│   ├── Config
│   ├── Controllers
│   ├── Filters
│   ├── Models
│   └── Views
│
├── public
│   ├── css
│   ├── images
│   ├── js
│   └── vendor
│
├── writable
│   ├── cache
│   ├── logs
│   └── session
│
├── database
│   └── merilyen_db.sql
│
├── composer.json
├── composer.lock
├── spark
├── env
└── README.md
```

---

## Test Edilen Temel Senaryolar

Proje hem yerel ortamda hem de canlı ortamda test edilmiştir.

Test edilen temel işlemler:

- Kullanıcı kaydı
- Kullanıcı girişi
- Pasif kullanıcı giriş kontrolü
- Profil bilgisi güncelleme
- Adres ekleme ve varsayılan adres seçme
- Ürün listeleme
- Ürün filtreleme ve sıralama
- Ürün detay modalı
- Favoriye ekleme/çıkarma
- Sepete ürün ekleme
- Sepette adet güncelleme
- WEB kuponu uygulama
- Bakiye yeterliyken kart istemeden sipariş oluşturma
- Bakiye yetersizken kart ödeme alanını açma
- Kart bilgisi doğrulama
- Pending sipariş iptali
- Bakiye iadesi
- Admin ürün yönetimi
- Admin sipariş yönetimi
- Admin “İleri” butonu ile sipariş aşaması ilerletme
- Admin kullanıcı yönetimi
- Blog/duyuru içerik yönetimi
- Canlı ortamda menü ve kategori linkleri kontrolü

---

## Güvenlik ve Veri Saklama Notları

- Gerçek `.env` dosyası GitHub’a yüklenmemelidir.
- Veritabanı bağlantı bilgileri `.env` dosyasında tutulmalıdır.
- Kart numarasının tamamı veritabanında saklanmaz.
- Sadece kartın son 4 hanesi sipariş detayında gösterilmek üzere tutulur.
- Admin hesabı pasif hale getirilemez, dondurulamaz ve silinemez.
- Sipariş süreci başlamış kullanıcıların hesabı pasif hale getirilemez.
- Canlı ortam şifreleri GitHub Secrets içinde saklanmıştır.

---

## Proje Durumu

Proje kapsamında aşağıdaki ana modüller tamamlanmıştır:

- Kullanıcı kayıt/giriş sistemi
- Profil yönetimi
- Şifre sıfırlama
- Adres yönetimi
- Ürün yönetimi
- Ürün filtreleme ve sıralama
- Favori sistemi
- Sepet sistemi
- Kupon sistemi
- Bakiye sistemi
- Kart ödeme simülasyonu
- Sipariş oluşturma
- Sipariş iptali
- Bakiye iadesi
- Sipariş durum takibi
- Admin paneli
- Admin kullanıcı yönetimi
- Admin sipariş yönetimi
- Blog/duyuru/ana duyuru yönetimi
- İletişim mesajları
- Sayılarla Merilyen istatistik sayfası
- Responsive arayüz düzenlemeleri
- Canlı ortam deploy işlemi

---

## Geliştirici

```text
İrem Karayel
Bilişim Sistemleri Mühendisliği
Kocaeli Üniversitesi
```
