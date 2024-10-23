<?php 
  session_start();
  require 'koneksi.php';

  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $sql = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
  } else {
      // Redirect to login page if not logged in
      header("Location: login.php");
      exit();
  }

  $login = [];

  if ($_SESSION['role'] == 'admin') {
      if (isset($_GET['search'])) {
          $search = mysqli_real_escape_string($conn, $_GET['search']);
          $sql = mysqli_query($conn, "SELECT * FROM login WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
      } else {
          $sql = mysqli_query($conn, "SELECT * FROM login");
      }
  }

  while($row = mysqli_fetch_assoc($sql)){
    $login[] = $row;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/crud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="data-spotify-section">

    <div class="data-spotify-title">
        <h1>
            Data Pengguna Spotify
        </h1>
    </div>

      <?php if ($_SESSION['role'] == 'admin'): ?>
        <search>
          <form action="" method="GET" class="search-bar-spotify">
            <input type="text" name="search" placeholder="Cari username atau email di sini" class="search-input-spotify" />
            <button type="submit" class="search-button-spotify">
              <i class="fa-solid fa-magnifying-glass fa-xl"></i>
            </button>
          </form>
        </search>
      <?php endif; ?>

      <table class="table-spotify">
        <thead>
          <tr class="table-spotify-row">
            <th class="table-spotify-header">No</th>
            <th class="table-spotify-header">Username</th>
            <th class="table-spotify-header">Nama</th>
            <th class="table-spotify-header">Email</th>
            <th class="table-spotify-header">Foto Profile</th>
            <th class="table-spotify-header">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach($login as $user): ?>
          <tr class="table-spotify-row">
              <td class="table-spotify-data"><?php echo $i ?></td>
              <td class="table-spotify-data"><?php echo $user['username'] ?></td>
              <td class="table-spotify-data"><?php echo $user['nama'] ?></td>
              <td class="table-spotify-data"><?php echo $user['email'] ?></td>
              <td class="table-spotify-data">
                  <?php if ($user['file']): ?>
                      <?php 
                          $filePath = 'uploads/' . $user['file'];
                          $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                      ?>
                      <?php if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                          <img src="<?php echo $filePath; ?>" alt="File Gambar" style="max-width: 100px; max-height: 100px;"/>
                      <?php else: ?>
                          <?php echo htmlspecialchars($user['file']); ?>
                      <?php endif; ?>
                  <?php else: ?>
                      Tidak ada file
                  <?php endif; ?>
              </td>
              <td class="table-spotify-data" style="display: flex; justify-content: space-around;">
                  <a href="update.php?id=<?php echo $user['id_user']; ?>" class="link">
                      <i class="fas fa-pen"></i>
                  </a>
                  <a href="hapus.php?id_user=<?php echo $user['id_user']; ?>" class="link">
                      <i class="fas fa-trash-can"></i>
                  </a>
              </td>
          </tr>
          <?php $i++; endforeach ?>
        </tbody>

      </table>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
