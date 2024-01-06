<?php
include "connection.php";
include "functions.php";

if (isset($_POST['circle_id'])) {
    $circleId = $_POST['circle_id'];
    $circle_res = mysqli_query($conn, "SELECT * FROM staticcircleinfo WHERE circleId = '$circleId'");
    if (mysqli_num_rows($circle_res) > 0) {
        $circle_row = mysqli_fetch_assoc($circle_res);
        $htmlContent = '';
        if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
            $userId = $_SESSION['user_id'];
            $check_res = mysqli_query($conn, "SELECT * FROM circle_following WHERE userId='$userId' AND circleId='$circleId'");
            if (mysqli_num_rows($check_res) > 0) {
                $htmlContent .= '<div id="circle-name">
                                    '.$circle_row['circleName'].'
                                </div>
                                <div id="follow-btn-wrapper">
                                    <div class="unfollow" id="'.$circle_row['circleId'].'">Unfollow</div>
                                </div>';
                header('Content-Type: application/json');
                echo json_encode(array('status' => 'already_follower', 'html' => $htmlContent));
            }else{
                $htmlContent .= '<div id="circle-name">
                                    '.$circle_row['circleName'].'
                                </div>
                                <div id="follow-btn-wrapper">
                                    <div class="follow" id="'.$circle_row['circleId'].'">Follow</div>
                                </div>';
                header('Content-Type: application/json');
                echo json_encode(array('status' => 'not_follower', 'html' => $htmlContent));
            }
        }else{
            $htmlContent .= '<div id="circle-name">
                                    '.$circle_row['circleName'].'
                                </div>
                                <div id="follow-btn-wrapper">
                                    <div class="register_first">Follow</div>
                                </div>';
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'not_logged', 'html' => $htmlContent));
        }
    }
}



?>