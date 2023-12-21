<?php
include "connection.php";
include "functions.php";
echo "1111";
if (isset($_POST['merch-name']) && isset($_POST['merch-price'])) {
    echo "2222";
    $circleId = $_SESSION['commid'];
    $merch_name = test_input($_POST['merch-name']);
    $merch_price = test_input($_POST['merch-price']);
    $img = test_input($_FILES['merch-img']['name']);
    mysqli_query($conn, "INSERT INTO `merch` (`merchName`, `merchPrise`, `circleId`,`merchImg`) 
                            VALUES ('$merch_name', '$merch_price', '$circleId', '$img')");
    move_uploaded_file($_FILES['merch-img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/collageCommunity/images/merch_img/'.$img);
}
?>