<?php
session_start();
include('config/conn.php');
// ข้อมูลลูกค้า
if (isset($_POST['save_cus'])) {
    $title_ct = $_POST['title_ct'];
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $adress_ct = $_POST['adress_ct'];

    $password_ct = password_hash($password_ct, PASSWORD_DEFAULT);
    $query = "INSERT INTO customer(title_ct,name_ct,surname_ct,username_ct,password_ct,phone_ct,email_ct,adress_ct) VALUES(:title_ct,:name_ct,:surname_ct,:username_ct,:password_ct,:phone_ct,:email_ct,:adress_ct)";
    $query_run = $conn->prepare($query);

    $data = [
        ':title_ct' => $title_ct,
        ':name_ct' => $name_ct,
        ':surname_ct' => $surname_ct,
        ':username_ct' => $username_ct,
        ':password_ct' => $password_ct,
        ':phone_ct' => $phone_ct,
        ':email_ct' => $email_ct,
        ':adress_ct' => $adress_ct
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: customer_data.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: customer_data.php');
        exit(0);
    }
}

if (isset($_POST['edit_cus'])) {
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
            header('Location: customer_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: customer_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_cus'])) {
    $customer_id = $_POST['delete_cus'];
    try {
        $query = "DELETE FROM customer WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: customer_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: customer_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ข้อมูลการสั่งซื้ออะไหล่
if (isset($_POST['save_odr'])) {
    $order_name = $_POST['order_name'];
    $order_quanlity = $_POST['order_quanlity'];
    $order_cost = $_POST['order_cost'];
    $order_date = $_POST['order_date'];

    $query = "INSERT INTO orders(order_name,order_quanlity,order_cost,order_date) VALUES(:order_name,:order_quanlity,:order_cost,:order_date)";
    $query_run = $conn->prepare($query);

    $data = [
        ':order_name' => $order_name,
        ':order_quanlity' => $order_quanlity,
        ':order_cost' => $order_cost,
        ':order_date' => $order_date
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: orders_data.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: orders_data.php');
        exit(0);
    }
}

if (isset($_POST['edit_odr'])) {
    $order_id = $_POST['order_id'];
    $order_name = $_POST['order_name'];
    $order_quanlity = $_POST['order_quanlity'];
    $order_cost = $_POST['order_cost'];
    $order_date = $_POST['order_date'];

    try {
        $query = "UPDATE orders SET order_name = :order_name, order_quanlity = :order_quanlity, order_cost = :order_cost, order_date = :order_date WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_name' => $order_name,
            ':order_quanlity' => $order_quanlity,
            ':order_cost' => $order_cost,
            ':order_date' => $order_date,
            ':order_id' => $order_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: orders_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: orders_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_odr'])) {
    $order_id = $_POST['delete_odr'];
    try {
        $query = "DELETE FROM orders WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_id' => $order_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: orders_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: orders_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ข้อมูลพนักงาน
if (isset($_POST['save_emp'])) {
    $title_emp = $_POST['title_emp'];
    $name_emp = $_POST['name_emp'];
    $surname_emp = $_POST['surname_emp'];
    $username_emp = $_POST['username_emp'];
    $password_emp = $_POST['password_emp'];
    $phone_emp = $_POST['phone_emp'];
    $email_emp = $_POST['email_emp'];
    $adress_emp = $_POST['adress_emp'];
    
    $password_emp = password_hash($password_emp, PASSWORD_DEFAULT);
    $query = "INSERT INTO employee(title_emp,name_emp,surname_emp,username_emp,password_emp, phone_emp,email_emp,adress_emp) VALUES(:title_emp,:name_emp,:surname_emp,:username_emp,:password_emp,:phone_emp,:email_emp,:adress_emp)";
    $query_run = $conn->prepare($query);

    $data = [
        ':title_emp'=> $title_emp,
        ':name_emp' => $name_emp,
        ':surname_emp' => $surname_emp,
        ':username_emp' => $username_emp,
        ':password_emp' => $password_emp,
        ':phone_emp' => $phone_emp,
        ':email_emp' => $email_emp,
        ':adress_emp' => $adress_emp
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: employee_data.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: employee_data.php');
        exit(0);
    }
}

if (isset($_POST['edit_emp'])) {
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
            header('Location: employee_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: employee_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_emp'])) {
    $employee_id = $_POST['delete_emp'];
    try {
        $query = "DELETE FROM employee WHERE employee_id = :employee_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':employee_id' => $employee_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: employee_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: employee_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ข้อมูลประเภทอะไหล่
if (isset($_POST['save_model'])) {
    $model_name = $_POST['model_name'];
    $query = "INSERT INTO model(model_name) VALUES (:model_name)";
    $query_run = $conn->prepare($query);
    $data = [
        ':model_name' => $model_name
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: model_data.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: model_data.php');
        exit(0);
    }
}
if (isset($_POST['edit_model'])) {
    $model_id = $_POST['model_id'];
    $model_name = $_POST['model_name'];
    try {
        $query = "UPDATE model SET model_name = :model_name WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_name' => $model_name,
            ':model_id' => $model_id

        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: model_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: model_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['delete_model'])) {
    $model_id = $_POST['delete_model'];
    try {
        $query = "DELETE FROM model WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_id' => $model_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: model_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: model_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['save_spare'])) {
    $spare_name = $_POST['spare_name'];
    $spare_quanlity = $_POST['spare_quanlity'];
    $spare_cost = $_POST['spare_cost'];

    $query = "INSERT INTO spare(spare_name,spare_quanlity,spare_cost) VALUES(:spare_name,:spare_quanlity,:spare_cost)";
    $query_run = $conn->prepare($query);

    $data = [
        ':spare_name' => $spare_name,
        ':spare_quanlity' => $spare_quanlity,
        ':spare_cost' => $spare_cost
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: spare_data.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: spare_data.php');
        exit(0);
    }
}
if (isset($_POST['edit_spare'])) {
    $spare_id = $_POST['spare_id'];
    $spare_name = $_POST['spare_name'];
    $spare_quanlity = $_POST['spare_quanlity'];
    $spare_cost = $_POST['spare_cost'];

    try {
        $query = "UPDATE spare SET spare_name = :spare_name, spare_quanlity = :spare_quanlity, spare_cost = :spare_cost WHERE spare_id = :spare_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':spare_name' => $spare_name,
            ':spare_quanlity' => $spare_quanlity,
            ':spare_cost' => $spare_cost,
            ':spare_id' => $spare_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: spare_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: spare_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_spare'])) {
    $spare_id = $_POST['delete_spare'];
    try {
        $query = "DELETE FROM spare WHERE spare_id = :spare_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':spare_id' => $spare_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: spare_data.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: spare_data.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>