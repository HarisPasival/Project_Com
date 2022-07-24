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
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h3>แก้ไขข้อมูลลูกค้า</h3>
            <p class="text-muted">กรอกแบบฟอร์มด้านล่างเพื่อแก้ไขผู้ใช้ใหม่
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-0">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['customer_id'])) {
                            $customer_id = $_GET['customer_id'];
                            $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                            $stmt = $conn->prepare($query);
                            $data = [':customer_id' => $customer_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="customer_id" value="<?= $result['customer_id'] ?>">
                            <div class="form-group">
                                <label class="form-label">คำนำหน้า :</label>&nbsp;
                                <input type="radio" class="form-check-input" name="title_ct" id="1" value="นาย" <?= ($result['title_ct'] == 'นาย') ? "checked" : ""; ?>>
                                <label for="นาย" class="form-input-label">นาย</label>
                                <input type="radio" class="form-check-input" name="title_ct" id="2" value="นาง" <?= ($result['title_ct'] == 'นาง') ? "checked" : ""; ?>>
                                <label for="นาง" class="form-input-label">นาง</label>
                                <input type="radio" class="form-check-input" name="title_ct" id="3" value="อื่นๆ" <?= ($result['title_ct'] == 'อื่นๆ') ? "checked" : ""; ?>>
                                <label for="อื่นๆ" class="form-input-label">อื่นๆ</label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_ct" class="form-control" value="<?= $result['name_ct'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_ct" class="form-control" value="<?= $result['surname_ct'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_ct" class="form-control" value="<?= $result['username_ct'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_ct" class="form-control" value="<?= $result['password_ct'] ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_ct" class="form-control" value="<?= $result['phone_ct'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="email_ct" class="form-control" value="<?= $result['email_ct'] ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="adress_ct" class="form-control" value="<?= $result['adress_ct'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_cus" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <a href="customer_data.php" class="btn btn-danger">ยกเลิก</a>
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