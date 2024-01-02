<?php
include "connection.php";
include "functions.php";
if ($_SESSION['page'] == "home") {
   if (isset($_SESSION['indexType'])) {
      if ($_SESSION['indexType'] == "latest") {
         $sql = "SELECT * FROM posts
                  WHERE post_id < '".$_GET['last_id']."' ORDER BY post_id DESC LIMIT 8";
      }elseif ($_SESSION['indexType'] == "announcements") {
         $sql = "SELECT * FROM posts
                  WHERE postType = 1 AND post_id < '".$_GET['last_id']."' ORDER BY post_id DESC LIMIT 8";
      }elseif ($_SESSION['indexType'] == "achievements") {
         $sql = "SELECT * FROM posts
                  WHERE postType = 2 AND post_id < '".$_GET['last_id']."' ORDER BY post_id DESC LIMIT 8";
      }elseif ($_SESSION['indexType'] == "events") {
         // $sql = "SELECT * FROM posts
         //          WHERE post_id < '".$_GET['last_id']."' ORDER BY post_id DESC LIMIT 8";
      }
  }
   
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
if (mysqli_num_rows($res2) > 0) {
   $json = include '../post_templet.php';
   echo $json;
}

   
?>