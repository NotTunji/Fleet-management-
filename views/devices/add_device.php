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
  <!-- <link rel="stylesheet" href="../../css/add_device.css"> -->
</head>

<body>
  <form action="add_device_logic.php" method="post" class="container d-flex align-items-center justify-content-center"
    style="height: 100vh;">
    <div class="card col-10">
      <div class="card-header">
        <strong class="fs-4">Add Device</strong>
      </div>
      <div class="card-body">
        <!-- error message -->
        <div class="alert alert-danger fw-semibold" role="alert">
          Some fields are missing
        </div>
        <div class="row pb-3">
          <div class="col-5">
            <label for="serial_num" class="form-label fw-semibold">Serial number</label>
            <input type="text" class="form-control fw-semibold" name="serial_num" placeholder="enter number" />
          </div>
          <div class="col-5">
            <label class="form-label fw-semibold" for="vehicle">Vehicle</label>
            <input type="text" class="form-control fw-semibold" name="vehicle" placeholder="enter vehicle" />
          </div>
          <div>
            <label class="form-label fw-semibold" for="account">Account</label>
            <input type="text" class="form-control fw-semibold" name="account" placeholder="enter account" />
          </div>
          <div class="col-5">
            <label class="form-label fw-semibold" for="type">Device type</label>
            <select class="form-control fw-semibold" name="type" id="type">
              <option value="">---pick a device---</option>
              <option value="dev1">FMB 920</option>
              <option value="dev2">WETRACK 2</option>
              <option value="dev3">SinoTrack</option>
              <option value="dev3">SALIND</option>
              <option value="dev3">Optimus 2.0</option>
            </select>
          </div>
          <div class="col-4">
            <label class="form-label fw-semibold" for="status">Status</label>
            <select class="form-control fw-semibold" name="status" id="status">
              <option value="">---select status---</option>
              <option value="on">Active</option>
              <option value="off">Inactive</option>
            </select>
          </div>
          <div class="col-4">
            <label class="form-label fw-semibold" for="config_status">Configuration status</label>
            <select class="form-control fw-semibold" name="config_status" id="config_status">
              <option value="">---select status---</option>
              <option value="on">Configured</option>
              <option value="off">Not Configured</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label fw-semibold" for="phone_num">Phone number</label>
            <input type="text" class="form-control fw-semibold" name="phone_num" placeholder="enter number"
              maxlength="11" />
          </div>
          <div class="col-4">
            <label class="form-label fw-semibold" for="installed_at">Installation date</label>
            <input type="date" class="form-control fw-semibold" name="installed_at" placeholder="enter number" />
          </div>


          <div class="card-footer text-end">
          <a class="btn btn-secondary col-1" href="Devices.php">Cancel</a>

            <button class="btn btn-primary" type="submit">Send</button>
          </div>
        </div>
  </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
<style>
  body {
    background-image: url('../../img/cover.png')
  }

  select option[value="on"] {
    background-color: green;
  }

  select option[value="off"] {
    background-color: red;
  }
</style>

</html>