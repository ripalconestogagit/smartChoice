<?php



require './admin/database.php';
// Example: Fetching all data from a table named "products"
// $sql = "SELECT * FROM products"; // Replace "products" with your table name

$query = "SELECT * FROM products WHERE 1=1";

if (!empty($_GET['brand'])) {
    $brands = explode(",", $_GET['brand']);
    $brandFilter = "('" . implode("','", $brands) . "')";
    $query .= " AND Brand IN $brandFilter";
}

if (!empty($_GET['storage'])) {
    $storages = explode(",", $_GET['storage']);
    $storageFilter = "('" . implode("','", $storages) . "')";
    $query .= " AND storage IN $storageFilter";
}

// if (!empty($_GET['color'])) {
//     $colors = explode(",", $_GET['color']);
//     // $colorFilter = "('" . implode("','", $colors) . "')";
//     $colorFilter = implode(',', array_fill(0, count($_GET['color']), '?'));

//     $query .= " AND Color IN $colorFilter";
// }

if (!empty($_GET['color']) && is_array($_GET['color'])) {
    $colors = $_GET['color']; // Use the array directly

    $colorPlaceholders = implode(',', array_fill(0, count($colors), '?')); // Create placeholders for SQL

    $query .= " AND Color IN ($colorPlaceholders)";
}

if (!empty($_GET['os'])) {
    $osList = explode(",", $_GET['os']);
    $osFilter = "('" . implode("','", $osList) . "')";
    $query .= " AND OperatingSystem IN $osFilter";
}

if (!empty($_GET['price'])) {
    $osList = explode(",", $_GET['price']);
    $osFilter = "('" . implode("','", $osList) . "')";
    $query .= " AND OperatingSystem IN $osFilter";
}

$result = $conn->query($query);





        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Smart Choice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">
<nav>
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

<div class="banner">
    <h2>Our Products</h2>
    <!-- <input type="text" id="search-bar" placeholder="Search products..."> -->
    <div class="filter-buttons">
        <a href="filter.php"><button>Filter Your Choice</button></a>
    </div>
</div>

<!-- <div class="section">
    <h3>Available Products</h3>
    <div class="products-grid" id="products-container">
    </div>
</div> -->

<!-- <div class="button-container">
    <a href="cart.html">
        <button>Go to Cart</button>
    </a>
</div> -->



    <div class="section">
        <h3>Products</h3>
        <div class="products-grid">

        <?php 

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Access data using column names
        $name = $row["Name"]; 
        $product_id = $row['ProductID'];
        $brand = $row["Brand"]; 
        $price = $row["Price"]; 
        $stock = $row["StockQuantity"]; 
        $image = './admin/'.$row['Images'];
        $description = $row['Description'];
        $storage = $row['Storage'];
        $os = $row['OperatingSystem'];


        echo "<div class='flip-card'>
            <div class='flip-card-inner'>
                <div class='flip-card-front'>
                    <img src='$image' alt=$name>
                    <h4>$name</h4>
                </div>
                <div class='flip-card-back'>
                    <h4>More About $name</h4>
                    <p>Operating System: $os </p>
                    <p>Brand: $brand </p>
                    <p>Storage: $storage GB</p>
                    <p>$description</p>
                </div>
            </div>
        </div>";
    }
}



            ?>



        </div>
    </div>

    <div style="margin-bottom: 20px;" class="button-container1">
        <a href="cart.html">
            <button>Go to Cart</button>
        </a>
    </div>

    <footer>
    <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

        <div>
            <p>Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and lab-grown materials.</p>
        </div>
        <div>
            <ul>
            <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div>
            <p>Contact: info@smartchoice.ca</p>
            <p>180 King St., Conestoga College, Waterloo, N2L 0C6</p>
        </div>
    </footer>

</body>
</html>
