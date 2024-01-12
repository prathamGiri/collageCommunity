<?php 
require_once "database_connection.php";

if (isset($_POST['circle_id']) && isset($_POST['topic'])) {
    if (isset($_SESSION['threadId'])) {
        unset($_SESSION['threadId']);
    }
    $logged_in = FALSE;
    $user_id;
    if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
        $logged_in = TRUE;
        $user_id = $_SESSION['user_id'];
        mysqli_query($conn, "UPDATE `staticcustomerinfo` SET last_activity_timestamp = NOW() WHERE user_id = $user_id");
    }
    $circleId = $_POST['circle_id'];
    $_SESSION['commid'] = $circleId;
    $topic = $_POST['topic'];
    $page = $_SESSION['page'];
    if ($topic == 'threads') {
        if ($logged_in) {
            $unread_count;
            $t_query = "SELECT t.threadId, t.threadName
                        FROM threads_membership AS tm
                        JOIN threads AS t
                        ON tm.threadId = t.threadId
                        WHERE tm.userId = $user_id AND t.circleId = $circleId";
            $t_result = mysqli_query($conn, $t_query);
            
            
            if (mysqli_num_rows($t_result) > 0) {
                echo '<ul class="thread-list">';
                while ($row = mysqli_fetch_assoc($t_result)) {
                    $threadId = $row['threadId'];
                    $count_query = "SELECT COUNT(post_id) AS post_count
                            FROM msg_track
                            WHERE threadId = $threadId AND user_id = $user_id AND is_read = 0";
                    $count_res = mysqli_query($conn, $count_query);
                    if (mysqli_num_rows($count_res) > 0) {
                        $count_row = mysqli_fetch_assoc($count_res);
                        $unread_count = $count_row['post_count'];
                    }
                    echo '<li class="threadopt" id="'.$row['threadId'].'"><div>'.$row['threadName'].'</div>';
                    if ($unread_count > 0) {
                        echo '<div class="unread-count">'.$unread_count.'</div>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
            }
        }
    }else if ($topic == 'post' && isset($_POST['postType'])) {
        if ($logged_in) {
            $mem_sql = "SELECT * 
                        FROM circle_membership
                        WHERE circleId = $circleId AND userId = $user_id";
            $mem_res = mysqli_query($conn, $mem_sql);
            if (mysqli_num_rows($mem_res) > 0) {
                    $mem_row = mysqli_fetch_assoc($mem_res);
                    if ($mem_row['userId'] == $user_id) {
                        include "../create_post.php";
                    }
            }
        }
        
        $post_type = $_POST['postType'];
        $_SESSION['postType'] = $post_type;
        $postSql = "SELECT * 
                    FROM posts
                    WHERE postType = $post_type AND circleId = $circleId
                    ORDER BY date DESC, time DESC LIMIT 8";
        $res2 = mysqli_query($conn, $postSql);
                if (mysqli_num_rows($res2) > 0) {
                    echo '<div id="posts">';
                    include "../post_templet.php";
                    echo '</div>';
                }
    }else if ($topic == 'merch') {
        if (isset($_SESSION['postType'])) {
            unset($_SESSION['postType']);
        }
        $_SESSION['topic'] = 'merch';
        $merchSql ="SELECT *
                    FROM merch
                    WHERE circleId = $circleId
                    ORDER BY merchId DESC";
        $merchResult = mysqli_query($conn, $merchSql);
        if (mysqli_num_rows($merchResult) > 0) {
            echo '<div class="events">
                        <div class="card-container">';
            while ($merchRow = mysqli_fetch_assoc($merchResult)) {
                            echo '<div class="merch-card">
                                    <div class="merch-box" id="';
                                    echo $merchRow['merchId'];
                                    echo '">
                                    <img src="/collageCommunity/images/merch_img/';
                                    echo $merchRow['merchImg'];
                                    echo '">
                                    <div class="card-content">
                                        <h2>';
                                    echo $merchRow['merchName'];
                                    echo '</h2>
                                        <p>Rs. ';
                                    echo $merchRow['merchPrise'];
                                    echo '</p>
                                    </div>
                                </div>
                                <div class="more-info" id="';
                                echo $merchRow['merchId'];
                                echo '"></div>
                            </div>';
            } 
            echo '</div>
            </div>';
        }else {
            echo '<h1>NO Merch Available</h1>';
        }
    }else if ($topic == "about_page") {
        echo 
        '<div class="profile-section">
            <div class="profile-main">';
                    $circle_sql = "SELECT circleName, circleLogo, circleDiscription, circleBanner
                                    FROM staticcircleinfo
                                    WHERE circleId = '$circleId'";
                    $circle_res = mysqli_query($conn, $circle_sql);
                    if(mysqli_num_rows($circle_res) > 0){
                        $circle_row = mysqli_fetch_assoc($circle_res);

                        echo '<div class="banner">
                            <img src="../images/banners/';
                        echo $circle_row['circleBanner'];
                        echo '">';
                        echo '</div>
                        <div class="profile">
                            <div>
                                <img src="../images/profile_img/';
                        echo $circle_row['circleLogo'];
                        echo '" alt="">';
                        echo '</div>
                            <div class="content">
                                <div class="circle-name-wrapper">
                                    <div class="circle-name">
                                <h1>';
                        echo $circle_row['circleName'];
                        echo '</h1>
                                </div>';
                                if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM circle_membership WHERE circleId = '$circleId' AND userId = '$user_id'";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        echo '<div class="edit">
                                            <i class="ri-edit-2-line"></i>
                                        </div>';
                                    }
                                }
                                echo '</div>
                                <p>';
                        echo $circle_row['circleDiscription'];
                        echo '</p>
                            </div>
                        </div>';
                    }
                echo '</div>
            <div class="card-container">';
                    $circle_mem_sql = "SELECT cm.position, sci.user_id, sci.user_name, sci.profile_img
                                        FROM circle_membership AS cm
                                        JOIN staticcustomerinfo AS sci
                                        ON cm.userId = sci.user_id
                                        WHERE circleId = '$circleId'";
                    $circle_mem_res = mysqli_query($conn, $circle_mem_sql);
                    if (mysqli_num_rows($circle_mem_res) > 0) {
                        while ($circle_mem_row = mysqli_fetch_assoc($circle_mem_res)) {
                echo '<div class="card">
                    <img src="/collageCommunity/images/profile_img/';
                echo $circle_mem_row['profile_img'];
                echo '">
                    <div class="card-content">
                        <h2>';
                echo $circle_mem_row['user_name'];
                echo '</h2>
                        <p>';
                echo $circle_mem_row['position'];
                echo '</p>
                    </div>
                </div>';
                } }
            echo '</div>
        </div>';
    }
}