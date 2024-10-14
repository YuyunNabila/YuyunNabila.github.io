<?php
require 'koneksi.php';

// Set zona waktu ke WITA (UTC+8)
date_default_timezone_set('Asia/Makassar');

if(isset($_POST['tambah'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menangani file yang diunggah
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Tentukan ekstensi file yang diperbolehkan
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');  // Ekstensi file yang diizinkan

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){  // Batasi ukuran file maksimal 1MB
                // Dapatkan waktu saat ini dalam format yyyy-mm-dd hh.i.s
                $dateTime = date('Y-m-d H.i.s');
                // Buat nama file baru
                $fileNewName = $dateTime . '.' . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNewName;

                // Pindahkan file ke direktori tujuan
                move_uploaded_file($fileTmpName, $fileDestination);

                // Menyusun query untuk menambahkan data ke database
                $query = "INSERT INTO login (username, nama, email, password, file) VALUES ('$username', '$nama', '$email', '$password', '$fileNewName')";

                $result = mysqli_query($conn, $query);

                if($result){
                    echo "
                        <script>
                            alert('Berhasil menambah data');
                            document.location.href = 'lihat_data.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Gagal menambah data: " . mysqli_error($conn) . "');
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Ukuran file terlalu besar!');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Terjadi kesalahan saat mengunggah file!');
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Tipe file tidak diizinkan! Hanya file gambar yang diperbolehkan.');
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
        
        <form id="dataForm" class="login-form" action="" method="POST" enctype="multipart/form-data" novalidate>
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
            
            <label for="file" class="custom-file-label">Upload Foto Profile</label>
            <input type="file" id="file" name="file" required>
            <p class="file-name" id="fileName"></p>
            <p class="error-message" id="fileError">Ukuran file tidak boleh lebih dari 2MB</p>

            <div class="submit-container">
                <button type="submit" name="tambah" class="submit-btn">Tambah</button>
            </div>
        </form>
        
    </div>
</div>
<script src="js/login.js"></script>

</body>
</html>
