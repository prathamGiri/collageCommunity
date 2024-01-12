<?php
$page = "notification";
include "back/database_connection.php";
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
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/notify.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="notify">
        <div class="posts">
            <div class="ind_post">
                <h3>NO NOTIFICATIONS AT THIS MOMENT</h3>
            </div>
        </div>
    </div>
</body>
</html>