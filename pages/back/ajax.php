<?php
  require_once "connection.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM staticcircleinfo WHERE circleName LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo $res['circleName']. "<br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Song not found
      </div>
      ";
    }
  }
?>