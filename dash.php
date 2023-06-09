<!DOCTYPE html>
<html>
<head>
    <title>Device Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="deviceChart"></canvas>

    <script>
        // PHP code to retrieve counts from the database
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

        // Retrieve counts of active and inactive devices
        $sql = "SELECT SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS activeDevices,
                SUM(CASE WHEN status = 'Inactive' THEN 1 ELSE 0 END) AS inactiveDevices
                FROM devices";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $activeDevices = $row['activeDevices'];
            $inactiveDevices = $row['inactiveDevices'];
        } else {
            $activeDevices = 0;
            $inactiveDevices = 0;
        }

        $conn->close();
        ?>

        // Chart.js code
        var ctx = document.getElementById('deviceChart').getContext('2d');
        var deviceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    data: [<?php echo $activeDevices; ?>, <?php echo $inactiveDevices; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Active devices color
                        'rgba(255, 99, 132, 0.7)', // Inactive devices color
                    ],
                }],
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Device Statistics',
                },
            },
        });
    </script>
</body>
</html>
