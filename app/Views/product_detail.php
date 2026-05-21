<?php
if (!function_exists('detail_html')) {
    /**
     * @param mixed $value
     */
    function detail_html($value): string
    {
        if (is_string($value) || is_numeric($value)) {
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }

        return '';
    }
}

if (!isset($product) || !is_array($product)) {
    $product = [];
}

$productId = (int)($product['id'] ?? 0);
$productName = detail_html($product['name'] ?? 'Ürün');
$productImage = detail_html($product['image'] ?? '');
$productCategory = detail_html($product['category_name'] ?? '-');
$productPrice = is_numeric($product['price'] ?? null) ? (float)$product['price'] : 0;
$productDescription = detail_html($product['description'] ?? '');
$productStock = is_numeric($product['stock'] ?? null) ? (int)$product['stock'] : 0;

$cartRaw = session()->get('cart');
$cart = is_array($cartRaw) ? $cartRaw : [];
$cartCount = 0;

foreach ($cart as $cartItem) {
    if (is_array($cartItem)) {
        $cartCount += (int)($cartItem['quantity'] ?? 0);
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $productName ?> | Merilyen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/util.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">

    <style>
        body {
            background: #fff;
            font-family: Arial, sans-serif;
        }

        .product-detail-card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            padding: 34px;
        }

        .product-detail-img {
            width: 100%;
            max-height: 560px;
            object-fit: cover;
            border-radius: 20px;
            background: #f5f5f5;
        }

        .btn-merilyen {
            background: #717fe0;
            border: none;
            color: #fff;
            border-radius: 8px;
            padding: 13px 28px;
            font-weight: 700;
            transition: 0.25s;
        }

        .btn-merilyen:hover {
            background: #5f6ed8;
            color: #fff;
        }

        .merilyen-toast {
            position: fixed;
            top: 24px;
            right: 24px;
            min-width: 260px;
            max-width: 360px;
            background: #fff;
            color: #333;
            border-radius: 16px;
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.16);
            padding: 15px 18px;
            z-index: 999999;
            display: none;
            border-left: 5px solid #717fe0;
            font-size: 14px;
            line-height: 1.45;
        }

        .merilyen-toast.success {
            border-left-color: #28a745;
        }

        .merilyen-toast.error {
            border-left-color: #dc3545;
        }

        @media (max-width: 768px) {
            .product-detail-card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<div id="merilyenToast" class="merilyen-toast"></div>

<div class="container py-5">

    <a href="<?= base_url('/products') ?>" class="btn btn-outline-secondary mb-4">
        Ürünlere Dön
    </a>

    <div class="product-detail-card">
        <div class="row">

            <div class="col-md-6 mb-4 mb-md-0">
                <?php if ($productImage !== ''): ?>
                    <img src="<?= base_url('images/' . $productImage) ?>"
                         class="product-detail-img"
                         alt="<?= $productName ?>">
                <?php else: ?>
                    <div class="product-detail-img d-flex align-items-center justify-content-center">
                        Görsel Yok
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <h2><?= $productName ?></h2>

                <p class="text-muted">
                    Kategori: <?= $productCategory ?>
                </p>

                <h4 class="mt-3">
                    <?= number_format($productPrice, 2) ?> ₺
                </h4>

                <p class="mt-4">
                    <?= $productDescription ?>
                </p>

                <p>
                    <strong>Stok:</strong> <?= (int)$productStock ?>
                </p>

                <?php if ($productStock > 0): ?>
                    <button type="button"
                            id="detailAddCartBtn"
                            class="btn btn-merilyen mt-3"
                            data-product-id="<?= (int)$productId ?>"
                            data-product-name="<?= $productName ?>"
                            data-stock="<?= (int)$productStock ?>">
                        Sepete Ekle
                    </button>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary mt-3" disabled>
                        Stokta Yok
                    </button>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>

<script src="<?= base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= base_url('vendor/sweetalert/sweetalert.min.js') ?>"></script>

<script>
    function showMerilyenToast(message, type = 'success') {
        const toast = document.getElementById('merilyenToast');

        if (!toast) return;

        toast.className = 'merilyen-toast ' + type;
        toast.innerHTML = message;
        toast.style.display = 'block';

        clearTimeout(window.merilyenToastTimer);

        window.merilyenToastTimer = setTimeout(function() {
            toast.style.display = 'none';
        }, 2600);
    }

    const detailAddCartBtn = document.getElementById('detailAddCartBtn');

    if (detailAddCartBtn) {
        detailAddCartBtn.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName || 'Ürün';

            const formData = new FormData();
            formData.append('quantity', 1);

            this.disabled = true;
            this.textContent = 'Ekleniyor...';

            fetch("<?= base_url('/cart/add') ?>/" + productId, {
                    method: "POST",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: formData
                })
                .then(function(response) {
                    return response.json();
                })
                .then((data) => {
                    this.disabled = false;
                    this.textContent = 'Sepete Ekle';

                    if (!data.success) {
                        showMerilyenToast(data.message || 'Ürün sepete eklenemedi.', 'error');
                        return;
                    }

                    if (typeof swal === 'function') {
                        swal(productName, "Ürün sepete eklendi.", "success");
                    } else {
                        showMerilyenToast('<strong>' + productName + '</strong><br>Ürün sepete eklendi.', 'success');
                    }
                })
                .catch(() => {
                    this.disabled = false;
                    this.textContent = 'Sepete Ekle';
                    showMerilyenToast('Sepete ekleme sırasında hata oluştu.', 'error');
                });
        });
    }
</script>

</body>
</html>
