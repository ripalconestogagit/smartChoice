<?php session_start();

if (!isset($_SESSION['user_id'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: login.php");
    exit();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Smart Choice</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="results.js"></script>

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
        <h2>Thank You for Your Order!</h2>
        <p>Order Confirmation Number: <strong>#12345</strong></p>
    </div>

    <div class="section">
        <h3>Order Summary</h3>
        <div class="order-summary">

            <?php
            foreach ($cart as $cart_item) {
                echo "<div class='order-item'>
                <img src='{$cart_item['image']}' alt='{$cart_item['name']}'>
                <p><strong>{$cart_item['name']}</strong></p>
                <p>Size: {$cart_item['storage']}</p>
                <p>Price: {$cart_item['price']}</p>
            </div>";
            }

            ?>


        </div>
    </div>

    <div class="section">
        <h3>Billing & Shipping Information</h3>
        <div class="address-section">
            <div class="address-box">
                <img src="images/results3.jpeg" alt="Billing Address">
                <p><strong>Billing Address</strong></p>
                <p>123 Smart Street, Kitchener, N2H6J5.</p>
                <p>Email: johndoe@example.com</p>
            </div>
            <div class="address-box">
                <img src="images/results4.jpeg" alt="Shipping Address">
                <p><strong>Shipping Address</strong></p>
                <p>Jane Smith, 456 Avenue, Waterloo, N2H4G6</p>
                <p>Email: janedoe@example.com</p>
            </div>
        </div>
    </div>

    <div class="section">
        <h3>Stay tuned for more exciting offers!</h3>
        <div class="offers">
            <img src="images/results5.jpg" alt="Exciting Offers">
        </div>
    </div>

    <footer>
        <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

        <div>
            <p>Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and
                lab-grown materials.</p>
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