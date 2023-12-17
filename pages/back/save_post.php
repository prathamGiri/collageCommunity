<?php
include "database_connection.php";


    $user_id = $_COOKIE['user_id'];
    $post = mysqli_real_escape_string($conn, test_input( $_POST['freeform']));
    $time = date("H:i:sa");
    $date = date("Y-m-d");
    $circleId = $_SESSION['commid'];
    $postType;
    $threadId;
    $post_id;
    $postTable;
    $imgtable;
    $responseType;
    if(isset($_SESSION['postType'])){
        $responseType = 0;
        $postType = $_SESSION['postType'];
        $postTable = 'posts';
        $imgtable = 'image_rel';
        mysqli_query($conn, "INSERT INTO $postTable (`time`, `date`, `user_id`, `title`, `content`, `circleId`, `postType`)
                                VALUES ('$time', '$date', $user_id, 'tentative title', '$post', $circleId, $postType)");
        $msg_res = mysqli_query($conn, "SELECT * FROM $postTable WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
        if (mysqli_num_rows($msg_res) > 0) {
            $msg_row = mysqli_fetch_assoc($msg_res);
            $post_id = $msg_row['post_id'];
        }
    }elseif (isset($_SESSION['threadId'])) {
        $responseType = 1;
        $threadId = $_SESSION['threadId'];
        $postTable = 'threads_posts';
        $imgtable = 'threads_img_rel';
        mysqli_query($conn, "INSERT INTO $postTable (`time`, `date`, `user_id`, `title`, `content`, `threadId`)
                                VALUES ('$time', '$date', $user_id, 'tentative title', '$post', $threadId)");
        $msg_res = mysqli_query($conn, "SELECT * FROM $postTable WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
        if (mysqli_num_rows($msg_res) > 0) {
            $msg_row = mysqli_fetch_assoc($msg_res);
            $post_id = $msg_row['post_id'];
            $check_res = mysqli_query($conn, "SELECT userId FROM threads_membership WHERE threadId = $threadId");
            if (mysqli_num_rows($check_res) > 0) {
                while ($crow = mysqli_fetch_assoc($check_res)) {
                    $c_userId = $crow['userId'];
                    mysqli_query($conn, "INSERT INTO msg_track (`user_id`, `threadId`, `post_id`)
                                VALUES ($c_userId, $threadId, $post_id)");
                }
            }
            
        }
    }
    if (isset($_FILES['image_file']) && $_FILES['image_file']['size'] > 0) {
        $fileName = test_input($_FILES['image_file']['name']);
        $fileNameData = explode('.', $fileName);
        $fileExt = strtolower(end($fileNameData));
        $allowedExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileExt, $allowedExt)) {
            $sql = "INSERT INTO `images` (`imageName`, `time`, `date`, `user_id`) VALUES ('$fileName', '$time', '$date', '$user_id')";
            mysqli_query($conn, $sql);

            $res1 = mysqli_query($conn, "SELECT * FROM $postTable WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
            $res2 = mysqli_query($conn, "SELECT * FROM images WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");

            if (mysqli_num_rows($res1) > 0 and mysqli_num_rows($res2) > 0) {
                $row1 = mysqli_fetch_assoc($res1);
                $row2 = mysqli_fetch_assoc($res2);

                $post_id = $row1['post_id'];
                $image_id = $row2['imageId'];
                mysqli_query($conn, "INSERT INTO $imgtable (`post_id`, `image_Id`)
                                VALUES ('$post_id', '$image_id')");
            }
            $imageTmp = $_FILES['image_file']['tmp_name'];
            move_uploaded_file($imageTmp, '../../images/post_images/'.$fileName); 
        }else {
            echo "<h1> File Format Not Allowed </h1>";
        } 
    }
    if($responseType == 0){
        $postSql = "SELECT * FROM posts WHERE post_id = $post_id";
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
                            $sql5 ="SELECT ir.post_id,
                                            ir.image_Id,
                                            i.imageName
                                    FROM image_rel AS ir
                                    JOIN images AS i
                                    ON ir.image_Id = i.imageId
                                    WHERE ir.post_id = $post_id";
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
    }else if ($responseType == 1) {
        $postSql = "SELECT * 
                    FROM threads_posts
                    WHERE threadId = $threadId AND post_id = $post_id";
        $postRes = mysqli_query($conn, $postSql);
                if (mysqli_num_rows($postRes) > 0) {
                    while ($postRow = mysqli_fetch_assoc($postRes)) {
                        $post_userId = $postRow['user_id'];
                        $user_info_sql="SELECT user_name, profile_img
                                        FROM staticcustomerinfo
                                        WHERE user_id = $post_userId";
                        $user_info_Res = mysqli_query($conn, $user_info_sql);
                        $user_info_Row = mysqli_fetch_assoc($user_info_Res);
                        echo '<div class="ind-thread-post-wrapper"';
                            if ($post_userId == $user_id) {
                                echo 'style="justify-content: right;"';
                            }; 
                        echo '>
                            <div class="ind-thread-post"';
                            if ($post_userId == $user_id) {
                                echo 'style="background-color: #04AA6D;"';
                            };
                            
                            echo '>
                                <div class="post-gap">
                                <div class="post-info">
                                    <div class="info-img">
                                        <img src="/collageCommunity/images/profile_img/'.$user_info_Row['profile_img']; 
                                        echo '">
                                    </div>
                                    <div class="info-text">
                                        <p>'.base64_decode($user_info_Row['user_name']); 
                                        echo '</p>
                                    </div>
                                </div>';
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
                                        echo '<div class="media-block">
                                            <img src="/collageCommunity/images/post_images/'.$row5['imageName']; 
                                            echo '">
                                        </div>';
                                    }
                                }
                                echo '<div class="text-block">
                                    <p>';
                                echo $postRow['content'];
                                echo '</p>
                                </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
    }
    
?>