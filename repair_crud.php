<?php
include('config/conn.php');

if (isset($_POST['save_repair'])) {
    $repair_date = $_POST['repair_date'];
    $repair_name = $_POST['repair_name'];
    $repair_details = $_POST['repair_details'];
    $repair_cal = $_POST['repair_cal'];
    $repair_price = $_POST['repair_price'];
    $repair_status = $_POST['repair_status'];

    $query = "INSERT INTO repair(repair_date,repair_name,repair_details,repair_cal,repair_price,repair_status) VALUES(:repair_date,:repair_name,:repair_details,:repair_cal,:repair_price,:repair_status)";
    $query_run = $conn->prepare($query);

    $data = [
        ':repair_date' => $repair_date,
        ':repair_name' => $repair_name,
        ':repair_details' => $repair_details,
        ':repair_cal' => $repair_cal,
        ':repair_price' => $repair_price,
        ':repair_status' => $repair_status
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: repair.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: repair.php');
        exit(0);
    }
}
if (isset($_POST['edit_repair'])) {
    $repair_id = $_POST['repair_id'];
    $repair_date = $_POST['repair_date'];
    $repair_name = $_POST['repair_name'];
    $repair_details = $_POST['repair_details'];
    $repair_cal = $_POST['repair_cal'];
    $repair_price = $_POST['repair_price'];
    $repair_status = $_POST['repair_status'];

    try {
        $query = "UPDATE repair SET repair_date = :repair_date, repair_name = :repair_name, repair_details = :repair_details, repair_cal = :repair_cal, repair_price = :repair_price, repair_status = :repair_status WHERE repair_id = :repair_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':repair_date' => $repair_date,
            ':repair_name' => $repair_name,
            ':repair_details' => $repair_details,
            ':repair_cal' => $repair_cal,
            ':repair_price' => $repair_price,
            ':repair_status' => $repair_status,
            ':repair_id' => $repair_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: repair.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: repair.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['delete_repair'])) {
    $repair_id = $_POST['delete_repair'];
    try {
        $query = "DELETE FROM repair WHERE repair_id = :repair_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':repair_id' => $repair_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: repair.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: repair.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>