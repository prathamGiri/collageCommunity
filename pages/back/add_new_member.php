<?php
include "connection.php";
include "functions.php";
if (isset($_POST['tag']) && !isset($_POST['newUserId'])) {
    $tag = $_POST['tag'];
    $circle_id = $_POST['circle_id'];
    $threadId;
    if ($tag == "thread") {
        $threadId = $_POST['threadId'];
    }
    $sql4 = "SELECT *
                FROM circle_following
                WHERE circleId = '$circle_id'";
    $res4 = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($res4) > 0) {
        include "../new_member.php";
    }
}
if (isset($_POST['threadId']) && isset($_POST['newUserId']) && isset($_POST['memReqType']) && isset($_POST['tag'])) {
    $threadId = $_POST['threadId'];
    $circle_id = $_POST['circle_id'];
    $newUserId = $_POST['newUserId'];
    $memReqType = $_POST['memReqType'];
    $tag = $_POST['tag'];
    $check_sql;
    $sql4;
    
    if ($memReqType == 0) {
        if ($tag == "thread") {
            $check_sql = "SELECT * FROM threads_membership WHERE userId = $newUserId AND threadId = $threadId";
            $sql4 = "INSERT INTO `threads_membership` (`userId`, `threadId`)
                            VALUES ('$newUserId', '$threadId')";
        }elseif ($tag == "about") {
            $check_sql = "SELECT * FROM circle_membership WHERE userId = $newUserId AND circleId = $circle_id";
            $sql4 = "INSERT INTO `circle_membership` (`userId`, `circleId`)
                            VALUES ('$newUserId', '$circle_id')";
        }
        $check_res = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($check_res) > 0) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'already_member'));
        }else {
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
        if ($tag == "thread") {
            $sql4 = "DELETE FROM threads_membership
                    WHERE userId = $newUserId AND threadId= $threadId";
        }elseif ($tag == "about") {
            $sql4 = "DELETE FROM circle_membership
                    WHERE userId = $newUserId AND circleId= $circle_id";
        }
        
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