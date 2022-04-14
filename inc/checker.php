<?php
$questNum = $_SESSION['QuestionNumber'];

if (isset($_POST['answer'])) {
    $_SESSION['Q' . $questNum] = $_POST['answer'];
    if($_POST['answer'] == $_SESSION['Correct'])
    {
        $_SESSION['CorrectAnswers']++;
        

    }
    else
    {
        $_SESSION['WrongAnswers']++;

    }

    if($_SESSION['QuestionNumber'] == 14)
    {
        showQuestionsAndAnswers();
    }
    else
    { 
        $_SESSION['QuestionNumber']++;
        loadQuestion();
        loadAnswer();
    }
}
    
   


    ?>