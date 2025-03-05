<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";
$message = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$movie = null;
$message = "";  

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];
    $price = $_GET['price'];
    $sql = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movie = $result->fetch_assoc();

    if ($movie) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $seats = $_POST['seats'];
            $total_price = $seats * $price; 

            if ($seats <= $movie['available_seats']) {
                $sql = "INSERT INTO bookings (movie_id, name, seats, total) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isid", $movie_id, $name, $seats, $total_price);
                if ($stmt->execute()) {
                    $new_available_seats = $movie['available_seats'] - $seats;
                    $sql = "UPDATE movies SET available_seats = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $new_available_seats, $movie_id);
                    if ($stmt->execute()) {
                        $message = "<p class='message success'>Booking successful! You have booked $seats seat(s) for the movie '" . htmlspecialchars($movie['title']) . "'. Total price: rs." . number_format($total_price, 2) . ".</p>";
                    } else {
                        $message = "<p class='message error'>Error updating available seats.</p>";
                    }
                } else {
                    $message = "<p class='message error'>Error inserting booking.</p>";
                }
            } else {
                $message = "<p class='message error'>Not enough seats available!</p>";
            }
        }

        $stmt->close();
    } else {
        $message = "<p class='message error'>Movie is not found!</p>";
    }
} else {
    $message = "<p class='message error'>Movie is not founded!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/book.css">
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



<?php if (!empty($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php unset($message); ?>
<?php } ?>

<!-- Booking Form -->
<?php if (isset($movie)) { ?>
    <div class="movie-details">
    <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="Movie Image">
    <h2>Book Tickets for<p class= "red"> <?php echo htmlspecialchars($movie['title']); ?></p></h2>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . $movie_id . "&price=" . $price; ?>">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" max="<?php echo htmlspecialchars($movie['available_seats']); ?>" required oninput="calculateTotalPrice()"><br><br>

        <input type="hidden" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>">

        <p>Total Price: rs.<span id="totalPrice">0.00</span></p>

        <button type="submit">Book Now</button>
    </form>
    <p class="avaSeats">Available Seats: <?php echo htmlspecialchars($movie['available_seats']); ?></p>
<?php } ?>

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


<script>
function calculateTotalPrice() {
    var seats = document.getElementById('seats').value;
    var price = document.getElementById('price').value;
    var totalPrice = seats * price;
    document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
}
</script>

</body>
</html>
