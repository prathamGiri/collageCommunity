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
                <?php
                if (mysqli_num_rows($res2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                ?>
                        <div class="ind_post">
                            <div class="head_post">
                                <img src="/collageCommunity/images/logo.png" alt="">
                                <span>Titel of the circle</span>
                            </div>
                            <hr>
                            <h3><?php echo $row2['title']; ?></h3>
                            <p><?php echo $row2['content']; ?></p>
                            <?php
                                $post_id = $row2['post_id'];
                                $sql5 ="SELECT ir.post_id,
                                                ir.image_Id,
                                                i.imageName
                                        FROM image_rel AS ir
                                        JOIN images AS i
                                        ON ir.image_Id = i.imageId
                                        WHERE ir.post_id =  '$post_id'";
                                $res5 = mysqli_query($conn, $sql5);
                                if (mysqli_num_rows($res5) > 0) {
                                    while ($row5 = mysqli_fetch_assoc($res5)) {
                            ?>
                                        <div class = "post-image">
                                            <img src="images/post_images/<?php echo $row5['imageName']; ?>" alt="image">
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        </div>
</body>
</html>