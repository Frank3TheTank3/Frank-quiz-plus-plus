<?php





$setDelay = 0;
if (isset($_POST['difficulty'])) {
    $questNum = $_SESSION['QuestionNumber'];
    if ($_POST['difficulty'] == 'Easy') {
        $setDelay = 25000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    } else if ($_POST['difficulty'] == 'Medium') {
        $setDelay = 15000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    } else if ($_POST['difficulty'] == 'Hard') {
        $setDelay = 5000000;
        echo "<div class='d-none' id='time'>" . $setDelay . "</div>";
        $_SESSION['Delay'] = $setDelay;
        $_SESSION['QuestionNumber']++;
    }
    loadQuestion();
    loadAnswer();
    loadStats();
    $_POST['difficulty'] = null;
}
if (isset($_POST['answer'])) {
    $questNum = $_SESSION['QuestionNumber'];
    $_SESSION['Q' . $questNum] = $_POST['answer'];
    if ($_POST['answer'] == $_SESSION['Correct']) {
        $_SESSION['CorrectAnswers']++;
    } else {
        $_SESSION['WrongAnswers']++;
    }

    if ($_SESSION['QuestionNumber'] == 14) {
        showQuestionsAndAnswers();
    } else {
        $_SESSION['QuestionNumber']++;
        loadQuestion();
        loadAnswer();
        loadStats();
    }
}
