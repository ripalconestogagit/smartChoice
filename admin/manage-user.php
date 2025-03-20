<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Smart Choice</title>
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
            <h1>Manage Users</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="#">Logout</a>
            </div>
        </header>

        <!-- Manage Users Section -->
        <section class="manage-users">
            <h2>User Overview</h2>
            <!-- <div class="user-actions">
                <button class="btn">Add New User</button>
            </div> -->

            <!-- User Table -->
            <div class="user-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Admin</td>
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>User</td>
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>michael@example.com</td>
                            <td>Admin</td>
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                    </tbody> -->

                    <?php


require './database.php';
// Example: Fetching all data from a table named "products"
$sql = "SELECT * FROM users"; // Replace "products" with your table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Access data using column names
        $name = $row["Name"]; 
        $userID = $row['UserID'];
        $email = $row["Email"]; 
        $userRole = $row["UserRole"]; 

        echo "<tr>
        <td>$name</td>
        <td>$email</td>
        <td>$userRole</td>
        <td>
            <button onclick=\"window.location.href='editUser.php?id=$userID'\">Edit</button>
            <button onclick=confirmDelete($userID);>Delete</button>
        </td>
    </tr>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();

?>
                </table>
            </div>
        </section>
    </div>

</body>
</html>

<script>
function confirmDelete(userID){
    if(confirm("Are you sure you want to delete the user?")){
        window.location.href="delete_user.php?id="+userID;
    }
}

</script>
