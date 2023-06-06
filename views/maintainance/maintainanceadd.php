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

    <!-- <link rel="stylesheet" href="../../css/maintainanceadd.css"> -->
</head>

<body>
    <form action="maintainanceadd_logic.php" method="post"
        class="container d-flex align-items-center justify-content-center" style="height: 100vh;">

        <div class="card col-10">
            <div class="card-header">
                <strong class="fs-4">Vehicle Maintenance</strong>
            </div>
            <div class="card-body">
                <!-- error message -->
                <div class="alert alert-danger fw-semibold" role="alert">
                    Some fields are missing
                </div>

                <div class="row pb-3">
                    <div class="col-5">
                        <label class="form-label fw-semibold" for="reg_num">Registration Number</label>
                        <input type="text" class="form-control fw-semibold" name="reg_num"
                            placeholder="enter registration number" />
                    </div>
                    <div class="col-5">
                        <label class="form-label fw-semibold" for="veh_num">Vehicle Number</label>
                        <input type="text" class="form-control fw-semibold" name="veh_num"
                            placeholder="enter vehicle number" />
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-semibold" for="start_date">Maintenance start date</label>
                        <input type="date" class="form-control fw-semibold" name="start_date" />
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-semibold" for="end_date">Maintenance end date</label>
                        <input type="date" class="form-control fw-semibold" name="end_date" />
                    </div>
                    <div class="col d-flex flex-column">
                        <label class="form-label fw-semibold" for="remarks">Remarks</label>
                        <input id="textboxid" class="form-control fw-semibold" type="text" name="remarks"
                            placeholder="enter Remarks" />
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            <a class="btn btn-secondary col-1" href="maintainance.php">Cancel</a>

                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<style>
    body {
        background-image: url('../../img/cover.png')
    }
</style>

</html>
