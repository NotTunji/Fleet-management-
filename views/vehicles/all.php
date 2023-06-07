<!DOCTYPE html>
<html>
<head>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    } 

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }

    #map {
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <script>
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 6.5244, lng: 3.3792 }, // Lagos coordinates
      });

      <?php
        session_start();
        include '../auth/connect.php';

        $sql = "SELECT reg_no, veh_no FROM vehicles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $reg_no = $row['reg_no'];
            $veh_no = $row['veh_no'];

            // Generate random latitude and longitude within Lagos boundaries
            $latMin = 6.3932;
            $latMax = 6.7028;
            $lngMin = 3.0894;
            $lngMax = 4.3517;

            $lat = mt_rand() / mt_getrandmax() * ($latMax - $latMin) + $latMin;
            $lng = mt_rand() / mt_getrandmax() * ($lngMax - $lngMin) + $lngMin;
      ?>

      const marker<?php echo $reg_no; ?> = new google.maps.Marker({
        position: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
        map: map,
        label: "<?php echo $veh_no; ?>",
      });

      <?php
          }
        }

        $conn->close();
      ?>
    }

    window.initMap = initMap;
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>
