<?php
include "database_connection.php";

// if(isset($_POST['post_submit'])){
    $user_id = $_COOKIE['user_id'];
    $post = mysqli_real_escape_string($conn, test_input( $_POST['freeform']));
    $time = date("H:i:sa");
    $date = date("Y-m-d");
    $circleId = $_SESSION['commid'];
    $postType = $_SESSION['postType'];
    $post_id;
    mysqli_query($conn, "INSERT INTO `posts` (`time`, `date`, `user_id`, `title`, `content`, `circleId`, `postType`)
                                VALUES ('$time', '$date', $user_id, 'tentative title', '$post', $circleId, $postType)");
    
    if (isset($_FILES['image_file'])) {
        $fileName = test_input($_FILES['image_file']['name']);
        $fileNameData = explode('.', $fileName);
        $fileExt = strtolower(end($fileNameData));
        $allowedExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileExt, $allowedExt)) {
            $sql = "INSERT INTO `images` (`imageName`, `time`, `date`, `user_id`) VALUES ('$fileName', '$time', '$date', '$user_id')";
            mysqli_query($conn, $sql);

            $res1 = mysqli_query($conn, "SELECT * FROM posts WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");
            $res2 = mysqli_query($conn, "SELECT * FROM images WHERE user_id = '$user_id' and `time` = '$time' and `date` = '$date'");

            if (mysqli_num_rows($res1) > 0 and mysqli_num_rows($res2) > 0) {
                $row1 = mysqli_fetch_assoc($res1);
                $row2 = mysqli_fetch_assoc($res2);

                $post_id = $row1['post_id'];
                $image_id = $row2['imageId'];
                mysqli_query($conn, "INSERT INTO `image_rel` (`post_id`, `image_Id`)
                                VALUES ('$post_id', '$image_id')");
            }
            $imageTmp = $_FILES['image_file']['tmp_name'];
            move_uploaded_file($imageTmp, '../../images/post_images/'.$fileName);

            $postSql = "SELECT * 
                    FROM posts
                    WHERE post_id = $post_id";
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
        }else {
            echo "<h1> File Format Not Allowed </h1>";
        }
    }
// }
?>