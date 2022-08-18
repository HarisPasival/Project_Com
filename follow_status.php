<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ติดตามสถานะ</title>
    <?php include 'navbar/nav_cus.php' ?>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center">ตรวจสอบสถานะการซ่อม</h3>
                </div>
                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="" placeholder="กรอกหมายเลขการซ่อม" style="text-align: center">
                        <hr class="mb-4">
                        <button class="btn btn-warning btn-btn-block">ติดตามสถานะการซ่อม</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>