<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>หน้าสมัครสมาชิก</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h3>สมัครสมาชิก</h3>
            <p class="text-muted">กรอกแบบฟอร์มด้านล่างเพื่อสมัครเป็นสมาชิกของผู้ใช้ใหม่
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <?php if (isset($_SESSION['error_fill'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_fill']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['exist_fill'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['exist_fill']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_insert'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_insert']; ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3" action="Register_db.php" method="POST">
                            <div class="col-md-2">
                                <label class="form-label">คำนำหน้า :</label>
                                <input  type="text" name="title_ct" class="form-control"  />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="name_ct" class="form-control" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="surname_ct" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_ct" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_ct" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="phone_ct" class="form-control" />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="email_ct" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="adress_ct" class="form-control" />
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="Regis" class="btn btn-primary">สมัครสมาชิก</button>
                                <a href="Login.php" class="btn btn-danger">ยกเลิก</a>
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

<?php
if (isset($_SESSION['error_fill']) || isset($_SESSION['exist_fill']) || isset($_SESSION['error_insert'])) {
    unset($_SESSION['error_fill']);
    unset($_SESSION['exist_fill']);
    unset($_SESSION['error_insert']);
}
?>