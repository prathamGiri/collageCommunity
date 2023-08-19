<?php
include "back/database_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/comm_page.css">
</head>
<body>
    <?php include 'navbar.php' ?>
    <div>
    <div class="comm_bar">
            <div class="sub_comm_bar">
                <ul>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li>
                                <a href="pages/community_page.php?commid=<?php echo $row['circleId'] ?>">
                                    <h3><?php echo $row['circleName']; ?></h3>
                                    <p>Members : 100</p>
                                </a>
                            </li>

                    <?php
                            $i++;
                            if ($i == 4) {
                                break;
                            }
                        }
                    }
                    ?>
                </ul>

                <div class="show_more">
                    <h3 class="head"><a href="pages/circles.php">Show more</a></h3>
                </div>
            </div>

            <div class="create">
                <a href="pages/create_comm.php" id="comm">
                    <div><i class="ri-add-line"></i>
                        <p>Create a New Circle</p>
                    </div>
                </a>
            </div>
        <div>

        </div>
    </div>
</body>
</html>