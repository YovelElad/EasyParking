function initAutocomplete() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 32.0678327, lng: 34.7765359 },
      zoom: 13,
      mapTypeId: "roadmap",
    });
    // Create the search box and link it to the UI element.
    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
      searchBox.setBounds(map.getBounds());
    });
    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
      const places = searchBox.getPlaces();
  
      if (places.length == 0) {
        return;
      }
      // Clear out the old markers.
      markers.forEach((marker) => {
        marker.setMap(null);
      });
      markers = [];
      // For each place, get the icon, name and location.
      const bounds = new google.maps.LatLngBounds();
      places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
          return;
        }
        const icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };
        // Create a marker for each place.
        markers.push(
          new google.maps.Marker({
            map,
            icon,
            title: place.name,
            position: place.geometry.location,
          })
        );
  
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
        var point = place.geometry.location.lat();
        var pointToString = String(point);
        var xPos = document.getElementById('xValue').value = pointToString;
  
        var point = place.geometry.location.lng();
        var pointToString = String(point);
        var yPos = document.getElementById('yValue').value = pointToString;
  
        
  
  
        var next = document.getElementById('next').addEventListener('click',function() {
          document.getElementById('admin-map').style.display = "none";
          document.getElementById('map').style.display = "none";
          document.getElementById('admin-form').style.display = "block";
        })
      });
      map.fitBounds(bounds);
    });
  }