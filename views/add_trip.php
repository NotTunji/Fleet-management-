<?php
$conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve vehicle numbers from the vehicles table
$sql = "SELECT reg_no FROM vehicles";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Trip</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0648605bd7.js" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&libraries=places"></script>
  <!-- <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style> -->
</head>
<body>
 
  <form class= "container d-flex align-items-center justify-content-center" style="height: 100vh;" action="add_trip_logic.php" method="post">
  <div class="card col-10">
      <div class="card-header">
        <strong class="fs-4">Add Trip </strong>
      </div>
      <div class="col-4">
            <label class="form-label fw-semibold" for="reg_no">Vehicle Number</label>
            <select class="form-select" name="reg_no" id="reg_no">
              <option value="">--- Select Vehicle Number ---</option>
              <?php
              // Loop through the result set and populate the dropdown menu with vehicle numbers
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['reg_no'] . '">' . $row['reg_no'] . '</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="col">
            <label class="form-label fw-semibold" for="start_add">Start Address</label>
            <input type="text" id="startAddress"name="start_add" class="form-control fw-semibold" placeholder="Enter start address" required />
          </div>
          <div class="col">
            <label class="form-label fw-semibold" for="end_add">End Address</label>
            <input type="text"id="endAddress" name="end_add" class="form-control fw-semibold" placeholder="Enter end address" required/>
          </div>
          <div class="col">
            <label class="form-label fw-semibold" for="date">Date</label>
            <input type="date" name="date" class="form-control fw-semibold" placeholder="Enter date" required/>
          </div>
        </div>
        <div class="card-footer text-end">
          <a class="btn btn-secondary col-1" href="trips.php">X</a>
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  <!-- <div id="map"></div> -->
  <script>
    // Initialize and configure the Places Autocomplete objects
    var startAddressInput = document.getElementById('startAddress');
    var endAddressInput = document.getElementById('endAddress');
    var autocompleteOptions = {
      types: ['address'],
      componentRestrictions: { country: 'NG' } // Replace with your desired country code
    };
    var startAutocomplete = new google.maps.places.Autocomplete(startAddressInput, autocompleteOptions);
    var endAutocomplete = new google.maps.places.Autocomplete(endAddressInput, autocompleteOptions);

    // Create a map and center it on a specific location
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 0, lng: 0 },
      zoom: 15
    });

    // Create markers for the start and end addresses
    var startMarker = new google.maps.Marker({ map: map });
    var endMarker = new google.maps.Marker({ map: map });

    // Update the map and markers when the user selects a location
    startAutocomplete.addListener('place_changed', function() {
      var place = startAutocomplete.getPlace();
      if (!place.geometry) {
        window.alert('No location found for the start address.');
        return;
      }
      startMarker.setPosition(place.geometry.location);
      map.setCenter(place.geometry.location);
    });

    endAutocomplete.addListener('place_changed', function() {
      var place = endAutocomplete.getPlace();
      if (!place.geometry) {
        window.alert('No location found for the end address.');
        return;
      }
      endMarker.setPosition(place.geometry.location);
      map.setCenter(place.geometry.location);
    });
  </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <style>
  body {
      background-image:url('../img/cover.png')
    }
  </style>
</body>
</html>
