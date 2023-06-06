<!DOCTYPE html>
<html>
<head>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    } 

    body {
      /* display: flex; */
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      height: 100%;
    }

    .box {
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #04AA6D;
    }

    .box1 {
      flex-basis: 30%;
    }

    .box2 {
      flex-basis: 70%;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50%;
    }

    #map {
      width: 100%;
      height: 100%;
    }

    .box1 h4 {
      font-size: 20px;
      margin-top: 10px;
    }

    .box1 span {
      display: block;
      font-size: 18px;
      margin-bottom: 5px;
    }

    .box1 p {
      margin-top: 20px;
      font-weight: bold;
    }
    .company-name {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      background-color: #f2f2f2;
      padding: 10px;
      border-radius: 5px;
      text-decoration: none;
      color: #333;
    }

    .company-name:hover {
      background-color: #e6e6e6;
    }
  </style>
</head>
<body>
<a class="company-name" href="">CTrack</a>
  <div class="container">
  
    <div class="box box1">
      <?php
        session_start();
        include 'views/auth/connect.php';

        $sql = "SELECT reg_no, veh_no, account_no FROM vehicles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $reg_no = $row['reg_no'];
          $veh_no = $row['veh_no'];
          $account_no = $row['account_no'];

          echo "<h4>Registration Number:</h4>";
          echo "<span>" . $reg_no . "</span>";
          echo "<h4>Vehicle Number:</h4>";
          echo "<span>" . $veh_no . "</span>";
          echo "<h4>Account Number:</h4>";
          echo "<span>" . $account_no . "</span>";
        } else {
          echo "<span>No data found</span>";
        }

        $conn->close();
      ?>
      <p id="address"></p>
    </div>
    <div class="box box2">
      <div id="map"></div>
    </div>
  </div>

  <!-- Include the JavaScript code for the map here -->
  <script>
    function initMap() {
      var location = {lat: 40.7128, lng: -74.0060}; // Example coordinates for New York City
      var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 12
      });

      var geocoder = new google.maps.Geocoder();

      map.addListener('click', function(e) {
        geocoder.geocode({location: e.latLng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              document.getElementById('address').innerHTML = 'Address: ' + results[0].formatted_address;
            } else {
              document.getElementById('address').innerHTML = 'No address found';
            }
          } else {
            document.getElementById('address').innerHTML = 'Geocoder failed due to: ' + status;
          }
        });
      });
    }
    function addSVGMarkers(map){
  //Create the svg mark-up
  var svgMarkup = '<svg  width="24" height="24" xmlns="http://www.w3.org/2000/svg">' +
  '<rect stroke="black" fill="${FILL}" x="1" y="1" width="22" height="22" />' +
  '<text x="12" y="18" font-size="12pt" font-family="Arial" font-weight="bold" ' +
  'text-anchor="middle" fill="${STROKE}" >C</text></svg>';

  // Add the first marker
  var bearsIcon = new H.map.Icon(
    svgMarkup.replace('${FILL}', 'blue').replace('${STROKE}', 'red')),
    bearsMarker = new H.map.Marker({lat: 41.8625, lng: -87.6166 },
      {icon: bearsIcon});

  map.addObject(bearsMarker);

  // Add the second marker.
  var cubsIcon = new H.map.Icon(
    svgMarkup.replace('${FILL}', 'white').replace('${STROKE}', 'orange')),
    cubsMarker = new H.map.Marker({lat: 41.9483, lng: -87.6555 },
      {icon: cubsIcon});

  map.addObject(cubsMarker);
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
  apikey: window.apikey
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Chicago.
var map = new H.Map(document.getElementById('map'),
  defaultLayers.vector.normal.map,{
  center: {lat:41.881944, lng:-87.627778},
  zoom: 11,
  pixelRatio: window.devicePixelRatio || 1
});
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
  var ui = H.ui.UI.createDefault(map, defaultLayers);

// Now use the map as required...
addSVGMarkers(map);
function coordinates_to_address(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);

    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if(status == google.maps.GeocoderStatus.OK) {
            if(results[1]) {
                $('#address_current').text(results[1].formatted_address);
            } else {
                alert('No results found');
            }
        } else {
            var error = {
                'ZERO_RESULTS': 'Kunde inte hitta adress'
            }

            // alert('Geocoder failed due to: ' + status);
            $('#address_new').html('<span class="color-red">' + error[status] + '</span>');
        }
    });
}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>