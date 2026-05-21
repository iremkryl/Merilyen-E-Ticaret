<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merilyen | Üye Ol</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/icons/m-icon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">

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
            max-width: 760px;
            background: white;
            border-radius: 26px;
            padding: 40px 70px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.11);
        }

        .brand {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            color: #222;
            letter-spacing: 1px;
            margin-bottom: 32px;
        }

        .auth-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
        }

        .auth-tabs a {
            text-align: center;
            padding-bottom: 14px;
            text-decoration: none;
            color: #999;
            font-size: 19px;
            font-weight: 600;
        }

        .auth-tabs a.active {
            color: #222;
            border-bottom: 2px solid #717fe0;
        }

        .form-control {
            height: 54px;
            border: none;
            border-radius: 0;
            background: #f8f8f8;
            padding-left: 18px;
            font-size: 15px;
        }

        textarea.form-control {
            height: 85px;
            padding-top: 14px;
        }

        .form-control:focus {
            background: #f8f8f8;
            box-shadow: 0 0 0 0.18rem rgba(113,127,224,0.18);
        }

        .form-group {
            margin-bottom: 14px;
        }

        .btn-register {
            margin-top: 20px;
            height: 58px;
            border-radius: 8px;
            background: #717fe0;
            border: none;
            font-weight: 700;
            font-size: 17px;
        }

        .btn-register:hover {
            background: #5f6ed8;
        }

        .bottom-links {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            font-size: 15px;
        }

        .bottom-links a {
            color: #717fe0;
            font-weight: 600;
            text-decoration: none;
        }

        .alert {
            border-radius: 12px;
        }

        @media (max-width: 768px) {
            .auth-card {
                margin: 18px;
                padding: 32px 28px;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">

    <div class="brand">Merilyen</div>

    <div class="auth-tabs">
        <a href="<?= base_url('/login') ?>">Giriş Yap</a>
        <a href="<?= base_url('/register') ?>" class="active">Üye Ol</a>
    </div>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/register-post') ?>" method="post">

        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" placeholder="Ad" required>
            </div>

            <div class="col-md-6 form-group">
                <input type="text" name="surname" class="form-control" placeholder="Soyad" required>
            </div>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-posta" required>
        </div>

        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Telefon">
        </div>

        <div class="form-group">
            <textarea name="address" class="form-control" placeholder="Adres"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <input type="password" name="password" class="form-control" placeholder="Şifre" required>
            </div>

            <div class="col-md-6 form-group">
                <input type="password" name="password_confirm" class="form-control" placeholder="Şifre Tekrar" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-register w-100">
            Üye Ol
        </button>
    </form>

    <div class="bottom-links">
        <a href="<?= base_url('/products') ?>">Anasayfaya dön</a>
        <a href="<?= base_url('/login') ?>">Zaten hesabım var</a>
    </div>

</div>

</body>
</html>