<?php


/*Functions for showing and adding Questions to the MySQL Database*/

/*Start PDO & get query Result for Questions & Answers*/

function loadQuestion()

{
    
    echo "<div id='questions' class='rounded-pill d-flex align-items-center justify-content-center container
    p-5 my-5 bg-dark text-white'>";
    echo "Question Number: " . $_SESSION['QuestionNumber'] . "<br>";
    echo "Correct Answers: " . $_SESSION['CorrectAnswers']. "<br>";
    echo "Wrong Answers: " . $_SESSION['WrongAnswers'];
    echo "</div>";

    $questionNum = $_SESSION['QuestionNumber'];
    
    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql4 = "SELECT * FROM Questions WHERE Questions.QuestionIndex = $questionNum";
    $result = $pdo->query($sql4);
    
    foreach ($result  as $row) {
        echo "<div id='questions' class='rounded-pill d-flex align-items-center justify-content-center container 
 p-5 my-5 bg-dark text-white'>";
        echo $row['Question'];
        echo "</div>";
    }
    
}

function loadAnswer()

{
    

    $answerNum = $_SESSION['QuestionNumber'];
    $pdo_Answer = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql_Answer = "SELECT * FROM Answers WHERE Answers.QuestionIndex = $answerNum";
    $result = $pdo_Answer->query($sql_Answer);
    echo "<form method='post'>";
    foreach ($result  as $row) {
        if($row['Answer_A'])
        {
 echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
 p-5 my-5 bg-success text-white' type='submit' name='answer' id='answer' value='".$row['Answer_A']."'></input>";
       

    }
    if($row['Answer_B'])
        {
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 bg-success text-white' type='submit' name='answer' id='answer' value='".$row['Answer_B']."'></input>";
        }
        if($row['Answer_C'])
        {
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 bg-success text-white' type='submit' name='answer' id='answer' value='".$row['Answer_C']."'></input>";
        }
        if($row['Answer_D'])
        {
            echo "<input class='rounded-pill d-flex align-items-center justify-content-center container 
            p-5 my-5 bg-success text-white' type='submit' name='answer' id='answer' value='".$row['Answer_D']."'></input>";
        }
        
        if($row['CorrectAnswer'])
        {
            $_SESSION['Correct'] = $row['CorrectAnswer'];
            //echo $_SESSION['Correct'];
        }
        
    }
    echo "</form>";
}

function showQuestionsAndAnswers()
{
    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql3 = "SELECT * FROM Questions, Answers WHERE Questions.QuestionIndex = Answers.QuestionIndex";
    /*Open Questions Database Button*/
    echo "<div class='d-flex m-4 justify-content-center'>";
    echo "<table width='fit-content' ><tr>";
    echo '<th>Question Number</th>';
    echo '<th>Question Status</th>';
    echo '<th>Question</th>';
    /*
    echo '<th>Answer A</th>';
    echo '<th>Answer B</th>';
    echo '<th>Answer C</th>';
    echo '<th>Answer D</th>';
    */
    echo '<th>Given Answer</th>';
    echo '<th>Correct Answer</th>';
    $givenQuestIndex = 1;
    foreach ($pdo->query($sql3) as $row) {
        echo '<tr>';
        echo '<td>' . 'No. ' . $row['QuestionIndex'] . '</td>';
        echo '<td>' . $row['Status'] . '</td>';
        echo '<td>' . $row['Question'] . '</td>';
        /*
        echo '<td>' . $row['Answer_A'] . '</td>';
        echo '<td>' . $row['Answer_B'] . '</td>';
        echo '<td>' . $row['Answer_C'] . '</td>';
        echo '<td>' . $row['Answer_D'] . '</td>';
        */
        echo '<td>' . $_SESSION['Q' . $givenQuestIndex] . '</td>';
        echo '<td>' . $row['CorrectAnswer'] . '</td>';
        echo '</tr>';
        echo '</div>';
        $givenQuestIndex ++;
    }
}
