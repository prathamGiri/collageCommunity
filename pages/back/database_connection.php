<?php
include "connection.php";
include "functions.php";

$sql = "SELECT *
            FROM staticcircleinfo";
$sql2 = "SELECT *
            FROM posts";
$res = mysqli_query($conn, $sql);
$res2 = mysqli_query($conn, $sql2);
$user_id;
if (isset($_COOKIE["user_info"]) && isset($_COOKIE["password"]) && isset($_COOKIE["user_id"])) {
    $_SESSION['login_status'] = "logged_in";
    $_SESSION['user_id'] = $_COOKIE["user_id"];
    $user_id = $_SESSION['user_id'];
}

?>