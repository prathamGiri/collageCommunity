<?php
include 'functions.php';
//unset a started session variable after use
unset($_SESSION['user_id']);
unset($_SESSION['login_status']);
setcookie("user_info",'' , time()-30, "/");
setcookie("password", '', time()-30, "/");
setcookie("user_id", '', time()-30, "/");

$_SESSION['logged_out'] = 'yes';
redirect('../../index.php');
?>