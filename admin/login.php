<?php
require_once 'auth.php';

// Jika sudah login, redirect ke dashboard
if (is_admin_logged_in()) {
    header('Location: index.php');
    exit();
}

$login_error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    // Validasi input tidak kosong
    if (empty($username) || empty($password)) {
        $login_error = 'Username dan password tidak boleh kosong!';
    } else if (validate_login($username, $password)) {
        // Login berhasil
        set_login_session($username);
        header('Location: index.php');
        exit();
    } else {
        // Login gagal
        $login_error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Nusaman Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0D1B2A 0%, #1B263B 50%, #29384D 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-card .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-card .logo-section h1 {
            color: #0D1B2A;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .login-card .logo-section p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #264b74ff;
            box-shadow: 0 0 0 0.2rem rgba(38, 75, 116, 0.25);
            outline: none;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 600;
            color: #0D1B2A;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .btn-login {
            width: 100%;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            border-radius: 8px;
            background-color: #264b74ff;
            border: none;
            color: white;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            background-color: #1a334f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 75, 116, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .form-icon {
            position: relative;
        }
        
        .form-icon i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }
        
        .form-control-icon {
            padding-right: 45px;
        }
        
        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 12px;
        }
        
        .divider {
            margin: 25px 0;
            text-align: center;
            color: #ddd;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <h1><i class="bi bi-shield-lock"></i> Admin Panel</h1>
                <p>Nusaman Tech Solutions</p>
            </div>
            
            <?php if (!empty($login_error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Login Gagal!</strong> <?php echo htmlspecialchars($login_error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="form-icon">
                        <input 
                            type="text" 
                            class="form-control form-control-icon" 
                            id="username" 
                            name="username" 
                            placeholder="Masukkan username" 
                            required
                            autofocus>
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="form-icon">
                        <input 
                            type="password" 
                            class="form-control form-control-icon" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password" 
                            required>
                        <i class="bi bi-lock-fill"></i>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-login text-white">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>
            
            <div class="divider">───────</div>
            
            <div class="footer-text">
                <p class="mb-0">Demo Credentials</p>
                <p class="mb-0"><strong>Username:</strong> admin</p>
                <p class="mb-0"><strong>Password:</strong> admin</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
