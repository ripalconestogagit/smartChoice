<?php
session_start();
require './admin/database.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT UserID, Password, UserRole FROM users WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password, $UserRole);
            $stmt->fetch();
            print_r($UserRole);



            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $email;

                if ($UserRole == "User") {
                    header("Location: index.php");

                } else {
                    $_SESSION['role'] = "Admin";

                    header("Location: admin/index.php");

                }

                // Redirect to a dashboard or home page
                exit();
            } else {
                echo "Invalid email or password.";
            }
        } else {
            echo "No user found with this email.";
        }
        $stmt->close();
    } else {
        echo "Please enter email and password.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register - Smart Choice</title>
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
        <h2>Login / Register</h2>
        <p>Access your account to shop and manage orders</p>
    </div>

    <div class="section auth-container">
        <div class="form-container_2">
            <h3>Login</h3>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php" onclick="toggleForms()">Register here</a></p>
            </form>
        </div>


        <div class="form-container_2 hidden" id="registerForm">
            <h3>Register</h3>
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <input type="password" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
                <p>Already have an account? <a href="#" onclick="toggleForms()">Login here</a></p>
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

    <script>
        function toggleForms() {
            document.querySelector('.form-container_2').classList.toggle('hidden');
            document.getElementById('registerForm').classList.toggle('hidden');
        }
    </script>

</body>

</html>