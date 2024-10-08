<?php 
  require 'koneksi.php';

  $sql = mysqli_query($conn, "SELECT * FROM login");

  $login = [];

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

      <search>
        <form action="" class="search-bar-spotify">
          <input type="text" placeholder="Cari username atau email di sini" class="search-input-spotify" />
          <button type="submit" class="search-button-spotify">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
          </button>
        </form>
      </search>

      <div style="width: 100%;">
        <a href="tambah_data.php" class="button">
          <i class="fa-solid fa-plus"></i>
          Tambah Pengguna
        </a>
      </div>

      <table class="table-spotify">
        <thead>
          <tr class="table-spotify-row">
            <th class="table-spotify-header">No</th>
            <th class="table-spotify-header">Username</th>
            <th class="table-spotify-header">Nama</th>
            <th class="table-spotify-header">Email</th>
            <th class="table-spotify-header">Password</th>
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
            <td class="table-spotify-data"><?php echo $user['password'] ?></td>
            <td class="table-spotify-data" style="display: flex; justify-content: space-around;">
            <a href="update.php?id=<?php echo $user['id_user']; ?>" class="link">
                <i class="fas fa-pen"></i>
            </a>
            <a href="hapus.php?id_user=<?php echo $user['id_user']; ?>" class="link">
                <i class="fas fa-trash-can"></i>
            </a>


            </td>
          </tr>
          <?php $i++; endforeach?>
        </tbody>
      </table>
    </main>
    <script src="js/script.js"></script>
  </body>
</html>