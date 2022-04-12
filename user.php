<?php
/*Functions for showing, adding & logging-in Users to the MySQL Database*/


/*Close Databases & User Log-Out*/
if (isset($_POST['resetall'])) {
    unset($_POST);
    $_POST = array();
    session_unset();
    $_SESSION['loggedin'] = false;
}

/*Open Users Database Button*/
if (isset($_POST['goUsers'])) {

    showAllUsers();
}

/*Show User Database Function*/
function showAllUsers()
{
    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $sql = "SELECT * FROM Users";
    foreach ($pdo->query($sql) as $row) {
        echo '<div class="container  p-5 my-5 bg-primary text-white ">';
        echo $row['UserID'] . "<br />";
        echo $row['UserName'] . "<br />";
        echo $row['UserPW'] . "<br /><br />";
        echo $row['UserStatus'] . "<br /><br />";
        echo '</div>';
    }
}

/////*ADD USER*/////

/*Add new User to Database*/
if (isset($_POST['adduser'])) {
    /*Check for empty fields*/
    if (isset($_POST['username'])) {

        $UserName = $_POST['username'];
    }
    if (isset($_POST['userpw'])) {

        $UserPW = $_POST['userpw'];
    }

    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    
    //Get last userID in Table
    
    $stmt = $pdo->query("SELECT * FROM Users ORDER BY UserID DESC LIMIT 1");
    $user = $stmt->fetch();
    $userpassID = $user['UserID'];

    
    //Create Insert with new user
    $sql = 'INSERT INTO Users(UserID, UserName, UserPW, UserStatus) VALUES(:userid, :username, :userpw, :status)';
   
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':userid' => $pdo->lastInsertId(),
        ':username' => $UserName,
        ':userpw' => $UserPW,
        ':status' => 'open'
    ]);

    $publisher_id = $pdo->lastInsertId();
    showAllUsers();
    $_SESSION['loggedin'] = true;
    echo 'The User ' . $UserName . ' was added to the database';
}

//Login User
if (isset($_POST['login'])) {
    $_SESSION['loggedin']  = true;
    if (isset($_POST['logusername'])) {

        $UserName = $_POST['logusername'];
    }
    if (isset($_POST['loguserpw'])) {

        $UserPW = $_POST['loguserpw'];
    }


    //Get last ID in Table
    $pdo = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');
    $stmt = $pdo->query("SELECT * FROM Users WHERE UserName = '$UserName'");
    $userLoginData = $stmt->fetch();
    if ($userLoginData == null) {
        echo "Wrong Username ";
        echo "<script>alert('Username not correct')</script> ";
    } else {

        $userpassName = $userLoginData['UserName'];
        $userpassPW = $userLoginData['UserPW'];



        $publisher_id = $pdo->lastInsertId();

        if ($userpassPW == $UserPW) {

            echo '<div class="container  p-5 my-5 bg-primary text-white ">';
            echo 'The user ' . $userpassName  . ' with the password ' .  $userpassPW  . ' was logged in';
            echo '</div>';

        } else {
            echo "Wrong Password ";
            echo "<script>alert('Passwort not correct')</script> ";
        }
    }
}