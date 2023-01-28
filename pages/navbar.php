<!-- HEADER STARTS HERE -->
<div class="header">
        <div class="logo">
            <img src= "images/logo.png" alt="" height="45px" width="45px">
            <h1>Pepcircles</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a class="current" href="index.php"><i class="ri-home-3-fill"></i><span>Home</span></a></li>
                    <li><a href="pages/circles.php"><i class="ri-group-fill"></i><span>Circles</span></a></li>
                    <li><a href="pages/chat.php"><i class="ri-chat-2-fill"></i><span>Chat</span></a></li>
                    <li><a href="pages/about.php"><i class="ri-dashboard-fill"></i></i><span>About Us</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['login_status'])) {
            ?>
                <a href="pages/back/logout.php">Logout</a>
            <?php
            } else {
            ?>
                <a href="pages/login-form.php">Login/Register</a>
            <?php
            }
            ?>

        </div>
    </div>
            <!-- Header ends here -->