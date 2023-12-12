<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'pepcircles';

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);
session_start();

// function threadNet($conn, $post_id){
//     $postSql = "SELECT * 
//     FROM threads_posts
//     WHERE post_id = $post_id";
//     $postRes = mysqli_query($conn, $postSql);
//     if (mysqli_num_rows($postRes) > 0) {
//             $postRow = mysqli_fetch_assoc($postRes);
            // $post_userId = $postRow['user_id'];
            // $user_info_sql="SELECT user_name, profile_img
            //                 FROM staticcustomerinfo
            //                 WHERE user_id = $post_userId";
            // $user_info_Res = mysqli_query($conn, $user_info_sql);
            // $user_info_Row = mysqli_fetch_assoc($user_info_Res);
            //         $sql5 ="SELECT tir.post_id,
            //                         tir.image_Id,
            //                         i.imageName
            //                 FROM threads_img_rel AS tir
            //                 JOIN images AS i
            //                 ON tir.image_Id = i.imageId
            //                 WHERE tir.post_id =  $post_id";
            //         $res5 = mysqli_query($conn, $sql5);       
//             include "../threads_post_temp.php";
//             $sub_post_sql = "SELECT * 
//                             FROM threads_rel
//                             WHERE parentPost = $post_id";
//             $sub_res = mysqli_query($conn, $sub_post_sql);
//             if (mysqli_num_rows($sub_res) > 0) {
//                 while ($sub_row = mysqli_fetch_assoc($sub_res)) {
//                     $childId = $sub_row['childPost'];
//                     threadNet($conn, $childId);
//                     echo "</div>";
//                 }
                
//             }
            
//     }
// }

if (isset($_POST['circle_id']) && isset($_POST['threadId']) && isset($_SESSION['user_id'])) {
    
    unset($_SESSION['postType']);
    $circleId = $_POST['circle_id'];
    $threadId = $_POST['threadId'];
    $_SESSION['threadId'] = $threadId;
    $user_id = $_SESSION['user_id'];
    $postSql = "SELECT * 
    FROM threads_posts
    WHERE threadId = $threadId";
    $postRes = mysqli_query($conn, $postSql);
    if (mysqli_num_rows($postRes) > 0) {
        while ($postRow = mysqli_fetch_assoc($postRes)) {
            $post_id = $postRow['post_id'];
            // threadNet($conn, $post_id);
            // echo "</div>";
            $post_userId = $postRow['user_id'];
            $user_info_sql="SELECT user_name, profile_img
                            FROM staticcustomerinfo
                            WHERE user_id = $post_userId";
            $user_info_Res = mysqli_query($conn, $user_info_sql);
            $user_info_Row = mysqli_fetch_assoc($user_info_Res);
                    $sql5 ="SELECT tir.post_id,
                                    tir.image_Id,
                                    i.imageName
                            FROM threads_img_rel AS tir
                            JOIN images AS i
                            ON tir.image_Id = i.imageId
                            WHERE tir.post_id =  $post_id";
                    $res5 = mysqli_query($conn, $sql5);
            include "../threads_post_temp.php";
        }
    }
    include "../create_post.php";
}