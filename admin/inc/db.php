<?php
// db.php - koneksi PDO ke MySQL
// Sesuaikan konfigurasi DB sesuai lingkungan XAMPP Anda
session_start();
date_default_timezone_set('Asia/Jakarta');

$DB_HOST = '127.0.0.1';
$DB_NAME = 'nusantara_db';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $e) {
    die('Koneksi DB gagal: ' . $e->getMessage());
}

function is_logged_in() {
    return !empty($_SESSION['admin_logged']);
}
