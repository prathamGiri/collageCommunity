<!-- Header Starts Here -->
<!-- <div class="header">
        <div class="logo">
            <h1>VNIT</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a class="current" href="../index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="chat.php">Chat</a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <?php 
                // if (isset($_SESSION['login_status'])) {
            ?>
                <a href="back/logout.php">Logout</a>
            <?php
                // }else{
            ?>  
                <a href="login-form.php">Login/Register</a>
            <?php
                // }
            ?>
            
        </div>
    </div> -->

    <!-- header ends here -->
    
    <!-- Header Starts Here -->
    <div class="header">
        <div class="logo">
            <img src= "#" alt="" height="45px" width="45px">
            <!-- use database to show logo -->
            <h1>Pepcircles</h1>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a class="current" href="../index.php"><i class="ri-home-3-fill"></i><span>Home</span></a></li>
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

    <!-- header ends here -->