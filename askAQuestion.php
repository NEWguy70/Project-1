<?php
$question_name = $_POST['questionName'];
$question_skill = $_POST['questionSkill'];
$question_body = $_POST['Question'];
$arrayOfSkill = explode(",",$question_skill);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<main>
    <?php
    if (strlen($question_name) == 0)
        print('Please enter a title<br>');
    elseif (strlen($question_name)<3)
        print('At least 3 characters needed<br>');
    else
        print("$question_name<br>");


    if(strlen($question_body) == 0)
        print('Please enter a sentence<br>');
    elseif (strlen($question_body)>500)
        print('Must be less than 500 characters<br>');
    else
        print("$question_body<br>");


    if(count($arrayOfSkill) < 2)
        print('Need to have 2 or more skills seperated by a comma<br>');
    else
        print_r($arrayOfSkill);


    ?>

</main>
</body>
</html>
