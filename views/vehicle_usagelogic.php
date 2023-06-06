<?php 
    session_start();
    include 'auth/connect.php';

    $reg_no = $_POST['reg_no']?$_POST['reg_no']:"";
    $start_date = $_POST['start_date'];
    $end_date= $_POST['end_date'];
    $numdays = $_POST['numdays'];
    $total_distance = $_POST['total_distance'];
    $driver = $_POST['driver'];
    $purpose = $_POST['purpose'];
    $fuel_consumption = $_POST['fuel_consumption'];
    $notes = $_POST['notes'];
   
    
    $sql ="INSERT INTO vehicle_usage (reg_no,start_date,end_date,numdays,total_distance,driver,purpose,fuel_consumption,notes)
    VALUES ('$reg_no','$start_date','$end_date','$numdays','$total_distance','$driver','$purpose','$fuel_consumption','$notes')";

    if($reg_no != "")
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