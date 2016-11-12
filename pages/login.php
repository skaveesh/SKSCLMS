<!DOCTYPE html>
<?php


//

//creating a null session
//$_SESSION['mysesion']=NULL;
//creating a null session

if (!isset($_POST['submit'])){








?>


<html lang="en">
<head>
    <title>SKSC LMS</title>

    <meta charset="UTF-8">
    <meta name="description" content="SKSC is a Learning Management Hub for UCD (University College Dublin)">
    <meta name="keywords" content="SKSC, LMS, Tutorials, HTML, Learning Management, Learning Hub, ">
    <meta name="author" content="SKSC Team">
    <!--Favicon-->
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!--Importing fonts-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--footer css-->
    <link type="text/css" rel="stylesheet" href="../css/footer.css">

    <!--CSS IMPORT-->
    <link type="text/css" rel="stylesheet" media="all" href="../css/style_main.css">
    <link type="text/css" rel="stylesheet" media="all" href="../css/style_sub1.css">
    <style>

        /* label color */
        .input-field label {
            color: grey;
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: grey;
        }
        .input-field input[type=password]:focus + label {
            color: grey;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #3d5afe;
            box-shadow: 0 1px 0 0 #3d5afe;
        }
        /* label underline focus color */
        .input-field input[type=password]:focus {
            border-bottom: 1px solid #3d5afe;
            box-shadow: 0 1px 0 0 #3d5afe;
        }
        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #3d5afe;
            box-shadow: 0 1px 0 0 #3d5afe;
        }
        /* invalid color */
        .input-field input[type=text].invalid {
            border-bottom: 1px solid #3d5afe;
            box-shadow: 0 1px 0 0 #3d5afe;
        }
        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #3d5afe;
        }


        @font-face {
            font-family: Roboto-Light;
            src: url(../font/roboto/Roboto-Light.woff);
        }


        #paper{
            margin-left: 10em; margin-right: 10em;
        }

        @media only screen and (max-width: 1024px) {

            #paper{
                margin-left: 5em;
                margin-right: 5em;
            }
        }
        @media only screen and (max-width: 768px) {

            #paper{
                margin-left: 0; margin-right: 0;
            }
        }




    </style>
    <style>

        .navbarlogo {
            height: 135px;
            transition: height .35s;
        }



        .navbarlogo.second-state{
            height: 65px;
        }

        #navbarlogo1 {
            height: 135px;
            transition: height .35s;
        }



        #navbarlogo1.second-state{
            height: 65px;
        }

    </style>
</head>


<body style="background-color: #757575;">

<!--_______________________________________BACK TO TOP BUTTON_______________________________________-->
<div id="backtotop"></div>
<a href="#backtotop" class="top hide-on-med-and-down">
    <img style="height: 50px; width: 50px;" src="../images/backtotop.png" alt="back to top button">
</a>
<!--_______________________________________END OF BACK TO TOP BUTTON_______________________________________-->


<!--_______________________________________NAV BAR_______________________________________-->



<div class="navbar-fixed">

    <ul id="dropdown1" class="dropdown-content">
        <li><a class="grey-text text-darken-3" href="courses.html">Courses</a></li>
        <li><a  class="grey-text text-darken-3" href="hallallocations.html">Hall Allocations</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="login/redirect.php">My Account</a></li>
        <li><a class="grey-text text-darken-3" href="signup.html">Sign-Up</a></li>
    </ul>

    <ul id="dropdown3" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="events.html">Events</a></li>
        <li><a class="grey-text text-darken-3" href="gallery.html">Gallery</a></li>
    </ul>



    <nav class="grey darken-3 navbaropacity navbarlogo"  style="font-family: Raleway;">
        <div class="nav-wrapper">
            <a class="brand-logo center">SKSC</a>
            <img class="responsive-img  hide-on-med-and-down" id="navbarlogo1" src="../images/LogoLMS.png" style="margin-left: 1em;" alt="Logo">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../index.html">Home</a></li>
                <li><a href="tutorials.php">Tutorials</a></li>
                <!-- Drop-down Trigger -->
                <li><a class="dropdown-button" data-activates="dropdown1">Courses<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" data-activates="dropdown3">Events<i class="material-icons right">arrow_drop_down</i></a></li>
                <li style="background-color: dimgrey;"><a class="dropdown-button" data-activates="dropdown2">Members<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>

        </div>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="../index.html">Home</a></li>
            <li><a href="tutorials.php">Tutorials</a></li>
            <li class="divider"></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="hallallocations.html">Hall Allocations</a></li>
            <li class="divider"></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="gallery.html">Gallary</a></li>
            <li class="divider"></li>
            <li><a href="login/redirect.php">My Account</a></li>
            <li><a href="signup.html">Sign-Up</a></li>
        </ul>

    </nav>
</div>
<!--_______________________________________END OF NAV BAR_______________________________________-->

<!--_______________________________________CONTENT_______________________________________-->

<pre>






    
</pre>



<div class="container" style="padding-bottom: 5em;" >
    <div class="hoverable s12" id="paper" style="background-color: white">
        <div class="row" style="padding-bottom: 5em; padding-top: 5em;">

            <!--________________________________________REGISTER FORM___________________________________________-->


            <!-- The HTML login form -->
            <h4 class="col s10 offset-s1 center" style="font-family: Roboto-Light;">Login&nbsp;&nbsp;</h4>

            <form class="col s10 offset-s1" action="#<?php $_SERVER['PHP_SELF']?>" method="post">

                <div class="input-field col s12 center">
                    <i class="material-icons prefix">supervisor_account</i>
                        <input id="form_username" title="Enter Username" type="text" name="username" />
                    <label for="form_username">Username</label>
                </div>

                <div class="input-field col s12 center" style="padding-bottom: 3em;">
                    <i class="material-icons prefix">album</i>
                        <input id="form_pass" title="Enter Password" type="password" name="password" />
                    <label for="form_pass">Password</label>
                </div>

                <div class="input-field col s12" style="padding-bottom: 3em;">
                    <a href="login/forgot.php">Forgot password?</a>
                </div>

                <div class="input-field col s10 offset-s1 center">
                    <button class="btn waves-effect waves-light  btn-large indigo accent-3" type="submit" name="submit">Login
                        <i class="material-icons right">assignment_ind</i>
                    </button>
                </div>
            </form>

        </div>

        <div class="row" style="padding-bottom: 7em;">

            <p class="center" style="font-size: 180%; font-weight: 200;">The ease and simplicity<br /> of creating an account.<br />

             Helps you to be organized!<br />

             Stay connected everywhere!</p>

            <div class="input-field col s8 offset-s2 center">
                <a class="btn waves-effect waves-light  btn-large indigo accent-3" href="signup.html">Register Now
                    <i class="material-icons right">assignment_ind</i>
                </a>
            </div>
        </div>
    </div>
    </div>

<?php

        } else {


            require_once("login/db_const.php");
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            // check connection
            if ($mysqli->connect_errno) {
            echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            exit();
        }

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //protecting from injecting
        $username = stripcslashes($username);
        $password = stripslashes($password);
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);







        $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
        $result = $mysqli->query($sql);

        $sqlLec = "SELECT * from users WHERE indexnum LIKE '%LEC%' AND username='{$username}' LIMIT 1";
        $resultLec = $mysqli->query($sqlLec);

        $sqlStu = "SELECT * from users WHERE indexnum LIKE '%UCD%' AND username='{$username}' LIMIT 1";
        $resultStu = $mysqli->query($sqlStu);

        $sqlAdmin = "SELECT * from users WHERE username='{$username}' AND email='admin@sksc.com' LIMIT 1";
        $resultAdmin = $mysqli->query($sqlAdmin);

        if (!$result->num_rows == 1) {
            header('Location: login/loginerror.html');
        }

        else {

            session_start();
            $_SESSION['mysesion']=$username;



        if ($resultLec->num_rows == 0){
        if ($resultAdmin->num_rows == 0){
        if ($resultStu->num_rows == 1){
        //echo "<script>window.location.assign('acc.php')</script>";
        header("Location: login/accstu.php");
        }
        }
        else{
        /*echo "<script>window.location.assign('accadmin.php')</script>";*/
        header("Location: login/accadmin.php");
        }
        }
        else{
        /*echo "<script>window.location.assign('acclec.php')</script>";*/
        header("Location: login/acclec.php");
        }
        }
        }

        ?>

        <!--_____________________________________END OF REGISTER FORM_______________________________________-->





<!--_______________________________________END OF CONTENT_______________________________________-->


<!--_______________________________________FOOTER_______________________________________-->


<footer class="page-footer grey darken-4" style="font-family: Raleway;">
    <div class="grey darken-4">



        <div class="row">
            <div class="col m3 s12 offset-s2 offset-m1">
                <img class="responsive-img" src="../images/LogoLMS.png" style="top: 1em; position: relative;" alt="Logo">
            </div>
            <div class="col m5 s12">
                <h5 class="white-text">SKSC Learning Management System</h5>
                <p class="grey-text text-lighten-4">
                    SKSC is optimized for learning. Tutorials, references, and
                    examples are constantly reviewed to avoid errors, but we cannot
                    warrant full correctness of all content. While using this site,
                    you agree to our terms of use.
                </p>
                <br />
                <br />
                <a href="../index.html"><img class="icon" src="../images/LogoLMS.png" style="height: 60px; width: 60px;" alt="Logo"></a>
                <a href="http://www.ucd.ie/" target="_blank"><img class="icon" src="../images/LogoUCD.png" style="height: 55px; width: 45px;" alt="logoUCD"></a>
            </div>
            <div class="col m2 s12 offset-m1">
                <h6 class="white-text">Visit Us</h6>
                <ul>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://www.facebook.com/universitycollegedublin">
                        <img style="height: 57px; width: 50px;" src="../images/fb.png" alt="fb"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://twitter.com/ucddublin">
                        <img style="height: 57px; width: 50px;" src="../images/twitter.png" alt="twitter"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://plus.google.com/+universitycollegedublin/about">
                        <img style="height: 57px; width: 50px;" src="../images/gplus.png" alt="GPlus"></a>
                    </li>
                </ul>
            </div>
        </div>





        <hr style="display: block; height: 1px; border: 0; border-top: 1px solid #424242; padding: 0; margin-left: 15px; margin-right: 15px;"/>


        <div class="footer-copyright grey darken-4 grey-text text-darken-2 ">
            <div class="container">
                Copyright © SKSC 2015 . All Rights Reserved.

            </div>

        </div>



    </div>
</footer>


<!--______________________________________________END OF FOOTER______________________________________________-->




<!--________________________________________________________________________________________________-->

<!--Import jQuery and materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<!--Import jquery.scrollAnimate.js-->
<script type="text/javascript" src="../js/jquery.scrollAnimate.js"></script>
<script type="text/javascript">

    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: true, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false // Displays dropdown below the button
    });



    $( document ).ready(function() {
        $(".button-collapse").sideNav();
    });



</script>
<!--This Content is used to animate items when scrolling. Associated with jquery.scrollAnimate.js-->
<!--______________________________________________BEGIN OF ANIMATE______________________________________________-->
<script>
    $(document).ready(function() {
        $('.navbaropacity').scrollAnimate({
            startScroll: 100,
            endScroll: 300,
            cssProperty: 'opacity',
            before: 1,
            after:.9
        });


    });
    jQuery(document).ready(function($) {
        $(window).scroll(function() {
            var scroll 		= $(this).scrollTop();


            if (scroll > 50) {
                $('.navbarlogo').addClass('second-state');


            } else {
                $('.navbarlogo').removeClass('second-state');


            }
        });

        $(window).scroll(function() {
            var scroll1 		= $(this).scrollTop();


            if (scroll1 > 50) {

                $('#navbarlogo1').addClass('second-state');

            } else {

                $('#navbarlogo1').removeClass('second-state');

            }
        });

    });
</script>

<!--______________________________________________END OF ANIMATE______________________________________________-->

<!--______________________________________________BEGIN OF BACK TO TOP JAVASCRIPT______________________________________________-->
<script>
    $(document).ready(function() {
        var offset=250, // At what pixels show Back to Top Button
                scrollDuration=300; // Duration of scrolling to top
        $(window).scroll(function() {
            if ($(this).scrollTop() > offset)
            {
                $('.top').fadeIn(500); // Time(in Milliseconds) of appearing of the Button when scrolling down.
            }
            else
            {
                $('.top').fadeOut(500); // Time(in Milliseconds) of disappearing of Button when scrolling up.
            }
        });

        // Smooth animation when scrolling
        $('.top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0}, scrollDuration);
        })
    });
</script>
<!--______________________________________________END OF BACK TO TOP JAVASCRIPT______________________________________________-->



<!--__________________________________END OF THE PAGE____________________________________________-->
</body>
</html>
        