<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Fungsi untuk validasi login
 * @param string $username
 * @param string $password
 * @return bool true jika kredensial valid
 */
function validate_login($username, $password) {
    // Kredensial admin yang valid
    $valid_username = 'admin';
    $valid_password = 'admin';
    
    // Validasi username dan password
    return ($username === $valid_username && $password === $valid_password);
}

/**
 * Fungsi untuk set session login
 * @param string $username
 */
function set_login_session($username) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    $_SESSION['login_time'] = time();
}

/**
 * Fungsi untuk check apakah user sudah login
 * @return bool true jika user sudah login
 */
function is_admin_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Fungsi untuk logout
 */
function logout_admin() {
    session_destroy();
    header('Location: login.php');
    exit();
}

/**
 * Fungsi untuk check login dan redirect jika belum login
 */
function check_admin_login() {
    if (!is_admin_logged_in()) {
        header('Location: login.php');
        exit();
    }
}
?>
