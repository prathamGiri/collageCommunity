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
    }elseif ($_POST['page'] == 'community_page' && isset($_POST['circleId']) && isset($_POST['tag'])) {
      $circleId = $_POST['circleId'];
      $threadId = $_POST['threadId'];
      $tag = $_POST['tag'];
      $query = "SELECT sci.user_id, sci.user_name, sci.profile_img, cf.circleId
                FROM staticcustomerinfo AS sci
                JOIN circle_following AS cf
                ON sci.user_id = cf.userId
                WHERE cf.circleId = $circleId AND sci.user_name LIKE '{$_POST['query']}%' 
                LIMIT 100";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          echo '<ul class="searched">';
          while ($row4 = mysqli_fetch_assoc($result)) {
            $userId = $row4['user_id'];
            echo '<li>
                <div class="new-mem-info" id="'; echo $userId; echo '">
                    <div class="user-img"><img src="/collageCommunity/images/profile_img/'; echo $row4['profile_img']; echo '"></div>
                    <div class="user-name">'; echo $row4['user_name']; echo '</div>';
                    $check_sql;
                    if ($tag == "thread") {
                        $check_sql = "SELECT * FROM threads_membership WHERE userId = $userId AND threadId = $threadId";
                    }elseif ($tag == "about") {
                        $check_sql = "SELECT * FROM circle_membership WHERE userId = $userId AND circleId = $circleId";
                    }
                        $check_res = mysqli_query($conn, $check_sql);
                        if (mysqli_num_rows($check_res) > 0) {
                    echo '<div class="add-btn" style="color : black"><i class="ri-close-circle-fill"></i></div>';
                    } else{
                    echo '<div class="add-btn" style="color : #04AA6D"><i class="ri-user-add-fill"></i></div>';
                    }
                echo '</div>
            </li>';
        }
    echo '</ul>';
        }
    }
      
  }
?>