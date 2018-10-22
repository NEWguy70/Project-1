<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$DOB = $_POST['DOB'];
$user_name = $_POST['username'];//login page
$password = $_POST['password'];

?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <main>

        <?php
            if (strlen($firstName) == 0)
                print('Please enter your first name<br>');
            else
                print("$firstName<br>"); // can use ($firstName.'<br>')



            if (strlen($lastName) == 0)
                print('Please enter your last name<br>');
            else
                print("$lastName.<br>");



            if (strlen($DOB) == 0)
                print('Please enter your date of birth<br>');
            else
                print("$DOB<br>");



            if(strpos($user_name,'@')!==false){ // checks to see if @ is in email address
                 print("$user_name<br>");
            }
             else
                 print('Email address not valid. Please try again<br>');



            if((strlen($password)== 0 || (strlen($password)< 8)))
                print('Password is not valid. Please try again<br>');

             else
                print ("$password<br>");


        ?>

    </main>
</body>
</html>
