<?php
include "connection.php";
include "functions.php";

if(isset($_POST['post_submit'])){
    $user_id = $_COOKIE['user_id'];
    $post = mysqli_real_escape_string($conn, test_input( $_POST['freeform']));
    $time = date("H:i:sa");
    $date = date("Y-m-d");
    mysqli_query($conn, "INSERT INTO `posts` (`time`, `date`, `user_id`, `title`, `content`)
                                VALUES ('$time', '$date', '$user_id', 'tentative title', '$post')");

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
        }else {
            redirect('../../index.php?error=filetypenotallowed');
        }
    }
    redirect('../../index.php');
}


?>