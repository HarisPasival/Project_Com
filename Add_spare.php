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
    <title>เพิ่มข้อมูลอะไหล่</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>เพิ่มข้อมูลอะไหล่
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST" class="row g-3">
                            <div class="col-md-4 mb-3">
                                <label>ชื่ออะไหล่:</label>
                                <input type="text" name="spare_name" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>จำนวน:</label>
                                <input type="text" name="spare_quanlity" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>ราคา:</label>
                                <input type="text" name="spare_cost" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_spare" class="btn btn-primary">เพิ่มข้อมูล</button>
                                <a href="spare_data.php" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>