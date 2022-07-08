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
    <title>แก้ไขข้อมูลอะไหล่</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขข้อมูลอะไหล่
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['spare_id'])) {
                            $spare_id = $_GET['spare_id'];
                            $query = "SELECT * FROM spare WHERE spare_id =:spare_id";
                            $stmt = $conn->prepare($query);
                            $data = [':spare_id' => $spare_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="spare_id" value="<?= $result['spare_id'] ?>">
                            <div class="col-md-3 mb-3">
                                <label>ชื่ออะไหล่:</label>
                                <input type="text" name="spare_name" class="form-control" value="<?= $result['spare_name'] ?>" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>จำนวน:</label>
                                <input type="text" name="spare_quanlity" class="form-control" value="<?= $result['spare_quanlity'] ?>" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>ราคา:</label>
                                <input type="text" name="spare_cost" class="form-control" value="<?= $result['spare_cost'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_spare" class="btn btn-primary">แก้ไขข้อมูล</button>
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