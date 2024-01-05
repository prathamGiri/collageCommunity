<?php 
include "connection.php";
include "functions.php";

if (isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $logged_in = FALSE;
    $user_id;
    if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
        $logged_in = TRUE;
        $user_id = $_SESSION['user_id'];
        mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $user_id");
    }
    $sql = "SELECT * FROM events
            WHERE circleId = $circle_id AND status = 'upcoming' ORDER BY date ASC";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        echo '<div class="head" id="upcoming">Upcoming Events:</div>';
        while ($row = mysqli_fetch_assoc($res)) {
            include "../event_templet.php";
        }
    }
    $sql2 = "SELECT * FROM events
            WHERE circleId = $circle_id AND status = 'past'";
    $res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2) > 0) {
        echo '<div class="head" id="past">Past Events:</div>';
        while ($row = mysqli_fetch_assoc($res2)) {
            include "../event_templet.php";
        }
    }
}
?>