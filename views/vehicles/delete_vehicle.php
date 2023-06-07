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
    header("Location: vehicles.php");
    exit;
  }
include '../auth/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_no'])) {
  $regNo = $_GET['reg_no'];

  // Delete the vehicle from the database based on the registration number
  $sql = "DELETE FROM vehicles WHERE reg_no = '$regNo'";
  if ($conn->query($sql) === TRUE) {
    // Vehicle deleted successfully, redirect or show a success message
    echo "Vehicle deleted successfully";
  } else {
    // Error deleting vehicle, redirect or show an error message
    echo "Error deleting vehicle: " . $conn->error;
  }
}

$conn->close();
?>
