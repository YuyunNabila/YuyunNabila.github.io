<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <div class = "login-logo">
                <img src="img/logo-spotify.png" alt="Spotify Logo" class="logo">
                <h2>Login to Spotify</h2>
            </div>
            
            <form id="loginForm" class="login-form" action="welcome.php" method="POST" >
                <label for="username">Nama pengguna</label>
                <input type="text" id="username" name="username" placeholder="Nama pengguna" required>
                <p class="error-message">Nama pengguna tidak boleh kosong.</p>
            
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
                    <button  class="submit-btn">Log In</button>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
