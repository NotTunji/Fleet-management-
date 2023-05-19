<?php
    

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
                <div class="alert alert-danger fw-semibold" role="alert">
                    Some fields are missing
                </div>
      <div class="row pb-3">
                    <div class="col-5">
                        <label for="reg_num" class="form-label fw-semibold">Registration Number</label>
                        <input type="text" class="form-control fw-semibold" placeholder="enter registration number" id="cardNumber">
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

      <div class="col-3" >
        <label for="device" class="form-label fw-semibold">Device</label>
        <select class="form-select" name="device" id="device">
          <option value="">---pick a device---</option>
          <option value="dev1">dev1</option>
          <option value="dev2">dev2</option>
          <option value="dev3">dev3</option>
        </select>
      </div>

       <div class="card-footer text-end">
                <button class="btn btn-secondary col-1">Cancel</button>
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
