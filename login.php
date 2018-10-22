<?php
    //get the data from the form
   $user_name = $_POST['username'];//login page
   $password = $_POST['password'];//login page
 //echo $user_name;

   //$firstName = $_POST['firstName'];
   //$lastName = $_POST['lastName'];
   //$DOB= $_POST['DOB'];

?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <main>


        <?php


        if(strpos($user_name,'@')!==false){ // checks to see if @ is in email address
            print("$user_name<br>");
            print('hi');
        }
        else
            print('Email address not valid. Please try again<br>');


        if((strlen($password)== 0 || (strlen($password)< 8)))
                print('Password is not valid. Please try again.<br>');

        else
            print $password;
       ?>

    </main>
</body>
</html>



