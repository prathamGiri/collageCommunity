<?php
$page = "circles";
include "back/database_connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circles</title>
    <link rel="stylesheet" href="/collageCommunity/css/circle_style.css">

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

    <div class="search-c mt-5">
            <input type="text" page="<?php echo $page ?>" class="form-control" name="live_search" id="live_search" autocomplete="off"
            placeholder="Search Your Club...">
            <div id="search_result"></div>
    </div>
    
    <?php 
        for ($i=0; $i <= 2; $i++) {
            $spc_head;
            switch ($i) {
                case 0:
                    $spc_res = $res4;
                    $spc_head = $institute;
                    break;
                case 1:
                    $spc_res = $res5;
                    $spc_head = $institute1;
                    break;
                case 2:
                    $spc_res = $res6;
                    $spc_head = $institute2;
                    break;
            }
    ?>
    <div class="circle">
        <div class="circle-group">
            <p><?php echo $spc_head; ?></p>
            <div></div>
        </div>

        <div class="card-container">
            <button class="prev-btn" index="<?php echo $i; ?>">&#10094;</button>
            <?php
                if (mysqli_num_rows($spc_res) > 0) {
                    while ($spc_row = mysqli_fetch_assoc($spc_res)) {
            ?>
            
            <div class="card" id="<?php echo $spc_row['circleId']; ?>" card-index="<?php echo $i; ?>">
                <img src="<?php echo "/collageCommunity/images/profile_img/".$spc_row['circleLogo']; ?>">
                <div class="card-content">
                    <h2><?php echo $spc_row['circleName']; ?></h2>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $circleId = $spc_row['circleId'];
                        $follow_btn_sql = "SELECT *
                                            FROM circle_following
                                            WHERE userId = $user_id AND circleId = $circleId";
                        $follow_btn_res = mysqli_query($conn, $follow_btn_sql);
                        if (mysqli_num_rows($follow_btn_res) > 0) {
                    ?>
                    <div class="unfollow" id="<?php echo $spc_row['circleId']; ?>">Unfollow</div>
                    <?php    
                        }else{
                    ?>
                        <div class="follow" id="<?php echo $spc_row['circleId']; ?>">Follow</div>
                    <?php }
                    }else{
                    ?>
                        <div class="register_first">Follow</div>
                    <?php 
                    }
                    ?>
                    
                </div>
            </div>
            <?php } } ?>
            <button class="next-btn" index="<?php echo $i; ?>">&#10095;</button>
            
        </div>

    </div>
    <?php } ?>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/live_searchs.js"></script>
    <script src="/collageCommunity/javascript/circle.js"></script>
    <script src="/collageCommunity/javascript/follow.js"></script>
    
</body>
</html>