
<div class="ind-post" id="<?php echo $post_id ?>">
    <div class="inside">
        <div class="info-wrapper">
            <div class="info-img">
                <img src="/collageCommunity/images/profile_img/<?php echo $user_info_Row['profile_img']; ?>">
            </div>
            <div class="post-info">
                <div class="info-text">
                    <p><?php echo base64_decode($user_info_Row['user_name']) ?></p>
                </div>
            <?php
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
            ?>
                <div class="reply-to">
                    <div class="reply-text">
                        <p>replied to</p>
                    </div>
                    <div class="rep-mes-text">
                        <p><?php echo base64_decode($user_info_Row2['user_name']) ?>: <?php echo $rep_row['content'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        <?php
        if (mysqli_num_rows($res5) > 0) {
            while ($row5 = mysqli_fetch_assoc($res5)) {
                ?>
            <div class="media-block">
                <img src="/collageCommunity/images/post_images/<?php echo $row5['imageName']; ?>">
            </div>
        <?php
        } }
        ?>
        
        <div class="text-block">
            <p><?php echo $postRow['content'] ?></p>
        </div>
        <!-- <div class="post-options">
            <div class="like opt">
                <i class="ri-thumb-up-line"></i>
                <p>Like</p>
            </div>
            <div class="reply opt">
                <i class="ri-reply-line"></i>
                <p>Reply</p>
            </div>
            <div class="share opt">
                <i class="ri-share-line"></i>
                <p>Share</p>
            </div>
        </div> -->
    </div>
</div>