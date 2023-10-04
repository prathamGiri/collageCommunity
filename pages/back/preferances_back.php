<?php
include 'connection.php';
include 'functions.php';
if (isset($_POST['submit'])) {
    $owner = $_COOKIE['user_id'];
    if (isset($_POST['pre']) && !empty($_POST['pre'])) {
        // Loop through the selected checkboxes
        foreach ($_POST['pre'] as $pre) {
            mysqli_query($conn, "INSERT INTO `userpreferences` (`userId`, `preferenceId`) 
                            VALUES ('$owner', '$pre')");
        }
    } 
    else {
        redirect('../preferances.php');
    }
    redirect('../../index.php');
}
?>