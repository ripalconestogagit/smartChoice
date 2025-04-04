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
    <title>Settings - Smart Choice</title>
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
            <h1>Site Settings</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="logout.php">Logout</a>
            </div>
        </header>

        <!-- Settings Form -->
        <section class="settings">
            <h2>Update Site Information</h2>

            <form action="#" method="POST">
                <div class="form-group">
                    <label for="site-title">Site Title</label>
                    <input type="text" id="site-title" name="site-title" value="Smart Choice">
                </div>

                <div class="form-group">
                    <label for="admin-email">Admin Email</label>
                    <input type="email" id="admin-email" name="admin-email" value="admin@example.com">
                </div>

                <div class="form-group">
                    <label for="shipping-fee">Shipping Fee</label>
                    <input type="text" id="shipping-fee" name="shipping-fee" value="$5.00">
                </div>

                <button type="submit" class="btn">Save Settings</button>
            </form>
        </section>
    </div>

</body>

</html>