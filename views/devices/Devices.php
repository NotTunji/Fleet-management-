<?php
session_start();

include '../auth/connect.php';

// SQL query to retrieve data
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Website Homepage</title>
    <link rel="stylesheet" href="../../css/devices.css">
    <link rel="stylesheet" href="../../css/syle.css">

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
                    <a href="../vehicles/vehicles.php"><span class="las la-users"></span>
                        <span>Vehicles</span></a>
                </li>
                <li>
                    <a href="devices.php" class="active"><span class="las la-clipboard-list"></span>
                        <span>Devices</span></a>
                </li>
                <li>
                    <a href="../trips.php"><span class="las la-clipboard-list"></span>
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
                    <a href="../maintainance/maintainance.php"><span class="las la-clipboard-list"></span>
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
                            <li><a href="/auth/index.php">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </header>

            <div class="button-vehicle">
                <a href="add_device.php" class="button">New Device</a>
            </div>
            <div class="table">
                <table>
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
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>" . $row["config_status"] . "</td>";
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

</html>