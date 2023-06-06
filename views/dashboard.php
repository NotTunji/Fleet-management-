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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

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
            <!-- <div class="user-wrapper" >
                <img src="../img/userprofile.png" width="40px" height="40px" alt="" alt="User Profile" id="profile-image">
                <div class="dropdown" id="dropdown-menu">
                    <ul>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="/auth/login.php">Logout</a></li>
                    </ul>
                </div>   -->
                <!-- <div><h4>Jone Doe</h4>
                    <small>Super admin</small></div>
            </div> -->
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
    <div class="diagram">
      <h2>Statistics Diagram</h2>
      <img src="diagram.png" alt="Statistics Diagram">
    </div>
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
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
