<?php 
    session_start();
    include '../auth/connect.php';

    $serial_num = $_POST['serial_num']?$_POST['serial_num']:"";
    $vehicle = $_POST['vehicle'];
    $account = $_POST['account'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $config_status = $_POST['config_status'];
    $phone_num = $_POST['phone_num'];
    $installed_at = $_POST['installed_at'];

    
    $sql ="INSERT INTO devices (serial_num,vehicle,account,type,status,config_status,phone_num,installed_at)
    VALUES ('$serial_num','$vehicle','$account','$type','$status','$config_status','$phone_num','$installed_at')";

    if($serial_num != "")
    {
      if (mysqli_query($conn, $sql)) {
        echo "Device configured successfully";
      }  else {
          echo "Error: " . $sql . "<br>" . mysqli.error($conn);
      }

      mysqli_close($conn);
      header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

?>