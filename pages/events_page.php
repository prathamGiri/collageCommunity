<?php 
include "back/connection.php";
include "back/functions.php";

if (isset($_POST['circle_id'])) {
    $circle_id = $_POST['circle_id'];
    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM events
            WHERE circleId = $circle_id AND status = 'upcoming'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        echo '<div class="head" id="upcoming">Upcoming Events:</div>';
        while ($row = mysqli_fetch_assoc($res)) {
            include "event_templet.php";
        }
    }
    $sql2 = "SELECT * FROM events
            WHERE circleId = $circle_id AND status = 'past'";
    $res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2) > 0) {
        echo '<div class="head" id="past">Past Events:</div>';
        while ($row = mysqli_fetch_assoc($res2)) {
            include "event_templet.php";
        }
    }
}
?>