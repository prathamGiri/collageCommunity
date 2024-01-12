<?php 
include "connection.php";
include "functions.php";

if (isset($_POST['post_id']) && isset($_POST['opt_type'])) {
     $post_id = $_POST['post_id'];
     $opt_type = $_POST['opt_type'];

     if ($opt_type == 'delete') {
        $delete_res = mysqli_query($conn, "DELETE FROM posts WHERE post_id = '$post_id'");
        if ($delete_res) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success'));
        }else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error'));
        }
     }
}
?>