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
    <title>เพิ่มรายการซ่อม</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h3>เพิ่มรายการซ่อมฝาสูบ</h3>
            <p class="text-muted">กรอกแบบฟอร์มด้านล่างเพื่อเพิ่มรายการซ่อมฝาสูบ
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-2">
                    <div class="card-body">
                        <form action="repair_crud.php" method="POST" class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">วันที่ซ่อม :</label>
                                <input type="date" name="repair_date" class="form-control" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">ชื่อผู้ใช้บริการ :</label>
                                <input type="text" name="repair_name" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">รายละเอียดการซ่อม :</label>
                                <textarea name="repair_details" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ค่าใช้จ่ายในการซ่อม :</label>
                                <input type="text" name="repair_cal" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ค่าซ่อม :</label>
                                <input type="text" name="repair_price" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">สถานะการซ่อม :</label>&nbsp;
                                <input type="radio" class="form-check-input" name="repair_status"
                                id="1" value="รอดำเนินการ">
                                <label for="รอดำเนินการ" class="form-input-label">รอดำเนินการ</label>
                                <input type="radio" class="form-check-input" name="repair_status"
                                id="2" value="รับซ่อมแล้ว">
                                <label for="รับซ่อมแล้ว" class="form-input-label">รับซ่อมแล้ว</label>
                                <input type="radio" class="form-check-input" name="repair_status"
                                id="3" value="ซ่อมเสร็จแล้ว">
                                <label for="ซ่อมเสร็จแล้ว" class="form-input-label">ซ่อมเสร็จแล้ว</label>
                                
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_repair" class="btn btn-primary">เพิ่มรายการซ่อม</button>
                                <a href="repair.php" class="btn btn-danger">ยกเลิก</a>
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