document.addEventListener("DOMContentLoaded", function () {
    const applyButton = document.querySelector(".apply");
    const clearButton = document.querySelector(".clear");

    let selectedFilters = JSON.parse(localStorage.getItem("appliedFilters")) || {
        brand: [], storage: [], color: [], os: []
    };

    document.querySelectorAll(".filter-options button").forEach(option => {
        option.addEventListener("click", function () {
            let value = this.innerText;
            let category = this.closest(".filter-category").querySelector("label").textContent.toLowerCase();

            if (selectedFilters[category].includes(value)) {
                selectedFilters[category] = selectedFilters[category].filter(item => item !== value);
                this.classList.remove("selected");
            } else {
                selectedFilters[category].push(value);
                this.classList.add("selected");
            }
        });
    });

    applyButton.addEventListener("click", function () {
        localStorage.setItem("appliedFilters", JSON.stringify(selectedFilters));
        window.location.href = "products.html";
    });

    clearButton.addEventListener("click", function () {
        localStorage.removeItem("appliedFilters");
        location.reload();
    });
});
