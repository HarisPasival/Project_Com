<?php
session_start();
include('config/conn.php');

if (!isset($_SESSION['is_login'])) {
    header("Location: Login.php");
    exit;
} else {
    $select_stmt = $conn->prepare("SELECT * FROM customer WHERE username_ct = :username_ct");
    $select_stmt->bindParam(':username_ct', $_SESSION['username_ct']);
    $select_stmt->execute();
    $row = $select_stmt->fetch((PDO::FETCH_ASSOC));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ข้อมูลส่วนตัว</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h3>ข้อมูลส่วนตัว : <?php echo $_SESSION['username_ct']; ?></h3>
            <p class="text-muted">รายละเอียดของลูกค้า
                <hr>
            </p>
        </div>
        <div class="row">
            <?php if (isset($_SESSION['message'])) : ?>
                <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
            <?php
                unset($_SESSION['message']);
            endif;
            ?>
            <div class="col mt-4">
                <div class="card border-0">
                    <div class="card-body">
                        <form action="editpf_cus.php" method="POST" class="row g-3">
                            <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                            <div class="col-md-2">
                                <label class="form-label">คำนำหน้า :</label>
                                <input type="text" name="title_ct" class="form-control" value="<?= $row['title_ct'] ?>" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_ct" class="form-control" value="<?= $row['name_ct'] ?>" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_ct" class="form-control" value="<?= $row['surname_ct'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_ct" class="form-control" value="<?= $row['username_ct'] ?>" readonly/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_ct" class="form-control" value="<?= $row['password_ct'] ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_ct" class="form-control" value="<?= $row['phone_ct'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="email_ct" class="form-control" value="<?= $row['email_ct'] ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="adress_ct" class="form-control" value="<?= $row['adress_ct'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="editpf_cus" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <a href="index_customer.php" class="btn btn-danger">ยกเลิก</a>
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