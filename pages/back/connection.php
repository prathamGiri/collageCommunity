<?php
//assigne variables
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'pepcircles';

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (!$conn) {
    //if connection failed die
    die("connection failed".mysqli_connect_error());
}
?>