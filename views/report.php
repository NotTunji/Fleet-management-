<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
    .table-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      border-collapse: collapse;
      width: 60%;
      margin-top: 10px;
      height: 100vh;
      padding-top: 50px;
    }

    /* CSS styles for the Export button */
    .export-button {
      display: inline-block;
      padding: 12px 24px;
      background-color: #04AA6D;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      position: relative;
      border-top-right-radius: 0%;
    }

    table {
      border-collapse: collapse;
      margin: 70px auto;
      width: 90%;
      margin-top: 50px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      font-size: 15px;
    }

    th {
      background-color: #04AA6D;
      color: white;
    }

    .overused {
      color: red;
      font-weight: bold;
    }

    .underused {
      color: green;
      font-weight: bold;
    }

    /* .sidebar {
    /* Add a specific width to the sidebar to prevent it from overlapping the table */
    /* width: 200px; */
    /* Add more styles as per your requirements */

    .main-content {
      /* Add padding to create space for the top bar */
      padding-top: 60px;
      /* Add more styles as per your requirements */
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
          <a href="dashboard.php"><span class="las la-igloo"></span>
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
          <a href="report.php" class="active"><span class="las la-clipboard-list"></span>
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

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label>
        Report
      </h2>
      <div class="dropdown">
        <img src="../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image" onclick="toggleDropdown()">
        <div id="dropdownContent" class="dropdown-content">
          <a href="#">setting</a>
          <a href="auth/logout.php">Logout</a>
        </div>
      </div>
      <div>
        <h4>Tunji</h4>
        <small>Super admin</small>
      </div>
    </header>

    <?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from vehicle_usage table
$sql = "SELECT reg_no, numdays, driver FROM vehicle_usage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Start building the HTML table
  echo '<table>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Vehicle ID</th>';
  echo '<th>Number of Days</th>';
  echo '<th>Driver</th>';
  echo '<th>Status</th>'; // New column for status notification
  echo '<th>Countdown</th>'; // New column for countdown
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  // Loop through each row of the result set
  while ($row = $result->fetch_assoc()) {
    $vehicleID = $row['reg_no'];
    $numDays = $row['numdays'];
    $driver = $row['driver'];

    // Add a CSS class to highlight overused and underused vehicles
    $cssClass = '';
    $status = '';
    $countdown = '';
    if ($numDays > 10) {
      $cssClass = 'overused';
      $status = 'Do Not Use';
      $countdown = '01:00:00';
    } else {
      $cssClass = 'underused';
      $status = 'OK';
    }

    // Generate table rows with the retrieved data
    echo '<tr class="' . $cssClass . '">';
    echo '<td>' . $vehicleID . '</td>';
    echo '<td>' . $numDays . '</td>';
    echo '<td>' . $driver . '</td>';
    echo '<td>' . $status . '</td>';
    if ($cssClass == 'overused') {
      echo '<td><span class="countdown" data-time="' . $countdown . '">' . $countdown . '</span></td>';
    } else {
      echo '<td></td>'; // Empty cell for countdown
    }
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
} else {
  echo '<p>No data found</p>';
}

// Close the database connection
$conn->close();
?>
 <button onclick="exportTableToExcel()" class="export-button">Export to Excel</button>
<script>
     function exportTableToExcel() {
        var table = document.getElementsByTagName("table")[0];
        var html = table.outerHTML;

        // Convert the HTML table to a blob
        var blob = new Blob([html], {
          type: "application/vnd.ms-excel"
        });

        // Create a download link and trigger the click event
        var downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = "report.xls";
        downloadLink.click();
      }
    </script>
    <script>
  // Countdown timer
  var countdownElements = document.getElementsByClassName("countdown");

  function countdown() {
    for (var i = 0; i < countdownElements.length; i++) {
      var countdownElement = countdownElements[i];
      var time = countdownElement.getAttribute("data-time");
      var parts = time.split(":");
      var hours = parseInt(parts[0]);
      var minutes = parseInt(parts[1]);
      var seconds = parseInt(parts[2]);

      if (hours === 0 && minutes === 0 && seconds === 0) {
        countdownElement.innerHTML = "00:00:00";
        countdownElement.parentNode.parentNode.classList.remove("overused");
        countdownElement.parentNode.parentNode.childNodes[3].innerHTML = "OK";
        continue;
      }

      if (seconds === 0) {
        if (minutes === 0) {
          hours--;
          minutes = 59;
          seconds = 59;
        } else {
          minutes--;
          seconds = 59;
        }
      } else {
        seconds--;
      }

      hours = hours.toString().padStart(2, "0");
      minutes = minutes.toString().padStart(2, "0");
      seconds = seconds.toString().padStart(2, "0");

      countdownElement.innerHTML = hours + ":" + minutes + ":" + seconds;
      countdownElement.setAttribute("data-time", hours + ":" + minutes + ":" + seconds);
    }

    setTimeout(countdown, 1000);
  }

  countdown();
</script>


  </div>
</body>

</html>
