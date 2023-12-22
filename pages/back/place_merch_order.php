<?php 
include "connection.php";
include "functions.php";

if(isset($_POST['selectedValue']) && isset($_POST['qty']) && isset($_POST['merchId'])){
    $selectedValue = $_POST['selectedValue'];
    $qty = $_POST['qty'];
    $merchId = $_POST['merchId'];
    $userId = $_SESSION['user_id'];

    $res = mysqli_query($conn, "INSERT INTO `merch_order` (`merchId`, `user_id`, `size`, `qty`) 
                            VALUES ('$merchId', '$userId', '$selectedValue', '$qty')");

    if ($res) {
        header('Content-Type: application/json');
        echo json_encode(array('status'=>'success'));
    }else {
        header('Content-Type: application/json');
        echo json_encode(array('status'=>'error'));
    }
}
?>