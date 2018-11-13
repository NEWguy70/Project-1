<link rel="stylesheet" href="login.css">


<?php
include 'databaseAuthentication.php';
$user_name = $_POST['username'];//login page
$password = $_POST['password'];//login page

function Validate($user_name){
    $lookup = true;

    if(empty($user_name)){
        echo "Email address is missing. Please enter email address.";
        $lookup=false;}
        elseif (strpos($user_name,))
}
    elseif ()
?>

