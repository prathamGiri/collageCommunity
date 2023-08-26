<?php
include "back/database_connection.php";
$page = "circles";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circles</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" href="/collageCommunity/css/circleStyle.css">
=======
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/circle.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
>>>>>>> Stashed changes
    <script src="../javascript/fun.js"></script>
</head>
<body>
    <?php
        include "navbar.php";
    ?>

    <div class="search-c mt-5" style="max-width: 555px">
        <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off"
            placeholder="Search ...">
        <div id="search_result"></div>
    </div>

    <div class="circle">
        <div class="circle-group">
            <p>VNIT, Nagpur</p>
            <div></div>
        </div>
        <div class="card-container">
            <?php
                if (mysqli_num_rows($res) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="card">
                <img src="<?php echo "/collageCommunity/images/profile_img/".$row['circleLogo']; ?>">
                <div class="card-content">
                    <h2><?php echo $row['circleName']; ?></h2>
                    <div class="follow"><a href="#">Follow</a></div>
                </div>
            </div>

            <?php } }?>
        </div>

    </div>
    <div class="circle">
        <div class="circle-group">
            <p>VNIT, Nagpur</p>
            <div></div>
        </div>
        <div class="card-container">
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Pratham Giri</h2>
                    <p>Co-Founder, CEO</p>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Deep Swarup</h2>
                    <p>Co-Founder, CTO</p>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>
        </div>
    </div>
    <div class="circle">
        <div class="circle-group">
            <p>VNIT, Nagpur</p>
            <div></div>
            </div>
        <div class="card-container">
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Pratham Giri</h2>
                    <p>Co-Founder, CEO</p>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Deep Swarup</h2>
                    <p>Co-Founder, CTO</p>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo "images/profile_img/".$row4['profile_img']; ?>">
                <div class="card-content">
                    <h2>Dhruv Gupta</h2>
                    <p>Co-Founder, COO</p>
                </div>
            </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/live_search.js"></script>
    
</body>
</html>