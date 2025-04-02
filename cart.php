<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Check if the cart exists in the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Smart Choice</title>
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
        <h2>Your Cart</h2>
        <p>Check out what's in your cart</p>
    </div>
    <button onclick="window.location.href='clear_cart.php'" class="cart-btn button">Clear Cart</button>

    <div class="section">
        <h3>Cart Items</h3>
        <div class="cart-items">
            <?php
            if (!empty($cart)) {
                // Loop through each item in the cart
                foreach ($cart as $cart_item) {
                    echo "<div class='cart-item'>
                            <img src='{$cart_item['image']}' alt='{$cart_item['name']}'>
                            <div class='cart-info'>
                                <h4>{$cart_item['name']}</h4>
                                <p>Price: {$cart_item['price']}</p>
                                <p>OS: {$cart_item['os']}, Storage: {$cart_item['storage']} GB</p>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
        </div>
    </div>

    <div class="section">
        <h3>Order Summary</h3>
        <div class="order-summary">
            <?php
            $subtotal = 0;
            foreach ($cart as $cart_item) {
                $subtotal += $cart_item['price'];
            }

            $tax = round(($subtotal * 0.13), 2);
            $total = round(($subtotal + $tax), 2);

            echo "
            <div class='summary-item'>
                <img src='images/subtotal.jpeg' alt='Subtotal'>
                <p><strong>Subtotal</strong></p>
                <p>\$$subtotal</p>
            </div>
            <div class='summary-item'>
                <img src='images/tax.jpeg' alt='Tax'>
                <p><strong>Tax</strong></p>
                <p>\$$tax</p>
            </div>
            <div class='summary-item'>
                <img src='images/total.jpeg' alt='Total Cost'>
                <p><strong>Total Cost</strong></p>
                <p>\$$total</p>
            </div>";
            ?>
        </div>
    </div>

    <div class="section">
        <h3>Proceed to Checkout</h3>
        <div class="checkout">
            <a href="checkout.php">
                <img src="images/cart.jpeg" alt="Checkout">
                <p>Click here to complete your purchase</p>
            </a>
        </div>
    </div>

    <div class="button-container2">
        <a href="order_summary.php">
            <button type="button" <?php if (empty($cart))
                echo "disabled"; ?>>Order Confirmation</button>
        </a>
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