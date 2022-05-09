<?php

function showReg()
{

echo ("<section id='userreg'>
        <form method='post'>
        <h1 class='text-center'>Register</h1>
        <!-- Add User -->
        <div class='rounded-pill bg-dark d-flex align-items-center justify-content-center container  p-5 my-5 text-white'>
            <label for='username'> Username:</label>
            <input class='btn btn-light m-4' type='text' name='username' id='username' value=''></input>
            <label for='userpw'> Password:</label>
            <input class='btn btn-light m-4' type='password' name='userpw' id='userpw' value=''></input>
            <input class='btn btn-light m-4' type='submit' name='adduser' id='adduser' value='Register'></input>
        </div>
    </form>
</section>");

echo("<script>toggleLoginDisplay()</script>");

}

function showLog()
{

echo ("<section id='userlog'>
<form method='post'>
    <h1 class='text-center'>Log-In</h1>
    <!-- Login User -->
    <div class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-success text-white'>
        <label for='logusername'> Username:</label>
        <input class='btn btn-light m-4' type='text' name='logusername' id='logusername' value=''></input>
        <label for='loguserpw'> Password:</label>
        <input class='btn btn-light m-4' type='password' name='loguserpw' id='loguserpw' value=''></input>
        <input class='btn btn-light m-4' type='submit' name='login' id='login' value='Login'></input>
    </div>
</form>
</section>");
echo("<script>toggleRegisterDisplay()</script>");
}
?>