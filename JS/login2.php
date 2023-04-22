<?php 
    $dbServername = "localhost";
    $dbUsername = "root";
    // $dbName = "cartrack";
    $dbPassword = "";

    // $conn = mysqli_connect($dbServername, $dbUsername, $dbName);

    $conn = new mysqli_connect($dbServername, $dbUsername, $dbPassword)

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";
?>