<?php
    $conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected registration number from the query parameter
    $selectedRegNum = $_GET['reg_num'];

    // SQL query to retrieve the vehicle number based on the selected registration number
    $sql = "SELECT veh_no FROM vehicles WHERE reg_no = '$selectedRegNum'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['veh_no'];
    } else {
        echo '';
    }
?>
