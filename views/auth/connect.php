<?php 
    $dbServername = "localhost";
    $dbUsername = "root";
    // $dbName = "cartrack";
    $dbPassword = "";
    $dbName = "project";

    // $conn = mysqli_connect($dbServername, $dbUsername, $dbName);


    

    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // echo "Connected successfully";