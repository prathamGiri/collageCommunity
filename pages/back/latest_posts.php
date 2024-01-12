<?php 
include "connection.php";
include "functions.php";
if (isset($_POST['postType'])) {
    $page = $_SESSION['page'];
    $postType = $_POST['postType'];
    $_SESSION['indexType'] = $postType;
    if ($postType == 'latest') {
        $sql2 = "SELECT *
                    FROM posts
                    ORDER BY post_id DESC 
                    LIMIT 8";
        $res2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($res2) > 0) {
            include "../post_templet.php";
        } 
    }elseif ($postType == 'announcements') {
        $sql2 = "SELECT *
                    FROM posts 
                    WHERE postType = 1
                    ORDER BY post_id DESC
                    LIMIT 8";
        $res2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($res2) > 0) {
            include "../post_templet.php";
        } 
    }elseif ($postType == 'achievements') {
        $sql2 = "SELECT *
                    FROM posts 
                    WHERE postType = 2
                    ORDER BY post_id DESC
                    LIMIT 8";
        $res2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($res2) > 0) {
            include "../post_templet.php";
        } 
    }
    // elseif ($postType == 'events') {
    //     $sql2 = "SELECT *
    //                 FROM events 
    //                 WHERE status = 'upcoming'
    //                 ORDER BY eventId DESC
    //                 LIMIT 8";
    //     $res2 = mysqli_query($conn, $sql2);
    //     if (mysqli_num_rows($res2) > 0) {
    //         include "../post_templet.php";
    //     } 
    // }
}

?>