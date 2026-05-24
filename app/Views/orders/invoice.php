<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Merilyen | Fatura</title>

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: #f3f3f7;
            font-family: Arial, sans-serif;
            color: #222;
            font-size: 12px;
        }

        .invoice-page {
            width: 190mm;
            min-height: 270mm;
            margin: 18px auto;
            background: #fff;
            border-radius: 16px;
            padding: 18mm;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.10);
        }

        .invoice-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 25px;
            border-bottom: 2px solid #717fe0;
            padding-bottom: 14px;
            margin-bottom: 16px;
        }

        .brand-title {
            font-size: 28px;
            font-weight: 800;
            color: #717fe0;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            color: #666;
            line-height: 1.45;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-label {
            font-size: 13px;
            color: #777;
            margin-bottom: 3px;
        }

        .invoice-no {
            font-size: 20px;
            font-weight: 800;
            color: #222;
            margin-bottom: 8px;
        }

        .badge-status {
            display: inline-block;
            background: #f1edff;
            color: #5f6ed8;
            padding: 6px 11px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 11px;
        }

        .section-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 16px;
        }

        .info-box {
            border: 1px solid #ececec;
            border-radius: 12px;
            padding: 12px;
            min-height: 92px;
        }

        .box-title {
            font-size: 13px;
            font-weight: 800;
            color: #333;
            margin-bottom: 8px;
        }

        .info-line {
            margin-bottom: 4px;
            line-height: 1.35;
        }

        .muted {
            color: #666;
        }

        .address-box {
            white-space: pre-line;
            line-height: 1.35;
            max-height: 76px;
            overflow: hidden;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            margin-bottom: 16px;
        }

        .invoice-table th {
            background: #717fe0;
            color: white;
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }

        .invoice-table td {
            border-bottom: 1px solid #eeeeee;
            padding: 8px;
            vertical-align: top;
        }

        .invoice-table th:nth-child(2),
        .invoice-table th:nth-child(3),
        .invoice-table th:nth-child(4),
        .invoice-table td:nth-child(2),
        .invoice-table td:nth-child(3),
        .invoice-table td:nth-child(4) {
            text-align: right;
        }

        .summary-area {
            display: grid;
            grid-template-columns: 1fr 78mm;
            gap: 16px;
            align-items: start;
        }

        .note-box {
            border: 1px solid #eeeeee;
            background: #fafafa;
            border-radius: 12px;
            padding: 12px;
            color: #666;
            line-height: 1.45;
            font-size: 11px;
        }

        .summary-box {
            border: 1px solid #ececec;
            border-radius: 12px;
            padding: 12px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 6px 0;
            border-bottom: 1px dashed #e3e3e3;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-row.total {
            margin-top: 6px;
            padding: 9px 10px;
            border-radius: 10px;
            background: #f7f2ff;
            border-bottom: none;
            font-size: 14px;
            font-weight: 800;
            color: #4a3fb3;
        }

        .footer-line {
            border-top: 1px solid #eeeeee;
            margin-top: 18px;
            padding-top: 10px;
            color: #777;
            font-size: 11px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .actions {
            width: 190mm;
            margin: 18px auto 0;
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        @media print {
            body {
                background: white;
                font-size: 11px;
            }

            .actions {
                display: none !important;
            }

            .invoice-page {
                margin: 0;
                width: 100%;
                min-height: auto;
                border-radius: 0;
                box-shadow: none;
                padding: 0;
            }

            .brand-title {
                font-size: 24px;
            }

            .invoice-no {
                font-size: 17px;
            }

            .info-box {
                padding: 9px;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 6px;
            }

            .footer-line {
                margin-top: 12px;
            }
        }
    </style>
</head>

<body>

<?php
if (!function_exists('invoice_view_html')) {
    /**
     * @param mixed $value
     */
    function invoice_view_html($value): string
    {
        if (is_string($value) || is_numeric($value)) {
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }

        return '';
    }
}

if (!function_exists('invoice_view_money')) {
    /**
     * @param mixed $value
     */
    function invoice_view_money($value): string
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

$orderId = is_numeric($order['id'] ?? null) ? (int)$order['id'] : 0;

$orderCreatedAtRaw = is_scalar($order['created_at'] ?? null)
    ? (string)$order['created_at']
    : '';

$orderTimestamp = $orderCreatedAtRaw !== '' ? strtotime($orderCreatedAtRaw) : false;

if ($orderTimestamp === false) {
    $orderTimestamp = time();
}

$invoiceYear = date('Y', $orderTimestamp);
$invoiceDate = date('d.m.Y H:i', $orderTimestamp);
$invoiceNo = 'MER-' . $invoiceYear . '-' . str_pad((string)$orderId, 5, '0', STR_PAD_LEFT);

$statusLabels = [
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

$paymentStatusLabels = [
    'paid'                => 'Ödendi',
    'refunded_to_balance' => 'Bakiyeye İade Edildi',
    'pending'             => 'Ödeme Bekliyor',
    'failed'              => 'Ödeme Başarısız'
];

$currentStatus = is_scalar($order['status'] ?? null) ? (string)$order['status'] : 'pending';
$currentPaymentStatus = is_scalar($order['payment_status'] ?? null) ? (string)$order['payment_status'] : 'paid';

$statusText = $statusLabels[$currentStatus] ?? $currentStatus;
$paymentStatusText = $paymentStatusLabels[$currentPaymentStatus] ?? 'Ödeme Bilgisi';

$userName = invoice_view_html($order['user_name'] ?? '');
$userSurname = invoice_view_html($order['user_surname'] ?? '');
$userEmail = invoice_view_html($order['user_email'] ?? '');

$shippingAddressRaw = is_scalar($order['shipping_address'] ?? null)
    ? (string)$order['shipping_address']
    : '';

$shippingLines = preg_split('/\r\n|\r|\n/', $shippingAddressRaw);
$cleanShippingLines = [];

$excludedAddressPrefixes = [
    'Ürün Ara Toplamı:',
    'Kupon Kodu:',
    'Kupon İndirimi:',
    'Kargo Ücreti:',
    'Bakiyeden Kullanılan:',
    'Karttan Ödenen:'
];

foreach ($shippingLines as $line) {
    $trimmedLine = trim((string)$line);

    if ($trimmedLine === '') {
        continue;
    }

    $shouldSkip = false;

    foreach ($excludedAddressPrefixes as $prefix) {
        if (mb_strpos($trimmedLine, $prefix) === 0) {
            $shouldSkip = true;
            break;
        }
    }

    if (!$shouldSkip) {
        $cleanShippingLines[] = $trimmedLine;
    }
}

$cleanShippingAddress = trim(implode("\n", $cleanShippingLines));

if ($cleanShippingAddress === '') {
    $cleanShippingAddress = 'Teslimat adresi bulunamadı.';
}

$itemSubtotal = 0;

foreach ($items as $itemForTotal) {
    if (!is_array($itemForTotal)) {
        continue;
    }

    $itemPrice = is_numeric($itemForTotal['price'] ?? null) ? (float)$itemForTotal['price'] : 0;
    $itemQuantity = is_numeric($itemForTotal['quantity'] ?? null) ? (int)$itemForTotal['quantity'] : 0;

    $itemSubtotal += $itemPrice * $itemQuantity;
}

$discountAmount = is_numeric($order['discount_amount'] ?? null) ? (float)$order['discount_amount'] : 0;
$totalPrice = is_numeric($order['total_price'] ?? null) ? (float)$order['total_price'] : 0;
$usedBalance = is_numeric($order['used_balance'] ?? null) ? (float)$order['used_balance'] : 0;
$paidAmount = is_numeric($order['paid_amount'] ?? null) ? (float)$order['paid_amount'] : 0;

$calculatedShipping = $totalPrice - ($itemSubtotal - $discountAmount);

if ($calculatedShipping < 0) {
    $calculatedShipping = 0;
}

$couponCodeRaw = is_scalar($order['coupon_code'] ?? null) ? (string)$order['coupon_code'] : '';
$cardLast4Raw = is_scalar($order['card_last4'] ?? null) ? (string)$order['card_last4'] : '';
?>

<div class="actions">
    <button type="button" class="btn btn-dark btn-sm" onclick="window.print()">
        Faturayı Yazdır / PDF Al
    </button>
</div>

<div class="invoice-page">

    <div class="invoice-top">
        <div>
            <div class="brand-title">Merilyen</div>
            <div class="brand-subtitle">
                El emeği örgü ürünleri satış platformu<br>
                CodeIgniter MVC tabanlı e-ticaret sistemi
            </div>
        </div>

        <div class="invoice-meta">
            <div class="invoice-label">Fatura No</div>
            <div class="invoice-no"><?= invoice_view_html($invoiceNo) ?></div>

            <div class="invoice-label">Fatura Tarihi</div>
            <div><?= invoice_view_html($invoiceDate) ?></div>

            <div class="mt-2">
                <span class="badge-status"><?= invoice_view_html($statusText) ?></span>
            </div>
        </div>
    </div>

    <div class="section-grid">
        <div class="info-box">
            <div class="box-title">Müşteri Bilgileri</div>

            <div class="info-line">
                <strong>Ad Soyad:</strong>
                <?= $userName ?> <?= $userSurname ?>
            </div>

            <div class="info-line">
                <strong>E-posta:</strong>
                <?= $userEmail !== '' ? $userEmail : '-' ?>
            </div>

            <div class="info-line">
                <strong>Sipariş No:</strong>
                #<?= (int)$orderId ?>
            </div>

            <div class="info-line">
                <strong>Ödeme Durumu:</strong>
                <?= invoice_view_html($paymentStatusText) ?>
            </div>
        </div>

        <div class="info-box">
            <div class="box-title">Teslimat Adresi</div>
            <div class="address-box">
                <?= invoice_view_html($cleanShippingAddress) ?>
            </div>
        </div>
    </div>

    <div class="box-title">Sipariş Kalemleri</div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Ürün</th>
                <th>Adet</th>
                <th>Birim Fiyat</th>
                <th>Satır Toplamı</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($items)): ?>
            <tr>
                <td colspan="4">Bu siparişe ait ürün bulunamadı.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($items as $item): ?>

                <?php
                if (!is_array($item)) {
                    continue;
                }

                $productName = invoice_view_html($item['product_name'] ?? 'Ürün');
                $quantity = is_numeric($item['quantity'] ?? null) ? (int)$item['quantity'] : 0;
                $price = is_numeric($item['price'] ?? null) ? (float)$item['price'] : 0;
                $lineTotal = $price * $quantity;
                ?>

                <tr>
                    <td><?= $productName ?></td>
                    <td><?= (int)$quantity ?></td>
                    <td><?= invoice_view_money($price) ?></td>
                    <td><?= invoice_view_money($lineTotal) ?></td>
                </tr>

            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <div class="summary-area">
        <div class="note-box">
            <strong>Not:</strong>
            Bu belge, Web Programlama dersi projesi kapsamında oluşturulan siparişe ait
            fatura/ödeme özetidir. Kart numarasının tamamı sistemde saklanmaz; yalnızca
            son dört hane gösterilir.
            <br><br>
            <strong>Kart Bilgisi:</strong>
            <?php if ($cardLast4Raw !== ''): ?>
                **** **** **** <?= invoice_view_html($cardLast4Raw) ?>
            <?php else: ?>
                Kart kullanılmadı
            <?php endif; ?>
        </div>

        <div class="summary-box">
            <div class="summary-row">
                <span>Ürün Ara Toplamı</span>
                <strong><?= invoice_view_money($itemSubtotal) ?></strong>
            </div>

            <div class="summary-row">
                <span>Kupon Kodu</span>
                <strong><?= $couponCodeRaw !== '' ? invoice_view_html(strtoupper($couponCodeRaw)) : '-' ?></strong>
            </div>

            <div class="summary-row">
                <span>Kupon İndirimi</span>
                <strong>-<?= invoice_view_money($discountAmount) ?></strong>
            </div>

            <div class="summary-row">
                <span>Kargo Ücreti</span>
                <strong><?= invoice_view_money($calculatedShipping) ?></strong>
            </div>

            <div class="summary-row total">
                <span>Genel Toplam</span>
                <span><?= invoice_view_money($totalPrice) ?></span>
            </div>

            <div class="summary-row">
                <span>Bakiyeden Kullanılan</span>
                <strong><?= invoice_view_money($usedBalance) ?></strong>
            </div>

            <div class="summary-row">
                <span>Karttan Ödenen</span>
                <strong><?= invoice_view_money($paidAmount) ?></strong>
            </div>
        </div>
    </div>

    <div class="footer-line">
        <span>Merilyen E-Ticaret Sitesi</span>
        <span><?= invoice_view_html($invoiceNo) ?></span>
    </div>

</div>

</body>
</html>