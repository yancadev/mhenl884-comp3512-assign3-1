function initMap(lat, long){
    var uluru = {lat: lat, lng: long};
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: uluru
    });
    var marker = new google.maps.Marker({
    position: uluru,
    map: map
    });
}