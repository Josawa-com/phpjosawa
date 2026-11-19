<?php
session_start();
include 'koneksi.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username   = trim($_POST['username']);
    $password   = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter.';
    } elseif ($password !== $konfirmasi) {
        $error = 'Konfirmasi password tidak cocok.';
    } else {
        $cek = mysqli_prepare($koneksi, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($cek, "s", $username);
        mysqli_stmt_execute($cek);
        mysqli_stmt_store_result($cek);

        if (mysqli_stmt_num_rows($cek) > 0) {
            $error = 'Username sudah dipakai.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($koneksi, "INSERT INTO users (username, password) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
            mysqli_stmt_execute($stmt);
            header("Location: login.php?daftar=sukses");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">
    <form method="POST" class="login-box">
        <h2>Buat Akun</h2>
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Minimal 8 karakter" required>
        <label>Ulangi Password</label>
        <input type="password" name="konfirmasi" required>
        <input type="submit" value="Daftar" class="btn" style="width:100%">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</body>
</html>
