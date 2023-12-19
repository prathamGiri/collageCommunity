<?php 
include "connection.php";
include "functions.php";

if (isset($_POST['postId'])) {
    
    $post_id = $_POST['postId'];
    $postSql = "SELECT * 
    FROM threads_posts
    WHERE post_id = $post_id";
    $postRes = mysqli_query($conn, $postSql);
    if (mysqli_num_rows($postRes) > 0) {
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
            
                    $htmlContent =  '<div class="ind-post" id="' . $post_id . '">
                    <div class="inside">
                        <div class="info-wrapper">
                            <div class="info-img">
                                <img src="/collageCommunity/images/profile_img/' . $user_info_Row['profile_img'] . '">
                            </div>
                            <div class="post-info">
                                <div class="info-text">
                                    <p>' . base64_decode($user_info_Row['user_name']) . '</p>
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
                                $htmlContent = $htmlContent . '<div class="reply-to">
                                    <div class="reply-text">
                                        <p>replied to</p>
                                    </div>
                                    <div class="rep-mes-text">
                                        <p>' . base64_decode($user_info_Row2['user_name']) . ':' . $rep_row['content'] . '</p>
                                    </div>
                                </div>';
                            }
                            
                            $htmlContent = $htmlContent . '</div>
                        </div>';
                        
                        if (mysqli_num_rows($res5) > 0) {
                            while ($row5 = mysqli_fetch_assoc($res5)) {
                            
                                $htmlContent = $htmlContent . '<div class="media-block">
                                <img src="/collageCommunity/images/post_images/'; echo $row5['imageName']; echo '">
                            </div>';
                        
                        } }
                        
                        
                        $htmlContent = $htmlContent . '<div class="text-block">
                            <p>' . $postRow['content'] . '</p>
                        </div>
                    </div>
                </div>';
                        echo $htmlContent;
            
    }
}
