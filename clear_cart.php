<?php



session_start();

// Check if the cart is set in the session
if (isset($_SESSION['cart'])) {
    // Clear the cart by unsetting the 'cart' session variable
    unset($_SESSION['cart']);
    // Optionally, you can also use $_SESSION['cart'] = array(); to reset it
}

// Redirect the user back to the cart page or anywhere you want
header("Location: cart.php");
exit();


?>