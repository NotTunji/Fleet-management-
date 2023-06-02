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
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>