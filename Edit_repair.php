<?php
session_start();
include('config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>แก้ไขรายการซ่อม</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h3>แก้ไขรายการซ่อมฝาสูบ</h3>
            <p class="text-muted">กรอกแบบฟอร์มด้านล่างเพื่อแก้ไขรายการซ่อมฝาสูบ
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-2">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['repair_id'])) {
                            $repair_id = $_GET['repair_id'];
                            $query = "SELECT * FROM repair WHERE repair_id =:repair_id";
                            $stmt = $conn->prepare($query);
                            $data = [':repair_id' => $repair_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="repair_crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="repair_id" value="<?= $result['repair_id'] ?>">
                            <div class="col-md-4">
                                <label class="form-label">วันที่ซ่อม :</label>
                                <input type="date" name="repair_date" class="form-control" value="<?= $result['repair_date'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">ชื่อผู้ใช้บริการ :</label>
                                <input type="text" name="repair_name" class="form-control" value="<?= $result['repair_name'] ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">รายละเอียดการซ่อม :</label>
                                <textarea name="repair_details" rows="5" class="form-control"><?= $result['repair_details'] ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ค่าใช้จ่ายในการซ่อม :</label>
                                <input type="text" name="repair_cal" class="form-control" value="<?= $result['repair_cal'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ค่าซ่อม :</label>
                                <input type="text" name="repair_price" class="form-control" value="<?= $result['repair_price'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">สถานะการซ่อม :</label>&nbsp;
                                <input type="radio" class="form-check-input" name="repair_status" id="1" value="รอดำเนินการ" <?= ($result['repair_status'] == 'รอดำเนินการ') ? "checked" : ""; ?>>
                                <label for="รอดำเนินการ" class="form-input-label">รอดำเนินการ</label>
                                <input type="radio" class="form-check-input" name="repair_status" id="2" value="รับซ่อมแล้ว" <?= ($result['repair_status'] == 'รับซ่อมแล้ว') ? "checked" : ""; ?>>
                                <label for="รับซ่อมแล้ว" class="form-input-label">รับซ่อมแล้ว</label>
                                <input type="radio" class="form-check-input" name="repair_status" id="3" value="ซ่อมเสร็จแล้ว" <?= ($result['repair_status'] == 'ซ่อมเสร็จแล้ว') ? "checked" : ""; ?>>
                                <label for="ซ่อมเสร็จแล้ว" class="form-input-label">ซ่อมเสร็จแล้ว</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_repair" class="btn btn-primary">แก้ไขรายการซ่อม</button>
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