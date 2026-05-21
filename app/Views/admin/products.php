<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Admin | Ürünler</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" /> 
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">


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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
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

    <?php $products = $products ?? []; ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 sidebar">
                <h3>Merilyen</h3>

                <a href="<?= base_url('/admin') ?>">Panel</a>
                <a href="<?= base_url('/admin/products') ?>" class="active">Ürünler</a>
                <a href="<?= base_url('/admin/orders') ?>">Siparişler</a>
                <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
                <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
                <a href="<?= base_url('/admin/blogs') ?>">İçerikler</a>
                <a href="<?= base_url('/products') ?>">Siteye Git</a>
                <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
            </div>

            <div class="col-md-9 col-lg-10 content">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Ürün Yönetimi</h2>
                    </div>

                    <a href="<?= base_url('/admin/products/create') ?>" class="btn btn-primary btn-purple">
                        Yeni Ürün Ekle
                    </a>

                    <form action="<?= base_url('/admin/products') ?>" method="get" class="mb-4">
                        <div class="input-group" style="max-width:420px;">
                            <input type="text"
                                name="search"
                                class="form-control"
                                value="<?= esc((string)($search ?? '')) ?>"
                                placeholder="Ürün adı veya açıklama ara...">

                            <button class="btn btn-primary" style="background:#717fe0;border:none;">
                                Ara
                            </button>
                        </div>
                    </form>
                </div>

                <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead style="background:#717fe0; color:white;">
                                <tr>
                                    <th>ID</th>
                                    <th>Görsel</th>
                                    <th>Ürün Adı</th>
                                    <th>Fiyat</th>
                                    <th>Stok</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (empty($products)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center p-4">
                                            Henüz ürün bulunmuyor.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>

                                            <td>
                                                <img src="<?= base_url('images/' . ($product['image'] ?? '')) ?>"
                                                    width="65"
                                                    style="border-radius:10px;">
                                            </td>

                                            <td><?= esc((string)($product['name'] ?? '')) ?></td>

                                            <td><?= number_format($product['price'] ?? 0, 2) ?> ₺</td>

                                            <td>
                                                <?php if (($product['stock'] ?? 0) <= 0): ?>

                                                    <span class="badge bg-danger">
                                                        Tükendi
                                                    </span>

                                                <?php elseif (($product['stock'] ?? 0) <= 3): ?>

                                                    <span class="badge bg-warning text-dark">
                                                        Son <?= $product['stock'] ?> Ürün
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-success">
                                                        <?= $product['stock'] ?> Adet
                                                    </span>

                                                <?php endif; ?>
                                            </td>

                                            <td>

                                                <?php if (($product['stock'] ?? 0) <= 0): ?>

                                                    <span class="badge bg-danger">
                                                        Tükendi
                                                    </span>

                                                <?php elseif (($product['status'] ?? '') === 'active'): ?>

                                                    <span class="badge bg-success">
                                                        Aktif
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-secondary">
                                                        Pasif
                                                    </span>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('/admin/products/edit/' . $product['id']) ?>"
                                                    class="btn btn-sm btn-warning">
                                                    Düzenle
                                                </a>

                                                <a href="<?= base_url('/admin/products/delete/' . $product['id']) ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Bu ürünü silmek istediğinize emin misiniz?')">
                                                    Sil
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>