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
  <!-- <link rel="stylesheet" href="../css/add_usage.css"> -->
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

<body>
  <form action="vehicle_usagelogic.php" method="post" class="container d-flex align-items-center justify-content-center"
    style="height: 100vh;">
    <div class="card col-10">
      <div class="card-header">
        <strong class="fs-4">Vehicle Usage Form</strong>
      </div>
      <div class="card-body">
        <!-- error message -->
        <div class="alert alert-danger fw-semibold" role="alert">
          Some fields are missing
        </div>

        <!-- first row -->
        <div class="row pb-3">
          <div class="col-5">
            <label for="reg_no" class="form-label fw-semibold">Registration Number</label>
            <input type="text" class="form-control fw-semibold" placeholder="enter registration number" id="cardNumber">
          </div>
          <div id="pickup_date">
            <p><label for="start_date" class="form-label fw-semibold">Start Date:</label><input type="date"
                class="form-control fw-semibold" id="pick_date" name="pickup_date" onchange="cal()"></p>
          </div>

          <div id="dropoff_date">
            <p><label for="end_date" class="form-label fw-semibold">End Date:</label><input type="date"
                class="form-control fw-semibold" id="drop_date" name="dropoff_date" onchange="cal()" /></p>
          </div>
          <div id="col">
            <label for="numdays" class="form-label fw-semibold">Number of days:</label><input type="text"
              class="form-control fw-semibold" id="numdays2" name="numdays" />
          </div>
          <div class="col">
            <label class="form-label fw-semibold" for="total_distance">Total Distance</label>
            <input type="text" name="total_distance" class="form-control fw-semibold"
              placeholder="enter distance covered" />
          </div>
          <div class="col-5">
            <label for="start_date" class="form-label fw-semibold" for="driver">Driver</label>
            <input type="text" name="driver" class="form-control fw-semibold" placeholder="driver name" />
          </div>
          <div>
            <label class="form-label fw-semibold" for="purpose">Purpose</label>
            <input type="text" name="purpose" class="form-control fw-semibold" placeholder="state purpose" />
          </div>
          <div class="col">
            <label class="form-label fw-semibold" for="fuel_consumption">Fuel Consumption</label>
            <input type="text" name="fuel" class="form-control fw-semibold" placeholder="enter Remarks" />
          </div>
          <div class="col-5">
            <label class="form-label fw-semibold" for="notes">Notes</label>
            <input id="textboxid" type="text" name="Notes" class="form-control fw-semibold"
              placeholder="enter Remarks" />
          </div>



          <div class="card-footer text-end">
            <!-- <button class="btn btn-secondary col-1">Cancel</button> -->
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
    background-image: url('../img/cover.png')
  }
</style>

</html>