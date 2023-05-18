<?php
          //  session_start();

          //  include 'connect.php';
    
          //  $user = [];
       
           
          //  $stmt = $conn->prepare('SELECT * FROM vehicles');
       
          // //  $stmt->bind_param("ss",$username,$password);
          //  $stmt->execute();
          //  $result = $stmt->get_result();
       
          //  if($result->num_rows > 0)
          //  {
          //     while($row = mysqli_fetch_assoc($result)) {
          //       array_push($user,$row);
          //       // $user = $result->fetch_assoc();
                
          //     }
          //      // echo "welcome ".$user["username"];
          //     //  echo $user["reg_no"] ;
          //     //  header("Location:Analytics.php");
          //  }
       
          //  else
          //  {
          //      $user = [];
       
          //  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Website Homepage</title>
  <link rel="stylesheet" href="../../css/syle.css">
  <link rel="stylesheet" href="../../css/Vehicle.css">
  <script defer src="../../JS/vehicles.js"></script>
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
                <a href="../dashboard.php" ><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
            </li>
            <li>
                <a href="./vehicles/vehicles.php"class="active"><span class="las la-users"></span>
                    <span>Vehicles</span></a>
            </li>
             <li>
                <a href="../devices/devices.php"><span class="las la-clipboard-list"></span>
                    <span>Devices</span></a>
              </li>
              <li>
                    <a href="../trips.php"><span class="las la-clipboard-list"></span>
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
                    <a href="../maintainance/maintainance.php"><span class="las la-clipboard-list"></span>
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
        <img src="../../img/userprofile.png" width="40px" height="40px" alt=""alt="User Profile">
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
        <?php if(count($user))
    {
      // echo count($user);
      for($veh_count = 0;$veh_count << count($user);$veh_count++ ){
echo "<tr>
<td>".$user[$veh_count]["reg_no"]."</td>
<td>".$user[$veh_count]["veh_no"]."</td>
<td>".$user[$veh_count]["device_sub"]."</td>
<td>".$user[$veh_count]["account_no"]."</td>
<td>".$user[$veh_count]["device"]."</td>

</tr> "; 
            }
          }

        ?>

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



  <!-- </div> -->



</body>

</html>