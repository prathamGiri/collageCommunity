<div id="closediv">
    <a id="closeblock"><i class="ri-close-line"></i></a>
</div>
<div class="main-blk">
    <div class="mem-input">
        <input type="text" class="coname" page="<?php echo $page ?>" id="live_search" placeholder="Search..." required>
    </div> 
    <div>
        <ul>
            <?php
            while ($row4 = mysqli_fetch_assoc($res4)) {
                $userId = $row4['userId'];

                $mem_sql = "SELECT user_name, profile_img 
                            FROM staticcustomerinfo 
                            WHERE user_id = $userId";
                $mem_res = mysqli_query($conn, $mem_sql);
                $mem_row = mysqli_fetch_assoc($mem_res);
            ?>
                <li>
                    <div class="new-mem-info" id="<?php echo $userId; ?>">
                        <div class="user-img"><img src="/collageCommunity/images/profile_img/<?php echo $mem_row['profile_img']; ?>"></div>
                        <div class="user-name"><?php echo base64_decode($mem_row['user_name']); ?></div>
                        <?php
                            $check_sql = "SELECT * FROM threads_membership WHERE userId = $userId AND threadId = $threadId";
                            $check_res = mysqli_query($conn, $check_sql);
                            if (mysqli_num_rows($check_res) > 0) {
                        ?>
                        <div class="add-btn" style="color : black"><i class="ri-close-circle-fill"></i></div>
                        <?php } else{ ?>
                        <div class="add-btn" style="color : #04AA6D"><i class="ri-user-add-fill"></i></div>
                        <?php } ?>
                    </div>
                    
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
