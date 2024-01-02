 <?php
 $page = "edit_circle";
 include "back/connection.php";
 include "back/functions.php";
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Circle</title>
    <link rel="stylesheet" href="/collageCommunity/css/edit_circle.css">
 </head>
 <body>
    <?php include "navbar.php"; ?> 
    <?php 
    if (isset($_GET['comm_id'])) {
        $circleId = $_GET['comm_id'];
        $_SESSION['edit_circleId'] = $circleId;
        $sql = "SELECT * FROM staticcircleinfo
                WHERE circleId = $circleId";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $collegeId = $row['collegeId'];
            $clg_sql = "SELECT * FROM colleges WHERE collegeId = $collegeId";
            $clg_res = mysqli_query($conn, $clg_sql);
            $clg_row = mysqli_fetch_assoc($clg_res);
    ?>
    <div class="ec-main-wrapper" id="<?php echo $circleId; ?>">
        <div class="ec-wrapper">
            <form id="edit-circle-form" method="post">
                <div id="c-banner" class="img-inp">
                    <img src="/collageCommunity/images/banners/<?php echo $row['circleBanner']; ?>" class="image" alt="banner">
                    <input type="file" class="file-inputs" id="banner-inp" name="banner">
                </div>
                <div class="c-info">
                    <div id="cp-image" class="img-inp">
                        <img src="/collageCommunity/images/profile_img/<?php echo $row['circleLogo']; ?>" class="image" alt="logo">
                        <input type="file" class="file-inputs" id="logo-inp" name="logo">
                    </div>
                    <div id="c-name">
                        <input type="text" placeholder="Circle Name" value="<?php echo $row['circleName']; ?>" name="circle-name">
                    </div>
                </div>
                <div id="c-desc">
                    <textarea name="desc-txt" id="desc-txt" rows="10"><?php echo $row['circleDiscription']; ?></textarea>
                </div>
                <div id="c-status">
                    <div class="ind-opt" id="stts">
                        <label for="status">Status:</label>
                        <select name="status" id="stts-s">
                            <option value="0"<?php echo ($row['circleStatus'] == 0) ? ' selected' : ''; ?>>Anyone Can join</option>
                            <option value="1"<?php echo ($row['circleStatus'] == 1) ? ' selected' : ''; ?>>Invite Only</option>
                        </select>
                    </div>
                    <div class="ind-opt">
                        <label for="clg-name">College Name: </label>
                        <input type="text" id="dummy" name="collegeid" value="<?php echo $collegeId; ?>" style="display : none;">
                        <input type="text" page="<?php echo $page ?>" id="live_search" value="<?php echo $clg_row['collegeName']; ?>"  autocomplete="off">
                        <div id="search_result"></div>
                    </div>
                    <!-- <div class="ind-opt">
                        <label for="clg-name">College Name: </label>
                        <input type="text" name="clg-name">
                    </div>
                    <div class="ind-opt">
                        <label for="clg-name">College Name: </label>
                        <input type="text" name="clg-name">
                    </div>
                    <div class="ind-opt">
                        <label for="clg-name">College Name: </label>
                        <input type="text" name="clg-name">
                    </div> -->
                </div>
                <div id="sub-wrapper">
                    <input type="hidden" name="button_clicked" id="button_clicked" value="false">
                    <button type="submit" id="sub-btn" name="sub-btn">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/edit_circle.js"></script>
    <script src="/collageCommunity/javascript/live_searchs.js"></script>
    <?php } } ?>
 </body>
 </html>