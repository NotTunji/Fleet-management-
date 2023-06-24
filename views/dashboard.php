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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<style>
  .fleet-statistics {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
  }

  .fleet-statistics .statistic {
    text-align: center;
    margin: o 10px;
    flex-basis: 30%;
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

  #map-container {
    width: 700px;
    /* Adjust the width as per your preference */
    height: 700px;
    /* Adjust the height as per your preference */
  }

  #map {
    width: 100%;
    height: 100%;
  }

  .car-marker {
    width: 32px;
    /* Adjust the width as per your preference */
    height: 32px;
    /* Adjust the height as per your preference */
    background-image: url(path/to/car.png);
    /* Replace path/to/car.png with the actual path to your car image */
    background-size: cover;
  }

  #deviceChart {
    width: 200px;
    /* Adjust the width as per your preference */
    height: 200px;
    /* Adjust the height as per your preference */
  }

  #deviceChartContainer {
    width: 100%;
    max-width: 400px;
    height: auto;
    /* background-color: red; */
  }

  canvas#deviceChart {
    width: 200px;
    height: 200px;
  }


  #deviceChart2 {
    width: 200px;
    /* Adjust the width as per your preference */
    height: 200px;
    /* Adjust the height as per your preference */
  }

  #deviceChartContainer2 {
    width: 100%;
    max-width: 400px;
    height: auto;
    /* background-color: red; */

  }

  canvas#deviceChart2 {
    width: 100%;
    height: 100%;
  }
  .car-marker {
  width: 32px;
  height: 32px;
  background-image: url(path/to/car.png); /* Replace path/to/car.png with the actual path to your car image */
  background-size: cover;
}
.dropdown {
            position: relative;
            display: inline-block;
            padding: 0px 45px;
            left: 560px;

        }

        .dropdown.right {
            right: 4;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            padding: 2px;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }


</style>

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
            <div class="dropdown">
                <img src="../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image"
                    onclick="toggleDropdown()">
                <div id="dropdownContent" class="dropdown-content">
                    <a href="#">setting</a>
                    <a href="#">Logout</a>
                </div>



            </div>
            <div>
                <h4>Tunji</h4>
                <small>Super admin</small>
            </div>
    </header>
    <main class="dashboard-main">
      <section class="map-info-section">
        <div id="map-container">
          <div id="map"></div>
        </div>
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
      </section>
      <section class="class-section">
        <div id="deviceChartContainer">
          <canvas id="deviceChart"></canvas>
        </div>
        <div id="deviceChartContainer2">
          <canvas id="deviceChart2"></canvas>
        </div>
      </section>
      <main>
  </div>
  <script>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve counts of active and inactive devices
    $sql = "SELECT SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS activeDevices,
                SUM(CASE WHEN status = 'Inactive' THEN 1 ELSE 0 END) AS inactiveDevices
                FROM devices";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $activeDevices = $row['activeDevices'];
      $inactiveDevices = $row['inactiveDevices'];
    } else {
      $activeDevices = 0;
      $inactiveDevices = 0;
    }
    // Retrieve counts of active and inactive devices
    $consql = "SELECT SUM(CASE WHEN config_status = 'Configured' THEN 1 ELSE 0 END) AS connectedDevices,
 SUM(CASE WHEN config_status = 'NotConfigured' THEN 1 ELSE 0 END) AS notConnectedDevices
 FROM devices";

    $result = $conn->query($consql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $connectedDevices = $row['connectedDevices'];
      $notConnectedDevices = $row['notConnectedDevices'];
    } else {
      $connectedDevices = 0;
      $notConnectedDevices = 0;
    }
    $conn->close();
    ?>

    // Chart.js code
    var ctx2 = document.getElementById('deviceChart2').getContext('2d');
    var deviceChart2 = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ['Connected', 'NotConnected'],
        datasets: [{
          data: [<?php echo $connectedDevices; ?>, <?php echo $notConnectedDevices; ?>],
          backgroundColor: [
            'rgba(54, 162, 235, 0.7)', // Active devices color
            'rgba(255, 99, 132, 0.7)', // Inactive devices color
          ],
        }],
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
        title: {
          display: true,
          text: 'Device Statistics',
        },
      },
    });
    var ctx = document.getElementById('deviceChart').getContext('2d');
    var deviceChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
          data: [<?php echo $activeDevices; ?>, <?php echo $inactiveDevices; ?>],
          backgroundColor: [
            'rgba(54, 162, 235, 0.7)', // Active devices color
            'rgba(255, 99, 132, 0.7)', // Inactive devices color
          ],
        }],
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
        title: {
          display: true,
          text: 'Device Statistics',
        },
      },
    });
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
    document.getElementById("profile-image").addEventListener("click", function () {
      document.getElementById("dropdown-menu").classList.toggle("show");
    });
  </script>
<script>
            function toggleDropdown() {
                var dropdownContent = document.getElementById("dropdownContent");
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            }
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
  label: {
    // text: "<?php echo $veh_no; ?>",
    color: "black", // Adjust the label color if needed
    fontWeight: "bold" // Adjust the label font weight if needed
    
  },
  icon: {
    url: '../img/car.jpeg', // Replace path/to/car.png with the actual path to your car image
    scaledSize: new google.maps.Size(32, 32), // Adjust the size as per your preference
    anchor: new google.maps.Point(16, 16) // Adjust the anchor point as per your preference
  },
  labelOrigin: new google.maps.Point(16, -10) // Adjust the label offset from the marker
});
const infoWindow<?php echo $reg_no; ?> = new google.maps.InfoWindow({
        content: "<?php echo $reg_no; ?>",
      });

      // Show info window when marker is hovered
      marker<?php echo $reg_no; ?>.addListener("mouseover", () => {
        infoWindow<?php echo $reg_no; ?>.open(map, marker<?php echo $reg_no; ?>);
      });

      // Hide info window when marker is not hovered
     


          <?php
        }
      }

      $conn->close();
      ?>
       google.maps.event.trigger(map, "resize");
    }

    window.initMap = initMap;
  </script>


  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap"
    async defer></script>
  </div> -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap"></script>
  </div>

  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
  <!-- <script src="../js/dashboard.js"></script> -->
</body>

</html>