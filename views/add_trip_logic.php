<?php
$conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
 
  $veh_no = $_POST["veh_no"];
  $start_add = $_POST["start_add"];
  $end_add = $_POST["end_add"];

  // Prepare and execute the SQL query to insert data into the vehicles table
  $sql = "INSERT INTO trips ( veh_no, start_add, end_add) VALUES ('$veh_no', '$start_add', '$end_add')";
  if ($conn->query($sql) === TRUE) {
    echo "Vehicle added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
