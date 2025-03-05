<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT * FROM movies WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) {
    echo "Movie not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?> - SAVOY</title>
    <link rel="stylesheet" href="css/movie1.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


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
            </ul>
        </nav>
    </div>
</header>

<!-- Movie Details Section -->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="<?php echo htmlspecialchars($movie['image']); ?>" width="100%" id="ProductImg" alt="<?php echo htmlspecialchars($movie['title']); ?>" />
        </div>

        <div class="col-2">
            <center><h2><?php echo htmlspecialchars($movie['title']); ?></h2></center>
            <br>
            <h4><?php echo htmlspecialchars($movie['rating']); ?> / 10</h4>
            <br>
            <h3>Release Date: <?php echo htmlspecialchars($movie['release_date']); ?><i class="fa fa-indent"></i></h3>
            <br />
            <p><?php echo htmlspecialchars($movie['description']); ?></p>
            <br>
            <p>Rs<?php echo htmlspecialchars($movie['price']); ?></p>
            <br>
            <div class="class">
            <a href="booking.php?id=<?php echo urlencode($movie['id']); ?>&price=<?php echo urlencode($movie['price']); ?>" class="button">Book Now</a>

                <a href="<?php echo $movie['mvtle']; ?>" class="button">Watch Trailer</a>

            </div>
        </div>
    </div>
</div>

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

<?php $connection->close(); ?>
