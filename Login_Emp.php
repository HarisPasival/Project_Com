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
    <title>หน้าล็อกอิน</title>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
            <?php if (isset($_SESSION['error_fill'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_fill']; ?>
                    </div>
                <?php endif; ?>
            <?php if (isset($_SESSION['error_user'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_user']; ?>
                    </div>
                <?php endif; ?>
            <?php if (isset($_SESSION['error_pass'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_pass']; ?>
                    </div>
                <?php endif; ?>
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center">Employee</h1>
                        <form action="login_Emp_db.php" method="POST">
                            <div class="col-12 mt-2">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="username_emp" class="form-control" />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="password_emp" class="form-control" />
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login_Emp" class="btn btn-primary btn-block my-3">เข้าสู่ระบบ</button><br>
                                <a href="HomePage.php"><img src="back-arrow.png"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['error_fill']) || isset($_SESSION['error_user']) || isset($_SESSION['error_pass'])) {
    unset($_SESSION['error_fill']); 
    unset($_SESSION['error_user']);
    unset($_SESSION['error_pass']);
}
?>