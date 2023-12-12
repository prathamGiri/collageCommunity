<?php
include "connection.php";
include "functions.php";


    $circleId = $_SESSION['commid'];
    $thread_name = $_POST['thread_name'];
    $status = $_POST['status'];
    $user_id = $_SESSION['user_id'];

    $insertsql = "INSERT INTO `threads` (`circleId`, `threadName`, `status`) 
                    VALUES ('$circleId', '$thread_name', '$status')";
    mysqli_query($conn, $insertsql);

    $sql = "SELECT * FROM threads
            WHERE circleId = '$circleId'
            AND threadName = '$thread_name'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $threadId = $row['threadId'];
        $ins2 = "INSERT INTO `threads_membership` (`userId`, `threadId`)
                    VALUES ('$user_id', '$threadId')"; 
        mysqli_query($conn, $ins2);
        echo '<li><div class="threadopt" id="'.$threadId.'">'.$row['threadName'].'</div></li>';
    }


?>