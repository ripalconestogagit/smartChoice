document.addEventListener("DOMContentLoaded", function () {
    const cartItemsContainer = document.querySelector(".cart-items");
    const subtotalElement = document.querySelector(".summary-item:nth-of-type(1) p:last-child");
    const taxElement = document.querySelector(".summary-item:nth-of-type(2) p:last-child");
    const totalElement = document.querySelector(".summary-item:nth-of-type(3) p:last-child");

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function updateCartDisplay() {
        cartItemsContainer.innerHTML = "";
        let subtotal = 0;

        cart.forEach((item, index) => {
            subtotal += item.price * item.quantity;
            cartItemsContainer.innerHTML += `
                <div class="cart-item">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-info">
                        <h4>${item.name}</h4>
                        <p>Price: $${item.price.toFixed(2)}</p>
                        <p>Quantity: ${item.quantity}</p>
                        <button class="increase" data-index="${index}">+</button>
                        <button class="decrease" data-index="${index}">-</button>
                        <button class="remove" data-index="${index}">Remove</button>
                    </div>
                </div>
            `;
        });

        let tax = subtotal * 0.13;
        let total = subtotal + tax;
        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        taxElement.textContent = `$${tax.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;

        localStorage.setItem("orderSummary", JSON.stringify({ subtotal, tax, total }));
        attachCartEvents();
    }

    function attachCartEvents() {
        document.querySelectorAll(".increase").forEach(button => {
            button.addEventListener("click", function () {
                cart[this.dataset.index].quantity += 1;
                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartDisplay();
            });
        });

        document.querySelectorAll(".decrease").forEach(button => {
            button.addEventListener("click", function () {
                if (cart[this.dataset.index].quantity > 1) {
                    cart[this.dataset.index].quantity -= 1;
                } else {
                    cart.splice(this.dataset.index, 1);
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartDisplay();
            });
        });

        document.querySelectorAll(".remove").forEach(button => {
            button.addEventListener("click", function () {
                cart.splice(this.dataset.index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartDisplay();
            });
        });
    }

    updateCartDisplay();
});
