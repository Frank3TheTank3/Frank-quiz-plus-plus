<form method="post">
    <!-- Add User -->
    <div id='adduser' class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-success text-white'>
        <label for="titel"> Register now:</label>
        <input class='btn btn-light m-4' type='text' name='username' id='username' value=''></input>
        <input class='btn btn-light m-4' type='password' name='userpw' id='userpw' value=''></input>
        <input class='btn btn-light m-4' type='submit' name='adduser' id='adduser' value='Add a User'></input>
    </div>


    <!-- Login User -->
    <div class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-dark text-white'>
        <label for="logusername"> Login:</label>
        <input class='btn btn-primary m-4' type='text' name='logusername' id='logusername' value=''></input>
        <label for="password"> Password:</label>
        <input class='btn btn-primary m-4' type='password' name='loguserpw' id='loguserpw' value=''></input>
        <input class='btn btn-primary m-4' type='submit' name='login' id='login' value='Login User'></input>
    </div>
</form>

<?php

include('user.php');

?>