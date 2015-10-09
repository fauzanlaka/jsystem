<?php
//Subject check
include '../connect.php'; // include the library for database connection
if(isset($_POST['action']) && $_POST['action'] == 'subjectCode_availability'){ // Check for the username posted
    $username       = htmlentities($_POST['username']); // Get the username values
    $check_query    = mysqli_query($con,'SELECT s_id FROM subject WHERE s_code = "'.$username.'" '); // Check the database
    echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
?> 
