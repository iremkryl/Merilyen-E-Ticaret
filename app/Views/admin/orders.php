<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin | Siparişler</title>
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
            background: rgba(255,255,255,0.2);
        }

        .content {
            padding: 32px;
        }

        .mini-card {
            background: white;
            border-radius: 16px;
            padding: 18px 22px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.07);
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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0,0,0,0.08);
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
            <a href="<?= base_url('/admin/orders') ?>" class="active">Siparişler</a>
            <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
            <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
            <a href="<?= base_url('/admin/blogs') ?>">İçerikler</a>
            <a href="<?= base_url('/products') ?>">Siteye Git</a>
            <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
        </div>

        <div class="col-md-9 col-lg-10 content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Sipariş Yönetimi</h2>
                    <p class="text-muted mb-0">Müşteri siparişlerini görüntüleyebilir ve durumlarını güncelleyebilirsiniz.</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Toplam Sipariş</p>
                        <h4><?= count($orders ?? []) ?></h4>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Toplam Ciro</p>
                        <h4><?= number_format($totalRevenue ?? 0, 2) ?> ₺</h4>
                    </div>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead style="background:#717fe0; color:white;">
                            <tr>
                                <th>#</th>
                                <th>Kullanıcı</th>
                                <th>Tutar</th>
                                <th>Durum</th>
                                <th>Adres</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if(empty($orders)): ?>
                            <tr>
                                <td colspan="6" class="text-center p-4">
                                    Henüz sipariş bulunmuyor.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($orders as $order): ?>
                                <tr>
                                    <td>#<?= $order['id'] ?></td>

                                    <td>
                                        <?= esc((string)($order['user_name'] ?? '')) ?>
                                        <?= esc((string)($order['user_surname'] ?? '')) ?>
                                    </td>

                                    <td><?= number_format($order['total_price'], 2) ?> ₺</td>

                                    <td>
                                        <form action="<?= base_url('/admin/orders/status/' . $order['id']) ?>" method="post">
                                            <select name="status"
                                                    class="form-select form-select-sm"
                                                    onchange="this.form.submit()">
                                                <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Hazırlanıyor</option>
                                                <option value="approved" <?= $order['status'] === 'approved' ? 'selected' : '' ?>>Onaylandı</option>
                                                <option value="supplying" <?= $order['status'] === 'supplying' ? 'selected' : '' ?>>Tedarik Ediliyor</option>
                                                <option value="packing" <?= $order['status'] === 'packing' ? 'selected' : '' ?>>Paketleniyor</option>
                                                <option value="shipped" <?= $order['status'] === 'shipped' ? 'selected' : '' ?>>Kargoya Verildi</option>
                                                <option value="on_the_way" <?= $order['status'] === 'on_the_way' ? 'selected' : '' ?>>Yolda</option>
                                                <option value="distributing" <?= $order['status'] === 'distributing' ? 'selected' : '' ?>>
                                                    Dağıtımda
                                                </option>                                                
                                                <option value="delivered" <?= $order['status'] === 'delivered' ? 'selected' : '' ?>>Teslim Edildi</option>
                                                <option value="received" <?= $order['status'] === 'received' ? 'selected' : '' ?>>
                                                    Teslim Alındı
                                                </option>
                                                <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>İptal Edildi</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td style="max-width:320px; white-space:pre-line;">
                                        <?= esc((string)$order['shipping_address']) ?>
                                    </td>

                                    <td>
                                        <a href="<?= base_url('/admin/orders/detail/' . $order['id']) ?>"
                                           class="btn btn-sm btn-primary">
                                            Detay
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