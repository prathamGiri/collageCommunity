<?php
$page = "home";
include "pages/back/database_connection.php";
$_SESSION['page'] = $page;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepcircles</title>

    <!-- <link rel="shortcut icon" href="/images/logo.png" /> -->

    <link rel="stylesheet" href="/collageCommunity/css/index.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    include "pages/navbar.php";
    if (isset($_SESSION['fresh_register'])) {
    ?>
        <div class="msg">
            <p>Registered Successfully!</p>
        </div>
    <?php
        unset($_SESSION['fresh_register']);
    } elseif (isset($_SESSION['fresh_login'])) {
    ?>
        <div class="msg">
            <p>Logged In Successfully!</p>
        </div>
    <?php
        unset($_SESSION['fresh_login']);
    }elseif (isset($_SESSION['logged_out'])) {
    ?>
        <div class="msg">
            <p>Logged Out Successfully!</p>
        </div>
    <?php
        unset($_SESSION['logged_out']);
    }
    ?>
    
    <div class="main">
        <!-- Left Side  -->
        <div class="comm_bar">
            <div class="create">
                <a href="pages/create_comm.php" id="comm">
                    <div><i class="ri-add-line"></i>
                        <p>Create a New Circle</p>
                    </div>
                </a>
            </div>
            <?php
            if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'logged_in') {
            ?>
            <div class="sub_comm_bar">
                <h3 class="head">Communities:</h3>
                <ul>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li>
                                <a href="pages/community_page.php?commid=<?php echo $row['circleId'] ?>">
                                    <h3><?php echo $row['circleName']; ?></h3>
                                    <p>Members : <?php echo $row['followerCount']; ?></p>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

                <div class="show_more">
                    <h3 class="head"><a href="pages/circles.php">Show more</a></h3>
                </div>
            </div>
            <?php }else{
            ?>
            <div class="sub_comm_bar">
                <h3 class="head">Communities:</h3>
                <ul>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $i = 0;
                    ?>
                            <li>
                                <a href="pages/community_page.php?commid=<?php echo $row['circleId'] ?>">
                                    <h3><?php echo $row['circleName']; ?></h3>
                                    <p>Members : <?php echo $row['followerCount']; ?></p>
                                </a>
                            </li>
                    <?php
                        $i = $i + 1;
                            if ($i > 4) {
                                break;
                            }
                        }
                    }
                    ?>
                </ul>

                <div class="show_more">
                    <h3 class="head"><a href="pages/circles.php">Show more</a></h3>
                </div>
            </div>
            <?php
            } ?>
        </div>
        <!-- Middle Part -->
        <div class="feed">

            <div class="tags">
                <a class="ind-tag current" id="latest-posts">Latest</a>
                <a class="ind-tag" id="announcements">Announcements</a>
                <a class="ind-tag" id="achievements">Achievements</a>
                <a class="ind-tag" id="events">Events</a>
            </div>
            <div class="posts" id="posts">
            </div>
            <div class="ajax-load" id="loader" style="display: none;">
                Loading...
            </div>
        </div>

        <div class="right_side">
                <?php 
                    if (isset($_SESSION['login_status'])) {
                        if (mysqli_num_rows($res3) > 0) {
                            $row3 = mysqli_fetch_assoc($res3);
                ?>
            <a href="pages/profile_page.php">
                <div class="profile" id="profile">
                    <div class="img">
                        <img src="<?php echo "images/profile_img/".$row3['profile_img']; ?>">
                    </div>
                    <div class="info">
                        <p><?php echo $row3['user_name']; ?></p>
                        <p><?php $row3['about']; ?></p>
                    </div>

                    <!-- <div class="pro_cir">
                        <p>Your circles : 5</p>
                        <p>Members : 500</p>
                    </div> -->
                </div>
            </a>
            
            <!-- <div class="sub_comm_bar" id="recent">
                <h3 class="head">Recent Posts:</h3>
                <ul>
                    <li>
                        <a href="#">
                            <h3>This_Community</h3>
                            <p>Community Discription</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>This_Community</h3>
                            <p>Community Discription</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>This_Community</h3>
                            <p>Community Discription</p>
                        </a>
                    </li>
                </ul>
            </div> -->
            <?php } } else{ ?>
                <div class="profile">
                    <div class = "info">
                        <p>PepCircle is a platform for collage Communities to opperate in a fast and the most effecient way.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- ...........FOOTER SECTION STARTS HERE................. -->

    <!-- <footer>
        <div class="footer">
            <div class="address">
                <p>VNIT COMMUNITY<br>Nagpur,<br>Dist. Nagpur</p>
            </div>
            <div class="navbar-footer">
                <p>Menu</p>
                <div><a href="../index.php">Home</a></div>
                <div><a href="#">FAQ's</a></div>
                <div><a href="about.php">About</a></div>
                <div><a href="contact.php">Blog</a></div>
            </div>
        </div>
        <div class="copyright">
            <p>copyright &copy 2020 All Right Reserved.</p>
        </div>
    </footer> -->

    <!-- ......................FOOTER ENDS HERE.......................... -->
    <!-- <script src="javascript/createpost.js"></script> -->
    <script src="/collageCommunity/javascript/infinite_scroll.js"></script>
    <script src="javascript/index_js.js"></script>
    <script>indexAjax('latest')</script>
</body>

</html>