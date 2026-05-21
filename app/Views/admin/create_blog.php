<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Admin | İçerik Yönetimi</title>
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />

    <style>
        body {
            background: #f7f2ff;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #717fe0;
            color: white;
            padding: 28px 18px;
        }

        .sidebar h3 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .content {
            padding: 32px;
        }

        .form-card {
            background: white;
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        }

        .preview-box {
            background: #faf8ff;
            border-radius: 18px;
            padding: 20px;
            height: 100%;
        }

        .preview-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 16px;
            background: #eee;
        }

        .btn-purple {
            background: #717fe0;
            border: none;
        }

        .btn-purple:hover {
            background: #5f6ed8;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 sidebar">
                <h3>Merilyen</h3>

                <a href="<?= base_url('/admin') ?>">Panel</a>
                <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
                <a href="<?= base_url('/admin/orders') ?>">Siparişler</a>
                <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
                <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
                <a href="<?= base_url('/admin/blogs') ?>" class="active">İçerik Yönetimi</a>
                <a href="<?= base_url('/products') ?>">Siteye Git</a>
                <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
            </div>

            <div class="col-md-9 col-lg-10 content">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Yeni İçerik Ekle</h2>
                    </div>

                    <a href="<?= base_url('/admin/blogs') ?>" class="btn btn-outline-secondary">
                        Geri Dön
                    </a>
                </div>

                <form action="<?= base_url('/admin/blogs/store') ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-lg-8 mb-4">
                            <div class="form-card">

                                <div class="mb-3">
                                    <label class="form-label">Başlık</label>
                                    <input type="text"
                                        name="title"
                                        id="titleInput"
                                        class="form-control"
                                        placeholder="Örn: Yeni Koleksiyon Yayında"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kısa Özet</label>
                                    <textarea name="summary"
                                        id="summaryInput"
                                        class="form-control"
                                        style="height:100px;"
                                        placeholder="Blog listesinde görünecek kısa açıklama..."
                                        required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Detay İçerik</label>
                                    <textarea name="content"
                                        id="contentInput"
                                        class="form-control"
                                        style="height:220px;"
                                        placeholder="Modal içinde görünecek detaylı metin..."
                                        required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Kategori</label>

                                        <select name="category"
                                            id="categoryInput"
                                            class="form-select"
                                            required>
                                            <option value="Duyuru">Duyuru</option>
                                            <option value="Ana Duyuru">Ana Duyuru</option>
                                            <option value="Blog">Blog</option>
                                        </select>

                                        <small class="text-muted">
                                            Ana Duyuru üst sliderda, Duyuru küçük sliderda, Blog ise içerik listesinde görünür.
                                        </small>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tarih</label>
                                        <input type="date"
                                            name="post_date"
                                            class="form-control"
                                            value="<?= date('Y-m-d') ?>"
                                            required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Durum</label>
                                        <select name="status" class="form-select">
                                            <option value="active">Aktif</option>
                                            <option value="passive">Pasif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Duyuru Görseli</label>
                                    <input type="file"
                                        name="image"
                                        id="imageInput"
                                        class="form-control"
                                        accept="image/*"
                                        required>
                                </div>

                                <button class="btn btn-primary px-5 btn-purple">
                                    Duyuruyu Kaydet
                                </button>

                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="preview-box">
                                <h5 class="mb-3">Canlı Önizleme</h5>

                                <img id="previewImage"
                                    src=""
                                    class="preview-img mb-3"
                                    style="display:none;">

                                <h4 id="previewTitle">
                                    Duyuru başlığı
                                </h4>

                                <p class="text-muted mb-2">
                                    <span id="previewCategory">Duyuru</span>
                                </p>

                                <p id="previewSummary">
                                    Kısa açıklama burada görünecek.
                                </p>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>

    <script>
        const titleInput = document.getElementById('titleInput');
        const summaryInput = document.getElementById('summaryInput');
        const categoryInput = document.getElementById('categoryInput');
        const imageInput = document.getElementById('imageInput');

        const previewTitle = document.getElementById('previewTitle');
        const previewSummary = document.getElementById('previewSummary');
        const previewCategory = document.getElementById('previewCategory');
        const previewImage = document.getElementById('previewImage');

        if (titleInput) {
            titleInput.addEventListener('input', function() {
                previewTitle.textContent = this.value || 'Duyuru başlığı';
            });
        }

        if (summaryInput) {
            summaryInput.addEventListener('input', function() {
                previewSummary.textContent = this.value || 'Kısa açıklama burada görünecek.';
            });
        }

        if (categoryInput) {
            categoryInput.addEventListener('change', function () {
                previewCategory.textContent = this.value || 'Duyuru';
            });
        }

        if (imageInput) {
            imageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                    previewImage.style.display = 'block';
                }
            });
        }
    </script>

</body>

</html>