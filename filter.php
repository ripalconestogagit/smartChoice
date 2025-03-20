<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Your Choice - Smart Choice</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <script src="filter.js"></script>


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
        <h2>Filter Your Choice</h2>
        <p>"Refine Your Search, Discover Your Perfect Match!"</p>
    </div>

    <!-- <div class="filter-section">
        <div class="filter-category">
            <span class="icon">💰</span>
            <label>Price</label>
            <div class="price-range">
                <span>From</span>
                <input type="text" name="priceFrom" value="$ 0.00">
                <span>To</span>
                <input type="text" name="priceTo" value="$ 0.00">
            </div>
        </div>

        <div class="filter-category">
            <span class="icon">📱</span>
            <label>Brand</label>
            <div class="filter-options">
                <img src="images/apple.png" alt="Apple">
                <img src="images/samsung.png" alt="Samsung">
                <img src="images/one-plus.png" alt="OnePlus">
                <img src="images/google.png" alt="Google">
                <img src="images/motorola.jpg" alt="Motorola">
            </div>
        </div>

        <div class="filter-category">
            <span class="icon">💾</span>
            <label>Storage</label>
            <div class="filter-options">
                <button>64 GB</button>
                <button>128 GB</button>
                <button>256 GB</button>
                <button>512 GB</button>
                <button>1028 GB</button>
            </div>
        </div>

        <div class="filter-category">
            <span class="icon">🎨</span>
            <label>Color</label>
            <div class="filter-options colors">
                <span class="color-box" style="background-color: pink;"></span>
                <span class="color-box" style="background-color: navy;"></span>
                <span class="color-box" style="background-color: gray;"></span>
                <span class="color-box" style="background-color: white;"></span>
                <span class="color-box" style="background-color: black;"></span>
            </div>
        </div>

        <div class="filter-category">
            <span class="icon">⬇️</span>
            <label>OS</label>
            <div class="filter-options">
                <button>Android</button>
                <button>iOS</button>
                <button>KaiOS</button>
            </div>
        </div>

        <div class="filter-actions">
            <button class="clear">Clear</button>
            <button class="apply">Filter</button>
        </div>
    </div> -->
    <div class="filter-section">

    <form action="products.php" method="GET" class="filter-section">
    <div class="filter-category">
        <span class="icon">💰</span>
        <label>Price</label>
        <div class="price-range">
            <span>From</span>
            <input type="text" name="priceFrom" value="0">
            <span>To</span>
            <input type="text" name="priceTo" value="0">
        </div>
    </div>

    <div class="filter-category">
        <span class="icon">📱</span>
        <label>Brand</label>
        <div class="filter-options">
            <label><input type="checkbox" name="brand[]" value="Apple"> 
             <img src="images/apple.png" alt="Apple">
            </label>
            <label><input type="checkbox" name="brand[]" value="Samsung">                 
            <img src="images/samsung.png" alt="Samsung">
            </label>
            <label><input type="checkbox" name="brand[]" value="OnePlus">                 
            <img src="images/one-plus.png" alt="OnePlus">
            </label>
            <label><input type="checkbox" name="brand[]" value="Google">                
             <img src="images/google.png" alt="Google">
            </label>
            <label><input type="checkbox" name="brand[]" value="Motorola">                 
            <img src="images/motorola.jpg" alt="Motorola">
            </label>

        </div>
    </div>

    <div class="filter-category">
        <span class="icon">💾</span>
        <label>Storage</label>
        <div class="filter-options">
            <label><input type="radio" name="storage" value="64"> 64 GB</label>
            <label><input type="radio" name="storage" value="128"> 128 GB</label>
            <label><input type="radio" name="storage" value="256"> 256 GB</label>
            <label><input type="radio" name="storage" value="512"> 512 GB</label>
            <label><input type="radio" name="storage" value="1028"> 1028 GB</label>
        </div>
    </div>

    <div class="filter-category">
        <span class="icon">🎨</span>
        <label>Color</label>
        <div class="filter-options colors">
            <label><input type="checkbox" name="color[]" value="pink">         
            <span class="color-box" style="background-color: pink;"></span>
            </label>
            <label><input type="checkbox" name="color[]" value="navy">                
            <span class="color-box" style="background-color: navy;"></span>
            </label>
            <label><input type="checkbox" name="color[]" value="gray">                 
            <span class="color-box" style="background-color: gray;"></span>
            </label>
            <label><input type="checkbox" name="color[]" value="white">                 
            <span class="color-box" style="background-color: white;"></span>
            </label>
            <label><input type="checkbox" name="color[]" value="black">                 
            <span class="color-box" style="background-color: black;"></span>
            </label>
        </div>
    </div>

    <div class="filter-category">
        <span class="icon">⬇️</span>
        <label>OS</label>
        <div class="filter-options">
            <label><input type="radio" name="os" value="Android"> Android</label>
            <label><input type="radio" name="os" value="iOS"> iOS</label>
            <label><input type="radio" name="os" value="KaiOS"> KaiOS</label>
        </div>
    </div>

    <div class="filter-actions">
        <button type="reset" class="clear">Clear</button>
        <button type="submit" class="apply">Filter</button>
    </div>
</form>
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
