<?php
// Start the session
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  // User is not authenticated, redirect to the login page
  header("Location: auth/login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .fleet-statistics {
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
    }

    .fleet-statistics .statistic {
      text-align: center;
    }

    .fleet-statistics .statistic .count {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .fleet-statistics .statistic .label {
      font-size: 16px;
      color: #888;
    }

    .active-cars {
      color: green;
    }

    .inactive-cars {
      color: red;
    }

    .summary {
      margin-top: 40px;
    }

    .diagram {
      margin-top: 40px;
      text-align: center;
    }

    .diagram img {
      max-width: 400px;
      height: auto;
    }

    html, body {
      height: 100%;
      margin: 0;
    } 

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }

    #map-container {
      width: 500px; /* Adjust the width as per your preference */
      height: 400px; /* Adjust the height as per your preference */
    }

    #map {
      width: 100%;
      height: 100%;
    }
    .car-marker {
    width: 32px; /* Adjust the width as per your preference */
    height: 32px; /* Adjust the height as per your preference */
    background-image: url(path/to/car.png); /* Replace path/to/car.png with the actual path to your car image */
    background-size: cover;
  }
  </style>
</head>

<body>
  <input type='checkbox' id='nav-toggle'>
  <div class="sidebar">
    <div class="sidebar-brand">
      <h1>
        <span class="lab la-accusoft"></span>
        <span> </span>
        <!-- <span>Accusoft</span> -->
      </h1>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="dashboard.php" class="active"><span class="las la-igloo"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="./vehicles/vehicles.php"><span class="las la-truck"></span>
            <span>Vehicles</span></a>
        </li>
        <li>
          <a href="./devices/devices.php"><span class="las la-toolbox"></span>
            <span>Devices</span></a>
        </li>
        <li>
          <a href="trips.php"><span class="las la-road"></span>
            <span>Trips</span></a>
        </li>
        <li>
          <a href="report.php"><span class="las la-clipboard-list"></span>
            <span>Report</span></a>
        </li>
        <li>
          <a href="vehicle_usage.php"><span class="las la-clipboard-list"></span>
            <span>Vehicle Usage </span></a>
        </li>
        <li>
          <a href="./maintainance/maintainance.php"><span class="las la-user-edit"></span>
            <span>Maintainance</span></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label>
        Dashboard
      </h2>
    </header>

    <div class="fleet-statistics">
      <div class="statistic">
        <div class="count" id="carCount">100</div>
        <div class="label">Number of Cars</div>
      </div>
      <div class="statistic">
        <div class="count active-cars" id="activeCarCount">75</div>
        <div class="label">Active Cars</div>
      </div>
      <div class="statistic">
        <div class="count inactive-cars" id="inactiveCarCount">25</div>
        <div class="label">Inactive Cars</div>
      </div>
    </div>

    <!-- <div class="diagram">
      <h2>Statistics Diagram</h2>
      <img src="diagram.png" alt="Statistics Diagram">
    </div> -->

    <div id="map-container">
      <div id="map"></div>
    </div>

    <script>
      // Function to generate a random number between min and max (inclusive)
      function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      // Function to update the active and inactive car counts with random values
      function updateCarCounts() {
        var carCount = 100; // Total number of cars
        var activeCarCount = getRandomNumber(0, carCount);
        var inactiveCarCount = carCount - activeCarCount;

        document.getElementById("carCount").textContent = carCount;
        document.getElementById("activeCarCount").textContent = activeCarCount;
        document.getElementById("inactiveCarCount").textContent = inactiveCarCount;
      }

      // Initial update
      updateCarCounts();

      // Update car counts every 5 seconds
      setInterval(updateCarCounts, 5000);
    </script>

    <script>
      document.getElementById("profile-image").addEventListener("click", function() {
        document.getElementById("dropdown-menu").classList.toggle("show");
      });
    </script>

    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: { lat: 6.5244, lng: 3.3792 }, // Lagos coordinates
        });

        <?php
          include 'auth/connect.php';

          $sql = "SELECT reg_no, veh_no FROM vehicles";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $reg_no = $row['reg_no'];
              $veh_no = $row['veh_no'];
  
              // Generate random latitude and longitude within Lagos boundaries
              $latMin = 6.3932;
              $latMax = 6.7028;
              $lngMin = 3.0894;
              $lngMax = 4.3517;
  
              $lat = mt_rand() / mt_getrandmax() * ($latMax - $latMin) + $latMin;
              $lng = mt_rand() / mt_getrandmax() * ($lngMax - $lngMin) + $lngMin;
        ?>
  
        const marker<?php echo $reg_no; ?> = new google.maps.Marker({
          position: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
          map: map,
          label: "<?php echo $veh_no; ?>",
          icon: {
        url: '../img/car.jpeg', // Replace 'car.png' with the actual path to your car image
        scaledSize: new google.maps.Size(32, 32), // Adjust the size as per your preference
        anchor: new google.maps.Point(16, 16) // Adjust the anchor point as per your preference
      }
        });
  
        <?php
            }
          }
  
          $conn->close();
        ?>
      }
  
      window.initMap = initMap;
    </script>
  

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="../js/dashboard.js"></script>
</body>
</html>
