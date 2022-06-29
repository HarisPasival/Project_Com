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
            <h3>แก้ไขข้อมูลพนักงาน</h3>
            <p class="text-muted">กรอกแบบฟอร์มด้านล่างเพื่อแก้ไขผู้ใช้ใหม่
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-0">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['employee_id'])) {
                            $employee_id = $_GET['employee_id'];
                            $query = "SELECT * FROM employee WHERE employee_id =:employee_id";
                            $stmt = $conn->prepare($query);
                            $data = [':employee_id' => $employee_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST" class="row g-3">
                            <input type="hidden" name="employee_id" value="<?= $result['employee_id'] ?>">
                            <div class="col-md-2">
                                <label class="form-label">คำนำหน้า :</label>
                                <input type="text" name="title_emp" class="form-control" value="<?= $result['title_emp'] ?>" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_emp" class="form-control" value="<?= $result['name_emp'] ?>" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_emp" class="form-control" value="<?= $result['surname_emp'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_emp" class="form-control" value="<?= $result['username_emp'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_emp" class="form-control" value="<?= $result['password_emp'] ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_emp" class="form-control" value="<?= $result['phone_emp'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="email_emp" class="form-control" value="<?= $result['email_emp'] ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="adress_emp" class="form-control" value="<?= $result['adress_emp'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_emp" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <a href="employee_data.php" class="btn btn-danger">ยกเลิก</a>
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