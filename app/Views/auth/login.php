<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merilyen | Giriş Yap</title>
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
            padding: 45px 70px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.11);
        }

        .brand {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            color: #222;
            letter-spacing: 1px;
            margin-bottom: 38px;
        }

        .auth-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 34px;
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
            height: 58px;
            border: none;
            border-radius: 0;
            background: #f8f8f8;
            padding-left: 18px;
            font-size: 16px;
        }

        .form-control:focus {
            background: #f8f8f8;
            box-shadow: 0 0 0 0.18rem rgba(113, 127, 224, 0.18);
        }

        .form-group {
            margin-bottom: 16px;
        }

        .password-wrap {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 18px;
            cursor: pointer;
            color: #777;
        }

        .btn-login {
            margin-top: 28px;
            height: 58px;
            border-radius: 8px;
            background: #717fe0;
            border: none;
            font-weight: 700;
            font-size: 17px;
        }

        .btn-login:hover {
            background: #5f6ed8;
        }

        .bottom-links {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            font-size: 15px;
        }

        .bottom-links a,
        .demo-toggle {
            color: #717fe0;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            background: transparent;
            padding: 0;
        }

        .alert {
            border-radius: 12px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .auth-card {
                margin: 18px;
                padding: 34px 28px;
            }
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="brand">Merilyen</div>

    <div class="auth-tabs">
        <a href="<?= base_url('/login') ?>" class="active">Giriş Yap</a>
        <a href="<?= base_url('/register') ?>">Üye Ol</a>
    </div>

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

    <form action="<?= base_url('/login-post') ?>" method="post">

        <div class="form-group">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="E-posta"
                   required>
        </div>

        <div class="form-group password-wrap">
            <input type="password"
                   name="password"
                   id="passwordInput"
                   class="form-control"
                   placeholder="Şifre"
                   required>

            <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
        </div>

        <button type="submit" class="btn btn-primary btn-login w-100">
            Giriş Yap
        </button>

    </form>

    <div class="bottom-links">
        <a href="<?= base_url('/products') ?>">Geri dön</a>
        <a href="<?= base_url('/forgot-password') ?>">Şifremi Unuttum</a>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

</body>

</html>