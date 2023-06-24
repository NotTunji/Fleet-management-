<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet" href="../css/Devices.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
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
    .a{
      color: black;
    }
  </style>
</head>
<body>
<input type='checkbox' id='nav-toggle'>
<div class="sidebar">
  <div class="sidebar-brand">
    <h1>
      <span class="lab la-accusoft"></span> 
      <span>   </span>
    </h1>
  </div>

  <div class="sidebar-menu">
    <ul>
      <li>
        <a href="dashboard.php" ><span class="las la-igloo"></span>
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
        <a href="trips.php" class="active"><span class="las la-road"></span>
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
          <span>Maintenance</span></a>
      </li>  
    </ul>
  </div>
</div>

</div>
<div class="main-content">
  <header>
    <h2>
      <label for="nav-toggle">
        <span class="las la-bars"></span>
      </label>
      Trips
    </h2>
    <div class="dropdown">
      <img src="../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image" onclick="toggleDropdown()">
      <div id="dropdownContent" class="dropdown-content">
        <a href="#">Setting</a>
        <a href="#">Logout</a>
      </div>
    </div>
    <div>
      <h4>Tunji</h4>
      <small>Super admin</small>
    </div>
  </header>
  <div class="button-vehicle">
        <a href="add_trip.php" class="button">New trip</a>
      </div>
     
      <button onclick="exportTableToExcel('tablee', 'tableData')">EXPORT</button>
      <div class="filter-container">
        <button class="las la-filter" onclick="toggleFilter()"></button>
      </div>
      <div id="filterOptions" style="display: none;">
  <label for="regNoFilter">Vehicle Number:</label>
  <input type="text" id="regNoFilter" oninput="applyFilter()">

  <label for="dateFilter">Date:</label>
  <input type="date" id="dateFilter" oninput="applyFilter()">

 
</div>
  <div>
    <table>
      <thead>
        <tr>
          <th>Vehicle Number</th>
          <th>Start Address</th>
          <th>End Address</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Connect to the database (replace with your own credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from the trips table
        $sql = "SELECT reg_no, start_add, end_add,date FROM trips";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr class='vehicle-row'>";
            echo "<td><a href='directions.php?reg_no=".$row["reg_no"]."&start=" . urlencode($row["start_add"]) . "&end=" . urlencode($row["end_add"]) . "'>" . $row["reg_no"] . "</a></td>";

            echo "<td>" . $row["start_add"] . "</td>";
            echo "<td>" . $row["end_add"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No trips found</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>
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
  var dateFilter = document.getElementById("dateFilter").value.toUpperCase();
 

  var rows = document.getElementsByClassName("vehicle-row");

  for (var i = 0; i < rows.length; i++) {
    var regNo = rows[i].getElementsByTagName("td")[0].innerText.toUpperCase();
    var date = rows[i].getElementsByTagName("td")[3].innerText.toUpperCase();
   

    if (regNo.indexOf(regNoFilter) > -1 && date.indexOf(dateFilter) > -1 && accountNo.indexOf(accountNoFilter) > -1) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}
  function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
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
</body>
</html>
