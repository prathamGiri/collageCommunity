

<div class="ind-post" id="<?php echo $post_id ?>">
    <div class="inside">
        <div class="post-info">
            <div class="info-img">
                <img src="/collageCommunity/images/profile_img/<?php echo $user_info_Row['profile_img']; ?>">
            </div>
            <div class="info-text">
                <p><?php echo base64_decode($user_info_Row['user_name']) ?></p>
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
        <div class="post-options">
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
        </div>
    </div>