<?php 
include "connection.php";
include "functions.php";
if (isset($_POST['circle_id']) && isset($_POST['type']) && isset($_SESSION['user_id'])) {
    $circleId = $_POST['circle_id'];
    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    if ($type == 0) {
        $sql = "INSERT INTO circle_following (`userId`, `circleId`)
            VALUES ('$user_id', '$circleId')";
        mysqli_query($conn, $sql);
    }else {
        $sql = "DELETE FROM circle_following 
        WHERE userId = $user_id 
        AND circleId = $circleId";
        mysqli_query($conn, $sql);
    }
    mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $user_id");
    
}
?>