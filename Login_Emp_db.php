<?php
session_start();
include('config/conn.php');

if (isset($_POST['login_Emp'])) {
    $username_emp = $_POST['username_emp'];
    $password_emp = $_POST['password_emp'];
}
if (empty($username_emp) || empty($password_emp)) {
    $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    header("Location: Login_Emp.php");
    exit;
} else {
    $select_stmt = $conn->prepare("SELECT COUNT(username_emp) AS count_user, password_emp FROM employee WHERE username_emp = :username_emp");
    $select_stmt->bindParam(':username_emp', $username_emp);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['count_user'] == 0) {
        $_SESSION['error_user'] = "ชื่อผู้ใช้นี้ไม่มีผู้ใช้ในระบบ";
        header("Location: Login_Emp.php");
        exit;
    } else {
        if (password_verify($password_emp, $row['password_emp'])) {
            $_SESSION['username_emp'] = $username_emp;
            $_SESSION['is_login'] = true;
            header("Location: Home_Emp.php");
        } else {
            $_SESSION['error_pass'] = "รหัสผ่านไม่ถูกต้อง";
            header("Location: Login_Emp.php");
            exit;
        }
    }
}
