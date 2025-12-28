<?php
session_start();
require 'crud.php'; // Kita butuh koneksi database ($conn)

// --- LOGIKA LOGIN PHP ---
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Cari user berdasarkan username
    // Gunakan Prepared Statement biar aman dari SQL Injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // 2. Cek apakah username ada
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // 3. Cek Password (Verify Hash)
        if ($password == $row['password']) {
            
            // Login Sukses! Simpan data ke SESSION
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Penting: simpan role (admin/user)

            // 4. Redirect sesuai Role
            if ($row['role'] == 'admin') {
                header("Location: adminpage/adminpage.php");
            } else {
                header("Location: userpage/userpage.php"); // User biasa ke landing page
            }
            exit;
        }
    }

    $error = true; // Tandai jika login gagal
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Kita</title>
    <link rel="stylesheet" href="userpage.css">
    <style>
        /* CSS KHUSUS LOGIN (Overwrite/Nambahin userpage.css) */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden; /* Biar blob ga bikin scroll */
        }

        .login-card {
            background: white;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10; /* Di atas blob */
            text-align: center;
        }

        .login-title {
            font-size: 28px;
            font-weight: bold;
            color: #2d3436;
            margin-bottom: 10px;
        }

        .login-subtitle {
            font-size: 14px;
            color: #636e72;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #2d3436;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dfe6e9;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
            background: #f9f9f9;
        }

        .form-control:focus {
            border-color: #6c5ce7;
            background: white;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        .error-msg {
            background: #ffebee;
            color: #c0392b;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* Blob Dekorasi (Copy style dari userpage tapi disesuaikan posisinya) */
        .blob-login-1 {
            position: absolute;
            width: 400px; height: 400px;
            background: linear-gradient(135deg, #a29bfe, #74b9ff);
            border-radius: 50%;
            filter: blur(60px);
            top: -100px; left: -100px;
            z-index: 1;
            opacity: 0.5;
        }
        .blob-login-2 {
            position: absolute;
            width: 300px; height: 300px;
            background: linear-gradient(135deg, #ff7675, #fab1a0);
            border-radius: 50%;
            filter: blur(50px);
            bottom: -50px; right: -50px;
            z-index: 1;
            opacity: 0.4;
        }
    </style>
</head>
<body>

    <div class="blob-login-1"></div>
    <div class="blob-login-2"></div>

    <div class="login-card">
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Silakan login untuk melanjutkan</p>

        <?php if(isset($error)) : ?>
            <div class="error-msg">Username atau Password salah!</div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login" class="btn-login">LOGIN</button>
        </form>

        <p style="margin-top: 20px; font-size: 12px; color: #b2bec3;">
            Belum punya akun? Hubungi Admin Perpustakaan.
        </p>
    </div>

</body>
</html>