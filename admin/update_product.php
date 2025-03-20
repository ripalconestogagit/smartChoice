<?php
require './database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['productID'];
    $productName = $_POST['ProductName'];
    $brand = $_POST['Brand'];
    $price = $_POST['Price'];
    $stockQuantity = $_POST['StockQuantity'];
    $description = $_POST['Description'];
    
    $color = $_POST['Color'];
    $storage = $_POST['Storage'];
    $operatingSystem = $_POST['OperatingSystem'];
    $commingSoon = $_POST['commingSoon'];
    $featuredProduct = $_POST['featuredProduct'];

    


    // Handle Image Upload
    if (!empty($_FILES["Images"]["name"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["Images"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow only certain file formats
        $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["Images"]["tmp_name"], $targetFilePath)) {
                // Update query with image
                $sql = "UPDATE Products SET Name=?, Brand=?, Price=?, StockQuantity=?, Description=?, Color=?, Storage=?, OperatingSystem=?, Images=?, commingSoon=?, featuredProduct=? WHERE ProductID=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssdiissssiii", $productName, $brand, $price, $stockQuantity, $description, $color, $storage, $operatingSystem, $targetFilePath,$commingSoon, $featuredProduct, $productID);
            } else {
                echo "File upload failed.";
                exit();
            }
        } else {
            echo "Invalid file type.";
            exit();
        }
    } else {
        echo $description;
        
        // Update query without image
        $sql = "UPDATE Products SET Name=?, Brand=?, Price=?, StockQuantity=?, Description=?, Color=?, Storage=?, OperatingSystem=?,commingSoon=?, featuredProduct=? WHERE ProductID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdissssiii", $productName, $brand, $price, $stockQuantity, $description, $color, $storage, $operatingSystem, $commingSoon, $featuredProduct, $productID);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header("Location: manage-product.php?msg=Product Updated Successfully");
        exit();
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
