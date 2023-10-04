<?php
  require_once "connection.php";
  session_start();
  if (isset($_POST['page']) && isset($_POST['query'])) {
    if ($_POST['page'] == 'circles') {
        $query = "SELECT * FROM staticcircleinfo WHERE circleName LIKE '{$_POST['query']}%' LIMIT 100";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          echo "<ul>";
          while ($res = mysqli_fetch_array($result)) {
              echo "<li><a href='/collageCommunity/pages/community_page.php?commid=".$res['circleId']."'>". $res['circleName']. "</a></li>" ;
          }
          echo "</ul>";
        }
    }else if ($_POST['page'] == 'create_comm' || $_POST['page'] == 'user_info_form') {
      $query = "SELECT * FROM colleges WHERE collegeName LIKE '{$_POST['query']}%' LIMIT 100";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          echo "<ul>";
          while ($res = mysqli_fetch_array($result)) {
            $institute = $res['collegeName'];
            $city = $res['city'];
            $collegeId = $res['collegeId'];
            $_SESSION['collegeId'] = $collegeId;
            $state = $res['state'];
            $country = $res['country'];
              echo "<li collegeid='$collegeId' institute='$institute' city='$city' state='$state' country='$country'>".$institute. "</li>" ;
          }
          echo "</ul>";
        }
    }
      
  }
?>