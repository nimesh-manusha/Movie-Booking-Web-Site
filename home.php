<?php
session_start();
// Connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVOY</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<header class="main-header">
    <div class="container">
        <div class="logo">
            <a href="/">
                <span class="SAV">SAV</span>
                <span class="best">OY</span>
            </a>
        </div>
        <nav>

<ul>
<li><a class="nav-link" href="index.php">HOME</a></li>
    <li><a class="nav-link" href="home.php">MOVIES</a></li>
    <li><a class="nav-link" href="contact.php">CONTACT</a></li>
    <?php
    if (isset($_SESSION['roll']) && $_SESSION['roll'] == "admin") {
        echo '<li><a class="nav-link" href="addmovie.php">Add Movie</a></li>';
    }
    ?>
    
    <?php
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) {
        echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
    } else {
        echo '<li><a class="nav-link" href="login.php">Login</a></li>';
        echo '<li><a class="nav-link" href="registration.php">Sign Up</a></li>';
    }
    ?>
</ul>

        </nav>
    </div>
</header>

<!-- Now Playing Section -->
<section class="now-playing">
    <br><br>
    <center><h1>Now Playing</h1></center>
    <div class="swiper">
        <div class="swiper-wrapper"></div>
    </div>
</section>

<!-- Featured Categories -->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3"><img src="./assets/images/01.jpg" alt="" /></div>
            <div class="col-3"><img src="./assets/images/02.jpg" alt="" /></div>
            <div class="col-3"><img src="./assets/images/03.jpg" alt="" /></div>
        </div>
    </div>
</div>

<!-- Popular Movies -->
<section class="container">
    <h2>Popular Movies</h2>
    <div id="popular-movies" class="grid"></div>
</section>

<!-- Movies Section (Dynamic using PHP) -->
<div class="small-container">
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-4">
                    <a href="movie.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" />
                    </a>
                    <br><br>
                    <center><h4><?php echo htmlspecialchars($row['title']); ?></h4></center>
                    <div class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= floor($row['rating'])): ?>
                                <i class="fa fa-star"></i>
                            <?php else: ?>
                                <i class="fa fa-star-o"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No movies available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<footer class="footer" id="contact">
        <div class="box-container">
            <div class="mainBox">
                <div class="content">
                <a href="/">
                  <span class="SAV">SAV</span>
                  <span class="best">OY</span>
                </a>
                </div>

                <p>Movies are Best Experienced in Theatres!</p>

            </div>
            <div class="box">
                <h3>POPULAR MOVIES BY LANGUAGE</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i>Latest Sinhala Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Latest Hindi Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Latest Tamil Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Latest English Movies |</a>
            
            </div>
            <div class="box">
                <h3>MOVIES BY GENRE</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Action Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Romantic Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Comedy Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Adventure Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Biography Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Crime Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Drama Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Family Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best Fantasy Movies |</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Best History Movies |</a>
            </div>
            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"> <i class="fas fa-phone"></i>+9474 456 7890</a>
                <a href="#"> <i class="fas fa-envelope"></i>info@savoymovie.lk</a>

            </div>

        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>
        <div class="credit">
            Created by <span> Team Think Thinkers </span> |All Rights Reserved ! 
        </div>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
