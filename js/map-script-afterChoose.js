


function initMap() {

    var tempMark;

    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 32.0678327, lng: 34.7765359 },
        zoom: 16
    });

    driverMarker = new google.maps.Marker({
        position:{lat: 32.072172, lng: 34.773816},
        map:map,
        icon: "https://i.imgur.com/CSNM5o8.png"
        })



    function addMarker(location, id) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            id:id,
            bool:false
        });
        return marker;
    }
    var url = window.location.search;
    url = url.split('=');
    var endOfUrl = url[2];
    var numberId = parseInt(endOfUrl);
    currId = document.getElementById("dom-target").textContent;
    var jsonURL = "getCoordinats.php?id=" + currId;
    $.getJSON(jsonURL, function (data) {
        for (i = 1; i <= data[0].counter; i++) {
            if(numberId == data[i].id) {
                var mark = addMarker({ lat: data[i].x, lng: data[i].y }, data[i].id);
                tempMark = mark;
            }
        }
    });



      setTimeout(function(){

        var newLat = tempMark.position.lat();
        var newLng = tempMark.position.lng();
        driverMarker.setMap(null);
        newDriverMarker = new google.maps.Marker({
            position:{lat: newLat, lng: newLng},
            map:map,
            icon: "https://i.imgur.com/CSNM5o8.png"
            })
    },20000);

    setTimeout(function() {
        $("#systemMessege").show(200);
        $("#willFade").fadeTo("fast",0.33);
    },25000);
}