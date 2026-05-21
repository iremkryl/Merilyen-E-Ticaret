<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merilyen | Şifremi Unuttum</title>
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
        }

        .form-control:focus {
            background: #f8f8f8;
            box-shadow: 0 0 0 0.18rem rgba(113,127,224,0.18);
        }

        .btn-auth {
            margin-top: 24px;
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

        .bottom-links {
            margin-top: 20px;
            text-align: center;
        }

        .bottom-links a {
            color: #717fe0;
            font-weight: 600;
            text-decoration: none;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="auth-card">

    <div class="brand">Merilyen</div>

    <div class="page-title">Şifremi Unuttum</div>

    <p class="page-desc">
        Kayıtlı e-posta adresinizi giriniz. Ardından yeni şifre belirleme ekranına yönlendirileceksiniz.
    </p>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/forgot-password-post') ?>" method="post">

        <input type="email" name="email" class="form-control" placeholder="E-posta" required>

        <button type="submit" class="btn btn-primary btn-auth w-100">
            Devam Et
        </button>
    </form>

    <div class="bottom-links">
        <a href="<?= base_url('/login') ?>">Giriş ekranına dön</a>
    </div>

</div>

</body>
</html>