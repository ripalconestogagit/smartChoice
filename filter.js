document.addEventListener("DOMContentLoaded", function () {
    const applyButton = document.querySelector(".apply");
    const clearButton = document.querySelector(".clear");
    
    let selectedFilters = JSON.parse(localStorage.getItem("appliedFilters")) || {
        brand: [], storage: [], color: [], os: []
    };

    function toggleSelection(element, category, value) {
        if (selectedFilters[category].includes(value)) {
            selectedFilters[category] = selectedFilters[category].filter(item => item !== value);
            element.classList.remove("selected");
        } else {
            selectedFilters[category].push(value);
            element.classList.add("selected");
        }
    }

    document.querySelectorAll(".filter-options button, .filter-options img, .color-box").forEach(option => {
        option.addEventListener("click", function () {
            let value = this.innerText || this.getAttribute("alt") || this.style.backgroundColor;
            let category = this.closest(".filter-category").querySelector("label").textContent.toLowerCase();
            toggleSelection(this, category, value);
        });
    });

    applyButton.addEventListener("click", function () {
        localStorage.setItem("appliedFilters", JSON.stringify(selectedFilters));
        let queryString = new URLSearchParams(selectedFilters).toString();
        window.location.href = "products.php?" + queryString;
    });

    clearButton.addEventListener("click", function () {
        localStorage.removeItem("appliedFilters");
        location.reload();
    });
});

// CSS for selected elements
const style = document.createElement("style");
style.innerHTML = `.selected { border: 2px solid red; background-color: #ddd; }`;
document.head.appendChild(style);