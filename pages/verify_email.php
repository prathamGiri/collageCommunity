<?php 
include "back/connection.php";
include "back/functions.php";
$code = '';
if (isset($_GET['code'])){
    $code = $_GET['code'];
}
if (isset($_POST['verify-submit'])) {
    $get_otp = $_POST['otp'];
    echo "<script>console.log(".$get_otp.")</script>";
    $check_otp = mysqli_query($conn, "SELECT * FROM staticcustomerinfo WHERE otp = '$get_otp' AND activation_code = '$code'");
    if (mysqli_num_rows($check_otp) > 0) {
        $check_row = mysqli_fetch_assoc($check_otp);
        $email = $check_row['email'];
        mysqli_query($conn, "UPDATE staticcustomerinfo 
                            SET activation_status = 'active',
                                otp='', 
                                activation_code = '' 
                            WHERE otp = '$get_otp' AND activation_code = '$code'");
        $newsql = "SELECT `user_id` FROM staticcustomerinfo WHERE email='$email'";
        $row2 = mysqli_fetch_assoc(mysqli_query($conn, $newsql));
        
        $userid = $row2['user_id'];

        $expireTime = strtotime('+1 years');
        setcookie("user_info", $email, $expireTime, "/");
        setcookie("user_id", $userid, $expireTime, "/");
        $_SESSION['fresh_register'] = 'yes';
        redirect('./user_info_form.php');
    }else {
        redirect('verify_email.php?code='.$code.'&msg=wrongotp');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="/collageCommunity/css/verify_style.css">
</head>
<body>
    <?php 
    if ($code != ''){
    ?>
    <div class="main-wrapper">
        <?php 
        if (isset($_GET['msg'])) {
                $msg =$_GET['msg'];
                if ($msg == 'wrongotp') {
        ?>
        <div class="msg" id="wrong-otp">
            Entered Wrong OTP
        </div>
        <?php
                }
            }else{
        ?>
        <div class="msg" id="simple-msg">
            Email has been sent to your given address.
        </div>
        <?php } ?>
        <div class="heading">
            Enter OTP:
        </div>
        <div class="form-wrapper">
            <form method="post">
                <input type="text" id="otp-input" name="otp" placeholder="OTP" required>
                <div class="btn">
                    <button type="submit" name="verify-submit">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
    <?php }else {
        redirect('./login-form.php');
    } ?>
</body>
</html>