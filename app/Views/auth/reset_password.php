<?php
$user = $user ?? null;
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merilyen | Yeni Şifre Belirle</title>

    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f7f2ff 0%, #fff7fb 45%, #f4f7ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .auth-card {
            width: 100%;
            max-width: 640px;
            background: white;
            border-radius: 26px;
            padding: 45px 65px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.11);
        }

        .brand {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            color: #222;
            margin-bottom: 18px;
        }

        .page-title {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-desc {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .form-control {
            height: 56px;
            border: none;
            border-radius: 0;
            background: #f8f8f8;
            padding-left: 18px;
            font-size: 15px;
            margin-bottom: 14px;
        }

        .form-control:focus {
            background: #f8f8f8;
            box-shadow: 0 0 0 0.18rem rgba(113,127,224,0.18);
        }

        .btn-auth {
            margin-top: 18px;
            height: 56px;
            border-radius: 8px;
            background: #717fe0;
            border: none;
            font-weight: 700;
            font-size: 17px;
        }

        .btn-auth:hover {
            background: #5f6ed8;
        }

        .alert {
            border-radius: 12px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #717fe0;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            color: #5f6ed8;
        }

        @media (max-width: 768px) {
            .auth-card {
                margin: 18px;
                padding: 35px 28px;
            }
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="brand">Merilyen</div>

    <?php if (!$user): ?>

        <div class="page-title">Kullanıcı Bulunamadı</div>

        <p class="page-desc">
            Şifre sıfırlama bağlantısı geçersiz veya kullanıcı bilgisi bulunamadı.
        </p>

        <div class="alert alert-danger">
            Lütfen şifre sıfırlama işlemini tekrar başlatın.
        </div>

        <a href="<?= base_url('/forgot-password') ?>" class="back-link">
            Şifremi Unuttum Sayfasına Dön
        </a>

    <?php else: ?>

        <div class="page-title">Yeni Şifre Belirle</div>

        <p class="page-desc">
            <?= esc((string)($user['email'] ?? '')) ?> hesabı için yeni şifrenizi belirleyiniz.
        </p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/reset-password-post/' . ($user['id'] ?? 0)) ?>" method="post">

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Yeni Şifre"
                   required>

            <input type="password"
                   name="password_confirm"
                   class="form-control"
                   placeholder="Yeni Şifre Tekrar"
                   required>

            <button type="submit" class="btn btn-primary btn-auth w-100">
                Şifreyi Güncelle
            </button>

        </form>

        <a href="<?= base_url('/login') ?>" class="back-link">
            Giriş Sayfasına Dön
        </a>

    <?php endif; ?>

</div>

</body>
</html>