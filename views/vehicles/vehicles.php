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
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/Vehicle.css">
  <script defer src="../../JS/vehicles.js"></script>
</head>

<body class="body__container">

  <div class="sidebar__content">
    <div>
      <div class="logo">
        <h1>CTrack</h1>
      </div>
    </div>

    <ul class="sidebar">
      <li class="sidebar__item"><a href="../analytics.php">Analytics</a></li>
      <li class="sidebar__item"><a class="active" href="Vehicles.php">Vehicles</a></li>
      <li class="sidebar__item"><a href="../devices/devices.php">Devices</a></li>
      <li class="sidebar__item"><a href="../trips.php">Trips</a></li>
      <li class="sidebar__item"><a href="../report.php">Report</a></li>
      <li class="sidebar__item"><a href="../usermanagement.php">User management</a></li>
    </ul>
  </div>

  <div class="main__content vehicles_main">
    <header>
      <div class="header-left">
        <h1>Welcome</h1>
      </div>
      <div class="header-right">
      <img src="../../img/userprofile.png" alt="User Profile">
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