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
    <title>Movie Booking system</title>

    <link rel="stylesheet" href="css/index2.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <!--header section-->
    <header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/">
          <span class="SAV">SAV</span>
          <span class="best">OY</span>
        </a>
      </div>
      <nav>
        <nav>
          <ul>
          <li>
              <a class="nav-link" href="index.php">HOME</a>
            </li>
            <li>
              <a class="nav-link" href="home.php">MOVIES</a>
            </li>
            <li>
              <a class="nav-link" href="contact.php">CONTACT</a>
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
    
    
            </li>
          </ul>
        </nav>
      </nav>
    </div>
  </header>
    <!--end header-->
    
    <!--home1 section-->
    <section class="index1" id="index1">
        <div class="index1content">
            <h1>Experience Movies Like Never Before</h1>
            <br>
            <p>Book your tickets for the latest blockbusters now!</p>
            <br><br>
            <div class="index1-btn">
            <a href="home.php" class="cta-button">Browse Movies</a>
            </div>
        </div>
    </section>
    <!--end home1 section-->

    <!--home2 section-->
    <section class="featured-movies">
        <h2>Movies in Sri Lanka</h2>
        <br>
        <p>If you're bonkers for cinema, then you’ve come to the right place to experience the most amazing
             cinematic experience. Just like you, we at BookMyShow eat, pray and love movies. </p><br>
             <p>Whether you want to book tickets for the most current movies or advance book for the upcoming biggies
              such as Lucky Baskhar or Digimon Adventure 02: The Beginning, we give you options for both.
               Tamil, Sinhala, Hollywood or Bollywood – you will find it all right here!</p>
        <br>
               <div class="movie-grid">
            <div class="movie-item">
                <h3>Latest Sinhala Movies Released in 2024</h3>
                <br>
                <p>Tamil or Sinhala, you can book tickets for all the regional language films released 
                    , right here at BookMyShow. What's more along with booking movie tickets, you can 
                    also check out the latest and upcoming Sinhala movies' trailers and previews in our 
                    “Videos & Trailer” section. </P>
                    <br>
                    <p>Booking process is simply a breeze at BookMyShow. Within few 
                    minutes, any time anywhere you can book your tickets for the latest movies at the lowest
                     prices possible.</p>
            </div>
            <div class="movie-item">
                <h3>New Bollywood Movies</h3>
                <br>
                <p>Are you that true-blue Hindi movie fiend who is obsessed with everything about Bollywood?
                     If yes, we can relate to you. We understand your love for films and keep you updated
                      about all the new Hindi Movie releases. </p><br>
                      <p>Just browse through our “Now playing” section, 
                      check out all the new movies playing in cinemas around you, irrespective of which city
                       you are in, and book your tickets instantly. Before booking, you can also have a look 
                       at the trailer of that film right at that page.</p>
            </div>
            <div class="movie-item">
                <h3>New Hollywood Movies</h3>
                <br>
                <p>Language is not a barrier at BookMyShow. We speak and understand the language of cinema. 
                    So, if English movie is what you are into, we keep you up-to-date about all the new and 
                    now showing Hollywood movies near your location. </p><br>
                    <p>Check out all the current movies and 
                    book your tickets then and there.
                </p>
            </div>
        </div>
    </section>
    <!--end home2 section-->

   <!-- footer section start here  -->
   <footer class="footer" id="contact">
        <div class="box-container">
            <div class="mainBox">
                <div class="content">
                <a href="/">
                  <span class="SAV">SAV</span>
                  <span class="best">OY</span>
                </a>
                </div>

                <p>     Movies are Best Experienced in Theatres!</p>

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
<!--end footer section-->



<!-- Swiper JS link -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="scripts.js"></script>
</body>
</html>
