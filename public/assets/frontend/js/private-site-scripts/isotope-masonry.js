const projectsFilters = document.querySelectorAll(".portfolio-menu button");
projectsFilters.forEach((filter) => {
    filter.addEventListener("click", function () {
        // ==== Filter btn toggle
        let filterBtn = projectsFilters[0];
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

const AdsFilters = document.querySelectorAll(".ads-menu button");
AdsFilters.forEach((adsFilter) => {
    adsFilter.addEventListener("click", function () {
        // ==== Filter btn toggle
        let adsFilterBtn = AdsFilters[0];
        while (adsFilterBtn) {
            if (adsFilterBtn.tagName === "BUTTON") {
                adsFilterBtn.classList.remove("active");
            }
            adsFilterBtn = adsFilterBtn.nextSibling;
        }
        this.classList.add("active");
        // === filter
        let adsSelectedFilter = adsFilter.getAttribute("data-filter-ads");
        let adsItemsToHide = document.querySelectorAll(`.adsGrid .col-lg-4:not([data-filter-ads='${adsSelectedFilter}'])`);

        let itemsToShow = document.querySelectorAll(`.adsGrid [data-filter-ads='${adsSelectedFilter}']`);
        if (adsSelectedFilter == "allAds") {
            adsItemsToHide = [];
            itemsToShow = document.querySelectorAll(".adsGrid [data-filter-ads]");
        }
        adsItemsToHide.forEach((adsElem) => {
            adsElem.classList.add("hide");
            adsElem.classList.remove("show");
        });
        itemsToShow.forEach((adsElem) => {
            adsElem.classList.remove("hide");
            adsElem.classList.add("show");
        });
    });
});