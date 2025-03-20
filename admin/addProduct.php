<?php

require 'database.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["ProductName"];
    $brand = $_POST["Brand"];
    $price = $_POST["Price"];
    $stockQuantity = $_POST["StockQuantity"];
    $description = $_POST["Description"];

    $color = $_POST["Color"];
    $storage = $_POST["Storage"];
    $operatingSystem = $_POST["OperatingSystem"];
    $commingSoon = $_POST["commingSoon"];
    $featuredProduct = $_POST["featuredProduct"];



    // Handle image upload
    $targetDir = "uploads/"; 
    $targetFile = $targetDir . basename($_FILES["Images"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["Images"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["Images"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["Images"]["tmp_name"], $targetFile)) {

            $sql = "INSERT INTO Products (Name, Brand, Price, StockQuantity, Images, Description, Color, Storage, OperatingSystem,commingSoon,featuredProduct) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdisssssss", $productName, $brand, $price, $stockQuantity, $targetFile, $description, $color, $storage, $operatingSystem,$commingSoon, $featuredProduct);

            if ($stmt->execute()) {
                echo "New record created successfully";
                header('Location:manage-product.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
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
            <h1>Add New Product</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="logout.php">Logout</a>
            </div>
        </header>

        <!-- Settings Form -->
        <section class="settings">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                    <label for="ProductName">ProductName</label>
                     <input type="text" name="ProductName">                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                     <input type="text" id="brand" name="Brand">
                    </div>
                <div class="form-group">
                    <label for="Price">Shipping Fee</label>
                     <input type="number" id="Price" name="Price">
                    </div>
                <div class="form-group">
                    <label for="StockQuantity">StockQuantity</label>
                     <input type="number" id="StockQuantity" name="StockQuantity"><br>
                    </div>
                <div class="form-group">
                    <label for="images">Images</label>
                     <input type="file" id="images" name="Images">
                    </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  id="description" name="Description" rows="9" cols="110"></textarea><br>
                    </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input id="Color" type="text" name="Color"><br>
                    </div>
                <div class="form-group">
                    <label for="storage">Storage</label>
                   <input type="text" id="storage" name="Storage"><br>
                    </div>
                <div class="form-group">
                    <label for="operatingSystem">OperatingSystem</label>
                     <input id="operatingSystem" type="text" name="OperatingSystem"><br>
                    </div>
                    <div>
                    <label for="">Product Commingsoon</label>
                    <label> <input type="radio" name="commingSoon" value=1>Yes</label>             
                    <label><input type="radio" name="commingSoon" value=0>No</label>
                </div>
                <div>
                    <label for="">Featured Product</label>
                    <input type="radio" name="featuredProduct" value=1>Yes</input>               
                    <input type="radio" name="featuredProduct" value=0>No</input>

                </div>



<input type="submit" class="btn" value="Add Product">
</form>

        </section>
    </div>

</body>
</html>
