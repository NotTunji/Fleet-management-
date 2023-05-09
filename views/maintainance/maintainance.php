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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/maintainance.css">
    <script defer src="#"></script>
    </head>
    <body class="body__container">

        <div class="sidebar__content">
          <div>
            <div class="logo">
              <h1>CTrack</h1>
            </div>
          </div>
      
          <ul class="sidebar">
            <li class="sidebar__item"><a  href="../analytics.php">Analytics</a></li>
            <li class="sidebar__item"><a  href="../vehicles/Vehicles.php">Vehicles</a></li>
            <li class="sidebar__item"><a href="../devices/devices.php">Devices</a></li>
            <li class="sidebar__item"><a href="../trips.php">Trips</a></li>
            <li class="sidebar__item"><a href="../report.php">Report</a></li>
            <li class="sidebar__item"><a href="../vehicle_usage.php">Vehicle Usage</a></li>
            <li class="sidebar__item"><a class="active" href="maintainance.php">Mantainance</a></li>
          </ul>
        </div>
      
        <div class="main__content vehicles_main">
            <header>
                <div class="header-left">
                  <h1>Welcome</h1>
                </div>
                <div class="header-right">
                <img src="../../img/userprofile.png" alt="User Profile">
                      <div class="dropdown">
                    <ul>
                      <li><a href="settings.php">Settings</a></li>
                      <li><a href="/auth/index.php">Logout</a></li>
          
                    </ul>
                  </div>
                </div>
              </header>
              <div class="row">
                <div class="col-lg-12">
                    <section class="panel" style="margin-bottom: 0px;">
    
                        <div class="panel-body">
                            <a href="maintainanceadd.php" class="btn ">
                                Add New Maintenance
                            </a>
                        </div>
                    </section>
                    
                        </header>
    
                        <table class="table ">
                            <tbody>
                            <tr>
                                <th></th>
                                <th> Registration number</th>
                                <th>Vehicle Number</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th> Remarks</th>
                                <th> Action</th>
                            </tr>