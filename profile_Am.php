<?php
session_start();
include('config/conn.php');

if (!isset($_SESSION['is_login'])) {
    header("Location: Login_Am.php");
    exit;
} else {
    $select_stmt = $conn->prepare("SELECT * FROM owner WHERE username_owner = :username_owner");
    $select_stmt->bindParam(':username_owner', $_SESSION['username_owner']);
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
            <h3>ข้อมูลส่วนตัว : <?php echo $_SESSION['username_owner']; ?></h3>
            <p class="text-muted">รายละเอียดของเจ้าของร้าน
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
                        <form action="editpf_Am.php" method="POST" class="row g-3">
                            <input type="hidden" name="owner_id" value="<?= $row['owner_id'] ?>">
                            <div class="col-md-6">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_owner" class="form-control" value="<?= $row['name_owner'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_owner" class="form-control" value="<?= $row['surname_owner'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_owner" class="form-control" value="<?= $row['username_owner'] ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_owner" class="form-control" value="<?= $row['password_owner'] ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_owner" class="form-control" value="<?= $row['phone_owner'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="email_owner" class="form-control" value="<?= $row['email_owner'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_Am" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <a href="Home.php" class="btn btn-danger">ยกเลิก</a>
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