<?php 
require_once "database_connection.php";

if (isset($_POST['circle_id']) && isset($_SESSION['user_id'])) {
    $circleId = $_POST['circle_id'];
    $user_id = $_SESSION['user_id'];
    $t_query = "SELECT t.threadId, t.threadName
                FROM threads_membership AS tm
                JOIN threads AS t
                ON tm.threadId = t.threadId
                WHERE tm.userId = $user_id AND t.circleId = $circleId";
    $t_result = mysqli_query($conn, $t_query);
    if (mysqli_num_rows($t_result) > 0) {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($t_result)) {
            echo '<li id="'.$row['threadId'].'">'.$row['threadName'].'</li>';
        }
        echo '</ul>';
    }
}
?>