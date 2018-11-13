
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<main>
    <div class="Square">


        <?php
        require "databaseAuthentication.php";
        //echo "<h1>PDO demo!</h1>";

        //get the data from the form
        $user_name = $_POST['username'];//login page
        $user_password = $_POST['password'];//login page


        function ValidateUser($user_name)
        {
            $lookup = true;

            if (empty($user_name)) {
                echo "Email address is missing. Please enter email address.<br>";
                $lookup = false;
            }
            elseif (strpos($user_name, '@') === false) {
                echo "The Email is Missing '@' !!  <br>";
                $lookup = false;
            }


            if($lookup == true){
                echo "<br>Valid email<br>";}

            return $lookup;
        }


        function ValidatePassword($user_password)
        {
            $lookup = true;

            if ((strlen($user_password) == 0 || (strlen($user_password) < 8))) {
                print('Password is not valid. Needs to be at least 8 characters. Please try again.<br>');
                $lookup = false;
            }
            if ($lookup == true) {
                echo "<br>Valid password<br>";
            }
            return $lookup;
        }

        if (ValidateUser($user_name) && ValidatePassword($user_password)) {

            global $conn;
            $query = "select * from accounts where email ='$user_name' and password='$user_password'";
            $query = $conn->prepare($query);
            $query->execute();
            $database = $query->fetchALL(); //
            $query->closeCursor();

            header("Location: display.php?email=$user_name");
        }     else{

            echo  " login not complete";
            echo" <br><a href = 'login.html'> go back</a>";
        }
        $conn = null;
        ?>

    </div>
</main>
</body>
</html>
