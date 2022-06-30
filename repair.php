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
    <title>ข้อมูลลูกค้า</title>
    <?php include 'navbar/nav_emp.php' ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif;
                ?>
                <div class="card">
                    <div class="card-body">
                        <h3>รายการรับซ่อมฝาสูบ
                            <a href="Add_repair.php" class="btn btn-primary">+เพิ่มรายการซ่อม</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php include 'datatable/DataTable.php'; ?>
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>วันที่ซ่อม</th>
                                    <th>ชื่อผู้ใช้บริการ</th>
                                    <th>รายละเอียดการซ่อม</th>
                                    <th>ค่าใช้จ่ายในการซ่อม</th>
                                    <th>ค่าซ่อม</th>
                                    <th>สถานะการซ่อม</th>
                                    <th>แก้ไข</th>
                                    <th>ยกเลิก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'config/conn.php';
                                $sql = "SELECT * FROM repair";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['repair_date']; ?></td>
                                        <td><?= $row['repair_name']; ?></td>
                                        <td><?= $row['repair_details']; ?></td>
                                        <td><?= $row['repair_cal']; ?></td>
                                        <td><?= $row['repair_price']; ?></td>
                                        <td><?= $row['repair_status']; ?></td>
                                        <td><a href="Edit_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning">แก้ไข</a></td>
                                        <td>
                                            <form action="repair_crud.php" method="POST">
                                                <button type="submit" name="delete_repair" value="<?= $row['repair_id'] ?>" class="btn btn-danger">ยกเลิก</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>