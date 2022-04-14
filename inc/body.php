<body data-bs-spy="scroll" data-bs-target=".navbar">


  <nav class="navbar navbar-expand-lg navbar-dark bg-white">

    <!--- Header Table for Logo & Name --->

    <img style="width:200px;" src="imgs/book.jpg" alt="" class="navbar-brand logo-image"></th>
    <p class="h1 text-black">Frank Quiz ++</p>

    <div id="navcontainer" class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link" href="">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Sumit Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Contact</a>
          </li>

        </ul>
        <form method="post">
        <input class='btn btn-primary m-4' type='submit' name='reset' id='reset' value='Logout'></input>
        </form>
        
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success bg-white" type="submit">Search</button>
        </form>

      </div>
    </div>
  </nav>

  <section id="home">

    <div class="container text-center">

      <div class="row justify-content-center">

        <div class="col-md-10">
          <h1 class="text-white display-4">Frank Quiz ++</h1>
          <p class="text-white"> The most adventurous quiz you ever took!
          </p>


        </div>


      </div>



    </div>




  </section>
  
  <form id='logregform' method="post">
    <h1 class="text-center">Register</h1>
    <!-- Add User -->
    <div id='adduser' class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-success text-white'>
        <label for="username"> Username:</label>
        <input class='btn btn-light m-4' type='text' name='username' id='username' value=''></input>
        <label for="userpw"> Password:</label>
        <input class='btn btn-light m-4' type='password' name='userpw' id='userpw' value=''></input>
        <input class='btn btn-light m-4' type='submit' name='adduser' id='adduser' value='Register'></input>
    </div>
    </form>
    <form method="post">
    <h1 class="text-center">Log-In</h1>
    <!-- Login User -->
    <div id='loguser' class='rounded-pill d-flex align-items-center justify-content-center container  p-5 my-5 bg-dark text-white'>
        <label for="logusername"> Username:</label>
        <input class='btn btn-primary m-4' type='text' name='logusername' id='logusername' value=''></input>
        <label for="loguserpw"> Password:</label>
        <input class='btn btn-primary m-4' type='password' name='loguserpw' id='loguserpw' value=''></input>
        <input class='btn btn-primary m-4' type='submit' name='login' id='login' value='Login'></input>
    </div>
    </form>




<?php

include('questions.php');
include('user.php');
include('checker.php');
?>

