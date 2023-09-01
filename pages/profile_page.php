<?php
$page = "profile";
include "back/database_connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepcircles</title>

    <!-- <link rel="shortcut icon" href="/images/logo.png" /> -->

    <link rel="stylesheet" href="/collageCommunity/css/profile_page.css">
</head>
<body>
    <?php
        include "navbar.php";
        if (mysqli_num_rows($res3) > 0) {
            $row3 = mysqli_fetch_assoc($res3);
    ?>
    <div class="main-container">
        <div class="left-container">
            <div class="banner">
                <img src="<?php echo "/collageCommunity/images/profile_img/".$row3['banner']; ?>" alt="img">
            </div>
            <div class="info-panal">
                <div id="profile-pic">
                    <img src="<?php echo "/collageCommunity/images/profile_img/".$row3['profile_img']; ?>" alt="img">
                </div>
                <div id="name">
                    <h1><?php echo base64_decode($row3['user_name']); ?></h1>
                </div>
            </div>
            <div>
                <ul>
                    <li><?php echo $row3['institute']; ?></li>
                    <li><?php echo $row3['city']; ?></li>
                    <li><?php echo $row3['state']; ?></li>
                    <li><?php echo $row3['country']; ?></li>
                    <li><?php echo $row3['graduating_year']; ?></li>
                    <li><?php echo $row3['gender']; ?></li>
                </ul>
            </div>
        </div>
        <?php } ?>
        <div class="right-container">
            <div class="options">
                <a href="#">change Password</a>
            </div>
            <div class="options">
                <a href="#">change Name</a>
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

</body>