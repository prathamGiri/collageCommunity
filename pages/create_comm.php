<?php 
    include "back/connection.php";
    include "back/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a community</title>
    <link rel="stylesheet" href="../css/create_comm_style.css">
    <link rel="stylesheet" href="../css/navbar.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="../javascript/fun.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src= "../images/logo.png" alt="" height="45px" width="45px">
            <h1>Pepcircles</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="../index.php"><i class="ri-home-3-fill"></i><span>Home</span></a></li>
                    <li><a href="circles.php"><i class="ri-group-fill"></i><span>Circles</span></a></li>
                    <li><a href="chat.php"><i class="ri-chat-2-fill"></i><span>Chat</span></a></li>
                    <li><a href="about.php"><i class="ri-dashboard-fill"></i></i><span>About Us</span></a></li>

                </ul>
            </nav>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['login_status'])) {
            ?>
                <a href="back/logout.php">Logout</a>
            <?php
            } else {
            ?>
                <a href="login-form.php">Login/Register</a>
            <?php
            }
            ?>

        </div>
    </div>

    <?php
        if (isset($_SESSION['login_status'])) {
    ?>
            <div class="container">
                <div class="card">
                    <form action="back/create_c.php" method="post" enctype="multipart/form-data">
                        <div class="profile_container" id="profile" onclick="click_but()">
                            <img id="image" src="../images/User_icon.png">
                        </div>
                        <input type="file" id="filec" name="img" onchange="load_img()" required>
                        <input type="text" id="coname" placeholder="Community Name" name="community_name" required>
                        <textarea name="discription" id="codisc" placeholder="Discription" required></textarea>
                        <div class="radio_btn">
                            <input type="radio" id="anyone" name="status" value="0">
                            <label for="anyone">Anyone Can Join</label><br>
                        </div>
                        <div class="radio_btn">
                            <input type="radio" id="invite" name="status" value="1">
                            <label for="invite">Invite Only</label><br>
                        </div>
                        <button type="submit" class="registerbtn" name="submit">Create</button>
                    </form>
                </div>
            </div>
    <?php }else{ ?>
            <h1>Create an account or login to create a community</h1>
    <?php
     }
    ?>
</body>
</html>