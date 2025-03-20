<?php

require './admin/database.php';
$sql_featured = "select * from Products where featuredProduct =1 limit 3";
$featured_results = $conn->query($sql_featured);
$comming_query = "select * from Products where commingSoon = 1 limit 3";
$comming_results = $conn->query($comming_query);

if ($featured_results) {
    $featured_products = $featured_results->fetch_all(MYSQLI_ASSOC); 
}

if($comming_results){
 $comming_products = $comming_results->fetch_all(MYSQLI_ASSOC);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Smart Choice</title>
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
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <div class="banner">
    <h2>Welcome to Smart Choice</h2>
    <p>Discover top brands and exciting offers!</p>
    <a class="all-products-button" href="products.php"><button>Shop Now</button></a>
  </div>

  <div class="section">
    <!-- Featured Products Section -->
    <div class="featured-products">
      <h3>Featured Products</h3>
      <div class="all-products-button">
      <a class="all-products-button" href="products.php"><button>View All Products</button></a></br>
    </div>

      <div style="margin-top:20px;" class="product-list featured">
        <?php 
        foreach($featured_products as $product){
            $name = $product['Name'];
            $price = $product['Price'];
            $image = './admin/'.$product['Images'];
            $description = $product['Description'];
            $storage = $product['Storage'];
            $os = $product['OperatingSystem'];

            echo "<div class='flip-card'>
                <div class='flip-card-inner'>
                    <div class='flip-card-front'>
                        <img src='$image' alt=$name>
                        <h4>$name</h4>
                    </div>
                    <div class='flip-card-back'>
                        <h4>More About $name</h4>
                        <p>Operating System: $os </p>
                        <p>Storage: $storage </p>

                        <p>$description</p>
                    </div>
                </div>
            </div>";
        } 
        ?>



      </div>
    </div>

    <!-- Coming Products Section -->
    <div class="coming-products">
      <h3>Coming Soon</h3>
      <div class="product-list coming">
<?php
      foreach($comming_products as $product){
            $name = $product['Name'];
            $price = $product['Price'];
            $image = './admin/'.$product['Images'];
            $description = $product['Description'];
            $storage = $product['Storage'];
            $os = $product['OperatingSystem'];

            echo "<div class='flip-card'>
            <div class='flip-card-inner'>
                <div class='flip-card-front'>
                    <img src='$image' alt=$name>
                    <h4>$name</h4>
                </div>
                <div class='flip-card-back'>
                    <h4>More About $name</h4>
                    <p>Operating System: $os </p>
                    <p>Storage: $storage </p>

                    <p>$description</p>
                </div>
            </div>
        </div>";


        } 
?>
      
        <!-- <div class="product">
          <img src="images/1.png" alt="iPhone 16 Pro Max">
          <p>iPhone 16 Pro Max</p>
          <p>Price: $1699.99</p>
        </div>
        <div class="product">
          <img src="images/2.webp" alt="Galaxy S25">
          <p>Galaxy S25</p>
          <p>Price: $1499.99</p>
        </div>
        <div class="product">
          <img src="images/3.jpg" alt="OnePlus 13">
          <p>OnePlus 13</p>
          <p>Price: $1399.99</p>
        </div> -->
      </div>
    </div>

    <!-- Top Brands Section -->
    <div class="top-brands">
      <h3>Top Brands</h3>
      <div class="brand-logos">
        <img src="images/apple.png" alt="Apple">
        <img src="images/samsung.png" alt="Samsung">
        <img src="images/one-plus.png" alt="OnePlus">
        <img src="images/google.png" alt="Google">
      </div>
    </div>
  </div>

  <footer>
  <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

    <div>
      <p>
        Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and lab-grown materials.
      </p>
    </div>
    <div>
      <ul>
      <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
    <div>
      <p>Contact: info@smartchoice.ca</p>
    </div>
  </footer>
</body>
</html>