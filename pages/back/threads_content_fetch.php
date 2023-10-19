<?php 
require_once "database_connection.php";

if (isset($_POST['circle_id']) && isset($_POST['threadId']) && isset($_SESSION['user_id'])) {
    $circleId = $_POST['circle_id'];
    $threadId = $_POST['threadId'];
    $user_id = $_SESSION['user_id'];
        $postSql = "SELECT * 
                    FROM threads_posts
                    WHERE threadId = $threadId";
        $postRes = mysqli_query($conn, $postSql);
                if (mysqli_num_rows($postRes) > 0) {
                    while ($postRow = mysqli_fetch_assoc($postRes)) {
                        echo '<div class="ind_post">
                            <div class="head_post">
                                <img src="/collageCommunity/images/logo.png" alt="">
                                <span>Titel of the circle</span>
                            </div>
                            <hr>
                            <h3>' ;
                        echo $postRow['title']; 
                        echo '</h3>';
                        echo '<p>';
                        echo $postRow['content'];
                        echo '</p>';
                        $post_id = $postRow['post_id'];
                        $sql5 ="SELECT tir.post_id,
                                        tir.image_Id,
                                        i.imageName
                                FROM threads_img_rel AS tir
                                JOIN images AS i
                                ON tir.image_Id = i.imageId
                                WHERE tir.post_id =  '$post_id'";
                        $res5 = mysqli_query($conn, $sql5);
                        if (mysqli_num_rows($res5) > 0) {
                            while ($row5 = mysqli_fetch_assoc($res5)) {
                                echo '<div class = "post-image">
                                                <img src="/collageCommunity/images/post_images/'; 
                                echo $row5['imageName'];
                                echo '" alt="image">
                                        </div>';
                                }
                            }
                        echo '</div>';
                    }
                }
}