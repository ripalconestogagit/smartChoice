
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
            <h1>Edit User</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="#">Logout</a>
            </div>
        </header>


<?php

require './database.php';
if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $sql = "SELECT * FROM Users WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Product</title>
        </head>
        <body>

            <section class="settings">
    <form action="update_user.php" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">

        <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" id="userName" name="userName" value="<?php echo $row['Name']; ?>">
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" id="Email" name="Email" value="<?php echo $row['Email']; ?>">
        </div>

        <div class="form-group">
            <label for="PhoneNumber">PhoneNumber</label>
            <input type="number" id="PhoneNumber" name="PhoneNumber" value="<?php echo $row['PhoneNumber']; ?>">
        </div>

        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" value="<?php echo $row['Address']; ?>">
        </div>


        <div class="form-group">
            <label for="userRole">User Role</label>
            <select id="role" name="role" >
                <option <?php if($row['UserRole'] == "User") echo "selected"; ?> value="user" >User</option>
                <option <?php if($row['UserRole'] == "Admin") echo "selected"; ?>  value="admin"> Admin</option>
    </select>

            
        </div>

        <input type="submit" class="btn" value="Update Product">
    </form>
</section>



        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
    $stmt->close();
} else {
    echo "Invalid User ID.";
}

$conn->close();

?>




        <!-- Settings Form -->

    </div>

</body>
</html>


