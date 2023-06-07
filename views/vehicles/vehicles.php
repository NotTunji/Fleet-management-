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
      <div class="button-vehiclee">
        <button onclick="exportTableToExcel('tablee', 'tableData')" class="button-vehiclee">EXPORT</button>
      </div>
      <div class="table">
        <table id="tablee">
          <tr>
            <th>Regstration Number</th>
            <th>Vehicle Number</th>
            <th>Device Subscription</th>
            <th>Account</th>
            <th>Device</th>
            <th>Actions</th> 
            <!-- <th>Vehicle Number</th> -->
          </tr>
          <?php
          session_start();

          include '../auth/connect.php';

          $sql = "SELECT * FROM vehicles";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td><a href='vehdetails.php?reg_no=" . $row["reg_no"] . "'>" . $row['reg_no'] . "</a></td>";
              echo "<td>" . $row["veh_no"] . "</td>";
              echo "<td>" . $row["device_sub"] . "</td>";
              echo "<td>" . $row["account_no"] . "</td>";
              echo "<td>" . $row["device"] . "</td>";
                     // Added edit and delete buttons
              echo "<td>";
              echo "<a href='edit_vehicle.php?reg_no=" . $row["reg_no"] . "' class='action-button edit-button'>Edit</a>";
              echo "<a href='delete_vehicle.php?reg_no=" . $row["reg_no"] . "' class='action-button delete-button'>Delete</a>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
          }

          $conn->close();
          ?>

        </table>
      </div>
  </div>



  <!-- </div> -->


  </main>
</body>
<script>
  function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify the filename
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
      var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
      });
      navigator.msSaveOrOpenBlob(blob, filename);
    } else {
      // Create a link to the file
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

      // Setting the file name
      downloadLink.download = filename;

      //triggering the function
      downloadLink.click();
    }
  }
</script>


</html>