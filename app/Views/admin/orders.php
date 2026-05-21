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
            background: rgba(255, 255, 255, 0.2);
        }

        .content {
            padding: 32px;
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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
        }

        .status-action-wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .status-form {
            min-width: 180px;
        }

        .btn-next-status {
            min-width: 72px;
            font-weight: 600;
        }

        .order-address {
            max-width: 320px;
            white-space: pre-line;
            font-size: 14px;
            color: #555;
        }

        .alert {
            border-radius: 14px;
            border: none;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .sidebar {
                min-height: auto;
            }

            .status-action-wrap {
                align-items: stretch;
            }

            .status-form,
            .btn-next-status {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php
    if (!function_exists('admin_orders_html')) {
        /**
         * @param mixed $value
         */
        function admin_orders_html($value): string
        {
            if (is_string($value) || is_numeric($value)) {
                return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
            }

            return '';
        }
    }

    if (!function_exists('admin_orders_money')) {
        /**
         * @param mixed $value
         */
        function admin_orders_money($value): string
        {
            return number_format(is_numeric($value) ? (float)$value : 0, 2) . ' ₺';
        }
    }

    if (!isset($orders) || !is_array($orders)) {
        $orders = [];
    }

    $totalRevenueValue = 0;

    if (isset($totalRevenue) && is_numeric($totalRevenue)) {
        $totalRevenueValue = (float)$totalRevenue;
    } else {
        foreach ($orders as $revenueOrder) {
            if (!is_array($revenueOrder)) {
                continue;
            }

            $orderStatus = is_scalar($revenueOrder['status'] ?? null)
                ? (string)$revenueOrder['status']
                : '';

            if ($orderStatus === 'cancelled') {
                continue;
            }

            $totalRevenueValue += is_numeric($revenueOrder['total_price'] ?? null)
                ? (float)$revenueOrder['total_price']
                : 0;
        }
    }

    $successRaw = session()->getFlashdata('success');
    $errorRaw = session()->getFlashdata('error');

    $successMessage = is_scalar($successRaw) ? (string)$successRaw : '';
    $errorMessage = is_scalar($errorRaw) ? (string)$errorRaw : '';

    $statusLabels = [
        'pending'      => 'Onay Bekliyor',
        'approved'     => 'Onaylandı',
        'supplying'    => 'Tedarik Ediliyor',
        'packing'      => 'Paketleniyor',
        'shipped'      => 'Kargoya Verildi',
        'on_the_way'   => 'Yolda',
        'distributing' => 'Dağıtımda',
        'delivered'    => 'Teslim Edildi',
        'received'     => 'Teslim Alındı',
        'cancelled'    => 'İptal Edildi'
    ];

    $nextDisabledStatuses = ['delivered', 'received', 'cancelled'];
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 sidebar">
                <h3>Merilyen</h3>

                <a href="<?= base_url('/admin') ?>">Panel</a>
                <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
                <a href="<?= base_url('/admin/orders') ?>" class="active">Siparişler</a>
                <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
                <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
                <a href="<?= base_url('/admin/blogs') ?>">İçerik Yönetimi</a>
                <a href="<?= base_url('/products') ?>">Siteye Git</a>
                <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
            </div>

            <div class="col-md-9 col-lg-10 content">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Sipariş Yönetimi</h2>
                        <p class="text-muted mb-0">
                            Müşteri siparişlerini görüntüleyebilir, durumlarını seçerek veya “İleri” butonu ile aşama aşama güncelleyebilirsiniz.
                        </p>
                    </div>
                </div>

                <?php if ($successMessage !== ''): ?>
                    <div class="alert alert-success mb-4">
                        <?= admin_orders_html($successMessage) ?>
                    </div>
                <?php endif; ?>

                <?php if ($errorMessage !== ''): ?>
                    <div class="alert alert-danger mb-4">
                        <?= admin_orders_html($errorMessage) ?>
                    </div>
                <?php endif; ?>

                <div class="row mb-4">

                    <div class="col-md-3 mb-3">
                        <div class="mini-card">
                            <p>Toplam Sipariş</p>
                            <h4><?= count($orders) ?></h4>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="mini-card">
                            <p>Toplam Ciro</p>
                            <h4><?= admin_orders_money($totalRevenueValue) ?></h4>
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

                                <?php if (empty($orders)): ?>

                                    <tr>
                                        <td colspan="6" class="text-center p-4">
                                            Henüz sipariş bulunmuyor.
                                        </td>
                                    </tr>

                                <?php else: ?>

                                    <?php foreach ($orders as $order): ?>

                                        <?php
                                        if (!is_array($order)) {
                                            continue;
                                        }

                                        $orderId = is_numeric($order['id'] ?? null) ? (int)$order['id'] : 0;
                                        $userName = admin_orders_html($order['user_name'] ?? '');
                                        $userSurname = admin_orders_html($order['user_surname'] ?? '');
                                        $totalPrice = is_numeric($order['total_price'] ?? null) ? (float)$order['total_price'] : 0;
                                        $currentStatus = is_scalar($order['status'] ?? null) ? (string)$order['status'] : 'pending';
                                        $shippingAddress = admin_orders_html($order['shipping_address'] ?? '');

                                        if (!array_key_exists($currentStatus, $statusLabels)) {
                                            $currentStatus = 'pending';
                                        }

                                        $isNextDisabled = in_array($currentStatus, $nextDisabledStatuses, true);
                                        ?>

                                        <tr>

                                            <td>
                                                #<?= (int)$orderId ?>
                                            </td>

                                            <td>
                                                <?= $userName ?> <?= $userSurname ?>
                                            </td>

                                            <td>
                                                <?= admin_orders_money($totalPrice) ?>
                                            </td>

                                            <td>
                                                <div class="status-action-wrap">

                                                    <form action="<?= base_url('/admin/orders/status/' . $orderId) ?>"
                                                        method="post"
                                                        class="status-form">

                                                        <select name="status"
                                                            class="form-select form-select-sm"
                                                            onchange="this.form.submit()">

                                                            <?php foreach ($statusLabels as $statusKey => $statusText): ?>
                                                                <option value="<?= admin_orders_html($statusKey) ?>"
                                                                    <?= $currentStatus === $statusKey ? 'selected' : '' ?>>
                                                                    <?= admin_orders_html($statusText) ?>
                                                                </option>
                                                            <?php endforeach; ?>

                                                        </select>

                                                    </form>

                                                    <?php if (!$isNextDisabled): ?>

                                                        <form action="<?= base_url('/admin/orders/next/' . $orderId) ?>"
                                                            method="post"
                                                            class="d-inline">

                                                            <button type="submit"
                                                                class="btn btn-sm btn-success btn-next-status"
                                                                onclick="return confirm('Sipariş bir sonraki aşamaya ilerletilsin mi?')">
                                                                İleri
                                                            </button>

                                                        </form>

                                                    <?php else: ?>

                                                        <button type="button"
                                                            class="btn btn-sm btn-secondary btn-next-status"
                                                            disabled>
                                                            İleri
                                                        </button>

                                                    <?php endif; ?>

                                                </div>
                                            </td>

                                            <td class="order-address">
                                                <?= $shippingAddress !== '' ? $shippingAddress : '-' ?>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('/admin/orders/detail/' . $orderId) ?>"
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