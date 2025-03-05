<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $login_error = "Please fill in all fields.";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['roll'] = $user['roll'];

                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid password or email.";
            }

            $stmt->close();
        } else {
            $login_error = "User does not exist.";
        }
    }
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Web Design Mastery | Login</title>
</head>
<body>
        <!--header section-->
        <header class="main-header">
    <div class="container6">
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

    <div class="container">
        <form action="" method="POST" class="login__form">
            <h1>Login</h1>
            <?php if (!empty($login_error)): ?>
                <p style="color: red;"><?php echo $login_error; ?></p>
                
            <?php
        $login_error = "";
         endif; ?>

            <div class="input__row">
                <span><i class="ri-user-3-line"></i></span>
                <div class="input__group">
                    <input type="text" placeholder=" " id="email" name="email" required />
                    <label for="email">Email</label>
                </div>
            </div>
            
            <div class="input__row">
                <span><i class="ri-lock-2-line"></i></span>
                <div class="input__group">
                    <input id="password" type="password" placeholder=" " name="password" required />
                    <label for="password">Password</label>
                </div>
                <span id="password-eye"><i class="ri-eye-line"></i></span>
            </div>

            <div class="action__btns">
                <div class="remember__me">
                    <input type="checkbox" id="check" />
                    <label for="check">Remember me</label>
                </div>
                <a href="#" class="forgot__password">Forgot Password?</a>
            </div>
            <button type="submit" class="login__btn">Login</button>
            <div class="register">
                Don't have an account? <a href="registration.php">Register</a>
            </div>

        </form>
    </div>

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

    <script src="assets/js/login.js"></script>
</body>
</html>
