<?php
include "back/connection.php";
include "back/functions.php";

if(isset($_GET['commid'])){
    $id = test_input($_GET['commid']);
    $sql = "SELECT *
                FROM staticcircleinfo as ci
                WHERE ci.circleId = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $row['circleName'] ?></p>
</body>
</html>