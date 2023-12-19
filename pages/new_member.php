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
                    <div class="new-mem-info">
                        <div class="user-img"><img src="/collageCommunity/images/profile_img/<?php echo $mem_row['profile_img']; ?>"></div>
                        <div class="user-name"><?php echo base64_decode($mem_row['user_name']); ?></div>
                        <div class="add-btn"><i class="ri-user-add-fill"></i></div>
                    </div>
                    
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
