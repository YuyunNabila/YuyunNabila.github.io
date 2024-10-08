<?php 
require 'koneksi.php';

$id = $_GET['id'];

// Mengambil data pengguna berdasarkan ID
$result = mysqli_query($conn, "SELECT * FROM login WHERE id_user = '$id'");

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "
        <script>
            alert('Data tidak ditemukan');
            document.location.href = 'lihat_data.php';
        </script>
    ";
}

// Proses pembaruan data pengguna
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (!empty($username) && !empty($nama) && !empty($email)) {
        // Jika password kosong, ambil password dari database
        if (empty($password)) {
            // Ambil password lama
            $userOld = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM login WHERE id_user = '$id'"));
            $password = $userOld['password']; // Gunakan password lama
        }

        // Menggunakan prepared statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("UPDATE login SET username = ?, nama = ?, email = ?, password = ? WHERE id_user = ?");
        $stmt->bind_param("ssssi", $username, $nama, $email, $password, $id);

        if ($stmt->execute()) {
            echo "
                <script>
                    alert('Berhasil memperbarui data');
                    document.location.href = 'lihat_data.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal memperbarui data: " . mysqli_error($conn) . "');
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Semua field harus diisi');
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
    <title>Update Data Pengguna</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <div class="login-logo">
            <img src="img/logo-spotify.png" alt="Spotify Logo" class="logo">
            <h2 id="formTitle">Update Pengguna Spotify</h2>
        </div>
        
        <form id="dataForm" class="login-form" action="" method="POST" novalidate>
            <input type="hidden" id="userId" name="id_user" value="<?php echo isset($user['id_user']) ? $user['id_user'] : ''; ?>"> 

            <label for="username">Nama pengguna</label>
            <input type="text" id="username" name="username" placeholder="Nama pengguna" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>" required>
            <p class="error-message">Nama pengguna tidak boleh kosong.</p>
        
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo isset($user['nama']) ? $user['nama'] : ''; ?>" required>
            <p class="error-message">Nama tidak boleh kosong.</p>
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="youremail@gmail.com" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" required>
            <p class="error-message">Email tidak boleh kosong.</p>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <p class="error-message">Password tidak boleh kosong.</p>
            
            <div class="submit-container">
                <button type="submit" name="update" class="submit-btn">
                    Update
                </button>
            </div>
        </form>
        
    </div>
</div>
<script src="js/login.js"></script>

</body>
</html>
