<?php
include 'connection.php';
include 'functions.php';
//Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
require '../../vendor/autoload.php';
if (isset($_POST['register-btn'])) {
    $fname =mysqli_real_escape_string($conn, test_input( $_POST['fname']));
    $lname = mysqli_real_escape_string($conn, test_input($_POST['lname']));
    $name = $fname.' '.$lname;
    $otp_email = test_input($_POST['email']);
    $email = base64_encode(mysqli_real_escape_string($conn, test_input($_POST['email'])));
    $mobile = base64_encode(mysqli_real_escape_string($conn, test_input($_POST['mobile'])));
    $pass = mysqli_real_escape_string($conn, test_input($_POST['pass_reg']));
    $password = md5($pass);

    $sql = "SELECT email FROM staticcustomerinfo";

    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) { 
            if ($row['email'] == $email) {
                redirect('../login-form.php?type=emailalreadyexist');
            }   
        } 
    }
    $otp_str = str_shuffle('0123456789');
    $otp = substr($otp_str, 0, 5);
    $act_str = rand(100000, 10000000);
    $activation_code = str_shuffle('abcdefghijklmno'.$act_str);
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pratham.giri02@gmail.com';                     //SMTP username
        $mail->Password   = 'iycrikcojxqtweif';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;  
        $mail->SMTPSecure = "TLS";
        
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pratham.giri02@gmail.com', 'Pepcircles');
        $mail->addAddress($otp_email);     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = 'Verification Code:'.$otp;

        if ($mail->send()) {
            echo 'Message has been sent';
            $insertsql = "INSERT INTO `staticcustomerinfo` (`user_name`, `mobile`, `email`, `password`, `otp`, `activation_code`) 
                            VALUES ('$name', '$mobile', '$email', '$password', '$otp', '$activation_code')";
            mysqli_query($conn, $insertsql);
            redirect('../verify_email.php?code='.$activation_code);
        }else{
            echo 'Could not send message';
            redirect('../tryagain.php');
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
};
?>