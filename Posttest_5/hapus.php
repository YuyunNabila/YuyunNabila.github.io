<?php
require 'koneksi.php';

// Validasi dan ambil ID dari URL
if (isset($_GET['id_user'])) {
    $id_user = intval($_GET['id_user']); // Mengubah ID menjadi integer

    // Menghapus data pengguna berdasarkan id_user
    $result = mysqli_query($conn, "DELETE FROM login WHERE id_user = $id_user");

    if ($result) {
        echo "
            <script>
                alert('Berhasil menghapus data');
                document.location.href = 'lihat_data.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data: " . mysqli_error($conn) . "');
                document.location.href = 'lihat_data.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID pengguna tidak ditemukan');
            document.location.href = 'lihat_data.php';
        </script>
    ";
}
?>
