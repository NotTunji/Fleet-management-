<?php
 session_start();

 include '../auth/connect.php';

 $sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);



 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Website Homepage</title>
  <link rel="stylesheet" href="../../css/syle.css">
  <link rel="stylesheet" href="../../css/Vehicle.css">
  <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <script defer src="../../JS/vehicles.js"></script>
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
          <a href="../dashboard.php"><span class="las la-igloo"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="./vehicles/vehicles.php" class="active"><span class="las la-truck"></span>
            <span>Vehicles</span></a>
        </li>
        <li>
          <a href="../devices/devices.php"><span class="las la-toolbox"></span>
            <span>Devices</span></a>
        </li>
        <li>
          <a href="../trips.php"><span class="las la-road"></span>
            <span>Trips</span></a>
        </li>
        <li>
          <a href="../report.php"><span class="las la-clipboard-list"></span>
            <span>Report</span></a>
        </li>
        <li>
          <a href="../vehicle_usage.php"><span class="las la-clipboard-list"></span>
            <span>Vehicle Usage </span></a>
        </li>
        <li>
          <a href="../maintainance/maintainance.php"><span class="las la-user-edit"></span>
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
        Vehicles
      </h2>
      <div class="user-wrapper">
        <img src="../../img/userprofile.png" width="40px" height="40px" alt="" alt="User Profile">
        <div>
          <h4>Jone Doe</h4>
          <small>Super admin</small>
        </div>

        <div class="dropdown">
          <ul>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="/auth/index.php">Logout</a></li>

          </ul>
        </div>
      </div>
    </header>
    <main>

      <div class="button-vehicle">
        <a href="add_vehicle.php" class="button">New Vehicle</a>
      </div>

      <div class="table">
        <table>
          <tr>
            <th>Regstration Number</th>
            <th>Vehicle Number</th>
            <th>Device Subscription</th>
            <th>Account</th>
            <th>Device</th>
            <!-- <th>Vehicle Number</th> -->
          </tr>
          <?php 
           if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["reg_no"] . "</td>";
                echo "<td>" . $row["veh_no"] . "</td>";
                echo "<td>" . $row["device_sub"] . "</td>";
                echo "<td>" . $row["account_no"] . "</td>";
                echo "<td>" . $row["device"] . "</td>";
               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        $conn->close();
        ?>
         
        </table>
      </div>
  </div>



  <!-- </div> -->


  </main>
</body>

</html>