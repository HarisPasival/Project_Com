<?php
session_start();
if(!isset($_SESSION['is_login'])){
    header("Location: Login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรกลูกค้า</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php include 'navbar/nav_cus.php'?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1 class="mt-5">หน้าแรก</h1> -->
                <div class="card mt-5 text-center">
                    <div class="card-body">
                        <h1>Hello</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>