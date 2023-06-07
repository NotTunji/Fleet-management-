<?php
session_start();

include '../auth/connect.php';

// SQL query to retrieve data
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);
function getStatusLabel($status)
{
    return $status == "active" ? "Active" : "Inactive";
}

function getConfigStatusLabel($configStatus)
{
    return $configStatus == "configured" ? "Configured" : "Not Configured";
}

?>
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
        .Active {
            background-color: green;
            color: white;
        }

        .Inactive {
            background-color: red;
            color: white;
        }

        .Configured {
            background-color: green;
            color: white;
        }

        .NotConfigured {
            background-color: red;
            color: white;
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
    <main>
        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Devices
                </h2>
                <div class="user-wrapper">
                    <img src="../../img/userprofile.png" width="40px" height="40px" alt="" alt="User Profile">
                    <div>
                        <h4>Jone Doe</h4>
                        <small>Super admin</small>
                    </div>
                    <div class="dropdown">
                        <ul>
                            <li><a href="settings.php">Settings</a></li>
                            <li><a href="../auth/login.php">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </header>

            <div class="button-vehicle">
                <a href="add_device.php" class="button">New Device</a>
            </div>
             <div class="button-vehiclee">
        <button onclick="exportTableToExcel('tablee', 'tableData')"  class="button-vehiclee" >EXPORT</button>
      </div>
            <div class="table">
                <table id="tablee">
                    <tr>
                        <th>Serial Number</th>
                        <th>Vehicle </th>
                        <th>Account</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Config Status</th>
                        <th>Phone Number</th>
                        <th>Installed At</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["serial_num"] . "</td>";
                            echo "<td>" . $row["vehicle"] . "</td>";
                            echo "<td>" . $row["account"] . "</td>";
                            echo "<td>" . $row["type"] . "</td>";
                            echo "<td><span class='" . ($row["status"] == "Active" ? "Active" : "Inactive") . "'>" . $row["status"] . "</span></td>";
                            echo "<td><span class='" . ($row["config_status"] == "Configured" ? "Configured" : "NotConfigured") . "'>" . $row["config_status"] . "</span></td>";
                            echo "<td>" . $row["phone_num"] . "</td>";
                            echo "<td>" . $row["installed_at"] . "</td>";
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

        <?php
        // if(count($user))
        //         {
        //           for($dev_count=0;$dev_count << count($user);$dev_count++){
        //   echo  "<tr>
        //   <td>".$user[$dev_count]["serial_num"]."</td>
        //   <td>".$user[$dev_count]["vehicle"]."</td>
        //   <td>".$user[$dev_count]["account"]."</td>
        //   <td>".$user[$dev_count]["type"]."</td>
        //   <td>".$user[$dev_count]["status"]."</td>
        //   <td>".$user[$dev_count]["config_status"]."</td>
        //   <td>".$user[$dev_count]["phone_num"]."</td>
        //   <td>".$user[$dev_count]["installed_at"]."</td>
        // </tr>";
        //           }
        //         }
        ?>



        </div>

    </main>


</body>
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
    </script>


</html>