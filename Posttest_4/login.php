<?php
session_start(); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = htmlspecialchars(trim($_POST['username']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    
   
    if (empty($username) || empty($nama) || empty($email) || empty($password)) {
        echo "Semua field harus diisi!";
        exit;
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email salah!";
        exit;
    }

    
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;

    
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login Berhasil</title>
        <link rel='stylesheet' href='login.css'>
    </head>
    <body>

    <?php include ('navbar.php')?>
    
        <div class='login-success'>
            <h1>Login Berhasil!</h1>
            <h2>Selamat datang, " . htmlspecialchars($nama) . "</h2>
            <div class ='profile'>
                <p><strong>Username:</strong> " . htmlspecialchars($username) . "</p>
                <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Password:</strong> " . htmlspecialchars($password) . "</p>
            </div>
        </div>
    </body>
    </html>
    ";
} else {
    
    echo "Tidak ada data yang diterima.";
}
?>
