
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

        require 'databaseAuthentication.php';

        $email = $_GET['email'];
        $question_name = $_POST['questionName'];
        $question_skill = $_POST['questionSkill'];
        $question_body = $_POST['Question'];
        $datetime =  date('Y-m-d H:i:s');
        $arrayOfSkill = explode(",",$question_skill);
        $skillsArray = implode(",", $arrayOfSkill);
        $array_count = count($arrayOfSkill);

        echo $question_body;

        function checkqtitle ($question_name){
            $look = true;
            if( empty($question_name)){
                $look = false;
                echo ' enter question tile';
            }
            return $look;
        }

        function checkskills ($array_count){
            $look = true;
            if( empty($array_count)){
                $look = false;
                echo ' enter question skills';
            }
            elseif ( $array_count < 2){

                echo " enter 2 or more skills";
                $look = false;
            }
            return $look;
        }

        function checkbody ($question_body){
            $look = true;
            if( empty($question_body)){
                $look = false;
                echo ' enter question body';
            }
            elseif (strlen($question_body) > 500){
                echo"It Shouldn't be more than 500 Character !!";
                $look = false;
            }
            return $look;
        }

        if (checkqtitle ($question_name) && checkskills ($array_count) && checkbody ($question_body)) {

            global $conn;

            $query = "SELECT * FROM accounts where email = '$email'";
            $query = $conn->prepare($query);
            $query->execute();
            $database = $query->fetchALL(); //
            $query->closeCursor();

            foreach ($database as $result) {
                $ownerid = $result['id'];
            }
            echo $ownerid;
            global $conn;
            $query = "insert into questions (owneremail, ownerid, createddate, title, body, skills) values ( '$email', '$ownerid', '$datetime', '$question_name', '$question_body', '$skillsArray')";
            $statement = $conn->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            header("Location: display.php?email=$email");

        }

        ?>
    </div>
</main>
</body>
</html>