<?php
include "connection.php";
include "functions.php";

if (isset($_POST['postId'])) {
     $post_id = $_POST['postId'];
        $delete_res = mysqli_query($conn, "DELETE FROM threads_posts WHERE post_id = '$post_id'");
        mysqli_query($conn, "UPDATE threads_posts SET replyTo = '-2' WHERE replyTo = '$post_id'");
        if ($delete_res) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success'));
        }else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error'));
        }
}
?>