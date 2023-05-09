<?php
          //  session_start();

          //  include 'connect.php';
    
          //  $user = [];
       
           
          //  $stmt = $conn->prepare('SELECT * FROM devices');
       
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
    <link rel="stylesheet" href="../../css/devices.css">
    <link rel="stylesheet" href="../../css/style.css">
   
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
          <li class="sidebar__item"><a href="../vehicles/vehicles.php">Vehicles</a></li>
          <li class="sidebar__item"><a class="active" href="devices.php">Devices</a></li>
          <li class="sidebar__item"><a href="../trips.php">Trips</a></li>
          <li class="sidebar__item"><a href="../report.php">Report</a></li>
          <li class="sidebar__item"><a href="../vehicle_usage.php">Vehicle Usage</a></li>
          <li class="sidebar__item"><a href="../maintainance/maintainance.php">Mantainance</a></li>
        </ul>
      </div>

      <div class="main__content">
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
          <a href="add_device.php"class="button">New Device</a>
          </div>
      <div class="table">
        <table>
          <tr>
            <th>Serial Number</th>
            <th>Vehicle </th>
            <th>Account</th>
            <th>Type</th>
            <th>Status</th>
            <th>Config Status</th>
            <th>Phone Number</th>
            <th>Installed At</th>
          </tr>

          <tr>
             <td>Row 4, Column 1</td>
             <td>Row 4, Column 2</td>
             <td>Row 4, Column 3</td>
             <td>Row 4, Column 4</td>
             <td>Row 4, Column 5</td>
             <td>Row 4, Column 6</td>
             <td>Row 4, Column 7</td>
             <td>Row 4, Column 8</td>
           </tr>
        </table>
      </div>
      </div>

          <?php 
          // if(count($user))
  //         {
  //           for($dev_count=0;$dev_count << count($user);$dev_count++){
  //   echo  "<tr>
  //   <td>".$user[$dev_count]["serial_num"]."</td>
  //   <td>".$user[$dev_count]["vehicle"]."</td>
  //   <td>".$user[$dev_count]["account"]."</td>
  //   <td>".$user[$dev_count]["type"]."</td>
  //   <td>".$user[$dev_count]["status"]."</td>
  //   <td>".$user[$dev_count]["config_status"]."</td>
  //   <td>".$user[$dev_count]["phone_num"]."</td>
  //   <td>".$user[$dev_count]["installed_at"]."</td>
  // </tr>";
  //           }
  //         }
         ?>
        
           

      </div>
      
      

    
    </body>    
</html>
  
              
      