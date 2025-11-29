<?php
require_once __DIR__ . '/inc/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // untuk demo: kredensial statis. Untuk produksi gunakan tabel users dan hashing password.
    if ($user === 'admin' && $pass === 'password') {
        $_SESSION['admin_logged'] = true;
        $_SESSION['admin_user'] = 'admin';
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Kredensial salah';
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../component.js">
    <title>Login Admin</title>
</head>
<body style="background:#f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login Admin</h4>
                        <?php if ($error): ?><div class="alert alert-danger"><?=htmlspecialchars($error)?></div><?php endif; ?>
                        <form method="post">
                            <div class="mb-2">
                                <label class="form-label">Username</label>
                                <input class="form-control" name="user" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass" required>
                            </div>
                            <button class="btn btn-primary">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
