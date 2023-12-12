<?php
include "connection.php";
include "functions.php";
if ($_SESSION['page'] == "home") {
   $sql = "SELECT * FROM posts
         WHERE post_id < '".$_GET['last_id']."' ORDER BY post_id DESC LIMIT 8";
}else if ($_SESSION['page'] == "community_page") {
   if (isset($_SESSION['postType'])) {
      $sql = "SELECT * FROM posts
               WHERE postType = '".$_SESSION['postType']."' 
               AND circleid = '".$_SESSION['commid']."' 
               AND post_id < '".$_GET['last_id']."' 
               ORDER BY post_id DESC 
               LIMIT 8";
   }elseif (isset($_SESSION['topic'])) {
      $sql = "SELECT * FROM merch
               AND circleid = '".$_SESSION['commid']."' 
               AND merchId < '".$_GET['last_id']."' 
               ORDER BY post_id DESC 
               LIMIT 8";
   }
    
}

$res2 = mysqli_query($conn, $sql);
$json = include('../post_templet.php');
echo json_encode($json);
   
?>