<!DOCTYPE html>
<html>
<head>
<style>
  
    /* Include the Fira Code font */
    @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');

    /* Use the Fira Code font for code elements */
    code {
      font-family: 'Fira Code', monospace;
    }
  
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
    span{{
      font-weight: bold;
    }
  </style>
</head>
<body>
<a class="company-name" href="vehicles.php">CTrack</a>

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

        // Get the address based on latitude and longitude
        $latitude = 6.5244; // Replace with the actual latitude
        $longitude = 3.3792; // Replace with the actual longitude

        $address = ""; // Initialize the address variable

        // Call the Google Geocoding API to get the address
        $geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $latitude . "," . $longitude . "&key=YOUR_API_KEY";
        $geocodingResponse = file_get_contents($geocodingUrl);
        $geocodingData = json_decode($geocodingResponse);

        if ($geocodingData && $geocodingData->status === "OK") {
          $address = $geocodingData->results[0]->formatted_address;
        }
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
      <h4>Address:</h4>
      <p id="address"></p>
    </div>
    <div class="box box2">
      <div id="map"></div>
    </div>
  </div>

  <!-- Include the JavaScript code for the map here -->
  <script>
        // This example adds a marker to indicate a random location within Lagos, Nigeria.
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: { lat: 6.5244, lng: 3.3792 }, // Lagos coordinates
            });

            // Generate random latitude and longitude within Lagos boundaries
            const latMin = 6.3932;
            const latMax = 6.7028;
            const lngMin = 3.0894;
            const lngMax = 4.3517;

            const lat = Math.random() * (latMax - latMin) + latMin;
            const lng = Math.random() * (lngMax - lngMin) + lngMin;

            const position = { lat, lng };

            // Resize the image to fit into the map
            const image = {
                url: "../../img/car.jpeg",
                scaledSize: new google.maps.Size(50, 50), // Adjust the size as needed
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) 
            };

            const marker = new google.maps.Marker({
                position,
                map,
                icon: image,
            });
            

            // Use Geocoding API to retrieve the address for the random location
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: position }, (results, status) => {
              if (status === "OK") {
                if (results[0]) {
                  const address = results[0].formatted_address;
                  document.getElementById("address").textContent = address;
                } else {
                  console.log("No address found for the location");
                }
              } else {
                console.log("Geocoder failed due to: " + status);
              }
            });
        }

        window.initMap = initMap;
    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>
