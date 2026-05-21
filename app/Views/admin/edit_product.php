<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Ürün Düzenle</title>
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        .featured-hidden-checkbox {
            display: none;
        }

        .featured-mini-card {
            width: 100%;
            height: 52px;
            border: 1px solid #ded4ff;
            border-radius: 16px;
            background: #f8f4ff;
            color: #5146c6;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.25s ease;
            box-shadow: 0 8px 18px rgba(108, 99, 255, 0.07);
            user-select: none;
            margin: 0;
        }

        .featured-mini-card:hover {
            transform: translateY(-1px);
            border-color: #b9aaff;
            box-shadow: 0 12px 24px rgba(108, 99, 255, 0.13);
        }

        .featured-star {
            width: 32px;
            height: 32px;
            border-radius: 11px;
            background: #eee8ff;
            color: #6c63ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.25s ease;
            flex-shrink: 0;
        }

        .featured-text {
            font-size: 14px;
            white-space: nowrap;
        }

        .featured-hidden-checkbox:checked+.featured-mini-card {
            background: linear-gradient(135deg, #6c63ff, #8b7cff);
            border-color: #6c63ff;
            color: #fff;
            box-shadow: 0 14px 30px rgba(108, 99, 255, 0.28);
        }

        .featured-hidden-checkbox:checked+.featured-mini-card .featured-star {
            background: rgba(255, 255, 255, 0.22);
            color: #fff;
        }
    </style>
</head>

<body style="background:#f7f2ff; font-family:Arial,sans-serif;">
    <?php
    $product = $product ?? [];
    $categories = $categories ?? [];
    ?>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Ürün Düzenle</h2>
                <p><?= esc($product['name']) ?> ürününü güncelliyorsunuz.</p>
            </div>

            <a href="<?= base_url('/admin/products') ?>" class="btn btn-outline-secondary">
                Ürünlere Dön
            </a>
        </div>

        <div style="background:white; border-radius:22px; padding:35px; box-shadow:0 12px 35px rgba(0,0,0,0.08);">

            <form action="<?= base_url('/admin/products/update/' . $product['id']) ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>

                        <select name="category_id" class="form-select" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>>
                                    <?= esc((string)($category['name'] ?? '')) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Ürün Adı</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="<?= esc($product['name']) ?>"
                            required>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Açıklama</label>
                    <textarea name="description"
                        class="form-control"
                        style="height:130px;"
                        required><?= esc($product['description']) ?></textarea>
                </div>

                <div class="row align-items-end">

                    <div class="col-md-4 mb-3">
                        <label>Fiyat</label>

                        <input type="number"
                            step="0.01"
                            name="price"
                            class="form-control"
                            value="<?= esc($product['price']) ?>"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Stok</label>

                        <input type="number"
                            name="stock"
                            class="form-control"
                            value="<?= esc($product['stock']) ?>"
                            required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Durum</label>

                        <select name="status" class="form-select">
                            <option value="active" <?= $product['status'] === 'active' ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="passive" <?= $product['status'] === 'passive' ? 'selected' : '' ?>>
                                Pasif
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="checkbox"
                            name="is_featured"
                            value="1"
                            id="is_featured"
                            class="featured-hidden-checkbox"
                            <?= !empty($product['is_featured']) ? 'checked' : '' ?>>

                        <label for="is_featured" class="featured-mini-card">
                            <span class="featured-star">★</span>
                            <span class="featured-text">Öne Çıkan</span>
                        </label>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Mevcut Görsel</label><br>

                    <?php if (!empty($product['image'])): ?>
                        <img id="previewImage"
                            src="<?= base_url('images/' . $product['image']) ?>"
                            width="140"
                            style="border-radius:12px; margin-top:8px;">
                    <?php else: ?>
                        <p>Görsel yok.</p>
                        <img id="previewImage"
                            src=""
                            width="140"
                            style="display:none; border-radius:12px; margin-top:8px;">
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label>Yeni Görsel Yükle</label>
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">
                        Yeni görsel seçmezseniz mevcut görsel korunur.
                    </small>
                </div>

                <button type="submit"
                    class="btn btn-primary px-5"
                    style="background:#717fe0; border:none;">
                    Güncelle
                </button>

            </form>

        </div>

    </div>
    <script>
        const imageInput = document.querySelector('input[name="image"]');
        const previewImage = document.getElementById('previewImage');

        if (imageInput && previewImage) {
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