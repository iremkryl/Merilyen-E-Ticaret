<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Admin | Duyurular</title>
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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
        }

        .mini-card {
            background: white;
            border-radius: 16px;
            padding: 18px 22px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.07);
        }

        .mini-card p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .mini-card h4 {
            margin: 6px 0 0;
            color: #717fe0;
            font-weight: bold;
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

    <?php
    $posts = $posts ?? [];
    $activeCount = 0;
    $passiveCount = 0;

    foreach ($posts as $p) {
        if (($p['status'] ?? '') === 'active') {
            $activeCount++;
        } else {
            $passiveCount++;
        }
    }
    ?>

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
                        <h2 class="fw-bold mb-1">İçerik Yönetimi</h2>
                    </div>

                    <a href="<?= base_url('/admin/blogs/create') ?>"
                        class="btn btn-primary btn-purple">
                        Yeni İçerik Ekle
                    </a>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="mini-card">
                            <p>Toplam İçerik</p>
                            <h4><?= count($posts) ?></h4>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="mini-card">
                            <p>Aktif Duyuru</p>
                            <h4><?= $activeCount ?></h4>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="mini-card">
                            <p>Pasif Duyuru</p>
                            <h4><?= $passiveCount ?></h4>
                        </div>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background:#717fe0;color:white;">
                                <tr>
                                    <th>ID</th>
                                    <th>Görsel</th>
                                    <th>Başlık</th>
                                    <th>Kategori</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (empty($posts)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center p-4">
                                            Henüz duyuru yok.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($posts as $post): ?>
                                        <tr>
                                            <td>#<?= $post['id'] ?></td>

                                            <td>
                                                <img src="<?= base_url('images/' . ($post['image'] ?? '')) ?>"
                                                    width="75"
                                                    height="75"
                                                    style="object-fit:cover; border-radius:12px;">
                                            </td>

                                            <td style="max-width:330px;">
                                                <strong><?= esc((string)($post['title'] ?? '')) ?></strong>
                                                <br>
                                                <small class="text-muted">
                                                    <?= esc((string)mb_substr($post['summary'] ?? '', 0, 70)) ?>...
                                                </small>
                                            </td>

                                            <td><?= esc((string)($post['category'] ?? '')) ?></td>

                                            <td><?= esc((string)($post['post_date'] ?? '')) ?></td>

                                            <td>
                                                <?php if (($post['status'] ?? '') === 'active'): ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Pasif</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-2 flex-wrap">

                                                    <a href="<?= base_url('/admin/blogs/edit/' . ($post['id'] ?? 0)) ?>"
                                                        class="btn btn-sm btn-primary"
                                                        style="background:#717fe0;border:none;">
                                                        Düzenle
                                                    </a>

                                                    <a href="<?= base_url('/admin/blogs/status/' . ($post['id'] ?? 0)) ?>"
                                                        class="btn btn-sm btn-warning">
                                                        <?= ($post['status'] ?? '') === 'active' ? 'Pasif Yap' : 'Aktif Yap' ?>
                                                    </a>

                                                    <a href="<?= base_url('/admin/blogs/delete/' . ($post['id'] ?? 0)) ?>"
                                                        onclick="return confirm('Bu duyuruyu silmek istediğinize emin misiniz?')"
                                                        class="btn btn-sm btn-danger">
                                                        Sil
                                                    </a>

                                                </div>
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