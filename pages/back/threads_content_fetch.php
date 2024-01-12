<?php 
include "connection.php";
include "functions.php";

if (isset($_POST['circle_id']) && isset($_POST['threadId']) && isset($_SESSION['user_id'])) {
    
    unset($_SESSION['postType']);
    $circleId = $_POST['circle_id'];
    $threadId = $_POST['threadId'];
    $_SESSION['threadId'] = $threadId;
    $user_id = $_SESSION['user_id'];
    mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $user_id");
    $unread_msg_display = 0;
    $postSql = "SELECT tp.post_id, tp.threadId, tp.date, tp.time, tp.user_id, tp.content, tp.replyTo, mt.is_read 
                FROM threads_posts AS tp
                JOIN msg_track AS mt
                ON tp.post_id = mt.post_id AND tp.threadId = mt.threadId
                WHERE tp.threadId = $threadId AND mt.user_id = $user_id
                ORDER BY tp.date ASC, tp.time ASC";
    $postRes = mysqli_query($conn, $postSql);
    echo "<div class='wrapper'>";
    if (mysqli_num_rows($postRes) > 0) {
        while ($postRow = mysqli_fetch_assoc($postRes)) {
            $post_id = $postRow['post_id'];
            $is_read = $postRow['is_read'];
            $htmlContent = '';
            if ($unread_msg_display == 0 && $is_read == 0) {
                $htmlContent = $htmlContent.'<div class="new-messages">New Messages</div>';
                $unread_msg_display = 1;
            }            
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
            
                    $htmlContent =  $htmlContent.'<div class="ind-post" id="' . $post_id . '">
                    <div class="msg-options">
                        <div class="reply"><i class="ri-reply-fill"></i></div>
                        <div class="react-thread-msg"><i class="ri-user-smile-fill"></i></div>';
                        if ($post_userId == $user_id) {
                            $htmlContent =  $htmlContent.'<div class="delete-thread-msg"><i class="ri-delete-bin-5-fill"></i></div>';
                        }
                        
                        $htmlContent =  $htmlContent.'</div>
                    <div class="inside">
                        <div class="info-img">
                            <img src="/collageCommunity/images/profile_img/' . $user_info_Row['profile_img'] . '">
                        </div>
                        <div class="info-wrapper">
                            
                            <div class="post-info">
                                <div class="info-text">
                                    <p>' . $user_info_Row['user_name'] . '</p>
                                </div>';
                                if ($postRow['replyTo'] == -1) {
                                    
                                }elseif ($postRow['replyTo'] == -2) {
                                    $htmlContent = $htmlContent.'<div class="reply-to">
                                        <div class="reply-text">
                                            <p>replied to</p>
                                        </div>
                                        <div class="rep-mes-text">
                                            <p class="msg-deleted">Message Deleted</p>
                                        </div>
                                    </div>';
                                }else{
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
                                    $htmlContent = $htmlContent.'<div class="reply-to">
                                        <div class="reply-text">
                                            <p>replied to</p>
                                        </div>
                                        <div class="rep-mes-text">
                                            <p>' . $user_info_Row2['user_name'] . ':' . $rep_row['content'] . '</p>
                                        </div>
                                    </div>';
                                }
                            
                            $htmlContent = $htmlContent . '</div>';
                        
                        
                        if (mysqli_num_rows($res5) > 0) {
                            while ($row5 = mysqli_fetch_assoc($res5)) {
                            
                                $htmlContent = $htmlContent . '<div class="media-block">
                                <img src="/collageCommunity/images/post_images/'.$row5['imageName']. '">
                            </div>';
                        
                        } }
                        
                        
                        $htmlContent = $htmlContent . '<div class="text-block">
                            <p>' . $postRow['content'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>';
                        echo $htmlContent;
            
        }
        
    }
    echo "</div>";
    include "../thread_msg_bar.php";
    mysqli_query($conn, "UPDATE msg_track SET is_read = 1 WHERE user_id = $user_id AND threadId = $threadId");
}