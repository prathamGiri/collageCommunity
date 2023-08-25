<?php
include "pages/back/database_connection.php";
$page = "home";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepcircles</title>

    <!-- <link rel="shortcut icon" href="/images/logo.png" /> -->

    <link rel="stylesheet" href="css/indexStyle.css">
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
            <div class="sub_comm_bar">
                <h3 class="head">Communities:</h3>
                <ul>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li>
                                <a href="pages/community_page.php?commid=<?php echo $row['circleId'] ?>">
                                    <h3><?php echo $row['circleName']; ?></h3>
                                    <p>Members : 100</p>
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

            <div class="create">
                <a href="pages/create_comm.php" id="comm">
                    <div><i class="ri-add-line"></i>
                        <p>Create a New Circle</p>
                    </div>
                </a>
            </div>

        </div>
        <!-- Middle Part -->
        <div class="feed">

            <div class="tags">
                <a href="#">Latest</a>
                <a href="#">Official Notices</a>
                <a href="#">Achievements</a>
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
                            <?php
                                $post_id = $row2['post_id'];
                                $sql5 ="SELECT ir.post_id,
                                                ir.image_Id,
                                                i.imageName
                                        FROM image_rel AS ir
                                        JOIN images AS i
                                        ON ir.image_Id = i.imageId
                                        WHERE ir.post_id =  '$post_id'";
                                $res5 = mysqli_query($conn, $sql5);
                                if (mysqli_num_rows($res5) > 0) {
                                    while ($row5 = mysqli_fetch_assoc($res5)) {
                            ?>
                                        <div class = "post-image">
                                            <img src="images/post_images/<?php echo $row5['imageName']; ?>" alt="image">
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                <?php }
                } ?>
            </div>
        </div>

        <div class="right_side">
                <?php 
                    if (isset($_SESSION['login_status'])) {
                        $sql4 = "SELECT *
                                FROM staticcustomerinfo 
                                WHERE user_id = '$user_id'";
                        $res4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($res4) > 0) {
                            $row4 = mysqli_fetch_assoc($res4);

                ?>
            <a href="pages/profile_page.php">
                <div class="profile" id="profile">
                    <div class="img">
                        <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                    </div>
                    <div class="info">
                        <p><?php echo base64_decode($row4['user_name']); ?></p>
                        <p><?php echo base64_decode($row4['about']); ?></p>
                    </div>

                    <div class="pro_cir">
                        <p>Your circles : 5</p>
                        <p>Members : 500</p>
                    </div>
                </div>
            </a>
            
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
    <!-- <script src="javascript/index_fun.js"></script> -->
    <!-- <script src="javascript/image_preview.js"></script> -->
</body>

</html>