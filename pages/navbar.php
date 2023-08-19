<!-- HEADER STARTS HERE -->
<head>
    <link rel="stylesheet" href="/collageCommunity/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

</head>
<div class="header">
        <div class="logo">
            <img src= "/collageCommunity/images/logo.png" alt="" height="45px" width="45px">
            <h1>Pepcircles</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    
                    <li><a id="home" href="/collageCommunity/index.php"><i class="ri-home-3-fill"></i><span>Home</span></a></li>
                    <li><a id="circles" href="/collageCommunity/pages/circles.php"><i class="ri-group-fill"></i><span>Circles</span></a></li>
                    <li><a id="notification" href="/collageCommunity/pages/notifications.php"><i class="ri-notification-2-fill"></i><span>Notifications</span></a></li>
                    <li><a id="aboutus" href="/collageCommunity/pages/about.php"><i class="ri-dashboard-fill"></i></i><span>About Us</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['login_status'])) {
            ?>
                <a href="/collageCommunity/pages/back/logout.php">Logout</a>
            <?php
            } else {
            ?>
                <a href="/collageCommunity/pages/login-form.php">Login/Register</a>
            <?php
            }
            ?>

        </div>
    </div>
    <?php 
        if (isset($page)) {
            ?>
            <script>
                let active = document.getElementById('<?php echo $page; ?>');
                active.classList.add('current');
            </script>
    <?php
        }
    ?>
            <!-- Header ends here -->