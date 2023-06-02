<!DOCTYPE html>
<html>
<head>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <h3>My Map</h3>
  <div id="map"></div>

  <script>
    function initMap() {
      var location = {lat: 40.7128, lng: -74.0060}; // Example coordinates for New York City
      var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 12
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>
