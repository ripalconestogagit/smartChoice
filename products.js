document.addEventListener("DOMContentLoaded", function () {
    const productsContainer = document.getElementById("products-container");
    const searchBar = document.getElementById("search-bar");
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let products = [
        { name: "iPhone 16 Pro Max", brand: "Apple", price: 1699, storage: "256 GB", color: "Black", os: "iOS", image: "images/product1.jpg" },
        { name: "Galaxy S25", brand: "Samsung", price: 1499, storage: "128 GB", color: "White", os: "Android", image: "images/product2.jpg" },
        { name: "OnePlus 13", brand: "OnePlus", price: 1399, storage: "512 GB", color: "Gray", os: "Android", image: "images/product3.jpg" }
    ];

    function displayProducts(filteredProducts = products) {
        productsContainer.innerHTML = "";
        filteredProducts.forEach(product => {
            let productHTML = `
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}">
                    <h4>${product.name}</h4>
                    <p><strong>Brand:</strong> ${product.brand}</p>
                    <p><strong>Storage:</strong> ${product.storage}</p>
                    <p><strong>Color:</strong> ${product.color}</p>
                    <p><strong>OS:</strong> ${product.os}</p>
                    <p><strong>Price:</strong> $${product.price}</p>
                    <button class="add-to-cart" data-product='${JSON.stringify(product)}'>Add to Cart</button>
                </div>
            `;
            productsContainer.innerHTML += productHTML;
        });

        attachCartEvents();
    }

    function attachCartEvents() {
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                let selectedProduct = JSON.parse(this.getAttribute("data-product"));
                let existingProduct = cart.find(item => item.name === selectedProduct.name);

                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    selectedProduct.quantity = 1;
                    cart.push(selectedProduct);
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                alert(`${selectedProduct.name} added to cart!`);
            });
        });
    }

    searchBar.addEventListener("input", function () {
        let searchTerm = searchBar.value.toLowerCase();
        let filteredProducts = products.filter(product => 
            product.name.toLowerCase().includes(searchTerm) ||
            product.brand.toLowerCase().includes(searchTerm) ||
            product.storage.toLowerCase().includes(searchTerm) ||
            product.color.toLowerCase().includes(searchTerm) ||
            product.os.toLowerCase().includes(searchTerm)
        );
        displayProducts(filteredProducts);
    });

    displayProducts();
});
