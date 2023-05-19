<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=
    , initial-scale=1.0" />
  <title>add device</title>
  <h1> Maintainance Record</h1>
  <link rel="stylesheet" href="../css/add_usage.css">
  <script type="text/javascript">
    function GetDays() {
      var dropdt = new Date(document.getElementById("drop_date").value);
      var pickdt = new Date(document.getElementById("pick_date").value);
      return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
    }

    function cal() {
      if (document.getElementById("drop_date")) {
        document.getElementById("numdays2").value = GetDays();
      }
    }
  </script>
</head>
<form action="add_device_logic.php" method="post">
  <div>
    <label for="reg_num">Registration Number</label>
    <input type="text" name="reg_num" placeholder="enter registration number" />
  </div>
  <div id="pickup_date">
    <p><label class="form">Start Date:</label><input type="date" class="textbox" id="pick_date" name="pickup_date" onchange="cal()"></p>
  </div>

  <div id="dropoff_date">
    <p><label class="form">End Date:</label><input type="date" class="textbox" id="drop_date" name="dropoff_date" onchange="cal()" /></p>
  </div>
  <div id="numdays"><label class="form">Number of days:</label><input type="text" class="textbox" id="numdays2" name="numdays" /></div>
  <div>
    <label for="total_distance">Total Distance</label>
    <input type="text" name="total_distance" placeholder="enter vehicle number" />
  </div>
  <div>
    <label for="driver">Driver</label>
    <input type="text" name="driver" placeholder="enter vehicle number" />
  </div>

  <div>
    <label for="purpose">Purpose</label>
    <input type="text" name="purpose" placeholder="enter vehicle number" />
  </div>
  <div>
    <label for="fuel">Fuel Consumption</label>
    <input type="text" name="fuel" placeholder="enter Remarks" />
  </div>
  <div>
    <label for="Notes">Notes</label>
    <input id="textboxid" type="text" name="Notes" placeholder="enter Remarks" />
  </div>


  <div> <button type="submit">Submit</button>
  </div>
</form>
</body>
<style>
  body {
    background-image: url('../img/cover.png')
  }
</style>

</html>