<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Admin | Sipariş Detayı</title>

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

        .info-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
            padding: 24px;
            height: 100%;
        }

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
        }

        .mini-title {
            font-weight: 700;
            color: #333;
        }

        .shipping-box {
            white-space: pre-line;
            background: #faf8ff;
            padding: 15px;
            border-radius: 12px;
            color: #444;
            line-height: 1.6;
            border: 1px solid #eee8ff;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            border-bottom: 1px dashed #e3e3e3;
            padding: 9px 0;
            font-size: 15px;
        }

        .payment-row:last-child {
            border-bottom: none;
        }

        .payment-label {
            color: #666;
        }

        .payment-value {
            font-weight: 700;
            color: #222;
            text-align: right;
        }

        .invoice-total-row {
            background: #faf8ff;
            border-radius: 12px;
            padding-left: 12px;
            padding-right: 12px;
            margin-top: 8px;
            border-bottom: none;
        }

        .invoice-total-row .payment-label,
        .invoice-total-row .payment-value {
            color: #4a3fb3;
            font-size: 16px;
        }

        .order-product-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            background: #f5f5f5;
        }

        .badge-soft-purple {
            background: #f1edff;
            color: #5f6ed8;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
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

            .payment-row {
                flex-direction: column;
                gap: 4px;
            }

            .payment-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>

<?php
if (!function_exists('admin_order_html')) {
    /**
     * @param mixed $value
     */
    function admin_order_html($value): string
    {
        if (is_string($value) || is_numeric($value)) {
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }

        return '';
    }
}

if (!function_exists('admin_order_money')) {
    /**
     * @param mixed $value
     */
    function admin_order_money($value): string
    {
        return number_format(is_numeric($value) ? (float)$value : 0, 2) . ' ₺';
    }
}

if (!isset($order) || !is_array($order)) {
    $order = [];
}

if (!isset($items) || !is_array($items)) {
    $items = [];
}

$statusText = [
    'pending'      => 'Onay Bekliyor',
    'approved'     => 'Onaylandı',
    'supplying'    => 'Ürünler Tedarik Ediliyor',
    'packing'      => 'Ürünler Kutulanıyor',
    'shipped'      => 'Kargoya Verildi',
    'on_the_way'   => 'Size Doğru Yola Çıktı',
    'distributing' => 'Dağıtımda',
    'delivered'    => 'Teslim Edildi',
    'received'     => 'Teslim Alındı',
    'cancelled'    => 'İptal Edildi'
];

$statusClass = [
    'pending'      => 'bg-warning text-dark',
    'approved'     => 'bg-primary',
    'supplying'    => 'bg-info text-dark',
    'packing'      => 'bg-info text-dark',
    'shipped'      => 'bg-secondary',
    'on_the_way'   => 'bg-secondary',
    'distributing' => 'bg-dark',
    'delivered'    => 'bg-success',
    'received'     => 'bg-success',
    'cancelled'    => 'bg-danger'
];

$paymentStatusText = [
    'paid'                => 'Ödendi',
    'refunded_to_balance' => 'Bakiyeye İade Edildi',
    'pending'             => 'Ödeme Bekliyor',
    'failed'              => 'Ödeme Başarısız'
];

$currentStatus = (string)($order['status'] ?? 'pending');
$currentPaymentStatus = (string)($order['payment_status'] ?? 'paid');

$orderId = (int)($order['id'] ?? 0);
$userName = admin_order_html($order['user_name'] ?? '');
$userSurname = admin_order_html($order['user_surname'] ?? '');
$userEmail = admin_order_html($order['user_email'] ?? '');

$orderCreatedAt = (string)($order['created_at'] ?? '');
$orderDateText = $orderCreatedAt !== '' ? date('d.m.Y H:i', strtotime($orderCreatedAt)) : '-';

$itemSubtotal = 0;

foreach ($items as $itemForTotal) {
    if (!is_array($itemForTotal)) {
        continue;
    }

    $itemSubtotal += (is_numeric($itemForTotal['price'] ?? null) ? (float)$itemForTotal['price'] : 0)
        * (is_numeric($itemForTotal['quantity'] ?? null) ? (int)$itemForTotal['quantity'] : 0);
}

$discountAmount = is_numeric($order['discount_amount'] ?? null) ? (float)$order['discount_amount'] : 0;
$totalPrice = is_numeric($order['total_price'] ?? null) ? (float)$order['total_price'] : 0;
$usedBalance = is_numeric($order['used_balance'] ?? null) ? (float)$order['used_balance'] : 0;
$paidAmount = is_numeric($order['paid_amount'] ?? null) ? (float)$order['paid_amount'] : 0;

$calculatedShipping = $totalPrice - ($itemSubtotal - $discountAmount);

if ($calculatedShipping < 0) {
    $calculatedShipping = 0;
}

$couponCode = admin_order_html($order['coupon_code'] ?? '');
$cardLast4 = admin_order_html($order['card_last4'] ?? '');
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-lg-2 sidebar">
            <h3>Merilyen</h3>

            <a href="<?= base_url('/admin') ?>">Panel</a>
            <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
            <a href="<?= base_url('/admin/orders') ?>" class="active">Siparişler</a>
            <a href="<?= base_url('/admin/users') ?>">Kullanıcılar</a>
            <a href="<?= base_url('/admin/blogs') ?>">İçerik Yönetimi</a>
            <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
            <a href="<?= base_url('/products') ?>">Siteye Git</a>
            <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>
        </div>

        <div class="col-md-9 col-lg-10 content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">
                        Sipariş Detayı #<?= (int)$orderId ?>
                    </h2>
                    <p class="text-muted mb-0">
                        Siparişe ait müşteri, teslimat, fatura/ödeme ve ürün bilgileri.
                    </p>
                </div>

                <a href="<?= base_url('/admin/orders') ?>" class="btn btn-outline-secondary">
                    Siparişlere Dön
                </a>
            </div>

            <div class="row">

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <h5 class="mini-title">Müşteri Bilgileri</h5>
                        <hr>

                        <p>
                            <strong>Ad Soyad:</strong><br>
                            <?= $userName ?> <?= $userSurname ?>
                        </p>

                        <p>
                            <strong>E-posta:</strong><br>
                            <?= $userEmail !== '' ? $userEmail : '-' ?>
                        </p>

                        <p>
                            <strong>Sipariş Durumu:</strong><br>
                            <span class="badge <?= admin_order_html($statusClass[$currentStatus] ?? 'bg-info text-dark') ?>">
                                <?= admin_order_html($statusText[$currentStatus] ?? $currentStatus) ?>
                            </span>
                        </p>

                        <p>
                            <strong>Sipariş Tarihi:</strong><br>
                            <?= admin_order_html($orderDateText) ?>
                        </p>

                        <p class="mb-0">
                            <strong>Sipariş No:</strong><br>
                            <span class="badge-soft-purple">#<?= (int)$orderId ?></span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <h5 class="mini-title">Teslimat Bilgileri</h5>
                        <hr>

                        <div class="shipping-box">
                            <?= admin_order_html($order['shipping_address'] ?? 'Teslimat adresi bulunamadı.') ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <h5 class="mini-title">Fatura / Ödeme Bilgileri</h5>
                        <hr>

                        <div class="payment-row">
                            <span class="payment-label">Ürün Ara Toplamı</span>
                            <span class="payment-value">
                                <?= admin_order_money($itemSubtotal) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Kupon Kodu</span>
                            <span class="payment-value">
                                <?= $couponCode !== '' ? strtoupper($couponCode) : '-' ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Kupon İndirimi</span>
                            <span class="payment-value">
                                -<?= admin_order_money($discountAmount) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Kargo Ücreti</span>
                            <span class="payment-value">
                                <?= admin_order_money($calculatedShipping) ?>
                            </span>
                        </div>

                        <div class="payment-row invoice-total-row">
                            <span class="payment-label">Genel Toplam</span>
                            <span class="payment-value">
                                <?= admin_order_money($totalPrice) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Bakiyeden Kullanılan</span>
                            <span class="payment-value">
                                <?= admin_order_money($usedBalance) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Karttan Ödenen</span>
                            <span class="payment-value">
                                <?= admin_order_money($paidAmount) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Ödeme Durumu</span>
                            <span class="payment-value">
                                <?= admin_order_html($paymentStatusText[$currentPaymentStatus] ?? $currentPaymentStatus) ?>
                            </span>
                        </div>

                        <div class="payment-row">
                            <span class="payment-label">Kart Bilgisi</span>
                            <span class="payment-value">
                                <?php if ($cardLast4 !== ''): ?>
                                    **** **** **** <?= $cardLast4 ?>
                                <?php else: ?>
                                    Kart kullanılmadı
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead style="background:#717fe0; color:white;">
                            <tr>
                                <th>Görsel</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Birim Fiyat</th>
                                <th>Toplam</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (empty($items)): ?>
                            <tr>
                                <td colspan="5" class="text-center p-4">
                                    Bu siparişe ait ürün bulunamadı.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($items as $item): ?>

                                <?php
                                if (!is_array($item)) {
                                    continue;
                                }

                                $productImage = admin_order_html($item['product_image'] ?? '');
                                $productName = admin_order_html($item['product_name'] ?? 'Ürün');
                                $quantity = is_numeric($item['quantity'] ?? null) ? (int)$item['quantity'] : 0;
                                $price = is_numeric($item['price'] ?? null) ? (float)$item['price'] : 0;
                                $lineTotal = $price * $quantity;
                                ?>

                                <tr>
                                    <td>
                                        <?php if ($productImage !== ''): ?>
                                            <img src="<?= base_url('images/' . $productImage) ?>"
                                                 class="order-product-img"
                                                 alt="<?= $productName ?>">
                                        <?php else: ?>
                                            <div class="order-product-img d-flex align-items-center justify-content-center">
                                                -
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?= $productName ?>
                                    </td>

                                    <td>
                                        <?= (int)$quantity ?>
                                    </td>

                                    <td>
                                        <?= admin_order_money($price) ?>
                                    </td>

                                    <td>
                                        <?= admin_order_money($lineTotal) ?>
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