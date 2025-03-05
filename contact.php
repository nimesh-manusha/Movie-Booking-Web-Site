<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVOY</title>
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

  
  <section id="contact-form" class="py-3">
    <div class="container2">
      <br>
      <h1 class="l-heading"><span class="text-primary">Contact</span></h1>
      <br>
      <form  onSubmit="return validateForm()" action="contact.php">

        <div class="form-group">
          <label for="name">Firstame</label>
          <input type="text" name="name" id="name" placeholder="enter your firstname">
        </div>
        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" name="lastname" id="lastname" placeholder="enter your lastname">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" placeholder="+94777777777">
        </div>
        <div id="msg"></div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message" >

                </textarea>
        </div>
        <button type="submit" value="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>




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

  <div class="spinner"></div>

  <script src="assets/js/contact.js"></script>
</body>
</html>