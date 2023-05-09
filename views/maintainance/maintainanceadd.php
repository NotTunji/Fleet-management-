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
    <h1> Maintainance Record</h1>
    <link rel="stylesheet" href="../../css/maintainanceadd.css">
  </head>
  <form action="add_device_logic.php" method="post">
    <div>
        <label for="reg_num">Registration Number</label>
        <input type="text" name="reg_num" placeholder="enter registration number" />
    </div>
    <div>
        <label for="veh_num">Vehicle Number</label>
        <input type="text" name="veh_num" placeholder="enter vehicle number" />
    </div>
    <div>
        <label for="start_date">Maintenance start date</label>
        <input type="date" name="start_date"  />
    </div>
    <div>
        <label for="end_date">Maintenance end date</label>
        <input type="date" name="end_date"  />
    </div>
    <label for="remarks">Remarks</label>
        <input id ="textboxid" type="text" name="remarks" placeholder="enter Remarks" />
    </div>
  
  
    <div> <button type="submit">Submit</button>
    </div>
    </form>
</body>
<style>
  body {
      background-image:url('../../img/cover.png')
    }
  </style>
  </html>