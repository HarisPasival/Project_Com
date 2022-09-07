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
                        <h3>ข้อมูลลูกค้า
                            <a href="Add_Cus.php" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i> เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php include 'datatable/DataTable.php'; ?>
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>อีเมล</th>
                                    <th>ที่อยู่</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'config/conn.php';
                                $sql = "SELECT * FROM customer";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['title_ct'] . $row['name_ct'] . ' ' . $row['surname_ct']; ?></td>
                                        <td><?= $row['phone_ct']; ?></td>
                                        <td><?= $row['email_ct']; ?></td>
                                        <td><?= $row['adress_ct']; ?></td>
                                        <td>
                                            <form action="crud.php" method="POST">
                                                <a href="#" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                                <a href="Edit_Cus.php?customer_id=<?= $row['customer_id'] ?>" class="btn btn-warning"><i class="fa-solid fa-square-pen"></i></a>
                                                <button type="submit" name="delete_cus" value="<?= $row['customer_id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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