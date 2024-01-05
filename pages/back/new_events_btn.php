<?php 
include "connection.php";
include "functions.php";

if (isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $user_id;
    if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM circle_membership WHERE circleId = '$circle_id' AND userId = '$user_id'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'yes-prev'));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'no-prev'));
        }
    }else {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'no-prev'));
    }
    
}
?>