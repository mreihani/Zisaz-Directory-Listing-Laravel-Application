let marker;

const map = new L.Map("map", {
    key: "web.e4b772dc75484285a83a98d6466a4c10",
    maptype: "neshan",
    poi: false,
    traffic: false,
    center: [35.699756, 51.338076],
    zoom: 14,
})

map.on('click', function (e) {
    if (marker) { 
        map.removeLayer(marker);
    }
    marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

    $('#latitude').val(e.latlng.lat);
    $('#longitude').val(e.latlng.lng);
});

// fix tile bug
setInterval(function() {
    map.invalidateSize();
}, 500);