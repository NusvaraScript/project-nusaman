<?php
require_once __DIR__ . '/../inc/db.php';
if (!is_logged_in()) { header('Location: ../login.php'); exit; }

$stmt = $pdo->query('SELECT * FROM layanan ORDER BY id DESC');
$layanan = $stmt->fetchAll();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manajemen Layanan</title>
</head>
<body>
    <div class="container py-4">
        <h3>Manajemen Layanan</h3>
        <a href="create.php" class="btn btn-success mb-3">Tambah Layanan</a>
        <table class="table table-bordered">
            <thead><tr><th>ID</th><th>Nama</th><th>Harga</th></tr></thead>
            <tbody>
            <?php foreach($layanan as $l): ?>
                <tr>
                    <td><?= $l['id'] ?></td>
                    <td><?= htmlspecialchars($l['nama_layanan']) ?></td>
                    <td><?= number_format($l['harga'],0,',','.') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../../dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</body>
</html>
