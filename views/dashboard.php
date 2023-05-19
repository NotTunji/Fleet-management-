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
    <link rel="stylesheet" href="../css/syle.css">
    <!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
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
                    <a href="./vehicles/vehicles.php"><span class="las la-users"></span>
                        <span>Vehicles</span></a>
                </li>
                <li>
                    <a href="./devices/devices.php"><span class="las la-clipboard-list"></span>
                        <span>Devices</span></a>
                </li>
                <li>
                    <a href="trips.php"><span class="las la-clipboard-list"></span>
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
                    <a href="./maintainance/maintainance.php"><span class="las la-clipboard-list"></span>
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
            <div class="user-wrapper">
                <img src="../img/userprofile.png" width="40px" height="40px" alt="" alt="User Profile">
                <div>
                    <h4>Jone Doe</h4>
                    <small>Super admin</small>
                </div>
            </div>
            <div class="dropdown">
                <ul>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="/auth/index.php">Logout</a></li>

                </ul>
            </div>
    </div>
    </header>

    <div>
        ....
    </div>
</body>

</html>