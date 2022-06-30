<?php
session_start();
include('config/conn.php');

if (isset($_POST['login_Am'])) {
    $username_owner = $_POST['username_owner'];
    $password_owner = $_POST['password_owner'];
}
if (empty($username_owner) || empty($password_owner)) {
    $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    header("Location: Login_Am.php");
    exit;
} else {
    $select_stmt = $conn->prepare("SELECT COUNT(username_owner) AS count_user, password_owner FROM owner WHERE username_owner = :username_owner");
    $select_stmt->bindParam(':username_owner', $username_owner);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['count_user'] == 0) {
        $_SESSION['error_user'] = "ชื่อผู้ใช้นี้ไม่มีผู้ใช้ในระบบ";
        header("Location: Login_Am.php");
        exit;
    } else {
        if (password_verify($password_owner, $row['password_owner'])) {
            $_SESSION['username_owner'] = $username_owner;
            $_SESSION['is_login'] = true;
            header("Location: Home.php");
        } else {
            $_SESSION['error_pass'] = "รหัสผ่านไม่ถูกต้อง";
            header("Location: Login_Am.php");
            exit;
        }
    }
}
