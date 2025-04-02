<?php session_start();

if (!isset($_SESSION['user_id'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: login.php");
    exit();
}

?>

<?php



require './admin/database.php';
// Example: Fetching all data from a table named "products"
// $sql = "SELECT * FROM products"; // Replace "products" with your table name

$query = "SELECT * FROM products WHERE 1=1";

if (!empty($_GET['brand']) && is_array($_GET['brand'])) {
    $brands = $_GET['brand'];
    $brandFilter = "('" . implode("','", $brands) . "')";
    $query .= " AND Brand IN $brandFilter";
}


// if (!empty($_GET['storage']) && is_array($_GET['storage'])) {
//     $storage = $_GET['storage']; 
//     $storageFilter = "('" . implode("','", $storage) . "')";
//     $query .= " AND Storage Like '128'";
// }

if (!empty($_GET['storage'])) {
    if (is_array($_GET['storage'])) {
        $storage = $_GET['storage']; // Already an array
    } else {
        $storage = [$_GET['storage']]; // Convert string to array
    }

    $storageFilter = "('" . implode("','", $storage) . "')";
    $query .= " AND Storage IN $storageFilter";
}




if (!empty($_GET['color']) && is_array($_GET['color'])) {
    $color = $_GET['color'];
    $colorFilter = "('" . implode("','", $color) . "')";
    $query .= " AND Color IN $colorFilter";
}


if (!empty($_GET['os'])) {
    if (is_array($_GET['os'])) {
        $os = $_GET['os']; // Already an array
    } else {
        $os = [$_GET['os']]; // Convert string to array
    }

    $osFilter = "('" . implode("','", $os) . "')";
    $query .= " AND OperatingSystem IN $osFilter";
}


if (!empty($_GET['price'])) {
    $osList = explode(",", $_GET['price']);
    $osFilter = "('" . implode("','", $osList) . "')";
    $query .= " AND OperatingSystem IN $osFilter";
}

if (!empty($_GET['priceFrom']) && !empty($_GET['priceTo'])) {
    $priceFrom = (float) $_GET['priceFrom']; // Ensure numeric type
    $priceTo = (float) $_GET['priceTo']; // Ensure numeric type
    $query .= " AND Price BETWEEN $priceFrom AND $priceTo";
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
                <li><a href="cart.php">Cart</a></li>
                <li><a href="logout.php">Logout</a></li>
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
                    $image = './admin/' . $row['Images'];
                    $description = $row['Description'];
                    $storage = $row['Storage'];
                    $os = $row['OperatingSystem'];
                    $color = $row['Color'];



                    echo "<div class='flip-card'>
            <div class='flip-card-inner'>
                <div class='flip-card-front'>
                    <img src='$image' alt=$name>
                    <h4>$name</h4>
                                                        <button class='add-to-cart button' onclick='addToCart(\"$name\", \"$os\", \"$storage\", \"$image\",\"$price\")'>Add to Cart</button>

                </div>
                <div class='flip-card-back'>
                    <h4>More About $name</h4>
                    <p>Brand: $brand, Operating System: $os </p>
                    <p>Storage: $storage GB, Color: $color</p>
                    <p>$description</p>
                                                        <button class='add-to-cart button' onclick='addToCart(\"$name\", \"$os\", \"$storage\", \"$image\",\"$price\")'>Add to Cart</button>

                </div>
            </div>
        </div>";
                }
            }



            ?>



        </div>
    </div>

    <div style="margin-bottom: 20px;" class="button-container1">
        <a href="cart.php">
            <button>Go to Cart</button>
        </a>
    </div>

    <footer>
        <img src="images/logo/logo/logo.png" alt="logo" width="40px" height="40px">

        <div>
            <p>Established in 1983, Smart Choice has been known as a reliable supplier of polished diamonds and
                lab-grown materials.</p>
        </div>
        <div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div>
            <p>Contact: info@smartchoice.ca</p>
            <p>180 King St., Conestoga College, Waterloo, N2L 0C6</p>
        </div>
    </footer>

</body>

</html>

<script>
    function addToCart(name, os, storage, image, price) {
        // Send data to PHP to add to the cart
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true); // Target PHP file to handle cart data
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Send data to the server
        xhr.send('name=' + name + '&os=' + os + '&storage=' + storage + '&image=' +
            image + '&price=' + price);

        // Handle response (optional)
        xhr.onload = function () {
            if (xhr.status == 200) {
                alert(name + ' added to cart!');
            } else {
                alert('Error adding to cart');
            }
        };
    }
</script>