<?php

//Initiate Delay Variable
$setDelay = 0;

//////////////////////////////////////////
/////*DIFFICULTY SUBMIT ACTION*///////////
/////////////////////////////////////////

//On Choose Difficulty submit
if (isset($_POST['difficulty'])) {
    $questNum = $_SESSION['QuestionNumber'];

    //Easy
    if ($_POST['difficulty'] == 'Easy') {
        $setDelay = 25000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    }

    //Medium
    else if ($_POST['difficulty'] == 'Medium') {
        $setDelay = 15000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    }

    //Hard
    else if ($_POST['difficulty'] == 'Hard') {
        $setDelay = 5000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    }

    //Load Question + Answer + Stats
    loadQuestion();
    loadAnswer();
    loadStats();
    //Reset Difficulty variable
    $_POST['difficulty'] = null;
}

///////////////////////////////////////
/////*ANSWER SUBMIT ACTIONS*///////////
///////////////////////////////////////

//On Answer submit
if (isset($_POST['answer'])) {
    $questNum = $_SESSION['QuestionNumber'];
    $_SESSION['Q' . $questNum] = $_POST['answer'];

    //Correct
    if ($_POST['answer'] == $_SESSION['Correct']) {
        $_SESSION['CorrectAnswers']++;
    }
    //Wrong
    else {
        $_SESSION['WrongAnswers']++;
    }

    //End of the Quiz
    if ($_SESSION['QuestionNumber'] == 14) {
        showQuestionsAndAnswers();
    } 

    //Continue to next question if not end of the quiz & reload question + answer + stats with new question number
    else {
        $_SESSION['QuestionNumber']++;
        loadQuestion();
        loadAnswer();
        loadStats();
    }
}
