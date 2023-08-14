<?php
include "pages/back/connection.php";
include "pages/back/functions.php";

$sql = "SELECT *
            FROM community_info";
$sql2 = "SELECT *
            FROM posts";
$res = mysqli_query($conn, $sql);
$res2 = mysqli_query($conn, $sql2);
$user_id;
if (isset($_COOKIE["user_info"]) && isset($_COOKIE["password"]) && isset($_COOKIE["user_id"])) {
    $_SESSION['login_status'] = "logged_in";
    $_SESSION['user_id'] = $_COOKIE["user_id"];
    $user_id = $_SESSION['user_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepcircles</title>

    <!-- <link rel="shortcut icon" href="/images/logo.png" /> -->

    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

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
                    if(isset($res3)){
                        
                        if (mysqli_num_rows($res3) > 0) {
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
            <?php } } ?>

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
            <!-- crate-post             -->
            <?php
                if (isset($_SESSION['login_status'])) {
                    $sql3 = "SELECT * FROM staticcustomerinfo
                                WHERE user_id = '$user_id'";
                    $res3 = mysqli_query($conn, $sql3);
            ?>
            <div class="createpost" id="createpost">
                <?php if (mysqli_num_rows($res3) > 0) { 
                    $row3 = mysqli_fetch_assoc($res3);
                ?>
                <img src="<?php echo 'images/profile_img/'.$row3['profile_img']?>" alt="profile image">
                
                <button>Create a Post</button>
            </div>

            <div class="postblock" id="postblock">
                <div class="posthead">
                    <h1>Create a Post</h1>
                    <a id="closepostblock"><i class="ri-close-line"></i></a>
                </div>
                <hr>
                <div class="postprofile">
                    <img src="<?php echo 'images/profile_img/'.$row3['profile_img']?>" alt="profile image">
                    <span><?php echo base64_decode($row3['user_name']) ?></span> 
                </div>
                <?php } ?>
                <!-- <input type="text" placeholder="What do you want to post"> -->
                <form action="pages/back/save_post.php" method="post" enctype="multipart/form-data">

                    <textarea id="freeform" name="freeform" placeholder = "Enter Text Here..."></textarea>
                    <div class = "file-preview-wrapper">
                        <div class = "file-preview" id="filepreview">
                            <img id = "image-preview" alt="imagePreview">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="medianpost">
                        <div>
                            <label>
                                <i class="ri-image-line"></i>
                                <input type="file" id="image_file" name="image_file" accept="image/*" onchange="updatePreview(this, 'image-preview');">
                            </label>
                            <label>
                                <i class="ri-video-line"><input type="file" name="video_file"></i>
                            </label>
                            
                        </div>
                        <button type="submit" name="post_submit">Post</button>
                    </div>
                </form>
                
            </div>
            <?php } ?>

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
    <script src="javascript/index_fun.js"></script>
    <!-- <script src="javascript/image.js"></script> -->
</body>

</html>