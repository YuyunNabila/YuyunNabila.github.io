<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <section class="container">
        <nav>
            <div class="navbar-section" ID="navbar">
                <div class="logo-spotify">
                    <img src="img/logo-spotify.png" alt="Logo Spotify" width="50px" height="50px">
                    <span class="logo-text">Spotify</span>
                </div>
                <div class="nav-bg hide">
                    <ul class="nav-links hide">
                        <li><a href="#Home">Home</a></li>
                        <li><a href="#premium-section">Premium</a></li>
                        <li><a href="#Download">Download</a></li>
                        <li><a href="#Help">Help</a></li>
                        <li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a href="lihat_data.php">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</a>';
                            } 
                            ?>
                        </li>
                    </ul>
                </div>
                <a href="AboutMe.php" class="aboutme">About Me</a>
                <div class="login-section">
                <?php
                if (!isset($_SESSION['loggedin'])) {
                    echo '<a href="login.php" class="login-button">Login</a>';
                    echo '<a href="tambah_data.php" class="login-button">Registrasi</a>';
                } else {
                    echo '<a href="logout.php" class="login-button">Logout</a>';
                }
                ?>
                    <button class="mode-button" id="mode-toggle" class="mode-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                        </svg>
                    </button>
                </div>
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                        </svg>
                    </button>
                </div>
                <button class="hum" id="hum">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                        <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                        <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                      </svg>
                </button>
            </div>           
        </nav>

        <div class="humberger-content">
            <div class="nav-bg" >
                <ul class="nav-links">
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#premium-section">Premium</a></li>
                    <li><a href="#Download">Download</a></li>
                    <li><a href="#Help">Help</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>

        <main>
            <section class="hero" id="Home">
                <div class="hero-text">
                    <h1>One app for </h1>
                    <h1>all your sounds</h1>
                    <p>Want to discover new music? Find music that you'll love today!</p>
                    <a href="#Download" class="btn-download">Download Spotify</a>
                </div>
                <div class="hero-image">
                    <img src="img/spotify.png" alt="Spotify App Mockup">
                </div>
            </section>
        </main>
    </section>


    <section class="features">
        <div class="features-text">
            <h1>With Spotify, you can play millions of songs for free. Listen to the songs you love and find music from all over the world.</h1>
        </div>
        
        <div class="features-grid">
            <div class="feature-item">
                <h3>Discover new music and albums</h3>
                <img src="img/1.jpg" alt="Discover new music">
            </div>
            <div class="feature-item">
                <h3>Search for your favorite song or artist</h3>
                <img src="img/2.jpg" alt="Search songs or artist">
            </div>
            <div class="feature-item">
                <h3>Enjoy playlists made just for you</h3>
                <img src="img/3.jpg" alt="Playlists made for you">
            </div>
            <div class="feature-item">
                <h3>Make and share your own playlists</h3>
                <img src="img/4.jpg" alt="Make and share playlists">
            </div>
            <div class="feature-item">
                <h3>Find music for any mood and activity</h3>
                <img src="img/5.jpg" alt="Music for any mood">
            </div>
            <div class="feature-item">
                <h3>Listen on all your devices</h3>
                <img src="img/6.jpg" alt="Listen on devices">
            </div>
        </div>
    </section>
    
    <section class="premium-section" id="premium-section">
        <div class="premium-text">
            <h2>Spotify offers free music, curated playlists you can't find anywhere else or you can get our <a href="https://www.spotify.com/id-id/premium/" class="highlight">Premium plan</a>.</h2>
        </div>
        <div class="premium-grid">
            <div class="premium-item">
                <div class="icon">
                    <img src="img/icon-sound-quality.png" alt="Sound Quality">
                </div>
                <p>Enjoy amazing sound quality on personalized music</p>
            </div>
            <div class="premium-item">
                <div class="icon">
                    <img src="img/icon-download.png" alt="Download">
                </div>
                <p>Download and play music for offline listening</p>
            </div>
            <div class="premium-item">
                <div class="icon">
                    <img src="img/icon-ad-free.png" alt="Ad-Free">
                </div>
                <p>Listen to an album or playlist without ad breaks</p>
            </div>
        </div>
    </section>
    
    <section class="testimonials-section">
        <h2>What people say about Spotify</h2>
        <div class="testimonials-container"> 
            
            <div class="testimonial-card">
                <div class="profile">
                    <img src="img/elly.jpg" alt="elly S." class="profile-pic">
                    <div class="user-info">
                        <h3>Mrs. Elly N.</h3>
                        <p>Fanumtaxx</p>
                    </div>
                </div>
                <p class="testimonial-text">
                    "10 years ago I started using a new music app called Spotify! Over the last decade, I've met amazing Spotify employees and users, discovered amazing artists, and fell in love with music. It's been an incredible adventure! Looking forward to many more years of music!"
                </p>
            </div>
            <div class="testimonial-card">
                <div class="profile">
                    <img src="img/rey.jpg" alt="rey." class="profile-pic">
                    <div class="user-info">
                        <h3>Mr. Rey</h3>
                        <p>Orlando, FL</p>
                    </div>
                </div>
                <p class="testimonial-text">
                    "If there's one constant in the vast, ongoing, streaming landscape, it is this fact: Spotify is the big dog. Spotify remains dominant due to its large catalog, collaborative playlists, podcasts, and other attractive features."
                </p>
            </div>
        </div>
    </section>

    <section class="download-section" id="Download">
        <div>
            <h1>Download Spotify</h1>
            <p>Klik this icon!</p>
            <div class="buttons">
                <a href="https://play.google.com/store/apps/details?id=com.spotify.music" class="button google-play">
                    <img src="img/play-store.png" alt="Get it on Google Play">    
                </a>
                <a href="https://apps.apple.com/app/spotify-music-and-podcasts/id324684580" class="button app-store">
                    <img src="img/app-store.png" alt="Download on the App Store">
                </a>
            </div>
        </div>
    </section>

    <section class="features download">
        <div class="container">
            <div class="feature">
                <img src="img/laptop1.png" alt="Podcast Screenshot">
            </div>
            <div class="feature-2">
                <img src="img/hp1.png" alt="Podcast Screenshot">
            </div>
            <div class="feature">
                <img src="img/laptop2.png" alt="Discover Weekly Screenshot">
            </div>
            <div class="feature-2">
                <img src="img/hp2.png" alt="RapCaviar Screenshot">
            </div>
            <div class="feature">
                <img src="img/laptop3.png" alt="Lucas + Sam Screenshot">
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container" id="Help">
            <div class="footer-logo">
                <img src="img/logo-spotify-putih.png" alt="Spotify Logo" >
                <p>© 2024 Spotify</p>
            </div>
            <div class="footer-columns">
                <div class="footer-left">
                    <div class="footer-column">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">For the Record</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Communities</h3>
                        <ul>
                            <li><a href="#">For Artists</a></li>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Investors</a></li>
                            <li><a href="#">Vendors</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Web player</a></li>
                            <li><a href="#">Free Mobile App</a></li>
                        </ul>
                    </div>
                </div>


                <div class="footer-right">
                    <div class="footer-column">
                        <ul>
                            <li><a href="#">Legal</a></li>
                            <li><a href="#">Privacy Center</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookies</a></li>
                            <li><a href="#">About Ads</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <ul>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg></li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                            </svg></li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js" ></script>
</body>
</html>

