<?php
include "database_connection.php";

    $user_id = $_COOKIE['user_id'];
    mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $user_id");
    $post = mysqli_real_escape_string($conn, test_input( $_POST['freeform']));
    $time = date("H:i:sa");
    $date = date("Y-m-d");
    $circleId = $_SESSION['commid'];
    $postType;
    $threadId;
    $post_id;
    $postTable;
    
    $imgtable;
    $responseType;
    if (isset($_SESSION['threadId'])) {
        $responseType = 1;
        $threadId = $_SESSION['threadId'];
        $postTable = 'threads_posts';
        $imgtable = 'threads_img_rel';

        if (isset($_POST['replyPostId'])) {
            $replyPostId = $_POST['replyPostId'];
        }else{
            $replyPostId = -1;
        }
        
        mysqli_query($conn, "INSERT INTO $postTable (`time`, `date`, `user_id`, `content`, `threadId`, `replyTo`)
                                VALUES ('$time', '$date', $user_id, '$post', $threadId, $replyPostId)");
        $msg_res = mysqli_query($conn, "SELECT * FROM $postTable WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
        if (mysqli_num_rows($msg_res) > 0) {
            $msg_row = mysqli_fetch_assoc($msg_res);
            $post_id = $msg_row['post_id'];
            $check_res = mysqli_query($conn, "SELECT userId FROM threads_membership WHERE threadId = $threadId");
            if (mysqli_num_rows($check_res) > 0) {
                while ($crow = mysqli_fetch_assoc($check_res)) {
                    $c_userId = $crow['userId'];
                    if ($user_id == $c_userId) {
                        mysqli_query($conn, "INSERT INTO msg_track (`user_id`, `threadId`, `post_id`, `is_read`)
                                VALUES ($c_userId, $threadId, $post_id, 1)");
                    }else {
                        mysqli_query($conn, "INSERT INTO msg_track (`user_id`, `threadId`, `post_id`)
                                VALUES ($c_userId, $threadId, $post_id)");
                    }
                    
                }
            }
        }
    }
    if (isset($_FILES['image_file']) && $_FILES['image_file']['size'] > 0) {
        $fileName = test_input($_FILES['image_file']['name']);
        $fileNameData = explode('.', $fileName);
        $fileExt = strtolower(end($fileNameData));
        $allowedExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileExt, $allowedExt)) {
            $sql = "INSERT INTO `images` (`imageName`, `time`, `date`, `user_id`) VALUES ('$fileName', '$time', '$date', '$user_id')";
            mysqli_query($conn, $sql);

            $res1 = mysqli_query($conn, "SELECT * FROM $postTable WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
            $res2 = mysqli_query($conn, "SELECT * FROM images WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");

            if (mysqli_num_rows($res1) > 0 and mysqli_num_rows($res2) > 0) {
                $row1 = mysqli_fetch_assoc($res1);
                $row2 = mysqli_fetch_assoc($res2);

                $post_id = $row1['post_id'];
                $image_id = $row2['imageId'];
                mysqli_query($conn, "INSERT INTO $imgtable (`post_id`, `image_Id`)
                                VALUES ('$post_id', '$image_id')");
            }
            $imageTmp = $_FILES['image_file']['tmp_name'];
            move_uploaded_file($imageTmp, '../../images/post_images/'.$fileName); 
        }else {
            echo "<h1> File Format Not Allowed </h1>";
        } 
    }
    if ($responseType == 1) {
        $postSql = "SELECT * 
                    FROM threads_posts
                    WHERE post_id = $post_id";
                    
        $postRes = mysqli_query($conn, $postSql);
                if (mysqli_num_rows($postRes) > 0) {
                        ob_start();
                        $postRow = mysqli_fetch_assoc($postRes);
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

                        $htmlContent = '';
                        $htmlContent = $htmlContent.'<div class="ind-post" id="'. $post_id. '">
                                <div class="msg-options">
                                    <div id="reply"><i class="ri-reply-fill"></i></div>
                                    <div id="react"><i class="ri-user-smile-fill"></i></div>
                                    <div id="delete"><i class="ri-delete-bin-5-fill"></i></div>
                                </div>
                                <div class="inside">
                                    <div class="info-img">
                                        <img src="/collageCommunity/images/profile_img/'. $user_info_Row['profile_img']. '">
                                    </div>
                                    <div class="info-wrapper">
                                        
                                        <div class="post-info">
                                            <div class="info-text">
                                                <p>'. $user_info_Row['user_name']. '</p>
                                            </div>';
                                        if ($postRow['replyTo'] != -1) {
                                            $reply_to_postid = $postRow['replyTo'];
                                            $replysql = "SELECT * FROM threads_posts
                                                            WHERE post_id = $reply_to_postid";
                                            $rep_res = mysqli_query($conn, $replysql);
                                            $rep_row = mysqli_fetch_assoc($rep_res);
                            
                                            $rep_post_userId = $rep_row['user_id'];
                                            $user_info_sql2="SELECT user_name, profile_img
                                                        FROM staticcustomerinfo
                                                        WHERE user_id = $rep_post_userId";
                                            $user_info_Res2 = mysqli_query($conn, $user_info_sql2);
                                            $user_info_Row2 = mysqli_fetch_assoc($user_info_Res2);
                                            $htmlContent = $htmlContent. '<div class="reply-to">
                                                <div class="reply-text">
                                                    <p>replied to</p>
                                                </div>
                                                <div class="rep-mes-text">
                                                    <p>'. $user_info_Row2['user_name']. ':' . $rep_row['content']. '</p>
                                                </div>
                                            </div>';
                                        }
                                        $htmlContent = $htmlContent.'</div>';
                                    
                                    
                                    if (mysqli_num_rows($res5) > 0) {
                                        while ($row5 = mysqli_fetch_assoc($res5)) {
                                        
                                            $htmlContent = $htmlContent.'<div class="media-block">
                                            <img src="/collageCommunity/images/post_images/'. $row5['imageName'].'">
                                        </div>';
                                    
                                    } }
                                    
                                    
                                    $htmlContent = $htmlContent.'<div class="text-block">
                                        <p>'.$postRow['content'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            header('Content-Type: application/json');
                            echo json_encode(array('html' => $htmlContent, 'post_id' => $post_id));
                            
                    }
                }
    
?>