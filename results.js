document.addEventListener("DOMContentLoaded", function () {
    const orderSummary = JSON.parse(localStorage.getItem("orderSummary")) || { subtotal: 0, tax: 0, total: 0 };
    const cartItemsContainer = document.querySelector(".order-items");

    document.querySelector(".summary-item:nth-of-type(1) p:last-child").textContent = `$${orderSummary.subtotal.toFixed(2)}`;
    document.querySelector(".summary-item:nth-of-type(2) p:last-child").textContent = `$${orderSummary.tax.toFixed(2)}`;
    document.querySelector(".summary-item:nth-of-type(3) p:last-child").textContent = `$${orderSummary.total.toFixed(2)}`;

    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartItemsContainer.innerHTML = cart.map(item => `
        <div class="order-item">
            <img src="${item.image}" alt="${item.name}">
            <p>${item.name} - ${item.quantity}x</p>
        </div>
    `).join("");

    document.querySelector(".confirm-order").addEventListener("click", function () {
        alert("Thank you for your purchase!");
        localStorage.clear();
    });
});
