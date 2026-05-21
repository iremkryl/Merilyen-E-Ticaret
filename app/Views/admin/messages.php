<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin | Mesajlar</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        body { background:#f7f2ff; font-family:Arial,sans-serif; }
        .sidebar { min-height:100vh; background:#717fe0; color:white; padding:28px 18px; }
        .sidebar h3 { font-weight:bold; margin-bottom:30px; }
        .sidebar a { display:block; color:white; text-decoration:none; padding:12px 14px; border-radius:10px; margin-bottom:8px; font-size:15px; }
        .sidebar a:hover, .sidebar a.active { background:rgba(255,255,255,0.2); }
        .content { padding:32px; }
        .table-card { background:white; border-radius:18px; overflow:hidden; box-shadow:0 10px 28px rgba(0,0,0,0.08); }
    </style>
</head>

<body>

<?php $messages = $messages ?? []; ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-lg-2 sidebar">
            <h3>Merilyen</h3>

            <a href="<?= base_url('/admin') ?>">Panel</a>
            <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
            <a href="<?= base_url('/admin/orders') ?>">Siparişler</a>
            <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
            <a href="<?= base_url('/admin/messages') ?>" class="active">Mesajlar</a>
            <a href="<?= base_url('/admin/blogs') ?>">İçerikler</a>
            <a href="<?= base_url('/products') ?>">Siteye Git</a>
            <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
        </div>

        <div class="col-md-9 col-lg-10 content">

            <div class="mb-4">
                <h2 class="fw-bold mb-1">İletişim Mesajları</h2>
                <p class="text-muted mb-0">Müşterilerden gelen iletişim formu mesajlarını görüntüleyebilirsiniz.</p>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background:#717fe0; color:white;">
                            <tr>
                                <th>ID</th>
                                <th>E-posta</th>
                                <th>Mesaj</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if(empty($messages)): ?>
                            <tr>
                                <td colspan="6" class="text-center p-4">Henüz mesaj yok.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($messages as $message): ?>
                                <tr>
                                    <td>#<?= $message['id'] ?></td>

                                    <td><?= esc((string)($message['email'] ?? '')) ?></td>

                                    <td style="max-width:450px; white-space:pre-line;">
                                        <?= esc((string)($message['message'] ?? '')) ?>
                                    </td>

                                    <td><?= esc((string)($message['created_at'] ?? '-')) ?></td>

                                    <td>
                                        <?php if(($message['is_read'] ?? 0) == 1): ?>
                                            <span class="badge bg-success">Okundu</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Yeni</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(($message['is_read'] ?? 0) == 0): ?>
                                           <a href="<?= base_url('/admin/messages/read/' . ($message['id'] ?? 0)) ?>"
                                            class="btn btn-sm btn-primary"
                                            style="background:#717fe0;border:none;">
                                                Okundu Yap
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
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