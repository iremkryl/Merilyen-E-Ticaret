<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Merilyen | Admin Paneli</title>
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
            padding: 30px 20px;
        }

        .sidebar h3 {
            font-weight: bold;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.18);
        }

        .content {
            padding: 35px;
        }

        .card-box {
            background: white;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            transition: 0.25s;
            border: 1px solid rgba(113, 127, 224, 0.08);
        }

        .card-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 45px rgba(113, 127, 224, 0.18);
        }

        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: #717fe0;
            line-height: 1.1;
        }

        .top-title {
            font-weight: bold;
            color: #222;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 sidebar">
                <h3>Merilyen</h3>

                <a href="<?= base_url('/admin') ?>" class="active">Panel</a>
                <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
                <a href="<?= base_url('/admin/orders') ?>">Siparişler</a>
                <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
                <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
                <a href="<?= base_url('/admin/blogs') ?>">İçerikler</a>
                <a href="<?= base_url('/products') ?>">Siteye Git</a>
                <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
            </div>

            <div class="col-md-9 col-lg-10 content">

                <h2 class="top-title">Admin Paneli</h2>
                <p>Hoş geldiniz, <?= esc((string) ($adminName ?? 'Admin')) ?>.</p>

                <div class="row mt-4">

                    <div class="col-md-4 mb-3">
                        <div class="card-box">
                            <p>📦 Toplam Ürün</p>
                            <div class="stat-number"><?= $productCount ?? 0 ?></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card-box">
                            <p>👥 Toplam Müşteri </p>
                            <div class="stat-number"><?= $userCount ?? 0 ?></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card-box">
                            <p>🛒 Toplam Sipariş</p>
                            <div class="stat-number"><?= $orderCount ?? 0 ?></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card-box">
                            <p>🟢 Panel Durumu</p>
                            <div class="stat-number" style="font-size:24px;">
                                Aktif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card-box">
                            <p>✉️ Yeni Mesaj</p>
                            <div class="stat-number"><?= $messageCount ?? 0 ?></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                    <div class="card-box">
                        <p>📰 Toplam Duyuru</p>
                        <div class="stat-number"><?= $blogCount ?? 0 ?></div>
                    </div>
                </div>

                </div>

            </div>

        </div>
    </div>

</body>

</html>