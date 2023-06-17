<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/syle.css">
  <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

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
        </style>
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
                    <a href="trips.php"class="active"><span class="las la-road"></span>
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
                <img src="../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image"
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
    

    <div>
      ....
    </div>
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
</html>