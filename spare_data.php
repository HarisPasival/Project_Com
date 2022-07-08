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
    <title>ข้อมูลอะไหล่</title>
    <?php include 'navbar/head.php'?>
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
                        <h3>
                            ข้อมูลอะไหล่ในสต็อก
                            <a href="Add_spare.php" class="btn btn-primary">+เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                    <?php include 'datatable/DataTable.php';?>
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>ชื่ออะไหล่</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'config/conn.php';
                                $sql = "SELECT * FROM spare";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['spare_name']; ?></td>
                                        <td><?= $row['spare_quanlity']; ?></td>
                                        <td><?= $row['spare_cost']; ?></td>
                                        <td><a href="Edit_spare.php?spare_id=<?= $row['spare_id'] ?>" class="btn btn-warning">แก้ไข</a></td>
                                        <td>
                                            <form action="crud.php" method="POST">
                                                <button type="submit" name="delete_spare" value="<?= $row['spare_id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่');" class="btn btn-danger">ลบ</button>
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