<?php
include "connection.php";
include "functions.php";

if (isset($_POST['circle_id']) & isset($_POST['threadId'])) {
    $circle_id = $_POST['circle_id'];
    $threadId = $_POST['threadId'];
    $htmlContent = '';
    $member_sql = "SELECT tm.userId, sci.user_name, sci.last_activity_timestamp,
                        CASE WHEN TIMESTAMPDIFF(MINUTE, sci.last_activity_timestamp, NOW()) > 5 THEN 1 ELSE 0 END AS is_inactive
                    FROM threads_membership AS tm 
                    JOIN staticcustomerinfo AS sci 
                    ON tm.userId = sci.user_id
                    WHERE tm.threadId = $threadId";
    $res = mysqli_query($conn, $member_sql);
    if (mysqli_num_rows($res) > 0) {
        $htmlContent = $htmlContent.'<div class="main-member-wrapper">
            <div id="memb-head">Members:</div>
            <div class="memb-list"><ul>';
        while ($row = mysqli_fetch_assoc($res)) {
            $htmlContent = $htmlContent.'<li><div class="memb-name">'.base64_decode($row['user_name']).'</div>';
            if ($row['is_inactive'] == 1) {
                $htmlContent = $htmlContent.'<div class="memb-status" style="background-color:white; border:1px black solid;"></div></li>';
            }else{
                $htmlContent = $htmlContent.'<div class="memb-status" style="background-color:green;"></div></li>';
            }
        }

        $htmlContent = $htmlContent.'</ul><div id="new-member">Add New Member</div></div></div>';
    }
}

echo $htmlContent;

?>