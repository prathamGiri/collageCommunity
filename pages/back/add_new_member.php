<?php
include "connection.php";
include "functions.php";
if (isset($_POST['threadId']) && isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $threadId = $_POST['threadId'];
    $sql4 = "SELECT *
                FROM circle_following
                WHERE circleId = '$circle_id'";
    $res4 = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($res4) > 0) {
        $json = include('../new_member.php');
        echo $json;
    }
}
if (isset($_POST['threadId']) && isset($_POST['newUserId']) && isset($_POST['memReqType'])) {
    $threadId = $_POST['threadId'];
    $newUserId = $_POST['newUserId'];
    $memReqType = $_POST['memReqType'];
    if ($memReqType == 0) {
        $check_sql = "SELECT * FROM threads_membership WHERE userId = $newUserId AND threadId = $threadId";
        $check_res = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($check_res) > 0) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'already_member'));
        }else {
            $sql4 = "INSERT INTO `threads_membership` (`userId`, `threadId`)
                        VALUES ('$newUserId', '$threadId')";
            $res = mysqli_query($conn, $sql4);
            if ($res) {
                header('Content-Type: application/json');
                echo json_encode(array('status' => 'success'));
            }else{
                header('Content-Type: application/json');
                echo json_encode(array('status'=>'error'));
            }
        }
    }elseif ($memReqType == 1) {
        $sql4 = "DELETE FROM threads_membership
                    WHERE userId = $newUserId AND threadId= $threadId";
        $res = mysqli_query($conn, $sql4);
        if ($res) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success'));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array('status'=>'error'));
        }
    }
    
    
    
}
?>