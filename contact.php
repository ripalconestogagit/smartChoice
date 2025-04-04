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
  <title>Contact Us - Smart Choice</title>
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
    <h2>Contact Us</h2>
    <p>Get in touch with us</p>
  </div>

  <div class="section">
    <div class="form-container_1">
      <h3>Send Us a Message</h3>
      <form>
        <input type="text" placeholder="Enter your name" required>
        <input type="email" placeholder="Enter your email" required>
        <input type="text" placeholder="Enter your phone number">
        <textarea placeholder="Type your message here" rows="4" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>

    <div class="contact-info">
      <div>
        <p><strong>Email</strong></p>
        <p>Smart001@gmail.com</p>
      </div>
      <div>
        <p><strong>Phone Number</strong></p>
        <p>+1 234 345 5555</p>
      </div>
      <div>
        <p><strong>Address</strong></p>
        <p>123 Smart Street, Kitchener, Ontario</p>
      </div>
    </div>

    <div class="map-container">
      <h3>Find Us Here</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.513951179715!2d-80.51968448453644!3d43.4516393791278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882bf769c507f34b%3A0x4f6c79c257c4b7a0!2sKitchener%2C%20ON!5e0!3m2!1sen!2sca!4v1618257792140!5m2!1sen!2sca"
        allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>

  <footer>
    <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

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
    </div>
  </footer>
</body>

</html>