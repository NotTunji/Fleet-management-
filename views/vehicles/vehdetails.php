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

  <?php
    session_start();
    include '../auth/connect.php';

    if (isset($_GET['reg_no'])) {
      $selectedVehicle = $_GET['reg_no'];

      $sql = "SELECT reg_no, veh_no, account_no FROM vehicles WHERE reg_no = '$selectedVehicle'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $reg_no = $row['reg_no'];
        $veh_no = $row['veh_no'];
        $account_no = $row['account_no'];
        // $latitude = $row['latitude'];
        // $longitude = $row['longitude'];
      } else {
        echo "<span>No data found for the selected vehicle.</span>";
        exit;
      }
    } else {
      echo "<span>Invalid request.</span>";
      exit;
    }

    $conn->close();
  ?>

  <div class="container">
    <div class="box box1">
      <h4>Registration Number:</h4>
      <span><?php echo $reg_no; ?></span>
      <h4>Vehicle Number:</h4>
      <span><?php echo $veh_no; ?></span>
      <h4>Account Name:</h4>
      <span><?php echo $account_no; ?></span>
    </div>
    <div class="box box2">
      <div id="map"></div>
    </div>
  </div>

  <!-- Include the JavaScript code for the map here -->
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
    
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>
