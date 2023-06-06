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
  <div id="map"></div>
  <div id="picked-location"></div>
  <div id="address"></div>

 
</body>
<script>
    function initMap() {
      var nigeriaBounds = {
        north: 13.892_005,
        south: 4.267_165,
        west: 2.676_932,
        east: 14.677_683
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 9.081_999, lng: 8.675_277}, // Centered on Nigeria
        zoom: 6
      });

      var selectedMarker = null;

      // Generate random coordinates within Nigeria
      function getRandomCoordinates() {
        var lat = Math.random() * (nigeriaBounds.north - nigeriaBounds.south) + nigeriaBounds.south;
        var lng = Math.random() * (nigeriaBounds.east - nigeriaBounds.west) + nigeriaBounds.west;
        return { lat: lat, lng: lng };
      }

      // Add random markers with car icons to the map
      for (var i = 0; i < 10; i++) {
        var location = getRandomCoordinates();
        var marker = new google.maps.Marker({
          position: location,
          map: map,
          icon: 'https://maps.google.com/mapfiles/ms/icons/car.png' // Car icon
        });

        // Add click event listener to each marker
        marker.addListener('click', function() {
          if (selectedMarker) {
            selectedMarker.setIcon('https://maps.google.com/mapfiles/ms/icons/car.png'); // Reset previously selected marker's icon
          }
          this.setIcon('https://maps.google.com/mapfiles/ms/icons/green-dot.png'); // Set the clicked marker's icon
          selectedMarker = this;

          // Display selected location and address
          document.getElementById('picked-location').textContent = 'Picked Location: ' + this.getPosition().toUrlValue(6);

          var geocoder = new google.maps.Geocoder();
          geocoder.geocode({ location: this.getPosition() }, function(results, status) {
            if (status === 'OK') {
              if (results[0]) {
                document.getElementById('address').textContent = 'Address: ' + results[0].formatted_address;
              } else {
                document.getElementById('address').textContent = 'Place details not found.';
              }
            } else {
              document.getElementById('address').textContent = 'Geocoder failed due to: ' + status;
            }
          });
        });
      }
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</html>
