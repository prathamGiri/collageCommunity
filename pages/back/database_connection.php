<?php
include "connection.php";
include "functions.php";

$sql = "SELECT *
            FROM staticcircleinfo";
$sql2 = "SELECT *
            FROM posts";

$res = mysqli_query($conn, $sql);
$res2 = mysqli_query($conn, $sql2);

$user_id;
$institute; 
$city;
$state;
$country;

if (isset($_COOKIE["user_info"]) && isset($_COOKIE["password"]) && isset($_COOKIE["user_id"])) {
    $_SESSION['login_status'] = "logged_in";
    $_SESSION['user_id'] = $_COOKIE["user_id"];
    $user_id = $_SESSION['user_id'];
}
if (isset($user_id) && isset($page)) {
    if ($page == "home" || $page == "circles") {
        $sql3 = "SELECT *
            FROM staticcustomerinfo
            WHERE user_id = '$user_id'";
        $res3 = mysqli_query($conn, $sql3);
    }

    if ($page == "profile") {
        $sql3 = "SELECT sci.user_id, sci.user_name, sci.profile_img, sci.banner, sci.graduating_year, sci.gender, sci.collegeId, c.collegeName, c.city, c.state, c.country
            FROM staticcustomerinfo AS sci
            JOIN colleges AS c
            ON sci.collegeId = c.collegeId
            WHERE user_id = '$user_id'";
        $res3 = mysqli_query($conn, $sql3);
    }

    if ($page == "circles") {
        $sql3 = "SELECT sci.user_id, sci.user_name, sci.collegeId, c.collegeName, c.city, c.state, c.country
            FROM staticcustomerinfo AS sci
            JOIN colleges AS c
            ON sci.collegeId = c.collegeId
            WHERE user_id = '$user_id'";
        $res3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($res3) > 0) {
            $row3 = mysqli_fetch_assoc($res3);
        $collegeId = $row3["collegeId"];
        $college_query = "SELECT *
            FROM colleges 
            WHERE collegeId = '$collegeId'";
        
        $college_result = mysqli_query($conn, $college_query);
        if (mysqli_num_rows($college_result) > 0) {
            $college_row = mysqli_fetch_assoc($college_result);

            $institute = $college_row['collegeName'];
            $city = $college_row['city'];
            $state = $college_row['state'];
            $country = $college_row['country'];

            $sql4 = "SELECT circleId, circleName, circleLogo
            FROM staticcircleinfo
            WHERE collegeId = '$collegeId'";
            $res4 = mysqli_query($conn, $sql4); 

            $sql5 = "SELECT sci.circleId, sci.circleName, sci.circleLogo, co.city
            FROM staticcircleinfo AS sci
            JOIN colleges AS co
            ON sci.collegeId = co.collegeId
            WHERE co.city = '$city'";
            $res5 = mysqli_query($conn, $sql5);

            $sql6 = "SELECT sci.circleId, sci.circleName, sci.circleLogo, co.state
            FROM staticcircleinfo AS sci
            JOIN colleges AS co
            ON sci.collegeId = co.collegeId
            WHERE co.state = '$state'";
            $res6 = mysqli_query($conn, $sql6);

            $sql7 = "SELECT sci.circleId, sci.circleName, sci.circleLogo, co.country
            FROM staticcircleinfo AS sci
            JOIN colleges AS co
            ON sci.collegeId = co.collegeId 
            WHERE co.country = '$country'";
            $res7 = mysqli_query($conn, $sql7);
        }
        }
        
    }
    if ($page == "preferences") {
        $pre_query = "SELECT *
            FROM preferences";
         
        $pre_result = mysqli_query($conn, $pre_query);
    }
    if ($page == "community_page") {
        // $cp_query = "SELECT tm.userId, MIN(tm.threadId) AS tid, t.circleId, t.threadName, sci.circleName, sci.circleLogo
        //     FROM threads_membership as tm
        //     JOIN threads as t
        //     ON tm.threadId = t.threadId
        //     JOIN staticcircleinfo as sci
        //     ON t.circleId = sci.circleId
        //     WHERE tm.userId = '$user_id'";
        $cp_query = "SELECT cf.userId, cf.circleId, sci.circleName, sci.circleLogo
                        FROM circle_following AS cf
                        JOIN staticcircleinfo AS sci
                        ON cf.circleId = sci.circleId
                        WHERE cf.userId = '$user_id'";
        $cp_result = mysqli_query($conn, $cp_query);
    }
}
    
?>