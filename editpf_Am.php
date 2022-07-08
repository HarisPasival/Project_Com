<?php
session_start();
include('config/conn.php');
if (isset($_POST['edit_Am'])) {
    $owner_id = $_POST['owner_id'];
    $name_owner = $_POST['name_owner'];
    $surname_owner = $_POST['surname_owner'];
    $username_owner = $_POST['username_owner'];
    $password_owner = $_POST['password_owner'];
    $phone_owner = $_POST['phone_owner'];
    $email_owner = $_POST['email_owner'];

    try {
        $password_owner = password_hash($password_owner, PASSWORD_DEFAULT);
        $query = "UPDATE owner SET name_owner = :name_owner, surname_owner = :surname_owner, username_owner = :username_owner, password_owner = :password_owner, phone_owner = :phone_owner, email_owner = :email_owner WHERE owner_id = :owner_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':name_owner' => $name_owner,
            ':surname_owner' => $surname_owner,
            ':username_owner' => $username_owner,
            ':password_owner' => $password_owner,
            ':phone_owner' => $phone_owner,
            ':email_owner' => $email_owner,
            ':owner_id' => $owner_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: profile_Am.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: profile_Am.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>