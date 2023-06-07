<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Report</title>
    <style>
        
    </style>
</head>
<body>
<?php
    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from vehicle_usage table
    $sql = "SELECT reg_no, numdays, driver FROM vehicle_usage";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Vehicle ID</th>';
        echo '<th>Number of Days</th>';
        echo '<th>Driver</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            $vehicleID = $row['reg_no'];
            $numDays = $row['numdays'];
            $driver = $row['driver'];

            // Add a CSS class to highlight overused and underused vehicles
            $cssClass = '';
            if ($numDays > 10) {
                $cssClass = 'overused';
            } elseif ($numDays <= 10) {
                $cssClass = 'underused';
            }

            // Generate table rows with the retrieved data
            echo '<tr class="' . $cssClass . '">';
            echo '<td>' . $vehicleID . '</td>';
            echo '<td>' . $numDays . '</td>';
            echo '<td>' . $driver . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No data found</p>';
    }

    // Close the database connection
    $conn->close();
?>

<!-- Export button -->
<button onclick="exportTableToExcel()">Export to Excel</button>

<script>
    function exportTableToExcel() {
        var table = document.getElementsByTagName("table")[0];
        var html = table.outerHTML;

        // Convert the HTML table to a blob
        var blob = new Blob([html], {
            type: "application/vnd.ms-excel"
        });

        // Create a download link and trigger the click event
        var downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = "report.xls";
        downloadLink.click();
    }
</script>
</body>
</html>
