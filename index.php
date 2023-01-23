<?php
include "pages/back/connection.php";
include "pages/back/functions.php";

$sql = "SELECT *
            FROM community_info";
$sql2 = "SELECT *
            FROM posts";
$res = mysqli_query($conn, $sql);
$res2 = mysqli_query($conn, $sql2);


if (isset($_COOKIE["user_info"]) && isset($_COOKIE["password"]) && isset($_COOKIE["user_id"])) {
    $_SESSION['login_status'] = "logged_in";
    $_SESSION['user_id'] = $_COOKIE["user_id"];
    $user_id = $_SESSION['user_id'];
}

$sql3 = "SELECT * 
            FROM variablecustomerinfo 
            WHERE user_id = '$user_id'";
$res3 = mysqli_query($conn, $sql3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepcircles</title>

    <!-- <link rel="shortcut icon" href="/images/logo.png" /> -->

    <link rel="stylesheet" href="css/profile_style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="header">
        <div class="logo">
            <img src= "images/logo.png" alt="" height="45px" width="45px">
            <h1>Pepcircles</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a class="current" href="index.php"><i class="ri-home-3-fill"></i><span>Home</span></a></li>
                    <li><a href="pages/circles.php"><i class="ri-group-fill"></i><span>Circles</span></a></li>
                    <li><a href="pages/chat.php"><i class="ri-chat-2-fill"></i><span>Chat</span></a></li>
                    <li><a href="pages/about.php"><i class="ri-dashboard-fill"></i></i><span>About Us</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['login_status'])) {
            ?>
                <a href="pages/back/logout.php">Logout</a>
            <?php
            } else {
            ?>
                <a href="pages/login-form.php">Login/Register</a>
            <?php
            }
            ?>

        </div>
    </div>

    <?php
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
        <div class="comm_bar">
            <div class="sub_comm_bar">
                <h3 class="head">Communities:</h3>
                <ul>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li>
                                <a href="pages/community_page.php?commid=<?php echo $row['community_id'] ?>">
                                    <h3><?php echo $row['community_name']; ?></h3>
                                    <p>Members : <?php echo $row['members']; ?></p>
                                </a>
                            </li>

                    <?php
                            $i++;
                            if ($i == 4) {
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
                        
                        if (mysqli_num_rows($res) > 0) {
            ?>
            <div class="sub_comm_bar">
                <ul>
                    <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($res3)) {
                    ?>
                                <li>
                                    <a href="#">
                                        <h3><?php echo $row['community_name']; ?></h3>
                                        <p>Members : <?php echo $row['members']; ?></p>
                                    </a>
                                </li>

                    <?php
                                $i++;
                                if ($i == 4) {
                                    break;
                                }
                            }
                    ?>
                </ul>
            </div>
            <?php } ?>
            <div class="create">
                <a href="pages/create_comm.php" id="comm">
                    <div><i class="ri-add-line"></i>
                        <p>Create a New Circle</p>
                    </div>
                </a>
            </div>

        </div>
        <div class="feed">
            <!-- crate-post             -->
            <div class="createpost" id="createpost">
                <img src="./images/profile_img/508247.jpg" alt="">
                <button>Create a Post</button>
            </div>

            <div class="postblock" id="postblock">
                <div class="posthead">
                    <h1>Create a Post</h1>
                    <a id="closepostblock"><i class="ri-close-line"></i></a>
                </div>
                <hr>
                <div class="postprofile">
                    <img src="./images/profile_img/508247.jpg" alt="">
                    <span>Pratham Giri</span>
                </div>

                <!-- <input type="text" placeholder="What do you want to post"> -->
                <textarea id="freeform" name="freeform">Enter text here...</textarea>

                <hr>
                <div class="medianpost">
                    <i class="ri-image-line"></i>
                    <i class="ri-video-line"></i>
                    <button>Post</button>
                </div>
            </div>
            <div class="tags">
                <a href="#">Latest</a>
                <a href="#">Official Notices</a>
                <a href="#">Achievements</a>
                <form class="search-box">
                <i class="ri-search-line"></i><input type="search">
                </form>
            </div>
            <div class="posts">
                <?php
                if (mysqli_num_rows($res2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                ?>
                        <div class="ind_post">
                            <div class="head_post">
                                <img src="./images/logo.png" alt="">
                                <span>Titel of the circle</span>
                            </div>
                            <hr>
                            <h3><?php echo $row2['title']; ?></h3>
                            <p><?php echo $row2['content']; ?></p>
                        </div>
                <?php }
                } ?>
            </div>
        </div>

        <div class="right_side">
            <div class="profile">
                <div class="img">
                    <img src="images/profile_img/673537.jpg">
                </div>

                <div class="info">
                    <p>Pratham Giri</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor dicta qui cum accusamus reprehenderit molestiae soluta exercitationem voluptatibus alias.</p>
                </div>

                <div class="pro_cir">
                    <p>Your circles : 5</p>
                    <p>Members : 500</p>
                </div>
            </div>
            <div class="sub_comm_bar" id="recent">
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
            </div>
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
    <script src="./javascript/createpost.js"></script>
</body>

</html>