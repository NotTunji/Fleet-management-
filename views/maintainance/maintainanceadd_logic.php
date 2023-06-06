<?php
session_start();
include '../auth/connect.php';

$reg_no = $_POST['reg_num'] ?? "";
$veh_no = $_POST['veh_num'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$remarks = $_POST['remarks'];


$sql = "INSERT INTO mantainance (reg_no,veh_no,start_date,end_date,remarks)
    VALUES ('$reg_no','$veh_no','$start_date','$end_date','$remarks')";

if ($reg_no != "") {
  if (mysqli_query($conn, $sql)) {
    echo "Vehicle maintenance record added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>
