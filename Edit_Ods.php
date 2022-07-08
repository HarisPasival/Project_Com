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
    <title>แก้ไขข้อมูลการสั่งซื้อ</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขข้อมูลการสั่งซื้อ
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['order_id'])) {
                            $order_id = $_GET['order_id'];
                            $query = "SELECT * FROM orders WHERE order_id =:order_id";
                            $stmt = $conn->prepare($query);
                            $data = [':order_id' => $order_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="order_id" value="<?= $result['order_id'] ?>">
                            <div class="col-md-6 mb-3">
                                <label>ชื่ออะไหล่:</label>
                                <input type="text" name="order_name" class="form-control" value="<?= $result['order_name'] ?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>จำนวน:</label>
                                <input type="text" name="order_quanlity" class="form-control" value="<?= $result['order_quanlity'] ?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>ราคา:</label>
                                <input type="text" name="order_cost" class="form-control" value="<?= $result['order_cost'] ?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>วันที่สั่งซื้อ:</label>
                                <input type="date" name="order_date" class="form-control" value="<?= $result['order_date'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_odr" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <a href="orders_data.php" class="btn btn-danger">ย้อนกลับ</a>
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