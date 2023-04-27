<?php
    session_start();

    include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=
    , initial-scale=1.0"
    />
    <title>Document</title>
    <h1> ADD VEHICLE</h1>
    <link rel="stylesheet" href="./css/add_vehicle.css">
  </head>
  <body>
    <!-- form to add vehicle  -->
    <form action="add_vehicle_logic.php" method="post">
      <div>
        <label for="reg_no">Registration number</label>
        <input type="text" name="reg_no" placeholder="Reg number" />
      </div>
      <div>
        <label for="veh_no">Vehicle number</label>
        <input type="text" name="veh_no" placeholder="Vehicle num" />
      </div>
      <div>
        <label for="device_sub">Device Subscription</label>
        <input type="date" name="device_sub" placeholder="Device sub" />
      </div>
      <div>
        <label for="expires_at">Expires At</label>
        <input type="text" name="expires_at" placeholder="Expires" />
      </div>
      <div>
        <label for="account_no">Account</label>
        <input type="text" name="account_no" placeholder="Account" />
      </div>

      <div>
        <label for="device">Device</label>
        <select name="device" id="device">
          <option value="">---pick a device---</option>
          <option value="dev1">dev1</option>
          <option value="dev2">dev2</option>
          <option value="dev3">dev3</option>
        </select>
      </div>

      <button type="submit">Submit</button>
    </form>
  </body>
  <style>
  body {
      background-image:url('cover.png')
    }
  </style>
</html>
