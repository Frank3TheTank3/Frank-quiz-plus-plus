<?php

////////////////////////////////////////////////////////////////////
/*Functions for showing and adding Questions to the MySQL Database*/
////////////////////////////////////////////////////////////////////


/////////////////////////////
/////*LOAD DIFFICULTY*///////
////////////////////////////

/*Start PDO & get query Result for Questions & Answers*/
function loadDifficulty()
{
    echo '<script>toggleTimeBar()</script>';
    echo '<script>toggleUserDisplay();</script>';

    echo "<form method='post'>";
    echo "<input class='bg-info rounded-pill d-flex align-items-center justify-content-center container 
    p-5 my-5 text-black' type='submit' name='difficulty' id='difficulty' value='Easy'></input>";

    echo "<input class='bg-warning rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 text-black' type='submit' name='difficulty' id='difficulty' value='Medium'></input>";

    echo "<input class='bg-danger rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 text-black' type='submit' name='difficulty' id='difficulty' value='Hard'></input>";
    echo "</form>";
}

/////////////////////////////
/////*LOAD QUESTION*////////
////////////////////////////

/*Start PDO & get query Result for Questions*/
function loadQuestion()

{
    echo "<div class='d-none' id='time'>" . $_SESSION['Delay'] . "</div>";
    //Toggle User login & Create Timebar
    echo '<script>toggleUserDisplay();</script>';
    createTimebar();
   

    $questionNum = $_SESSION['QuestionNumber'];

    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql4 = "SELECT * FROM QnA WHERE QnA.QID = $questionNum";
    $result = $pdo->query($sql4);

    foreach ($result  as $row) {
        echo "<div id='questions' class='rounded-pill d-flex align-items-center justify-content-center container 
 p-5 my-5 bg-dark text-white'>";
        echo $row['QUESTION'];
        echo "</div>";
        echo "<style>
        #home {
            width:100%; height:100%;
            background-image: url(imgs/questimgs/P" . $questionNum . ".jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; 
        }
            </style>";
    }
    echo "<script> onTimerEnd(); </script>";
}

/////////////////////////////
/////*LOAD STATS*///////////
////////////////////////////

//Load Correct & Wrong Answer Stats
function loadStats()
{

    echo "<div id='questions' class='rounded-pill d-flex align-items-center justify-content-center container
    p-5 my-5 bg-dark text-white'>";
    echo "Question Number: " . $_SESSION['QuestionNumber'] . "<br>";
    echo "Correct Answers: " . $_SESSION['CorrectAnswers'] . "<br>";
    echo "Wrong Answers: " . $_SESSION['WrongAnswers'];
    echo "</div>";
}

/////////////////////////////
/////*LOAD ANSWER*///////////
////////////////////////////

//Load Answers to Question Num as form inputs
function loadAnswer()

{
    $answerNum = $_SESSION['QuestionNumber'];
    $pdo_Answer = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql_Answer = "SELECT * FROM QnA WHERE QnA.QID = $answerNum";
    $result = $pdo_Answer->query($sql_Answer);

    

    echo "<form method='post'>";
    foreach ($result  as $row) {
        $answerString = $row['ANSWERS'];
        $str_arr = preg_split ("/\,/", $answerString);

        if ($row['ANSWERS']) {

            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
 p-5 my-5 text-white' type='submit' name='answer' id='answer' value='" . $str_arr [0] . "'></input>";
       
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 text-white' type='submit' name='answer' id='answer' value='" . $str_arr [1]  . "'></input>";
     
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 text-white' type='submit' name='answer' id='answer' value='" . $str_arr [2]  . "'></input>";
        
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 text-white' type='submit' name='answer' id='answer' value='" .  $str_arr [3] . "'></input>";
        }

        if ($row['CORRECT']) {
            $_SESSION['Correct'] = $row['CORRECT'];
        }
    }
    echo "</form>";
    echo "<style>
    #answer{
        background: #1ac139a6;
    }
    </style>";
}

/////////////////////////////
/////*SHOW RESULTS*//////////
////////////////////////////

function showQuestionsAndAnswers()
{
    echo '<script>toggleUserDisplay();</script>';
    showScore();
    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql3 = "SELECT * FROM QnA";
    echo "<div class='d-flex m-4 justify-content-center'>";
    echo "<table width='fit-content' ><tr>";
    echo '<th>Question Number</th>';
    echo '<th>Question</th>';
  
    echo '<th>Given Answer</th>';
    echo '<th>Correct Answer</th>';
    $givenQuestIndex = 1;
    foreach ($pdo->query($sql3) as $row) {
        echo '<tr>';
        echo '<td>' . 'No. ' . $row['QID'] . '</td>';
        echo '<td>' . $row['QUESTION'] . '</td>';
        echo '<td>' . $_SESSION['Q' . $givenQuestIndex] . '</td>';
        echo '<td>' . $row['CORRECT'] . '</td>';
        echo '</tr>';
        $givenQuestIndex++;
    }
    echo '</div>';

    /* Further Stats from the Answer Database - not in use
        echo '<td>' . $row['Status'] . '</td>';
        echo '<td>' . $row['Answer_A'] . '</td>';
        echo '<td>' . $row['Answer_B'] . '</td>';
        echo '<td>' . $row['Answer_C'] . '</td>';
        echo '<td>' . $row['Answer_D'] . '</td>';
        */
    
}

/////////////////////////////
/////*LOAD SCOREs*//////////
////////////////////////////

//Show final score at the end of the quiz
function showScore()
{

    echo "<div class='d-flex m-4 justify-content-center'>";
    echo "<h1> Final Score:" . $_SESSION['CorrectAnswers'] ."</h1> ";
    echo '</div>';
}
