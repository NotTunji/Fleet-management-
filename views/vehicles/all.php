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
<a class="company-name" href="vehicles.php">CTrack</a>

<?php
session_start();
include '../auth/connect.php';

// Retrieve all vehicles from the database
$sql = "SELECT reg_no, veh_no, account_no FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $vehicles = $result->fetch_all(MYSQLI_ASSOC);
} else {
  echo "<span>No vehicles found in the fleet.</span>";
  exit;
}

$conn->close();
?>

<div class="container">
  <div class="box box1">
    <h4>Registration Number:</h4>
    <span><?php echo $vehicles[0]['reg_no']; ?></span>
    <h4>Vehicle Number:</h4>
    <span><?php echo $vehicles[0]['veh_no']; ?></span>
    <h4>Account Name:</h4>
    <span><?php echo $vehicles[0]['account_no']; ?></span>
    <h4>Address:</h4>
    <p id="address"></p>
  </div>
  <div class="box box2">
    <div id="map"></div>
  </div>
</div>

<!-- Include the JavaScript code for the map here -->
<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: { lat: 6.5244, lng: 3.3792 }, // Lagos coordinates
        });

        // Iterate through the vehicles array and create markers for each vehicle
        <?php foreach ($vehicles as $vehicle) { ?>
            const latitude = <?php echo $vehicle['latitude']; ?>;
            const longitude = <?php echo $vehicle['longitude']; ?>;
            const position = { lat: latitude, lng: longitude };

            // Resize the image to fit into the map
            const image = {
                url: "../../img/car.jpeg",
                scaledSize: new google.maps.Size(50, 50), // Adjust the size as needed
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(0, 0)
            };

            const marker = new google.maps.Marker({
                position,
                map,
                icon: image,
            });

            // Use Geocoding API to retrieve the address for each vehicle
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
        <?php } ?>
    }

    window.initMap = initMap;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
