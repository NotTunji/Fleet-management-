<?php
$conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $reg_no = $_POST["reg_no"];
  $start_add = $_POST["start_add"];
  $end_add = $_POST["end_add"];
  $date = $_POST["date"];

  // Prepare and execute the SQL query to insert data into the trips table
  $sql = "INSERT INTO trips (reg_no, start_add, end_add, date) VALUES ('$reg_no', '$start_add', '$end_add', '$date')";
  if ($conn->query($sql) === TRUE) {
    // Data inserted successfully, redirect to trips.php
    header("Location: trips.php");
    exit(); // Make sure to exit after redirecting
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
