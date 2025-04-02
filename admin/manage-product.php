<?php

session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['role'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Smart Choice</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Smart Choice Admin</h2>
        </div>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="manage-product.php">Manage Products</a></li>
            <li><a href="manage-user.php">Manage Users</a></li>
            <li><a href="settings.php">Settings</a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <header>
            <h1>Manage Products</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="logout.php">Logout</a>
            </div>
        </header>

        <!-- Manage Products Section -->
        <section class="manage-products">
            <h2>Products Overview</h2>
            <div class="product-actions">
                <button class='btn' onclick="window.location.href='addProduct.php'">Add New Product</button>
            </div>

            <?php
            if (isset($_GET['msg'])) {
                $text = $_GET['msg'];
                echo "<p style='color:green'>$text</p>";
            }


            if (isset($_GET['message'])) {
                $text = $_GET['message'];
                echo "<p style='color:red'>$text</p>";
            }

            ?>


            <!-- Product Table -->
            <div class="product-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Brand</th>
                            <th>Actions</th>
                        </tr>
                        <?php


                        require './database.php';
                        // Example: Fetching all data from a table named "products"
                        $sql = "SELECT * FROM products"; // Replace "products" with your table name
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                // Access data using column names
                                $productName = $row["Name"];
                                $product_id = $row['ProductID'];
                                $brand = $row["Brand"];
                                $price = $row["Price"];
                                $stock = $row["StockQuantity"];
                                echo "<tr>
        <td>$productName</td>
        <td>$price</td>
        <td>$stock</td>
        <td>$brand</td>
        <td>
            <button onclick=\"window.location.href='editProduct.php?id=$product_id'\">Edit</button>
            <button onclick=confirmDelete($product_id);
            // <button onclick=\"window.location.href='deleteProduct.php?id=$product_id'\">Delete</button>
        </td>
    </tr>";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the connection
                        $conn->close();

                        ?>



                    </thead>
                    <tbody>
                        <!-- Example Product Row -->

                        <!-- More product rows can go here -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>

</html>

<script>
    function confirmDelete(productID) {
        if (confirm("Are you sure you want to delete this product?")) {
            window.location.href = 'deleteProduct.php?id=' + productID;
        }
    }
</script>