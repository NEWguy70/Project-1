
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

            function checkfname ($firstName){
                $look = true;
                if( empty($firstName)){
                    $look = false;
                    echo ' enter first name';
                }
                return $look;
            }

            function checklname ($lastName){
                $look = true;
                if( empty($lastName)){
                    $look = false;
                    echo ' enter last name';
                }
                return $look;
            }

            function checkdob ($DOB){
                $look = true;
                if( empty($DOB)){
                    $look = false;
                    echo ' enter date of birth';
                }
                return $look;
            }

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
//        else
//            echo 'Email address not valid. Please try again<br>';
//            $lookup = false;

                if($lookup == true){
                    echo "<br>Valid email<br>";}

                return $lookup;
            }


            function ValidatePassword($password)
            {
                $lookup = true;

                if ((strlen($password) == 0 || (strlen($password) < 8))) {
                    print('Password is not valid. Needs to be at least 8 characters. Please try again.<br>');
                    $lookup = false;
                }
                if ($lookup == true) {
                    echo "<br>Valid password<br>";
                }
                return $lookup;
            }


            if ( checkfname ($firstName) && checklname ($lastName) && checkdob ($DOB) && ValidateUser($user_name) && ValidatePassword($password) ) {

                global $conn;
                $query = "select * from accounts where email ='$user_name'";
                $query = $conn->prepare($query);
                $query->execute();
                $database = $query->fetchALL(); //
                $query->closeCursor();

                if ( count($database) > 0){
                    echo 'The email already registered';
                    echo "<form action =\"Registration.html\" method= \"post\" >
          <input type=\"submit\" value=\"BACK\"></form>";

                    echo '<br>';

                    echo "<form action =\"login.html\" method= \"post\" >
          <input type=\"submit\" value=\"LOGIN\">
      </form>";
                }
                else {
                    $query = "insert into accounts (email, fname, lname, birthday, password) values ('$user_name', '$firstName','$lastName','$DOB','$password')";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $statement->closeCursor();
                    header("Location: display.php?email=$user_name");

                }

            }
            else
                echo" <br><a href = 'Registration.html'> go back</a>";


            ?>

    </div>
</main>
</body>
</html>
