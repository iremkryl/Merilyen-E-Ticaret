<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin | İçerik Yönetimi</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        body { background:#f7f2ff; font-family:Arial,sans-serif; }
        .sidebar { min-height:100vh; background:#717fe0; color:white; padding:28px 18px; }
        .sidebar h3 { font-weight:bold; margin-bottom:30px; }
        .sidebar a { display:block; color:white; text-decoration:none; padding:12px 14px; border-radius:10px; margin-bottom:8px; font-size:15px; }
        .sidebar a:hover, .sidebar a.active { background:rgba(255,255,255,0.2); }
        .content { padding:32px; }
        .form-card { background:white; border-radius:22px; padding:32px; box-shadow:0 12px 35px rgba(0,0,0,0.08); }
        .preview-box { background:#faf8ff; border-radius:18px; padding:20px; height:100%; }
        .preview-img { width:100%; height:240px; object-fit:cover; border-radius:16px; background:#eee; }
        .btn-purple { background:#717fe0; border:none; }
        .btn-purple:hover { background:#5f6ed8; }
    </style>
</head>

<body>

<?php $post = $post ?? []; ?>

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
                    <h2 class="fw-bold mb-1">Duyuru Düzenle</h2>
                    <p class="text-muted mb-0">
                        Mevcut duyurunun başlık, içerik, görsel ve durum bilgisini güncelleyebilirsiniz.
                    </p>
                </div>

                <a href="<?= base_url('/admin/blogs') ?>" class="btn btn-outline-secondary">
                    Duyurulara Dön
                </a>
            </div>

            <form action="<?= base_url('/admin/blogs/update/' . ($post['id'] ?? 0)) ?>"
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
                                       value="<?= esc((string)($post['title'] ?? '')) ?>"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kısa Özet</label>
                                <textarea name="summary"
                                          id="summaryInput"
                                          class="form-control"
                                          style="height:100px;"
                                          required><?= esc((string)($post['summary'] ?? '')) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Detay İçerik</label>
                                <textarea name="content"
                                          id="contentInput"
                                          class="form-control"
                                          style="height:220px;"
                                          required><?= esc((string)($post['content'] ?? '')) ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Kategori</label>

                                    <select name="category"
                                            id="categoryInput"
                                            class="form-select"
                                            required>
                                        <option value="Duyuru" <?= ($post['category'] ?? 'Duyuru') === 'Duyuru' ? 'selected' : '' ?>>
                                            Duyuru
                                        </option>

                                        <option value="Ana Duyuru" <?= ($post['category'] ?? '') === 'Ana Duyuru' ? 'selected' : '' ?>>
                                            Ana Duyuru
                                        </option>

                                        <option value="Blog" <?= ($post['category'] ?? '') === 'Blog' ? 'selected' : '' ?>>
                                            Blog
                                        </option>
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
                                           value="<?= esc((string)($post['post_date'] ?? date('Y-m-d'))) ?>"
                                           required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Durum</label>
                                    <select name="status" class="form-select">
                                        <option value="active" <?= ($post['status'] ?? '') === 'active' ? 'selected' : '' ?>>
                                            Aktif
                                        </option>

                                        <option value="passive" <?= ($post['status'] ?? '') === 'passive' ? 'selected' : '' ?>>
                                            Pasif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Yeni Görsel</label>
                                <input type="file"
                                       name="image"
                                       id="imageInput"
                                       class="form-control"
                                       accept="image/*">

                                <small class="text-muted">
                                    Yeni görsel seçmezseniz mevcut görsel korunur.
                                </small>
                            </div>

                            <button class="btn btn-primary px-5 btn-purple">
                                Güncelle
                            </button>

                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="preview-box">
                            <h5 class="mb-3">Canlı Önizleme</h5>

                            <?php if(!empty($post['image'])): ?>
                                <img id="previewImage"
                                     src="<?= base_url('images/' . $post['image']) ?>"
                                     class="preview-img mb-3">
                            <?php else: ?>
                                <img id="previewImage"
                                     src=""
                                     class="preview-img mb-3"
                                     style="display:none;">
                            <?php endif; ?>

                            <h4 id="previewTitle">
                                <?= esc((string)($post['title'] ?? 'Duyuru başlığı')) ?>
                            </h4>

                            <p class="text-muted mb-2">
                                <span id="previewCategory">
                                    <?= esc((string)($post['category'] ?? 'Duyuru')) ?>
                                </span>
                            </p>

                            <p id="previewSummary">
                                <?= esc((string)($post['summary'] ?? 'Kısa açıklama burada görünecek.')) ?>
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
    titleInput.addEventListener('input', function () {
        previewTitle.textContent = this.value || 'Duyuru başlığı';
    });
}

if (summaryInput) {
    summaryInput.addEventListener('input', function () {
        previewSummary.textContent = this.value || 'Kısa açıklama burada görünecek.';
    });
}

if (categoryInput) {
    categoryInput.addEventListener('change', function () {
        previewCategory.textContent = this.value || 'Duyuru';
    });
}

if (imageInput) {
    imageInput.addEventListener('change', function () {
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