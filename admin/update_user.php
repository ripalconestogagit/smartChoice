<?php
require './database.php';

session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['role'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $name = $_POST['userName'];
    $email = $_POST['Email'];
    $phone = $_POST['PhoneNumber'];
    $role = $_POST['role'];
    $adress = $_POST['Address'];



    $sql = "UPDATE Users SET Name=?, Email=?, PhoneNumber=?, Address=?, UserRole=? WHERE UserID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $adress, $role, $userID);

    if ($stmt->execute()) {
        echo "User updated successfully.";
        header("Location: manage-user.php?msg=User Updated Successfully");
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close();




} else {
    echo "Invalid request.";
}

$conn->close();
?>