<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi panjang password minimal 8 karakter
    if (strlen($password) < 8) {
        $error = "Password harus memiliki minimal 8 karakter.";
    } else {
        $result = $conn->query("SELECT * FROM users WHERE username='$username'");
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles1.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (isset($error)): ?>
            <p class="error-message"><?= $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password (min. 8 karakter)" required minlength="8">
            <button type="submit">Login</button>
        </form>
        
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>
