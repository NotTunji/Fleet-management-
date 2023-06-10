<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/syle.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <style>

.table-container {
    display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        border-collapse: collapse;
    width: 60%;
    margin-top: 10px;
    height: 100vh; /* Adjust the height as needed */
        padding-top: 50px;
    }

    /* CSS styles for the Export button */
    .export-button {
      display: inline-block;
    padding: 12px 24px;
    background-color: #04AA6D;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    position:relative;
    border-top-right-radius:0%;
    } 
       table {
    border-collapse: collapse;
    margin: 70px auto; /* Add margin and set auto for horizontal centering */
    width: 90%; /* Reduce the width of the table */
    margin-top: 50px;
    
}

th, td {
    border: 1px solid black;
    padding: 8px;
    font-size: 15px; /* Adjust the font size of table cells */
}


/* Rest of your CSS code */


        th {
           background-color: #04AA6D;
           color: white;
;
        }

        .overused {
            color: red;
            font-weight: bold;
        }

        .underused {
            color: green;
            font-weight: bold;
        }
        table {
    border-collapse: collapse;
    margin: 50px auto; /* Add margin and set auto for horizontal centering */
}

/* .sidebar {
    /* Add a specific width to the sidebar to prevent it from overlapping the table */
    /* width: 200px; */
    /* Add more styles as per your requirements */


.main-content {
    /* Add padding to create space for the top bar */
    padding-top: 60px;
    /* Add more styles as per your requirements */
} */

    </style>
</head>

<body>
    <input type='checkbox' id='nav-toggle'>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1>
                <span class="lab la-accusoft"></span>
                <span> </span>
                <!-- <span>Accusoft</span> -->
            </h1>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="./vehicles/vehicles.php"><span class="las la-truck"></span>
                        <span>Vehicles</span></a>
                </li>
                <li>
                    <a href="./devices/devices.php"><span class="las la-toolbox"></span>
                        <span>Devices</span></a>
                </li>
                <li>
                    <a href="trips.php"><span class="las la-road"></span>
                        <span>Trips</span></a>
                </li>
                <li>
                    <a href="report.php" class="active"><span class="las la-clipboard-list"></span>
                        <span>Report</span></a>
                </li>
                <li>
                    <a href="vehicle_usage.php"><span class="las la-clipboard-list"></span>
                        <span>Vehicle Usage </span></a>
                </li>
                <li>
                    <a href="./maintainance/maintainance.php"><span class="las la-user-edit"></span>
                        <span>Maintainance</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
       
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Report
            </h2>
            <div class="user-wrapper">
                <img src="../img/userprofile.png" width="40px" height="40px" alt="" alt="User Profile">
                <div>
                    <h4>Jone Doe</h4>
                    <small>Super admin</small>
                </div>
                <div class="dropdown">
                    <ul>
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="./auth/index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
         
       
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
 <button onclick="exportTableToExcel()" class="export-button">Export to Excel</button>
       
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
    </div>
</body>

</html>
