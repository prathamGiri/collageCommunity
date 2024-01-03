<?php 
include "connection.php";
include "functions.php";
if(isset($_POST['eventId']) && isset($_POST['ajaxType'])){
    if ($_POST['ajaxType'] == 'register') {
        $eventId = $_POST['eventId'];
        $userId = $_SESSION['user_id'];
        $res = mysqli_query($conn, "INSERT INTO `eventregestration` (`userId`, `eventId`) 
                                    VALUES ($userId, $eventId)");
        if ($res) {
            header('Content-Type: application/json');
            echo json_encode(array('status'=>'success'));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array('status'=>'error'));
        }
    }elseif ($_POST['ajaxType'] == 'cancel') {
        $eventId = $_POST['eventId'];
        $userId = $_SESSION['user_id'];
        $res = mysqli_query($conn, "DELETE FROM `eventregestration` 
                                    WHERE userId = $userId AND $eventId = eventId");
        if ($res) {
            header('Content-Type: application/json');
            echo json_encode(array('status'=>'success'));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array('status'=>'error'));
        }
    }
    
}
?>