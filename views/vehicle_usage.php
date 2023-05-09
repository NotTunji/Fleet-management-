<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/vehicle_usage.css">
</head>

<body class="body__container">
  <div class="sidebar__content">
    <div>
      <div class="logo">
        <h1>CTrack</h1>
      </div>
    </div>

    <ul class="sidebar">
      <li class="sidebar__item"><a href="analytics.php">Analytics</a></li>
      <li class="sidebar__item"><a href="./vehicles/vehicles.php">Vehicles</a></li>
      <li class="sidebar__item"><a href="./devices/devices.php">Devices</a></li>
      <li class="sidebar__item"><a href="trips.php">Trips</a></li>
      <li class="sidebar__item"><a href="report.php">Report</a></li>
      <li class="sidebar__item"><a href="vehicle_usage.php" class="active">Vehicle Usage</a></li>
      <li class="sidebar__item"><a href="./maintainance/maintainance.php">Mantainance</a></li>
    </ul>
  </div>
  <div class="main__content">
    <header>
      <div class="header-left">
        <h1>Welcome</h1>
      </div>
      <div class="header-right">
        <img src="../img/userprofile.png" alt="User Profile">
        <div class="dropdown">
          <ul>
            <li><a href="settings.html">Settings</a></li>
            <li><a href="/auth/index.php">Logout</a></li>


          </ul>
        </div>
      </div>
    </header>
    <div class="button-vehicle">
      <a href="add_usage.php" class="button">New Usage</a>
    </div>

    <div class="table">
    <table>
        <head>
            <tr>
                <th>Vehicle ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of Days<th>
                <th>Total Distance</th>
                <th>Driver</th>
                <th>Purpose</th>
                <th>Fuel Consumption</th>
                <th>Notes</th>
            </tr>
        </head>
      <body>

      </body>

</html>