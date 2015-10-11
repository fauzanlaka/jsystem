<?php
include '../connect.php'; // include the library for database connection
if(isset($_POST['action']) && $_POST['action'] == 'username_availability'){ // Check for the username posted
    $username       = htmlentities($_POST['username']); // Get the username values
    $check_query    = mysqli_query($con,'SELECT t_id FROM teachers WHERE t_username = "'.$username.'" '); // Check the database
    $ck = mysqli_fetch_array($check_query);
    echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
    if($ck == ""){
        $username       = htmlentities($_POST['username']); // Get the username values
        $check_query    = mysqli_query($con,'SELECT u_id FROM user WHERE u_user = "'.$username.'" '); // Check the database
        echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'username_availability'){ // Check for the username posted
    $username       = htmlentities($_POST['username']); // Get the username values
    $check_query    = mysqli_query($con,'SELECT t_id FROM teachers WHERE t_cityzenid = "'.$username.'" '); // Check the database
    echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}

?> 
