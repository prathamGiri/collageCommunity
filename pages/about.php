<?php 
    $page = "aboutus";
    include "back/connection.php";
    include "back/functions.php";
    if (isset($_SESSION['indexType'])) {
        unset($_SESSION['indexType']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/about.css">


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
    
    <div class="about">
        <div class="pepabout">
            <img src= "/collageCommunity/images/logo.png" alt="" height="45px" width="45px">
            <div class="name">Pepcircles</div>
        </div>
        <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus expedita natus odit, pariatur consectetur autem enim non 
            itaque magnam libero iusto voluptatibus, magni nam eum nemo officia. Repellat amet distinctio earum quia accusantium praesentium, ut, aliquam suscipit adipisci beatae culpa nulla. At laborum repellendus deserunt laudantium architecto accusantium molestiae error sint maxime ab, fugit omnis qui, harum id illo atque voluptatibus iste facilis sequi iure veritatis sed asperiores quod? Incidunt a placeat laborum suscipit, dignissimos expedita, corporis nisi voluptatibus rerum tempore harum distinctio velit dolores quae adipisci libero molestias repellendus. Neque aut et eius at libero a commodi repellat? Quos?
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <img src="/collageCommunity/images/profile_img/1662798865989.jpeg">
            <div class="card-content">
                <h2>Pratham Giri</h2>
                <p>Co-Founder, CEO</p>
            </div>
        </div>
    </div>

        <footer>
        <div class="footer">
            <div class="address">
                Pepcircle
            </div>
            <div class="navbar-footer">
            <div class="navbar">
                <ul>
                    <li><a href="index.php"><i class="ri-twitter-fill"></i><span>Twitter</span></a></li>
                    <li><a href="pages/circles.php"><i class="ri-linkedin-box-fill"></i></i><span>LinkedIn</span></a></li>
                    <li><a href="pages/chat.php"><i class="ri-instagram-fill"></i><span>Instagram</span></a></li>
                    <li><a href="pages/about.php"><i class="ri-youtube-fill"></i><span>YouTube</span></a></li>
                </ul>
        </div>
            </div>
        </div>
        <div class="copyright">
            <p>copyright &copy 2020 All Right Reserved.</p>
        </div>
    </footer>
</body>
</html>