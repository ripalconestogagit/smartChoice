<?php
require './database.php'; // Include database connection
session_start();


if (!isset($_SESSION['user_id']) && !isset($_SESSION['role'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $message = '';
    if ($stmt->execute()) {
        $message = 'Product deleted successfully!';

    } else {
        $message = "Error deleting product:  $conn->error";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to product management page
    header("Location: manage-product.php?msg=$message");
    exit();
} else {
    header("Location: manage-product.php?message=$message");
    exit();
}
?>