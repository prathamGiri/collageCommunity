<?php
include "connection.php";
include "functions.php";

if (isset($_POST['postId'])) {
    $post_id = $_POST['postId'];
    $sql = "SELECT tp.content, sci.user_name
            FROM threads_posts AS tp
            JOIN staticcustomerinfo AS sci
            ON sci.user_id = tp.user_id
            WHERE tp.post_id = $post_id";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $htmlContent = '<div class="reply-text">
                            <p>replied to</p>
                        </div>
                        <div class="rep-mes-text">
                            
                        </div><p>'.base64_decode($row['user_name']).' : '.$row['content'].'</p>';
        echo $htmlContent;
    }
}