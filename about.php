<?php session_start();

if (!isset($_SESSION['user_id'])) {
  // If the session variable is not set, redirect to the login page
  header("Location: login.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Smart Choice</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <div class="banner">
    <h2>About Us</h2>
  </div>

  <div class="section">
    <div class="mission">
      <h3>Our Mission</h3>
      <p>To provide quality products and exceptional service</p>
    </div>

    <div class="company-history">
      <h3>Company History</h3>
      <p>
        Smart Choice was founded in 2010 with a vision to revolutionize online shopping by offering high-quality
        products with convenience and reliability. What began as a small startup has grown into a trusted brand,
        serving thousands of customers with cutting-edge solutions and exceptional service.
      </p>
    </div>

    <div class="vision-and-history">
      <!-- Vision Card -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/vision.jpeg" alt="Vision">
            <h3>Vision</h3>
            <p>Empowering customers through technology.</p>
          </div>
          <div class="flip-card-back">
            <h3>More About Vision</h3>
            <p>Our vision is to innovate and lead the e-commerce industry by embracing the latest
              technological advancements to provide seamless shopping experiences.</p>
          </div>
        </div>
      </div>

      <!-- History Card -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/history.jpeg" alt="History">
            <h3>History</h3>
            <p>A journey of growth and success.</p>
          </div>
          <div class="flip-card-back">
            <h3>More About History</h3>
            <p>From a small startup in 2010 to a global e-commerce leader, Smart Choice continues to
              redefine online shopping with high-quality products and services.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="team">
      <h3>Our Team</h3>
      <div class="team-members">
        <div class="team-member">
          <img src="images/alex.jpeg" alt="Alex Carter">
          <p>Alex Carter</p>
          <p>CEO & Founder</p>
        </div>
        <div class="team-member">
          <img src="images/jane.jpeg" alt="Jane Smith">
          <p>Jane Smith</p>
          <p>Head of Marketing</p>
        </div>
        <div class="team-member">
          <img src="images/daniel.jpeg" alt="Daniel Roberts">
          <p>Daniel Roberts</p>
          <p>Chief Technology Officer</p>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <img src="images/logo/logo/logo.jpg" alt="logo" width="40px" height="40px">

    <div>
      <p>
        Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and
        lab-grown materials.
      </p>
    </div>
    <div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div>
      <p>Contact: info@smartchoice.ca</p>
      <p>180 King St., Conestoga College, Waterloo, N2L 0C6</p>
    </div>
  </footer>
</body>

</html>