<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="login.css"></head>
<body>
<main>
    <div class="Square">
<?php

//echo "<h1>PDO demo!</h1>";
$username = 'ra563';
$password = 'cqsGFq08V';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

    //get the data from the form
   $user_name = $_POST['username'];//login page
   $user_password = $_POST['password'];//login page
 //echo $user_name;

   //$firstName = $_POST['firstName'];
   //$lastName = $_POST['lastName'];
   //$DOB= $_POST['DOB'];

    function ValidateUser($user_name)
    {
        $lookup = true;

        if (empty($user_name)) {
            echo "Email address is missing. Please enter email address.";
            $lookup = false;
        } elseif (strpos($user_name, '@') !== false) { // checks to see if @ is in email address
            print("$user_name<br>");

        } else
            print('Email address not valid. Please try again<br>');

        if($lookup == true)
            echo "<br>Valid email";

        return $lookup;
    }


    function ValidatePassword($user_password)
    {
        $lookup = true;

        if ((strlen($user_password) == 0 || (strlen($user_password) < 8))) {
            print('Password is not valid. Needs to be at least 8 characters. Please try again.<br>');
            $lookup = false;
        } else if ($lookup = true) {
            echo "<br>Valid password";
            $lookup = false;
        }

        if ($lookup == true) {
            echo "<br>Valid password";
        }
        return $lookup;
    }

    if (ValidateUser($user_name) && ValidatePassword($user_password)){

        global $conn;
        $query = "select * from account where username='$user_name' and password='$user_password';
        $query = $conn->prepare($query);
        $query->execute();
        $database = $query->fetchALL(); //
        $query->closeCursor();
        
        if(count($database)>0){
        
          $fname = $database[0]['firstName'];
          $lname = $database[0]['lastName'];
          
          header("Location: askAQuestion.php?username=$user_password&");
       } 
       else{
        

      }  $conn = null;

        ?>
    </div>

    </main>
</body>
</html>





