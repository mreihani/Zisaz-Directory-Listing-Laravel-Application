let marker;

let ln = document.getElementById('private-site-map-container').getAttribute("data-geo-ln");
let lt = document.getElementById('private-site-map-container').getAttribute("data-geo-lt");

const map = new L.Map("map", {
    key: "web.e4b772dc75484285a83a98d6466a4c10",
    maptype: "neshan",
    poi: false,
    traffic: false,
    center: [ln, lt],
    zoom: 14,
})

marker = L.marker([ln, lt]).addTo(map);