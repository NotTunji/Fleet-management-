<?php
session_start();

include '../auth/connect.php';
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
  <!-- <script defer src="../../JS/vehicles.js"></script> -->
  <style>
    .filter-container {
      text-align: right;
      margin-bottom: 10px;
      background-color: 04AA6D;
      padding: 11px 500px;
      border-radius: 4px;
      height: 20px;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      font-size: 15px;
      text-align: center;
    }
    .dropdown {
            position: relative;
            display: inline-block;
            padding: 0px 45px;
            left: 510px;

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
          <a href="vehicles.php" class="active"><span class="las la-truck"></span>
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
                Report
            </h2>
            <div class="dropdown">
                <img src="../../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image"
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
    <main>

      <div class="button-vehicle">
        <a href="add_vehicle.php" class="button">New Vehicle</a>
      </div>
     
      <button onclick="exportTableToExcel('tablee', 'tableData')">EXPORT</button>
     
      <div class="filter-container">
        <button class="las la-filter" onclick="toggleFilter()"></button>
      </div>
      
      <div id="filterOptions" style="display: none;">
        <label for="regNoFilter">Registration Number:</label>
        <input type="text" id="regNoFilter" oninput="applyFilter()">

        <label for="vehNoFilter">Vehicle:</label>
        <input type="text" id="vehNoFilter" oninput="applyFilter()">

        <!-- Add more filter options as needed -->
      </div>

      <div class="table">
        <table id="tablee">
          <tr>
            <th>Registration Number</th>
            <th>Vehicle</th>
            <th>Device Subscription</th>
            <th>Account</th>
            <th>Device</th>
            <th>Actions</th> 
            <!-- <th>Vehicle Number</th> -->
          </tr>
          <?php
          $sql = "SELECT * FROM vehicles";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<tr class='vehicle-row'>";
              echo "<td><a href='vehdetails.php?reg_no=" . $row["reg_no"] . "'>" . $row['reg_no'] . "</a></td>";
              echo "<td>" . $row["veh_no"] . "</td>";
              echo "<td>" . $row["device_sub"] . "</td>";
              echo "<td>" . $row["account_no"] . "</td>";
              echo "<td>" . $row["device"] . "</td>";
              // Added edit and delete buttons
              echo "<td>";
              echo "<a href='edit_vehicle.php?reg_no=" . $row["reg_no"] . "' class='las la-edit'></a>";
              echo "<a href='delete_vehicle.php?reg_no=" . $row["reg_no"] . "' onclick='return confirmDelete()' class='las la-trash'></a>";
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
  </main>
</body>
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
    function toggleFilter() {
        var filterOptions = document.getElementById("filterOptions");
        if (filterOptions.style.display === "block") {
            filterOptions.style.display = "none";
        } else {
            filterOptions.style.display = "block";
        }
    }

    function applyFilter() {
        var regNoFilter = document.getElementById("regNoFilter").value.toUpperCase();
        var vehNoFilter = document.getElementById("vehNoFilter").value.toUpperCase();

        var rows = document.getElementsByClassName("vehicle-row");

        for (var i = 0; i < rows.length; i++) {
            var regNo = rows[i].getElementsByTagName("td")[0].innerText.toUpperCase();
            var vehNo = rows[i].getElementsByTagName("td")[1].innerText.toUpperCase();

            if (regNo.indexOf(regNoFilter) > -1 && vehNo.indexOf(vehNoFilter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete this vehicle?");
    }

    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
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
