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
            <h1>Edit Product</h1>
            <div class="admin-info">
                <span>Logged in as: Admin</span>
                <a href="logout.php">Logout</a>
            </div>
        </header>


        <?php

        require './database.php';
        if (isset($_GET['id'])) {
            $productID = $_GET['id'];

            $sql = "SELECT * FROM Products WHERE ProductID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productID);
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
                    <!-- <form method="post" action="update_product.php">
                <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                ProductName: <input type="text" name="ProductName" value="<?php echo $row['Name']; ?>"><br>
                Brand: <input type="text" name="Brand" value="<?php echo $row['Brand']; ?>"><br>
                Price: <input type="number" name="Price" value="<?php echo $row['Price']; ?>"><br>
                StockQuantity: <input type="number" name="StockQuantity" value="<?php echo $row['StockQuantity']; ?>"><br>
                Description: <textarea name="Description"><?php echo $row['Description']; ?></textarea><br>
                Color: <input type="text" name="Color" value="<?php echo $row['Color']; ?>"><br>
                Storage: <input type="text" name="Storage" value="<?php echo $row['Storage']; ?>"><br>
                OperatingSystem: <input type="text" name="OperatingSystem" value="<?php echo $row['OperatingSystem']; ?>"><br>
                <input type="submit" value="Update">
            </form> -->




                    <section class="settings">
                        <form action="update_product.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="productID" value="<?php echo $productID; ?>">

                            <div class="form-group">
                                <label for="ProductName">Product Name</label>
                                <input type="text" id="ProductName" name="ProductName" value="<?php echo $row['Name']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" id="brand" name="Brand" value="<?php echo $row['Brand']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Price">Price</label>
                                <input type="number" id="Price" name="Price" value="<?php echo $row['Price']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="StockQuantity">Stock Quantity</label>
                                <input type="number" id="StockQuantity" name="StockQuantity"
                                    value="<?php echo $row['StockQuantity']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" id="images" name="Images">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="Description" rows="9"
                                    cols="110"><?php echo $row['Description']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" id="Color" name="Color" value="<?php echo $row['Color']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="text" id="storage" name="Storage" value="<?php echo $row['Storage']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="operatingSystem">Operating System</label>
                                <input type="text" id="operatingSystem" name="OperatingSystem"
                                    value="<?php echo $row['OperatingSystem']; ?>">
                            </div>
                            <div>
                                <label for="">Product Commingsoon</label>
                                <label> <input type="radio" name="commingSoon" value=1 <?php if ($row['commingSoon'] == 1)
                                    echo 'checked'; ?>>Yes</label>
                                <label><input type="radio" name="commingSoon" value=0 <?php if ($row['commingSoon'] == 0)
                                    echo 'checked'; ?>>No</label>
                            </div>
                            <div>
                                <label for="">Featured Product</label>
                                <input type="radio" name="featuredProduct" value=1 <?php if ($row['featuredProduct'] == 1)
                                    echo 'checked'; ?>>Yes</input>
                                <input type="radio" name="featuredProduct" value=0 <?php if ($row['featuredProduct'] == 0)
                                    echo 'checked'; ?>>No</input>
                            </div>


                            <input type="submit" class="btn" value="Update Product">
                        </form>
                    </section>



                </body>

                </html>
                <?php
            } else {
                echo "Product not found.";
            }
            $stmt->close();
        } else {
            echo "Invalid product ID.";
        }

        $conn->close();

        ?>




        <!-- Settings Form -->

    </div>

</body>

</html>