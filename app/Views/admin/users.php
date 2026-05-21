<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin | Kullanıcılar</title>

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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
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

        .status-form {
            min-width: 145px;
            max-width: 180px;
        }

        .admin-protected-box {
            display: inline-flex;
            flex-direction: column;
            gap: 5px;
        }

        .admin-protected-note {
            font-size: 12px;
            color: #777;
        }

        .alert {
            border-radius: 14px;
            border: none;
        }

        .user-action-wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .btn-delete-user {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .sidebar {
                min-height: auto;
            }

            .user-action-wrap {
                align-items: stretch;
            }

            .status-form {
                width: 100%;
                max-width: 100%;
            }

            .btn-delete-user {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<?php
if (!function_exists('admin_user_html')) {
    /**
     * @param mixed $value
     */
    function admin_user_html($value): string
    {
        if (is_string($value) || is_numeric($value)) {
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }

        return '';
    }
}

if (!isset($users) || !is_array($users)) {
    $users = [];
}

$successRaw = session()->getFlashdata('success');
$errorRaw = session()->getFlashdata('error');

$successMessage = is_string($successRaw) || is_numeric($successRaw)
    ? (string)$successRaw
    : '';

$errorMessage = is_string($errorRaw) || is_numeric($errorRaw)
    ? (string)$errorRaw
    : '';

$totalUsers = count($users);
$adminCount = 0;
$activeCount = 0;
$passiveCount = 0;
$frozenCount = 0;

foreach ($users as $userItem) {
    if (!is_array($userItem)) {
        continue;
    }

    $role = (string)($userItem['role'] ?? '');
    $status = (string)($userItem['status'] ?? '');

    if ($role === 'admin') {
        $adminCount++;
    }

    if ($status === 'active') {
        $activeCount++;
    }

    if ($status === 'passive') {
        $passiveCount++;
    }

    if ($status === 'frozen') {
        $frozenCount++;
    }
}
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-lg-2 sidebar">

            <h3>Merilyen</h3>

            <a href="<?= base_url('/admin') ?>">Panel</a>
            <a href="<?= base_url('/admin/products') ?>">Ürünler</a>
            <a href="<?= base_url('/admin/orders') ?>">Siparişler</a>
            <a href="<?= base_url('/admin/users') ?>" class="active">Kullanıcılar</a>
            <a href="<?= base_url('/admin/messages') ?>">Mesajlar</a>
            <a href="<?= base_url('/admin/blogs') ?>">İçerik Yönetimi</a>
            <a href="<?= base_url('/products') ?>">Siteye Git</a>
            <a href="<?= base_url('/logout') ?>">Çıkış Yap</a>

        </div>

        <div class="col-md-9 col-lg-10 content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Kullanıcı Yönetimi</h2>
                    <p class="text-muted mb-0">
                        Sisteme kayıtlı kullanıcıları görüntüleyebilir, durumlarını yönetebilir ve uygun kullanıcıları silebilirsiniz.
                    </p>
                </div>
            </div>

            <?php if ($successMessage !== ''): ?>
                <div class="alert alert-success mb-4">
                    <?= admin_user_html($successMessage) ?>
                </div>
            <?php endif; ?>

            <?php if ($errorMessage !== ''): ?>
                <div class="alert alert-danger mb-4">
                    <?= admin_user_html($errorMessage) ?>
                </div>
            <?php endif; ?>

            <div class="row mb-4">

                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Toplam Kullanıcı</p>
                        <h4><?= (int)$totalUsers ?></h4>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Admin</p>
                        <h4><?= (int)$adminCount ?></h4>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Aktif Hesap</p>
                        <h4><?= (int)$activeCount ?></h4>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="mini-card">
                        <p>Pasif / Dondurulmuş</p>
                        <h4><?= (int)($passiveCount + $frozenCount) ?></h4>
                    </div>
                </div>

            </div>

            <div class="table-card">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead style="background:#717fe0; color:white;">
                            <tr>
                                <th>ID</th>
                                <th>Ad Soyad</th>
                                <th>E-posta</th>
                                <th>Rol</th>
                                <th>Durum / İşlem</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php if (empty($users)): ?>

                            <tr>
                                <td colspan="5" class="text-center p-4">
                                    Kullanıcı bulunamadı.
                                </td>
                            </tr>

                        <?php else: ?>

                            <?php foreach ($users as $user): ?>

                                <?php
                                if (!is_array($user)) {
                                    continue;
                                }

                                $userId = (int)($user['id'] ?? 0);
                                $userName = admin_user_html($user['name'] ?? '');
                                $userSurname = admin_user_html($user['surname'] ?? '');
                                $userEmail = admin_user_html($user['email'] ?? '');
                                $userRole = (string)($user['role'] ?? '');
                                $userStatus = (string)($user['status'] ?? 'active');
                                ?>

                                <tr>

                                    <td>
                                        <?= (int)$userId ?>
                                    </td>

                                    <td>
                                        <?= $userName ?>
                                        <?= $userSurname ?>
                                    </td>

                                    <td>
                                        <?= $userEmail ?>
                                    </td>

                                    <td>

                                        <?php if ($userRole === 'admin'): ?>

                                            <span class="badge bg-dark">
                                                Admin
                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-primary">
                                                Kullanıcı
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td>

                                        <?php if ($userRole === 'admin'): ?>

                                            <div class="admin-protected-box">
                                                <span class="badge bg-dark">
                                                    Admin korunuyor
                                                </span>

                                                <span class="admin-protected-note">
                                                    Admin hesabının durumu değiştirilemez ve silinemez.
                                                </span>
                                            </div>

                                        <?php else: ?>

                                            <div class="user-action-wrap">

                                                <form action="<?= base_url('/admin/users/status/' . $userId) ?>"
                                                      method="post"
                                                      class="status-form">

                                                    <select name="status"
                                                            class="form-select form-select-sm"
                                                            onchange="this.form.submit()">

                                                        <option value="active"
                                                            <?= $userStatus === 'active' ? 'selected' : '' ?>>
                                                            Aktif
                                                        </option>

                                                        <option value="passive"
                                                            <?= $userStatus === 'passive' ? 'selected' : '' ?>>
                                                            Pasif
                                                        </option>

                                                        <option value="frozen"
                                                            <?= $userStatus === 'frozen' ? 'selected' : '' ?>>
                                                            Dondurulmuş
                                                        </option>

                                                    </select>

                                                </form>

                                                <a href="<?= base_url('/admin/users/delete/' . $userId) ?>"
                                                   class="btn btn-sm btn-outline-danger btn-delete-user"
                                                   onclick="return confirm('Bu kullanıcı silinsin mi? Siparişi varsa silinmeyip pasif hale getirilecektir.')">
                                                    Sil
                                                </a>

                                            </div>

                                        <?php endif; ?>

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