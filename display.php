
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <style>
        table,td{
            border:1px black solid;
        }
        tr.title{
            font-weight:bold;
        }
    </style>
</head>
<body>
<main>
    <div class="Square">

        <?php
        require "databaseAuthentication.php";

        $email = $_GET['email'];
        //$fname = $_GET['fname'];
        //$lname = $_GET['lname'];

        global $conn;
        $query = "select * from accounts where email ='$email'";
        $query = $conn->prepare($query);
        $query->execute();
        $database = $query->fetchALL(); //
        $query->closeCursor();

        foreach ($database as $result) {
            $firsNname = $result['fname'] ;
            $lastName = $result['lname'] . '<br>';
        }
        echo "<h2>welcome $firsNname $lastName</h2>";

        $query = "SELECT * FROM questions where owneremail = '$email'";
        $query = $conn->prepare($query);
        $query->execute();
        $database = $query->fetchALL(); //
        $query->closeCursor();

        foreach ($database as $result) {
            $questionTitle = $result['title'] ;
            $questionBody = $result['body'] ;
            $skills = $result['skills'] . '<br>';
        }

        //check available questions
        if(count($database) < 1){
            echo "<h3> Empty questions !! please enter one</h3>";
        }
        else {
            foreach ($database as $result) {
                $title = $result['title'] . '<br>';
                $body = $result['body'] . '<br>';
                $skill = $result['skills'] . '<br>';
            }
        }



        ?>


        <table>
            <tr class="title">

                <td>Title</td><td>Body</td><td>Skills</td>
            </tr>

            <?php foreach($database as $questions) {?>
                <tr>

                    <td><?php echo $questions['title'];?></td>
                    <td><?php echo $questions['body'];?></td>
                    <td><?php echo $questions['skills'];?></td>

                </tr>
            <?php }?>
        </table>

        <br>
        <form action ="askAQuestionForm.php?email=<?php echo $email?>" method= "post" >
            <input type="submit" value="Add Question">
        </form>
        <form action ="login.html" method= "post" >
            <input type="submit" value="logout">
        </form>


    </div>
</main>
</body>
</html>
