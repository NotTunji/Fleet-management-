<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve a random registration number from the vehicles table
$randomRegNoSql = "SELECT reg_no FROM vehicles ORDER BY RAND() LIMIT 1";
$randomRegNoResult = $conn->query($randomRegNoSql);

if ($randomRegNoResult->num_rows > 0) {
  $randomRegNo = $randomRegNoResult->fetch_assoc()['reg_no'];
  echo $randomRegNo;
} else {
  echo "";
}

$conn->close();
?>
