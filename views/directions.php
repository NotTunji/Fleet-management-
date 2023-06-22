<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Directions</title>
  <style>
    
    /* Include the Fira Code font */
    @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');

    /* Use the Fira Code font for code elements */
    code {
      font-family: 'Fira Code', monospace;
    }

    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      /* display: flex; */
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      transition: background-color 0.5s, color 0.5s;
    }

    .container {
      display: flex;
      height: 100%;
    }

    .box {
      border: 1px solid #ccc;
      padding: 10px;
      background-color: var(--box-background-color);
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
      background-color: #04AA6D;
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
      position: relative;
      bottom: 20px;
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

    span {
      font-weight: bold;
    }

    /* Dark mode styles */
    .dark-mode {
      --background-color: #333;
      --text-color: #f2f2f2;
      --box-background-color: #444;
    }

    .switch-label {
      display: inline-block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 0;
      cursor: pointer;
      font-size: 16px;
      user-select: none;
    }

    .switch-label::before,
    .switch-label::after {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 28px;
      height: 14px;
      border-radius: 14px;
      transition: all 0.3s ease;
    }

    .switch-label::before {
      background-color: #e6e6e6;
    }

    .switch-label::after {
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .switch-label input[type="checkbox"] {
      display: none;
    }

    .switch-label input[type="checkbox"]:checked+.switch-label::before {
      background-color: #6b6bff;
    }

    .switch-label input[type="checkbox"]:checked+.switch-label::after {
      transform: translateX(14px);
    }
    #duration{
      font-size: 20px;
      font-weight: bold;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&libraries=places&callback=initMap" async defer></script>
</head>
<body>
<a class="company-name" href="trips.php">CTrack</a>
<input type="checkbox" id="darkModeSwitch" onchange="toggleDarkMode()">
<label for="darkModeSwitch" class="switch-label">Dark Mode</label>
<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $selectedVehicle = $_GET['reg_no'] ?? '';
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$selectedVehicle =$queries['veh_no'];

// Fetch the information from the database
$veh_no = "";
$start_add = "";
$end_add = "";

if (!empty($selectedVehicle)) {
    $sql = "SELECT veh_no, start_add, end_add FROM trips WHERE veh_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedVehicle);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // echo $row;
        $veh_no = $row['veh_no'];
        $start_add = $row['start_add'];
        $end_add = $row['end_add'];
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<div class="container">
  <div class="box box1">
    <h4>Vehicle Number:</h4>
    <span><?php echo $veh_no; ?></span>
    <h4>Vehicle:</h4>
    <span><?php echo $start_add; ?></span>
    <h4>Account Name:</h4>
    <span><?php echo $end_add; ?></span>
    <div id="duration"></div>
  </div>
  <div class="box box2">
    <div id="map"></div>
  </div>
</div>

<script>
  function initMap() {
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: { lat: 41.85, lng: -87.65 }
    });
    directionsRenderer.setMap(map);

    var start = decodeURIComponent(getParameterByName('start'));
    var end = decodeURIComponent(getParameterByName('end'));

    calculateAndDisplayRoute(directionsService, directionsRenderer, start, end);
  }

  function calculateAndDisplayRoute(directionsService, directionsRenderer, start, end) {
    directionsService.route(
      {
        origin: start,
        destination: end,
        travelMode: 'DRIVING'
      },
      function (response, status) {
        if (status === 'OK') {
          directionsRenderer.setDirections(response);

          // Get the duration of the route
          var duration = response.routes[0].legs[0].duration.text;

          // Display the duration on the page
          var durationElement = document.getElementById('duration');
          durationElement.textContent = "Duration: " + duration;
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      }
    );
  }

  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  function toggleDarkMode() {
    const body = document.querySelector("body");
    body.classList.toggle("dark-mode");
  }
</script>
</body>
</html>
