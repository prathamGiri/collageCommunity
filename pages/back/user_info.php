<?php
include 'connection.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $course = test_input($_POST['course']);
    $graduation_year = test_input($_POST['graduation_year']);
    $collegeId = test_input($_POST['college']);
    $age = test_input($_POST['age']); 
    $gender = test_input($_POST['gender']);
    $bio = test_input($_POST['bio']);
    $owner = $_COOKIE['user_id'];

    mysqli_query($conn, "UPDATE `staticcustomerinfo` 
                            SET about = '$bio', 
                                course = '$course', 
                                age = '$age', 
                                graduating_year = '$graduation_year',
                                gender = '$gender', 
                                collegeId = '$collegeId'
                            WHERE user_id = '$owner';"
                );
    
    redirect('../preferances.php');
}
?>