<?php
include "connection.php";
include "functions.php";

if(isset($_POST['post_submit'])){
    $user_id = $_COOKIE['user_id'];
    $post = mysqli_real_escape_string($conn, test_input( $_POST['freeform']));
    $time = date("H:i:sa");
    $date = date("Y-m-d");
    if (isset($_FILES['image_file'])) {
        $fileName = test_input($_FILES['image_file']['name']);
        $fileNameData = explode('.', $fileName);
        $fileExt = strtolower(end($fileNameData));
        $allowedExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileExt, $allowedExt)) {
            $imageTmp = $_FILES['image_file']['tmp_name'];
            move_uploaded_file($imageTmp, '../../images/post_images/'.$fileName);
        }else {
            redirect('../../index.php?error=filetypenotallowed');
        }
    }
    mysqli_query($conn, "INSERT INTO `posts` (`time`, `date`, `user_id`, `title`, `content`)
                                VALUES ('$time', '$date', '$user_id', 'tentative title', '$post')");
    redirect('../../index.php');
}


?>