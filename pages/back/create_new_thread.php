<?php
include "connection.php";
include "functions.php";
if (isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $sql4 = "SELECT circleId, circleName, circleLogo
                FROM staticcircleinfo
                WHERE circleId = '$circle_id'";
    $res4 = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($res4) > 0) {
        $row4 = mysqli_fetch_assoc($res4);
        $json = include('../new_thread.php');
        echo $json;
    }
}
?>