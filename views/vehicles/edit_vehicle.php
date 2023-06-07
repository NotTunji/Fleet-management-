<?php
session_start();
// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header("Location: login.php");
    exit;
  }
  
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and update the vehicle record in the database
  
    // After performing the update, redirect back to vehicles.php
    header("Location: vehicles.php");
    exit;
  }
include '../auth/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_no'])) {
  $regNo = $_GET['reg_no'];

  // Fetch the vehicle details from the database based on the registration number
  $sql = "SELECT * FROM vehicles WHERE reg_no = '$regNo'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Render the edit vehicle form with pre-filled values
    renderEditForm($row);
  } else {
    // Vehicle not found, redirect or show an error message
    echo "Vehicle not found";
  }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  // Process the form submission after editing the vehicle details
  $regNo = $_POST['reg_no'];
  $vehNo = $_POST['veh_no'];
  $deviceSub = $_POST['device_sub'];
  $accountNo = $_POST['account_no'];
  $device = $_POST['device'];

  // Update the vehicle details in the database
  $sql = "UPDATE vehicles SET veh_no = '$vehNo', device_sub = '$deviceSub', account_no = '$accountNo', device = '$device' WHERE reg_no = '$regNo'";
  if ($conn->query($sql) === TRUE) {
    // Vehicle details updated successfully, redirect or show a success message
    echo "Vehicle details updated successfully";
  } else {
    // Error updating vehicle details, redirect or show an error message
    echo "Error updating vehicle details: " . $conn->error;
  }
}

$conn->close();

function renderEditForm($vehicle)
{
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Edit Vehicle</title>
    <!-- Add your CSS styling here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0648605bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/add_vehicle.css">
  </head>
  <body>
    
    <form class="container d-flex align-items-center justify-content-center" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="card col-10">
    <div class="card-header">
                <strong class="fs-4">Edit Vehicle</strong>
            </div>
    <div class="card-body">
         <div class="col-4">
    <label class="form-label fw-semibold" for="reg_no">Registration Number:</label> 
    <input type="text" name="reg_no" class="form-control fw-semibold" value="<?php echo $vehicle['reg_no']; ?>">
</div>
    <div class="col-4">
      <label class="form-label fw-semibold" for="veh_no">Vehicle Number:</label>
      <input type="text" name="veh_no" class="form-control fw-semibold" value="<?php echo $vehicle['veh_no']; ?>"><br><br>
      </div>
      <div class="col-4">
      <label class="form-label fw-semibold"for="device_sub">Device Subscription:</label>
      <input type="text" name="device_sub" class="form-control fw-semibold" value="<?php echo $vehicle['device_sub']; ?>"><br><br>
</div>
<div class="col-4">
      <label class="form-label fw-semibold"for="account_no">Account:</label>
      <input type="text" name="account_no"  class="form-control fw-semibold" value="<?php echo $vehicle['account_no']; ?>"><br><br>
</div>
<div class="col-3" >
      <label class="form-label fw-semibold"for="device">Device:</label>
      <input type="text" name="device" class="form-control fw-semibold" value="<?php echo $vehicle['device']; ?>"><br><br>
</div>
<div class="card-footer text-end">
     
<button class="btn btn-primary" type="submit">Update</button>
    </div>
</div></div> </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
  </body>
  <style>
  body {
      background-image:url('../../img/cover.png')
    }
  </html>
<?php
}
?>
