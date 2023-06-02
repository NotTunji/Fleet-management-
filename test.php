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
  <h3>Car Location</h3>
  <div id="map"></div>
  <div id="location"></div>

  <script>
    function initMap() {
      // Define the bounds of Nigeria
      var nigeriaBounds = {
        north: 13.892_638,
        south: 4.270_944,
        west: 2.668_349,
        east: 14.677_011
      };

      // Generate random latitude and longitude within Nigeria
      var randomLatitude = Math.random() * (nigeriaBounds.north - nigeriaBounds.south) + nigeriaBounds.south;
      var randomLongitude = Math.random() * (nigeriaBounds.east - nigeriaBounds.west) + nigeriaBounds.west;

      // Create a map centered at the random location
      var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: randomLatitude, lng: randomLongitude },
        zoom: 8
      });

      // Create a marker with an image of a car
      var carMarker = new google.maps.Marker({
        position: { lat: randomLatitude, lng: randomLongitude },
        map: map,
        icon: 'img/download.jpg' // Path to the car image file
      });

      // Function to update the car marker position and display the location name
      function updateCarMarker() {
        var newLatitude = carMarker.getPosition().lat() + (Math.random() - 0.5) * 0.1;
        var newLongitude = carMarker.getPosition().lng() + (Math.random() - 0.5) * 0.1;

        // Ensure the new position stays within Nigeria bounds
        newLatitude = Math.max(Math.min(newLatitude, nigeriaBounds.north), nigeriaBounds.south);
        newLongitude = Math.max(Math.min(newLongitude, nigeriaBounds.east), nigeriaBounds.west);

        carMarker.setPosition({ lat: newLatitude, lng: newLongitude });

        // Reverse geocode the coordinates to get the location name
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: { lat: newLatitude, lng: newLongitude } }, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              document.getElementById('location').innerHTML = 'Location: ' + results[0].formatted_address;
            } else {
              document.getElementById('location').innerHTML = 'Location not found';
            }
          } else {
            document.getElementById('location').innerHTML = 'Geocoder failed due to: ' + status;
          }
        });
      }

      // Update the car marker position and location name every 1 second
    //   setInterval(updateCarMarker, 1000);
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>
