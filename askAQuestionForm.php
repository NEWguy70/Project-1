
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
        $email = $_GET['email'];
        ?>


        <font color = "#0000cd"><h1>Post a Question</h1></font>
        <form action ="askAQuestion.php?email=<?php echo $email?>" method="post">
            <table>
                <tr>
                    <td>Question Name: </td>
                    <td><input type="text" name="questionName"></td>
                </tr>
                <tr>
                    <td>Question Skill: </td>
                    <td><input type="text" name="questionSkill"></td>
                </tr>
                <tr>
                    <td>Question Body</td>
                    <td>
                        <textarea name="Question" rows="6" cols="60"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="post"></td>
                </tr>
            </table>
        </form>

    </div>
</main>
</body>
</html>
