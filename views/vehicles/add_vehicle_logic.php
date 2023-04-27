<?php 
    session_start();
    include 'connect.php';

    $reg_no = $_POST['reg_no']?$_POST['reg_no']:"";
    $veh_no = $_POST['veh_no'];
    $device_sub = $_POST['device_sub'];
    $account_no = $_POST['account_no'];
    $device = $_POST['device'];

    // $reg_no = "1900714";
    // $veh_no = "12904339538";
    // $device_sub = "393920294";
    // $account_no = "39239050";
    // $device = "Audi";

    $sql ="INSERT INTO vehicles (reg_no,veh_no,device_sub,account_no,device)
    VALUES ('$reg_no','$veh_no','$device_sub','$account_no','$device')";

    if($reg_no != "")
    {
      if (mysqli_query($conn, $sql)) {
        echo "Vehicle details saved successfully";
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