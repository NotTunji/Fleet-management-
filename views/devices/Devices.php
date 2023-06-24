<?php
session_start();

include '../auth/connect.php';

// SQL query to retrieve data
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

// SQL query to retrieve data with connection status

function getStatusLabel($status)
{
    return $status == "active" ? "Active" : "Inactive";
}

function getConfigStatusLabel($configStatus)
{
    return $configStatus == "configured" ? "Configured" : "Not Configured";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Website Homepage</title>
    <link rel="stylesheet" href="../../css/devices.css">
    <link rel="stylesheet" href="../../css/syle.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <style>
    /* Include the Fira Code font */
    @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');

    /* Use the Fira Code font for code elements */
    code {
      font-family: 'Fira Code', monospace;
    }
  </style>
        <style>
            table{
                overflow-y: scroll;
            }
        .Active {
            background-color:#04AA6D;
            color: white;
            border-radius: 2px;
            border: #04AA6D;
        }

        .Inactive {
            background-color: #ff3333;
            color: white;
            border-radius: 2px;
        }

        .Configured {
            background-color: #04AA6D;
            color: white;
            border-radius: 2px;
            border: #04AA6D;
        }

        .NotConfigured {
            background-color: #ff3333;
            color: white;
            border-radius: 2px;
        }
        th, td {
      /* border: 1px solid black; */
      padding: 8px;
      font-size: 15px;
      text-align: center;
    }
    .dropdown {
            position: relative;
            display: inline-block;
            padding: 0px 45px;
            left: 510px;

        }

        .dropdown.right {
            right: 4;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            padding: 2px;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
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
                    <a href="../dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="../vehicles/vehicles.php"><span class="las la-truck"></span>
                        <span>Vehicles</span></a>
                </li>
                <li>
                    <a href="devices.php" class="active"><span class="las la-toolbox"></span>
                        <span>Devices</span></a>
                </li>
                <li>
                    <a href="../trips.php"><span class="las la-road"></span>
                        <span>Trips</span></a>
                </li>
                <li>
                    <a href="../report.php"><span class="las la-clipboard-list"></span>
                        <span>Report</span></a>
                </li>
                <li>
                    <a href="../vehicle_usage.php"><span class="las la-clipboard-list"></span>
                        <span>Vehicle Usage </span></a>
                </li>
                <li>
                    <a href="../maintainance/maintainance.php"><span class="las la-user-edit"></span>
                        <span>Maintainance</span></a>
                </li>
            </ul>
        </div>
    </div>



    </div>
  
        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Devices
                </h2>
                <div class="dropdown">
                <img src="../../img/userprofile.png" width="40px" height="40px" alt="Dropdown Image"
                    onclick="toggleDropdown()">
                <div id="dropdownContent" class="dropdown-content">
                    <a href="#">setting</a>
                    <a href="../auth/logout.php">Logout</a>
                </div>



            </div>
            <div>
                <h4>Tunji</h4>
                <small>Super admin</small>
            </div>

            </header>

            <div class="button-vehicle">
                <a href="add_device.php" class="button">New Device</a>
            </div>
          
        <button onclick="exportTableToExcel('tablee', 'tableData')"  class="button-vehiclee" >EXPORT</button>
      
            <div class="table">
                <table id="tablee">
                    <tr>
                        <th>Serial Number</th>
                        <!-- <th>Vehicle </th> -->
                        <th>Account</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Config Status</th>
                        <th>Phone Number</th>
                        <th>Installed At</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $status = $row["status"];
                            $configStatus = $row["config_status"];
                            $statusLabel = getStatusLabel($status);
                            $configStatusLabel = getConfigStatusLabel($configStatus);
                            echo "<tr>";
                            echo "<td>" . $row["serial_num"] . "</td>";
                            // echo "<td>" . $row["vehicle"] . "</td>";
                            echo "<td>" . $row["account"] . "</td>";
                            echo "<td>" . $row["type"] . "</td>";
                            echo "<td><span class='" . ($row["status"] == "Active" ? "Active" : "Inactive") . "'>" . $row["status"] . "</span></td>";
                            echo "<td><span class='" . ($row["config_status"] == "Configured" ? "Configured" : "NotConfigured") . "'>" . $row["config_status"] . "</span></td>";
                            echo "<td>" . $row["phone_num"] . "</td>";
                            echo "<td>" . $row["installed_at"] . "</td>";
                            echo "<td>";
                            echo "<a href='delete_device.php?serial_num=". $row["serial_num"] . "' onclick='return confirmDelete()' class='las la-trash'></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>

      



        </div>

   


</body>
<script>
            function toggleDropdown() {
                var dropdownContent = document.getElementById("dropdownContent");
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            }
        </script>
<script>
        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify the filename
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
        function confirmDelete() {
        return confirm('Are you sure you want to delete this device?');
    }
    </script>


</html>