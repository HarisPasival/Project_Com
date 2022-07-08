<?php
session_start();
include('config/conn.php');
if (isset($_POST['editpf_cus'])) {
    $customer_id = $_POST['customer_id'];
    $title_ct = $_POST['title_ct'];
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $adress_ct = $_POST['adress_ct'];

    try {
        $password_ct = password_hash($password_ct, PASSWORD_DEFAULT);
        $query = "UPDATE customer SET title_ct = :title_ct, name_ct = :name_ct, surname_ct = :surname_ct, username_ct = :username_ct, password_ct = :password_ct, phone_ct = :phone_ct, email_ct = :email_ct, adress_ct = :adress_ct WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':title_ct' => $title_ct,
            ':name_ct' => $name_ct,
            ':surname_ct' => $surname_ct,
            ':username_ct' => $username_ct,
            ':password_ct' => $password_ct,
            ':phone_ct' => $phone_ct,
            ':email_ct' => $email_ct,
            ':adress_ct' => $adress_ct,
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: profile_cus.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: profile_cus.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>