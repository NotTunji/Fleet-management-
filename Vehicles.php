<?php
    session_start();

    include 'connect.php';


?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="UTF-8">
	<title>Website Homepage</title>
    <link rel="stylesheet" href="./css/Vehicles.css">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="/JS/vehicles.js"></script>
    </head>
    
<body class="body__container">
  <div class="sidebar__content">
    <div>
      <div class="logo">
        <h1>CTrack</h1>
      </div>
    </div>

    <ul class="sidebar"> 
      <li class="sidebar__item"><a href="Analytics.html">Analytics</a></li>
      <li class="sidebar__item"><a class="active" href="Vehicles.html">Vehicles</a></li>
      <li class="sidebar__item"><a href="Devices.html">Devices</a></li>
      <li class="sidebar__item"><a href="Trips.html">Trips</a></li>
      <li class="sidebar__item"><a href="Report.html">Report</a></li>
      <li class="sidebar__item"><a href="usermanagement.html">User management</a></li>
    </ul>
  </div>
  <div class="main__content">
    <header>
      <div class="header-left">
        <h1>Welcome</h1>
      </div>
      <div class="header-right">
        <img src="userprofile.png" alt="User Profile">
        <div class="dropdown">
          <ul>
            <li><a href="Settings.html">Settings</a></li>
            <li><a href="index.php">Logout</a></li>
            
          </ul>
      </div>
      </div>
    </header>
    
  <div class="table">
        <table>
      <tr>
        <th>Regstration Number</th>
        <th>Vehicle Number</th>
        <th>Device Subscription</th>
        <th>Account</th>
        <th>Device</th>
        <th>Vehicle Number</th>
      </tr>
      <tr>
        <td>Row 1, Column 1</td>
        <td>Row 1, Column 2</td>
        <td>Row 1, Column 3</td>
        <td>Row 1, Column 4</td>
        <td>Row 1, Column 5</td>
        <td>Row 1, Column 6</td>
      </tr>
      <!-- <tr>
        <td>Row 2, Column 1</td>
        <td>Row 2, Column 2</td>
        <td>Row 2, Column 3</td>
        <td>Row 2, Column 4</td>
        <td>Row 2, Column 5</td>
        <td>Row 2, Column 6</td>
      </tr>
      <tr>
        <td>Row 3, Column 1</td>
        <td>Row 3, Column 2</td>
        <td>Row 3, Column 3</td>
        <td>Row 3, Column 4</td>
        <td>Row 3, Column 5</td>
        <td>Row 3, Column 6</td>
      </tr>
      <tr>
        <td>Row 4, Column 1</td>
        <td>Row 4, Column 2</td>
        <td>Row 4, Column 3</td>
        <td>Row 4, Column 4</td>
        <td>Row 4, Column 5</td>
        <td>Row 4, Column 6</td>
      </tr> -->
    </table> 
  </div>
</div>
  <!-- Page content -->
   <!-- <div class="button-vehicle">
      <a href="#" class="button">New Vehicle</a>     </div>
    </div> -->

</body>

</html>
  