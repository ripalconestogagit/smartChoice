<?php

require './database.php';


$sql = "select count(*) as total from Products";
$result = $conn->query($sql);

$user_sql = "select count(*) as total from Users";
$user_result = $conn->query($user_sql);


if($result) {
    $row = $result->fetch_assoc();
    $totalProducts = $row['total'];
}else{
    $totalProducts = 0;
}


if($user_result){
    $user_row = $user_result->fetch_assoc();
    $total_users = $user_row['total'];
}else{
    $total_users = 0;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Smart Choice</title>
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
            <h1>Welcome to the Admin Panel</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="../logout.php">Logout</a>
            </div>
        </header>

        <section class="dashboard">
            <h2>Dashboard Overview</h2>
            <div class="cards">
                <div class="card">
                    <h3>Total Sales</h3>
                    <p>$12,500</p>
                </div>
                <div class="card">
                    <h3>Total Products</h3>
                    <p><?php echo $totalProducts; ?></p>

  
                </div>
                <div class="card">
                    <h3>Orders Today</h3>
                    <p>35</p>
                </div>
                <div class="card">
                    <h3>Total Users</h3>
                    <p><?php echo $total_users; ?></p>
                </div>
            </div>
        </section>
    </div>

</body>
</html>


