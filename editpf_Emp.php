<?php
session_start();
include('config/conn.php');
if (isset($_POST['editpf_Emp'])) {
    $employee_id = $_POST['employee_id'];
    $title_emp = $_POST['title_emp'];
    $name_emp = $_POST['name_emp'];
    $surname_emp = $_POST['surname_emp'];
    $username_emp = $_POST['username_emp'];
    $password_emp = $_POST['password_emp'];
    $phone_emp = $_POST['phone_emp'];
    $email_emp = $_POST['email_emp'];
    $adress_emp = $_POST['adress_emp'];

    try {
        $password_emp = password_hash($password_emp, PASSWORD_DEFAULT);
        $query = "UPDATE employee SET title_emp = :title_emp, name_emp = :name_emp, surname_emp = :surname_emp, username_emp = :username_emp, password_emp = :password_emp , phone_emp = :phone_emp, email_emp = :email_emp, adress_emp = :adress_emp WHERE employee_id = :employee_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':title_emp' => $title_emp,
            ':name_emp' => $name_emp,
            ':surname_emp' => $surname_emp,
            ':username_emp' => $username_emp,
            ':password_emp' => $password_emp,
            ':phone_emp' => $phone_emp,
            ':email_emp' => $email_emp,
            ':adress_emp' => $adress_emp,
            ':employee_id' => $employee_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: profile_Emp.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: profile_Emp.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>