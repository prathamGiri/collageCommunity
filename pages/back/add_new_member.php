<?php
include "connection.php";
include "functions.php";
if (isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $sql4 = "SELECT *
                FROM circle_following
                WHERE circleId = '$circle_id'";
    $res4 = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($res4) > 0) {
        $json = include('../new_member.php');
        echo $json;
    }
}
?>