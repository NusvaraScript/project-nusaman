<?php
require_once __DIR__ . '/inc/db.php';
if (!is_logged_in()) {
    header('Location: login.php'); exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="container py-4">
        <h3>Dashboard Admin</h3>
        <p>Selamat datang, <?=htmlspecialchars($_SESSION['admin_user'] ?? 'Admin')?></p>
        <ul>
            <li><a href="layanan/index.php">Manajemen Layanan (CRUD)</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
