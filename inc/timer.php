

<?php
function startTimer()
{
        $sessionDelay = $_SESSION['Delay'];
        $timerDelay = ( $sessionDelay/ 1000000);
        print_r('Time delay is: ' . $timerDelay );
    $now = time();
    while ($now + $timerDelay > time()) {
        // do nothing
    }
    $_SESSION['QuestionNumber']++;
    loadQuestion();
    loadAnswer();

    ob_start();
    header("Refresh:0; url=index.php");
    //header('Location: index.php');
    ob_end_flush();
    die();

}
startTimer();
?>