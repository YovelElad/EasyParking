
function initMap() {
    var currId;
    var userRole;
    userRole = document.getElementById("user_role").textContent;

    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 32.0678327, lng: 34.7765359 },
        zoom: 16
    });

    var driverMarker = new google.maps.Marker({
        position:{lat: 32.072172, lng: 34.773816},
        map:map,
        icon: "https://i.imgur.com/CSNM5o8.png"
        })


        
    function addMarker(location, id) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        marker.addListener('click', function () {
            userRole = document.getElementById("user_role").textContent;
            currId = document.getElementById("dom-target").textContent;
            var url;
            if(userRole != "\nadmin")
                url = "main-object.php?id=" + currId + "&parking_id=" + id;
            else
                url = "report-page.php?id=" + currId + "&parking_id=" + id; 

            window.location.href = url;
        })
        return marker;
    }
    currId = document.getElementById("dom-target").textContent;
    var jsonURL = "getCoordinats.php?id=" + currId;
    $.getJSON(jsonURL , function (data) {
        for (i = 1; i <= data[0].counter; i++) {
            var mark = addMarker({ lat: data[i].x, lng: data[i].y }, data[i].id);
        }
    });

}