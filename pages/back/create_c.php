<?php
include 'connection.php';
include 'functions.php';

if (isset($_POST['submit'])) {
        $community_name = test_input($_POST['community_name']);
    $discription = test_input($_POST['discription']);
    $collegeId = test_input($_POST['college']);
    $status = test_input($_POST['status']); 
    
    $owner = $_COOKIE['user_id'];
    mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $owner");
    mysqli_query($conn, "INSERT INTO `staticcircleinfo` (`circleName`, `circleDiscription`, `circleStatus`, `collegeId`) 
                            VALUES ('$community_name', '$discription', '$status', '$collegeId')");
        $lastInsertedId = mysqli_insert_id($conn);
        if (isset($_FILES['img']['name']) && $_FILES['event-img']['size'] > 0) {
                $img = test_input($_FILES['img']['name']);
                mysqli_query($conn, "UPDATE staticcircleinfo SET circleLogo = '$img' WHERE circleId = '$lastInsertedId'");
                move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/profile_img/'.$img);
        }
    
    
    $sql = "SELECT circleId FROM staticcircleinfo WHERE circleName = '$community_name'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $circleId = $row['circleId'];
    $sql1 = "INSERT INTO circle_following (`userId`, `circleId`)
            VALUES ('$owner', '$circleId')";
    mysqli_query($conn, $sql1);
    $sql2 = "INSERT INTO circle_membership (`userId`, `circleId`)
            VALUES ('$owner', '$circleId')";
    mysqli_query($conn, $sql2);
    redirect('../community_page.php?commid='.$row['circleId']);
}
?>