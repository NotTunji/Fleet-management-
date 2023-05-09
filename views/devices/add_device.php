<?php

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
    <title>add device</title>
    <h1>NEW DEVICE</h1>
    <link rel="stylesheet" href="../../css/add_device.css">
  </head>
<body>
  <form action="add_device_logic.php" method="post">
    <div>
        <label for="serial_num">Serial number</label>
        <input type="text" name="serial_num" placeholder="enter number" />
    </div>
    <div>
        <label for="vehicle">Vehicle</label>
        <input type="text" name="vehicle" placeholder="enter vehicle" />
    </div>
    <div>
        <label for="account">Account</label>
        <input type="text" name="account" placeholder="enter account" />
    </div>
    <div>
        <label for="type">Device type</label>
        <select name="type" id="type">
          <option value="">---pick a device---</option>
          <option value="dev1">FMB 920</option>
          <option value="dev2">WETRACK 2</option>
          <option value="dev3">SinoTrack</option>
          <option value="dev3">SALIND</option>
          <option value="dev3">Optimus 2.0</option>
        </select>
      </div>
    <div>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">---select status---</option>
            <option value="on">Active</option>
          <option value="off">Inactive</option>
</select>
    </div>
    <div>
        <label for="config_status">Configuration status</label>
        <select name="config_status" id="config_status">
            <option value="">---select status---</option>
            <option value="on">Configured</option>
          <option value="off">Not Configured</option>
</select>
    </div>
    <div>
        <label for="phone_num">Phone number</label>
        <input type="text" name="phone_num" placeholder="enter number" maxlength="11"/>
    </div>
    <div>
        <label for="installed_at">Installation date</label>
        <input type="date" name="installed_at" placeholder="enter number" />
    </div>
    

    <button type="submit">Submit</button>
    </form>
    
  </body>
  <style>
  body {
      background-image:url('../../img/cover.png')
    }
  </style>
  
</html>
