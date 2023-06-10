<?php
session_start();
// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header("Location: login.php");
    exit;
  }
  // Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the delete operation and delete the vehicle record from the database
  
    // After performing the delete, redirect back to vehicles.php
    header("Location: Devices.php");
    exit;
  }
include '../auth/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['serial_num'])) {
  $regNo = $_GET['serial_num'];

  // Delete the vehicle from the database based on the registration number
  $sql = "DELETE FROM devices WHERE serial_num = '$regNo'";
  if ($conn->query($sql) === TRUE) {
    // Vehicle deleted successfully, redirect or show a success message
    echo "Vehicle deleted successfully";
  } else {
    // Error deleting vehicle, redirect or show an error message
    echo "Error deleting vehicle: " . $conn->error;
  }
}
if (isset($_GET['serial_num'])) {
    // Perform the delete operation

    // Redirect back to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$conn->close();
?>
