<?php
session_start(); // Start the session

require 'koneksi.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM login WHERE email = ? AND username = ? AND nama = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $email, $username, $nama);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = $row['role']; 
        $_SESSION['loggedin'] = true; 
        header("Location: masuk.php");
        exit();
    } else {
        echo "<script>
            alert('Login Gagal: Password salah.');
            window.location.href = 'login.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Login Gagal: Data tidak sesuai.');
        window.location.href = 'login.php';
    </script>";
}
?>
