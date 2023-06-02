<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .box {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 20px;
    }

    #map {
      width: 100%;
      height: 300px;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Vehicle Number</th>
      <th>Registration Number</th>
      <th>Account Number</th>
    </tr>

    <?php
      session_start();
      include 'views/auth/connect.php';

      $sql = "SELECT reg_no, veh_no, account_no FROM vehicles";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td><a href='vehicles.php?veh_no=" . $row['veh_no'] . "'>" . $row['veh_no'] . "</a></td>";
          echo "<td><a href='vehicles.php?veh_no=" . $row['veh_no'] . "'>" . $row['reg_no'] . "</a></td>";
          echo "<td><a href='vehicles.php?veh_no=" . $row['veh_no'] . "'>" . $row['account_no'] . "</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
      }

      $conn->close();
    ?>
  </table>

  <?php
    if (isset($_GET['veh_no'])) {
      $selectedVehicle = $_GET['veh_no'];

      echo "<div class='box'>";
      echo "<h4>Vehicle Details:</h4>";

      // Retrieve vehicle details from the database based on the selected vehicle number
      $sql = "SELECT reg_no, veh_no, account_no, latitude, longitude FROM vehicles WHERE veh_no = '$selectedVehicle'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "<h4>Registration Number:</h4>";
        echo "<span>" . $row['reg_no'] . "</span>";
        echo "<h4>Vehicle Number:</h4>";
        echo "<span>" . $row['veh_no'] . "</span>";
        echo "<h4>Account Number:</h4>";
        echo "<span>" . $row['account_no'] . "</span>";

        // Display the map for the selected vehicle
        echo "<div id='map'></div>";

        // JavaScript code for initializing the map
        echo "<script>";
        echo "function initMap() {";
        echo "var location = {lat: " . $row['latitude'] . ", lng: " . $row['longitude'] . "};";
        echo "var map = new google.maps.Map(document.getElementById('map'), {";
        echo "center: location,";
        echo "zoom: 12";
        echo "});";
        echo "var marker = new google.maps.Marker({";
        echo "position: location,";
        echo "map: map";
        echo "});";
        echo "}";
        echo "</script>";
      } else {
        echo "<span>No data found for the selected vehicle.</span>";
      }

      echo "</div>";
    }
  ?>

  <!-- Include the JavaScript code for the map here -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
