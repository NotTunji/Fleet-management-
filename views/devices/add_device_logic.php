<?php
session_start();
include '../auth/connect.php';

$serial_num = $_POST['serial_num'] ? $_POST['serial_num'] : "";
$vehicle = $_POST['vehicle'];
$account = $_POST['account'];
$type = $_POST['type'];
$status = $_POST['status'];
$config_status = $_POST['config_status'];
$phone_num = $_POST['phone_num'];
$installed_at = $_POST['installed_at'];



if ($serial_num != "") {
  // Check if the serial number already exists in the database
  $stmt = $conn->prepare("SELECT COUNT(*) FROM devices WHERE serial_num = ?");
  $stmt->bind_param('s', $serial_num);
  $stmt->execute();
  $stmt->bind_result($count);
  $stmt->fetch();
  $stmt->close();

  if ($count > 0) {
    // Serial number already exists, display a popup message
    echo '<script>alert("Serial number already exists. Please choose a different serial number."); window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    exit;
  } else {
    // Serial number does not exist, insert the data into the database
    $stmt = $conn->prepare("INSERT INTO devices (serial_num, vehicle, account, type, status, config_status, phone_num, installed_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssss', $serial_num, $vehicle, $account, $type, $status, $config_status, $phone_num, $installed_at);
    
    if ($stmt->execute()) {
      echo 'Device configured successfully';
    } else {
      echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
  }

  mysqli_close($conn);
  header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>