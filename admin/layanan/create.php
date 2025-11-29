<?php
require_once __DIR__ . '/../inc/db.php';
if (!is_logged_in()) { header('Location: ../login.php'); exit; }

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_layanan'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $harga = (int)($_POST['harga'] ?? 0);

    if (!$nama) $errors[] = 'Nama layanan wajib diisi.';

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO layanan (nama_layanan, deskripsi, harga) VALUES (:n, :d, :h)');
        $stmt->execute([':n'=>$nama, ':d'=>$deskripsi, ':h'=>$harga]);
        header('Location: index.php'); exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Layanan</title>
</head>
<body>
    <div class="container py-4">
        <h3>Tambah Layanan</h3>
        <?php if($errors): ?><div class="alert alert-danger"><?=implode('<br>', array_map('htmlspecialchars',$errors))?></div><?php endif; ?>
        <form method="post">
            <div class="mb-2">
                <label class="form-label">Nama Layanan</label>
                <input name="nama_layanan" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label class="form-label">Harga (IDR)</label>
                <input type="number" name="harga" class="form-control" value="0">
            </div>
            <button class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
