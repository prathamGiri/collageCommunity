<?php
include 'connection.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $community_name = test_input($_POST['community_name']);
    $discription = test_input($_POST['discription']);
    $status = test_input($_POST['status']); 
    $img = test_input($_FILES['img']['name']);
    $owner = $_COOKIE['user_id'];

    mysqli_query($conn, "INSERT INTO `community_info` (`community_name`, `discription`, `status`,`img`, `owner`) 
                            VALUES ('$community_name', '$discription', '$status', '$img', '$owner')");

    move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/profile_img/'.$img);
    
    $sql = "SELECT * FROM community_info WHERE community_name = '$community_name'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    redirect('../community_page.php?commid='.$row['community_id']);
}
?>