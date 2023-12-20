<?php
$page = "community_page";
include "back/database_connection.php";
$_SESSION['page'] = $page;
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
    
    <div class="main-body">

        <div class="sidebar">
            <div class="pro_images">
                <?php if (mysqli_num_rows($cp_result) > 0) {
                        while ($cp_row = mysqli_fetch_assoc($cp_result)) {
                ?>
                <div class="p_img" id="<?php echo $cp_row['circleId'] ?>"><img src="<?php echo '/collageCommunity/images/profile_img/'.$cp_row['circleLogo'] ?>"></div>
                <?php } } ?>
                <div><a href="/collageCommunity/pages/circles.php"><i class="ri-compass-3-fill"></i></a></div>
            </div>

            <div class="threads">
                <ul>
                    <li id="about"> About</li>
                    <li id="announcement"> Announcement</li>
                    <li id="up_events"> Upcoming Events</li>
                </ul>
                <div>Threads:</div>
                <div id="options">
                    <?php 
                        if (isset($_GET['commid'])) {
                            $_SESSION['commid'] = $_GET['commid'];
                            $_SESSION['postType'] = 0;
                            $circleId = $_SESSION['commid'];
                            } 
                    ?>
                </div>
                <div id="new_thread">
                    <p><i class="ri-add-circle-line"></i>Create New Thread</p>
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
    
    <script src="/collageCommunity/javascript/community_page_js.js"></script>
    <script>
        callAjax(<?php echo $circleId; ?>, 'threads', '#options');
        callAjax(<?php echo $circleId; ?>, 'about', '.posts');
        
    </script>
    <script src="/collageCommunity/javascript/infinite_scroll.js"></script>
</body>
</html>