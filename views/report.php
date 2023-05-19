<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <input type='checkbox' id='nav-toggle'>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1>
                <span class="lab la-accusoft"></span> 
                <span>   </span>
                <!-- <span>Accusoft</span> -->
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
                    <a href="trips.php"><span class="las la-road"></span>
                        <span>Trips</span></a>
                </li>  
                <li>
                    <a href="report.php"class="active"><span class="las la-clipboard-list"></span>
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
        <img src="../img/userprofile.png" width="40px" height="40px" alt=""alt="User Profile">
        <div>
                    <h4>Jone Doe</h4>
                    <small>Super admin</small>
                </div>
        <div class="dropdown">
          <ul>
          <li><a href="settings.html">Settings</a></li>
          <li><a href="./auth/index.php">Logout</a></li>
            
          </ul>
      </div>
      </div>
  
</head>
<body>
  
</body>
</html>