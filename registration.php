<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "savoy_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if (empty($name) || empty($email) || empty($password) || empty($re_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $re_password) {
        $error = "Passwords do not match.";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $success = "Registration successful!";
            header('location: login.php');
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="register1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="register_form">
        <h1>Create Your Account</h1>
            <div class="input-row">
                <span><i class="ri-user-3-line"></i></span>
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="" id="name" name="name" required>
                </div>
            </div>

            <div class="input-row">
                <span><i class="ri-mail-line"></i></span>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="" id="email" name="email" required>
                </div>
            </div>

            <div class="input-row">
                <span><i class="ri-lock-2-line"></i></span>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="" id="password" name="password" required>
                </div>
                <span id="password-eye"><i class="ri-eye-line"></i></span>
            </div>

            <div class="input-row">
                <span><i class="ri-lock-2-line"></i></span>
                <div class="input-group">
                    <label for="re_password">Re-enter Password</label>
                    <input type="password" placeholder="" id="re_password" name="re_password" required>
                </div>
                <span id="password-eye"><i class="ri-eye-line"></i></span>
            </div>

            <button type="submit" class="btn">Register</button>
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
