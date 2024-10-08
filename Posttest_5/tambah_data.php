<?php 
require 'koneksi.php';

if(isset($_POST['tambah'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menyusun query untuk menambahkan data
    $query = "INSERT INTO login (username, nama, email, password) VALUES ('$username', '$nama', '$email', '$password')";

    // Menjalankan query dan menyimpan hasil
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil dijalankan
    if($result){
        echo "
            <script>
                alert('Berhasil menambah data');
                document.location.href = 'lihat_data.php';
            </script>
        ";
    }else{
        // Menampilkan error jika query gagal
        echo "
            <script>
                alert('Gagal menambah data: " . mysqli_error($conn) . "');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <div class="login-logo">
            <img src="img/logo-spotify.png" alt="Spotify Logo" class="logo">
            <h2 id="formTitle">Tambah Pengguna Spotify</h2>
        </div>
        
        <form id="dataForm" class="login-form" action="" method="POST" novalidate>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <p class="error-message">Username tidak boleh kosong.</p>
        
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama" required>
            <p class="error-message">Nama tidak boleh kosong.</p>
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="youremail@gmail.com" required>
            <p class="error-message">Email tidak boleh kosong.</p>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <p class="error-message">Password tidak boleh kosong.</p>
            
            <div class="submit-container">
                <button type="submit" name="tambah" class="submit-btn">Tambah</button>
            </div>
        </form>
        
    </div>
</div>
<script src="js/login.js"></script>

</body>
</html>
