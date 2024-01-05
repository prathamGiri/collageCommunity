<?php
include "connection.php";
include "functions.php";

if (isset($_POST['button_clicked']) && $_POST['button_clicked'] == 'true') {
    $circleId = $_SESSION['commid'];
    echo $circleId;
    $eventImg;
    if (isset($_FILES['event-img']['name']) && $_FILES['event-img']['size'] > 0) {
        $eventImg = test_input($_FILES['event-img']['name']);
        move_uploaded_file($_FILES['event-img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/post_images/'.$eventImg);
    }else{
        $eventImg = -1;
    }
    $event_name = test_input($_POST['event-name']);
    $event_disc = test_input($_POST['event-disc']);
    $event_mode = test_input($_POST['event-mode']);
    $event_date = test_input($_POST['event-date']);
    $event_time = test_input($_POST['event-time']);
    $reg_fees = test_input($_POST['event-fees']);
    $event_venue;
    $event_gmeet;
    if ($event_mode == 'Offline') {
        $event_venue = test_input($_POST['event-venue']);
        $event_gmeet = -1;
    }elseif ($event_mode == 'Online') {
        $event_venue = -1;
        $event_gmeet = test_input($_POST['event-gmeet']);
    }
    $status = 'upcoming';
    mysqli_query($conn, "INSERT INTO `events` (`circleId`, `eventName`, `eventDisc`,`eventImg`, `mode`, `date`, `time`,`regFees`, `venue`, `gmeetLink`, `status`) 
                            VALUES ('$circleId', '$event_name', '$event_disc', '$eventImg', '$event_mode', '$event_date', '$event_time', '$reg_fees', '$event_venue', '$event_gmeet', '$status')");
    
}
?>