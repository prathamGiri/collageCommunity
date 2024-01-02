<?php
include "connection.php";
include "functions.php";

if (isset($_POST['button_clicked']) && $_POST['button_clicked'] == 'true') {
    $circleId = $_SESSION['edit_circleId'];
    echo $circleId;
    unset($_SESSION['edit_circleId']);
    if (isset($_FILES['banner']['name']) && $_FILES['banner']['size'] > 0) {
        $banner = test_input($_FILES['banner']['name']);
        echo $banner;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET circleBanner = '$banner' WHERE circleId = $circleId");
        move_uploaded_file($_FILES['banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/banners/'.$banner);
    }
    if (isset($_FILES['logo']['name']) && $_FILES['logo']['size'] > 0) {
        $logo = test_input($_FILES['logo']['name']);
        echo $logo;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET circleLogo = '$logo' WHERE circleId = $circleId");
        move_uploaded_file($_FILES['logo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/profile_img/'.$logo);
    }
    if (isset($_POST['circle-name'])) {
        $circleName = test_input($_POST['circle-name']);
        echo $circleName;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET circleName = '$circleName' WHERE circleId = $circleId");
    }
    if (isset($_POST['desc-txt'])) {
        $circleDisc = test_input($_POST['desc-txt']);
        echo $circleDisc;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET circleDiscription = '$circleDisc' WHERE circleId = $circleId");
    }
    if (isset($_POST['status'])) {
        $status = test_input($_POST['status']);
        echo $status;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET circleStatus = $status WHERE circleId = $circleId");
    }
    if (isset($_POST['collegeid'])) {
        $collegeid = test_input($_POST['collegeid']);
        echo $collegeid;
        mysqli_query($conn, "UPDATE `staticcircleinfo` SET collegeId = '$collegeid' WHERE circleId = $circleId");
    }
}
?>