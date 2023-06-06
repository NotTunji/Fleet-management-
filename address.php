<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Marker Labels</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLHKWYAEE2PDjvt6BaBH1SIs4Q93PMpQs&libraries=places"></script>
</head>

<body>
  <input id="pac-input" class="controls" type="text" placeholder="Search Box" style="margin-top:13px">
  <div id="map"></div>
</body>
<input id="address_name" type="text" placeholder="Address"><br>
<input id="address_type" type="text" placeholder="Address type"><br>
<input id="coordinates" type="text" placeholder="Coordinates"><br>
<input id="location_type" type="text" placeholder="Location type"><br>
<script>
    var search_markers = [];
var markers = [];

function initialize() {
  var currentarea = {
    lat: -33.8688,
    lng: 151.2195
  };
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: currentarea
  });

  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var s_markers = [];

  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length === 0) {
      return;
    }

    // Clear out the old markers.
    s_markers.forEach(function(marker) {
      marker.setMap(null);
    });
    s_markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      if (!place.geometry) {
        console.log("Returned place contains no geometry");
        return;
      }
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      s_marker = new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.formatted_address,
        position: place.geometry.location
      })
      s_markers.push(s_marker);

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    s_markers.forEach(function(s_mark) {
      s_mark.addListener('click', function() {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': s_mark.title
          },
          function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();

              document.getElementById("address_name").value = s_mark.title;
              document.getElementById("address_type").value = results[0].types;
              document.getElementById("coordinates").value = lat + "," + lng;
              document.getElementById("location_type").value = results[0].geometry.location_type;
            }
          });
      });
    });
    map.fitBounds(bounds);
  });

}


google.maps.event.addDomListener(window, 'load', initialize);</script>
</html>