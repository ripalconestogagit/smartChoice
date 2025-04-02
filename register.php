<?php
session_start();
require './admin/database.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $Phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $role = 'User';

    if (!empty($full_name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO users (Name, Email, Password, PhoneNumber, Address, UserRole) VALUES (?, ?, ?,?,?,?)");
            $stmt->bind_param("ssssss", $full_name, $email, $hashed_password, $Phone, $address, $role);

            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['email'] = $email;
                header("Location: index.php"); // Redirect to a dashboard or home page
                // exit();
            } else {
                echo "Registration failed. Please try again.";
            }
            $stmt->close();
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Smart Choice</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">
        <nav>
            <!-- <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul> -->
        </nav>
    </header>

    <div class="banner">
        <h2>Register</h2>
        <p>Create an account to shop and manage orders</p>
    </div>

    <div class="section auth-container">
        <div class="form-container_2">
            <h3>Register</h3>
            <form action="register.php" method="POST">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit">Register</button>
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>

    <footer>
        <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

        <div>
            <p>Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and
                lab-grown materials.</p>
        </div>
        <div>
            <!-- <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul> -->
        </div>
        <div>
            <p>Contact: info@smartchoice.ca</p>
            <p>180 King St., Conestoga College, Waterloo, N2L 0C6</p>
        </div>
    </footer>
</body>

</html>