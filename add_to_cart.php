<?php
session_start(); // Start the session to store cart data

// Check if the data was sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the item details from the POST request
    $name = $_POST['name'];
    $os = $_POST['os'];
    $storage = $_POST['storage'];
    // $description = $_POST['description'];
    $image = $_POST['image'];
    $price = (float) $_POST['price'];

    // Create an array with the item data
    $item = [
        'name' => $name,
        'os' => $os,
        'storage' => $storage,
        // 'description' => $description,
        'image' => $image,
        'price' => $price
    ];

    // Check if the cart already exists in the session, if not create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart (You can also check if it already exists to prevent duplicates)
    $_SESSION['cart'][] = $item;

    // Send a response (optional)
    echo 'Item added to cart!';
}
?>