<?php
include "back/database_connection.php";
$page = "profile";
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
    ?>
    <div class="main-container">
        <div class="left-container">
            <div class="banner">
                <img src="/collageCommunity/images/profile_img/516664.jpg" alt="img">
            </div>
            <div class="info-panal">
                <div id="profile-pic">
                    <img src="/collageCommunity/images/logo.png" alt="img">
                </div>
                <div id="name">
                    <h1>Pratham Giri</h1>
                </div>
            </div>
            <div>
                <ul>
                    <li>Institute</li>
                    <li>City</li>
                    <li>State</li>
                    <li>Country</li>
                    <li>Graduating Year</li>
                    <li>Gender</li>
                </ul>
            </div>
        </div>
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