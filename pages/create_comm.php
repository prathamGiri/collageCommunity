<?php 
    $page = "create_comm";
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
    <link rel="stylesheet" href="/collageCommunity/css/create_comm_style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="../javascript/fun.js"></script>
</head>
<body>
    <?php
        include "navbar.php";
    ?>

    <?php
        if (isset($_SESSION['login_status'])) {
    ?>
            <div class="container">
                <div class="card">
                    <form action="back\create_c.php" method="post" enctype="multipart/form-data">
                        <div class="profile_container" id="profile" onclick="click_but()">
                            <img id="image" src="/collageCommunity/images/profile_img/User_icon.png">
                        </div>
                        <input type="file" id="filec" name="img" onchange="load_img()" required>
                        <input type="text" class="coname" placeholder="Community Name" name="community_name" required>
                        <textarea name="discription" id="codisc" placeholder="Discription" required></textarea>
                        <div>
                            <input type="text" class="coname" page="<?php echo $page ?>" id="live_search" placeholder="institute" name="institute" required>
                            <div id="search_result"></div>
                        </div>

                        <input type="text" class="coname" placeholder="city" name="city" required>
                        <input type="text" class="coname" placeholder="state" name="state"  required>
                        <input type="text" class="coname" placeholder="country" name="country"  required>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/live_searchs.js"></script>
</body>
</html>