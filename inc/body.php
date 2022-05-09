<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!--- Main Navigation --->
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

                <!--- Logout Button --->
                <form method="post">
                <input class='btn btn-primary m-4' type='submit' name='reguser' id='reguser' value='Register'></input>
                <input class='btn btn-success m-4' type='submit' name='loguser' id='loguser' value='Log-In'></input>
                    <input class='btn btn-danger m-4' type='submit' name='reset' id='reset' value='Log-Out'></input>
                </form>



            </div>
        </div>
    </nav>

    <!--- Difficulty Settings --->
    <?php
    include('difficulty.php');
    ?>

    <!--- Timebar style settings (not working in style.css so directly added to body.php--->
    <style>
        .round-time-bar div {
            height: 50px;
            background: linear-gradient(to bottom, red, #900);
            animation: roundtime calc(var(--duration) * 1s) linear forwards;
            transform-origin: left center;
        }

        @keyframes roundtime {
            to {
                /* More performant than animating `width` */
                transform: scaleX(0);
            }
        }
    </style>

    <!--- Home Section with register & login forms --->
    <section id="home">

        <div class="container text-center">

            <div class="row justify-content-center">

                <div class="col-md-10">
                    <h1 class="text-white display-4">Frank Quiz ++</h1>
                    <p class="text-white"> The most adventurous quiz you ever took!
                    </p>
                    

                    <!--- Main includes for questions / user & submit checker --->
                    <?php
                    include('register.php');
                    include('questions.php');
                    include('user.php');
                    include('checker.php');

                    ?>
                </div>


            </div>



        </div>




    </section>


</body>