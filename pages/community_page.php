<?php
$page = "community_page";
include "back/database_connection.php";
$_SESSION['page'] = $page;
if (isset($_SESSION['indexType'])) {
    unset($_SESSION['indexType']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/collageCommunity/css/circlesprofile.css">
    <link rel="stylesheet" href="/collageCommunity/css/threads_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/thread_server_join.js"></script>
    
</head>
<body>
    <?php include 'navbar.php' ?>
    <?php 
        $getcircleId;
        $user_id;
        if (isset($_GET['commid'])) {
            $_SESSION['commid'] = $_GET['commid'];
            $_SESSION['postType'] = 0;
            $getcircleId = $_SESSION['commid'];
        } 
    ?>
    <div class="main-body">
        <div class="sidebar">
            <div class="pro_images">
                <?php 
                if (!isset($_SESSION['login_status'])) {
                    $cp_query1 = "SELECT circleId, circleName, circleLogo
                                FROM staticcircleinfo
                                WHERE circleId = '$getcircleId'";
                    $cp_result1 = mysqli_query($conn, $cp_query1);
                    if (mysqli_num_rows($cp_result1) > 0) {
                        $cp_row1 = mysqli_fetch_assoc($cp_result1);
                        ?>
                        <div class="p_img <?php if ($getcircleId == $cp_row1['circleId']) {
                            echo 'active_circle';
                        } ?>" id="<?php echo $cp_row1['circleId'] ?>">
                        <div class="p_text"><?php echo $cp_row1['circleName'] ?></div>
                        <img src="<?php echo '/collageCommunity/images/profile_img/'.$cp_row1['circleLogo'] ?>"></div>
                        <?php }
                }else if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in'){
                    $user_id = $_SESSION['user_id'];
                    $cp_query1 = "SELECT cf.userId, cf.circleId, sci.circleName, sci.circleLogo
                                FROM circle_following AS cf
                                JOIN staticcircleinfo AS sci
                                ON cf.circleId = sci.circleId
                                WHERE cf.userId = '$user_id' AND cf.circleId = '$getcircleId'";
                    $cp_result1 = mysqli_query($conn, $cp_query1);
                    if (mysqli_num_rows($cp_result1) == 0) {
                        $cp_query2 = "SELECT circleId, circleName, circleLogo
                                FROM staticcircleinfo
                                WHERE circleId = '$getcircleId'";
                        $cp_result2 = mysqli_query($conn, $cp_query2);
                        $cp_row2 = mysqli_fetch_assoc($cp_result2);
                        ?>
                        <div class="p_img <?php echo 'active_circle'; ?>" id="<?php echo $cp_row2['circleId'] ?>">
                        <div class="p_text"><?php echo $cp_row2['circleName'] ?></div>
                        <img src="<?php echo '/collageCommunity/images/profile_img/'.$cp_row2['circleLogo'] ?>"></div>
                        <?php }
                    $cp_query = "SELECT cf.userId, cf.circleId, sci.circleName, sci.circleLogo
                                FROM circle_following AS cf
                                JOIN staticcircleinfo AS sci
                                ON cf.circleId = sci.circleId
                                WHERE cf.userId = '$user_id'";
                    $cp_result = mysqli_query($conn, $cp_query);
                    if (mysqli_num_rows($cp_result) > 0) {
                            while ($cp_row = mysqli_fetch_assoc($cp_result)) {
                ?>
                <div class="p_img <?php if ($getcircleId == $cp_row['circleId']) {
                    echo 'active_circle';
                } ?>" id="<?php echo $cp_row['circleId'] ?>">
                <div class="p_text"><?php echo $cp_row['circleName'] ?></div>
                <img src="<?php echo '/collageCommunity/images/profile_img/'.$cp_row['circleLogo'] ?>"></div>
                <?php } } }?>
                <div class="p_img"><a href="/collageCommunity/pages/circles.php"><i class="ri-compass-3-fill"></i></a></div>
            </div>

            <div class="threads">
                <div class="first-time-follow-btn">
                    
                </div>
                <ul>
                    <li id="about"> About</li>
                    <li id="announcement"> Announcement</li>
                    <li id="up_events"> Upcoming Events</li>
                </ul>
                <div>Threads:</div>
                <div id="options">
                    
                </div>
                <div class="new-thread-wrapper">

                </div>
            </div>
        </div>

        <div class="feed">
                <div class="tags">
                    <a id="posts-btn" class="active">Posts</a>
                    <a id="achievements-btn">Achievements</a>
                    <a id="merch-btn">Merch</a>
                    <a id="about-us-btn">About Us</a>
                </div>
            
            <!-- <div id="msg"></div> -->
            
            <div class="posts">

            </div>
            <div class="ajax-load" id="loader" style="display: none;">
                Loading...
            </div>
        </div>

        <div class="member-bar">

        </div>

        <!-- <div class="test">
            
        </div> -->
        
        <!-- <div class="month-events">
            <h1>
                This Months Events
            </h1>

            <div class="card-container">
            <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Pratham Giri</h2>
                <p>Co-Founder, CEO</p>
            </div>
            </div>
                <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Deep Swarup</h2>
                <p>Co-Founder, CTO</p>
            </div>
            </div>
            <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Dhruv Gupta</h2>
                <p>Co-Founder, COO</p>
            </div>
            </div>


            <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Pratham Giri</h2>
                <p>Co-Founder, CEO</p>
            </div>
            </div>
            <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Deep Swarup</h2>
                <p>Co-Founder, CTO</p>
            </div>
            </div>
            <div class="card">
            <img src="/collageCommunity/images/profile_img/User_icon.png">
            <div class="card-content">
                <h2>Dhruv Gupta</h2>
                <p>Co-Founder, COO</p>
            </div>
            </div>
             </div>
        </div>

        <div class="register-contri">
            <form action="back/user_info.php" method="post">

            
            <div class="clg">
            <label for="College">College:</label>
            <input type="text" id="clg" name="college" required>
            </div>

            <div class="sem">
                <div class="course">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" required>
                </div>
                <div class="graduation year">
                <label for="graduation year">Graduating Year</label>
                <input type="number" id="gradyr" name="graduation year" min="2015" max="2030" step="1" required>
            </div>

            <div class="pr">
                <div class="age">
                <label for="age">Age</label>
                <input type="number_format" id="age" name="age" required>
                </div>
                <div class="gender">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value=""></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option valuue="don't prefer to say">don't prefer to say</option>
                </select>
            </div>

            <div class="domain">
            <label for="domain">Domain of Contribution</label>
            <select name="gender" id="gender" required>
                    <option value=""></option>
                    <option value="1">Corporate</option>
                    <option value="2">Operations</option>
                    <option value="3">Web Development/Tech</option>
                    <option valuue="4">Public Relation</option>
                    <option valuue="5">Research</option>
                    <option value="6">Product Development/Designing</option>
                </select>
            </div>

            <div class="bio">
                <label for="bio">Bio	&#40;include prior experience if any&#41;</label><br>
                <textarea id="bio" name="bio" rows="3" cols="50" required></textarea>
            </div>

            <button type="submit" name="sub-btn">Submit</button>
        </div> -->
    
    </div>
    <div class="floaters">
        
    </div>
    <script src="/collageCommunity/javascript/follow.js"></script>
    <script src="/collageCommunity/javascript/community_page_js.js"></script>
    <script>
        callAjax(<?php echo $getcircleId; ?>, 'threads', '#options');
        callAjax(<?php echo $getcircleId; ?>, 'about', '.posts');
        callCircleInfo(<?php echo $getcircleId; ?>, '.first-time-follow-btn')
        callNewThreadBtn(<?php echo $getcircleId; ?>, '.new-thread-wrapper')
    </script>
    <script src="/collageCommunity/javascript/infinite_scroll.js"></script>
    
</body>
</html>