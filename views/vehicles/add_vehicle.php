<?php
    
    $conn = new mysqli("localhost", "root", "", "project"); // Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials

    // Check if the connection was successful
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
   // SQL query to retrieve serial numbers from the devices table that are not assigned to any vehicle
   $sql = "SELECT serial_num FROM devices WHERE serial_num NOT IN (SELECT device FROM vehicles)";
   $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0648605bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/add_vehicle.css">
  </head>
  <body>
    <!-- form to add vehicle  -->
    <form class="container d-flex align-items-center justify-content-center" style="height: 100vh;"action="add_vehicle_logic.php" method="post">
      <div class="card col-10">
            <div class="card-header">
                <strong class="fs-4">Add Vehicle Form</strong>
            </div>
             <div class="card-body">
                <!-- error message -->
               
      <div class="row pb-3">
                    <div class="col-5">
                        <label for="reg_num" class="form-label fw-semibold">Registration Number</label>
                        <input type="text" name="reg_num" class="form-control fw-semibold" placeholder="enter registration number" id="cardNumber">
                    </div>
      <div class="col-4">
        <label class="form-label fw-semibold" for="veh_no">Vehicle number</label>
        <input type="text" name="veh_no" class="form-control fw-semibold" placeholder="Vehicle num" />
      </div>
      <div class="col">
        <label class="form-label fw-semibold" for="device_sub">Device Subscription</label>
        <input type="date" name="device_sub" class="form-control fw-semibold" placeholder="Device sub" />
      </div>
      <div class="col-4">
        <label  class="form-label fw-semibold" for="expires_at">Expires At</label>
        <input type="date" name="expires_at" class="form-control fw-semibold" placeholder="Expires" />
      </div>
      <div class="col-5">
        <label  class="form-label fw-semibold"for="account_no">Account</label>
        <input type="text" name="account_no" class="form-control fw-semibold" placeholder="Account" />
      </div>

      <div class="col-3">
          <label for="device" class="form-label fw-semibold">Device</label>
          <select class="form-select" name="device" id="device">
            <option value="">---pick a device---</option>
            <?php
              // Loop through the result set and populate the dropdown menu with serial numbers
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['serial_num'] . '">' . $row['serial_num'] . '</option>';
                }
              }
            ?>
          </select>
        </div>
      </div>
       <div class="card-footer text-end">
       <a class="btn btn-secondary col-1" href="vehicles.php">Cancel</a>

                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </div>
    </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
  </body>
  <style>
  body {
      background-image:url('../../img/cover.png')
    }
  </style>
</html>
