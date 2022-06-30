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
?>