<?php
echo '<div id="closediv">
    <a id="closeblock"><i class="ri-close-line"></i></a>
</div>
<div class="main-blk">
    <div class="mem-input">
        <input type="text" class="coname" page="community_page" id="live_search" placeholder="Search..." required>
    </div> 
    <div class="mem-list">
        <ul class="all">';
            while ($row4 = mysqli_fetch_assoc($res4)) {
                $userId = $row4['userId'];

                $mem_sql = "SELECT user_name, profile_img 
                            FROM staticcustomerinfo 
                            WHERE user_id = $userId";
                $mem_res = mysqli_query($conn, $mem_sql);
                $mem_row = mysqli_fetch_assoc($mem_res);
                echo '<li>
                    <div class="new-mem-info" id="'; echo $userId; echo '">
                        <div class="user-img"><img src="/collageCommunity/images/profile_img/'; echo $mem_row['profile_img']; echo '"></div>
                        <div class="user-name">'; echo $mem_row['user_name']; echo '</div>';
                        $check_sql;
                        if ($tag == "thread") {
                            $check_sql = "SELECT * FROM threads_membership WHERE userId = $userId AND threadId = $threadId";
                        }elseif ($tag == "about") {
                            $check_sql = "SELECT * FROM circle_membership WHERE userId = $userId AND circleId = $circle_id";
                        }
                            $check_res = mysqli_query($conn, $check_sql);
                            if (mysqli_num_rows($check_res) > 0) {
                        echo '<div class="add-btn" style="color : black"><i class="ri-close-circle-fill"></i></div>';
                        } else{
                        echo '<div class="add-btn" style="color : #04AA6D"><i class="ri-user-add-fill"></i></div>';
                        }
                    echo '</div>
                    
                </li>';
            }
        echo '</ul>
    </div>
</div>';
?>
