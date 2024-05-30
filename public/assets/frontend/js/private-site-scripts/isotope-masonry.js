const filters = document.querySelectorAll(".portfolio-menu button");
filters.forEach((filter) => {
    filter.addEventListener("click", function () {
        // ==== Filter btn toggle
        let filterBtn = filters[0];
        while (filterBtn) {
            if (filterBtn.tagName === "BUTTON") {
                filterBtn.classList.remove("active");
            }
            filterBtn = filterBtn.nextSibling;
        }
        this.classList.add("active");
        // === filter
        let selectedFilter = filter.getAttribute("data-filter");
        let itemsToHide = document.querySelectorAll(`.grid .col-lg-4:not([data-filter='${selectedFilter}'])`);
        let itemsToShow = document.querySelectorAll(`.grid [data-filter='${selectedFilter}']`);
        if (selectedFilter == "all") {
            itemsToHide = [];
            itemsToShow = document.querySelectorAll(".grid [data-filter]");
        }
        itemsToHide.forEach((el) => {
            el.classList.add("hide");
            el.classList.remove("show");
        });
        itemsToShow.forEach((el) => {
            el.classList.remove("hide");
            el.classList.add("show");
        });
    });
});