<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$nama = $_SESSION['nama'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login Berhasil</title>
    <link rel='stylesheet' href='css/login.css'>
</head>
<body>


    <div class='login-success'>
        <h1>Login Berhasil!</h1>
        <h2>Selamat datang, <?php echo htmlspecialchars($nama); ?></h2>
        <div class ='profile'>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <a href="landingpage.php" class="btn">Lanjut ke Landing Page</a>
        </div>
    </div>
</body>
</html>