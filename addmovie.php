<?php
// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];
    $release_date = $_POST['release_date'];
    $description = $_POST['description'];
    $available_seats = $_POST['available_seats'];
    $mvtle = $_POST['mvtle'];

    $sql = "INSERT INTO movies (title, image, rating, release_date, description, available_seats, mvtle)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $title, $image, $rating, $release_date, $description, $available_seats, $mvtle);
    
    if ($stmt->execute()) {
        echo "Movie added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addmovie.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Movie Booking</title>
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
            </li>
          </ul>
        </nav>
      </nav>
    </div>
  </header>

<!-- HTML form for adding movies -->
<h2>Add New Movie</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="enter title" required><br><br>

    <label for="image">Image URL:</label>
    <input type="text" id="image" name="image" placeholder="enter image url" required><br><br>

    <label for="rating">Rating:</label>
    <input type="text" id="rating" name="rating"  placeholder="rating" required><br><br>

    <label for="release_date">Release Date:</label>
    <input type="date" id="release_date" name="release_date" placeholder="enter release date" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="descrition" required></textarea><br><br>

    <label for="available_seats">Available Seats:</label>
    <input type="number" id="available_seats" name="available_seats" min="1" placeholder="enter available seats counts" required><br><br>

    <label for="mvtle">Trailer URL:</label>
    <input type="text" id="mvtle" name="mvtle" placeholder="enter trailer url" required><br><br>

    <button type="submit">Add Movie</button>
</form>

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
