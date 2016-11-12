<?php
error_reporting(0);
require_once("../db_const.php");
$mysqli =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}



if (!isset($_SESSION['mysesion']))
{
    /*echo "<script>window.location.assign('login.php')</script>";*/
    header("Location: ../redirect.php");
}
else{

//This code will prohibit the entering a student & lecturer into the admin' page.
    $sqlStu = "SELECT * from users WHERE indexnum LIKE '%UCD%' AND username='{$_SESSION['mysesion']}' LIMIT 1";
    $resultStu = $mysqli->query($sqlStu);

    $sqlLec = "SELECT * from users WHERE indexnum LIKE '%LEC%' AND username='{$_SESSION['mysesion']}' LIMIT 1";
    $resultLec = $mysqli->query($sqlLec);

    if ($resultStu->num_rows == 0) {
        if ($resultLec->num_rows == 1) {
            /*echo "<script>window.location.assign('acclec.php')</script>";*/
            header("Location: ../acclec.php");
        }
    }
    else {
        /*echo "<script>window.location.assign('acc.php')</script>";*/
        header("Location: ../accstu.php");
    }
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <title>SKSC LMS</title>

    <meta charset="UTF-8">
    <meta name="description" content="SKSC is a Learning Management Hub for UCD (University College Dublin)">
    <meta name="keywords" content="SKSC, LMS, Tutorials, HTML, Learning Management, Learning Hub, ">
    <meta name="author" content="SKSC Team">
    <!--Favicon-->
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon">

    <!--Importing fonts-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--footer css-->
    <link type="text/css" rel="stylesheet" href="../../../css/footer.css">

    <!--CSS IMPORT-->
    <link type="text/css" rel="stylesheet" media="all" href="../../../css/style_main.css">
    <link type="text/css" rel="stylesheet" media="all" href="../../../css/style_sub1.css">




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


<body>

<!--_______________________________________BACK TO TOP BUTTON_______________________________________-->
<div id="backtotop"></div>
<a href="#backtotop" class="top hide-on-med-and-down">
    <img style="height: 50px; width: 50px;" src="../../../images/backtotop.png" alt="back to top button">
</a>
<!--_______________________________________END OF BACK TO TOP BUTTON_______________________________________-->


<!--_______________________________________NAV BAR_______________________________________-->



<div class="navbar-fixed">

    <ul id="dropdown1" class="dropdown-content">
        <li><a class="grey-text text-darken-3" href="../../courses.html">Courses</a></li>
        <li><a  class="grey-text text-darken-3" href="../../hallallocations.html">Hall Allocations</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="../../login/redirect.php">My Account</a></li>
        <li><a class="grey-text text-darken-3" href="../../signup.html">Sign-Up</a></li>
    </ul>

    <ul id="dropdown3" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="../../events.html">Events</a></li>
        <li><a class="grey-text text-darken-3" href="../../gallery.html">Gallery</a></li>
    </ul>



    <nav class="grey darken-3 navbaropacity navbarlogo"  style="font-family: Raleway;">
        <div class="nav-wrapper">
            <a class="brand-logo center">SKSC</a>
            <img class="responsive-img  hide-on-med-and-down" id="navbarlogo1" src="../../../images/LogoLMS.png" style="margin-left: 1em;" alt="Logo">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../../../index.html">Home</a></li>
                <li><a href="../../tutorials.php">Tutorials</a></li>
                <!-- Drop-down Trigger -->
                <li><a class="dropdown-button" data-activates="dropdown1">Courses<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" data-activates="dropdown3">Events<i class="material-icons right">arrow_drop_down</i></a></li>
                <li style="background-color: dimgray"><a class="dropdown-button" data-activates="dropdown2">Members<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>

        </div>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="../../../index.html">Home</a></li>
            <li><a href="../../tutorials.php">Tutorials</a></li>
            <li class="divider"></li>
            <li><a href="../../courses.html">Courses</a></li>
            <li><a href="../../hallallocations.html">Hall Allocations</a></li>
            <li class="divider"></li>
            <li><a href="../../events.html">Events</a></li>
            <li><a href="../../gallery.html">Gallary</a></li>
            <li class="divider"></li>
            <li><a href="../../login/redirect.php">My Account</a></li>
            <li><a href="../../signup.html">Sign-Up</a></li>
        </ul>

    </nav>
</div>
<!--_______________________________________END OF NAV BAR_______________________________________-->

<!--_______________________________________CONTENT_______________________________________-->

<div class=" grey darken-4"  style=" padding: 2em; padding-top: 3em;   border-bottom:2px grey dashed;  width: 100%; margin-bottom: 3em;">
    <br />
    <p id="welcome" style="color: whitesmoke; font-size: 140%; font-family: Raleway;">Welcome <b><?php if (isset($_SESSION['mysesion'])) { echo $_SESSION['mysesion']; } ?></b></p>
    <a href="../accadmin.php" class="waves-effect waves-light btn deep-purple darken-2" ><i class="material-icons left">perm_contact_calendar</i>ADMIN PANEL</a>
    <a href="../logout.php" class="waves-effect waves-light btn  pink accent-2" style="float: right; "><i class="material-icons left">recent_actors</i>Logout</a>
</div>



<div class="container">

    <div class="row">
<?php
        $inserted=$insertedErr="";
        $today_date=date('Y-m-d');

            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT a1,a2, a3,   b1,b2, b3,    c1,c2, c3,    d1,d2, d3,    e1,e2, e3   FROM halls where date='$today_date' LIMIT 1";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object() //or header('../../hallallocations/notupdated.html');
            ?>
        <h4 style="font-weight: 300; text-align: center;">Time-Table Updater</h4>
        <table  class="striped" style="margin-top: 5em;">

            <tr>  <td colspan="3" style="text-align: center; font-size:x-large; font-weight: 300;" class="grey lighten-1"><?php echo $today_date ?> </td> </tr>
            <tr style="font-size: larger"><th>Lecture</th><th>Hall</th><th>Time</th></tr>

            <tr> <td><?php echo $r-> a1 ?></td>   <td><?php echo $r-> a2 ?></td>  <td><?php echo $r-> a3 ?></td></tr>

            <tr> <td><?php echo $r-> b1 ?></td>   <td><?php echo $r-> b2 ?></td>  <td><?php echo $r-> b3 ?></td></tr>

            <tr> <td><?php echo $r-> c1 ?></td>   <td><?php echo $r-> c2 ?></td>  <td><?php echo $r-> c3 ?></td></tr>

            <tr> <td><?php echo $r-> d1 ?></td>   <td><?php echo $r-> d2 ?></td>  <td><?php echo $r-> d3 ?></td></tr>

            <tr> <td><?php echo $r-> e1 ?></td>   <td><?php echo $r-> e2 ?></td>  <td><?php echo $r-> e3 ?></td></tr>

            <tr></tr>
            <tr></tr>
        </table>

    </div>




<!--______________________________________INSERTING INTO TIMETABLE___________________________________________-->
<?php

    if(isset($_POST['submittable']))
    {

        $a1 = $mysqli->real_escape_string($_POST['a1']);
        $a2 = $mysqli->real_escape_string($_POST['a2']);
        $a3 = $mysqli->real_escape_string($_POST['a3']);

        $b1 = $mysqli->real_escape_string($_POST['b1']);
        $b2 = $mysqli->real_escape_string($_POST['b2']);
        $b3 = $mysqli->real_escape_string($_POST['b3']);

        $c1 = $mysqli->real_escape_string($_POST['c1']);
        $c2 = $mysqli->real_escape_string($_POST['c2']);
        $c3 = $mysqli->real_escape_string($_POST['c3']);

        $d1 = $mysqli->real_escape_string($_POST['d1']);
        $d2 = $mysqli->real_escape_string($_POST['d2']);
        $d3 = $mysqli->real_escape_string($_POST['d3']);

        $e1 = $mysqli->real_escape_string($_POST['e1']);
        $e2 = $mysqli->real_escape_string($_POST['e2']);
        $e3 = $mysqli->real_escape_string($_POST['e3']);

        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        //inserting today date into database
        $sql_update_today_date="INSERT IGNORE  INTO halls (date) VALUES ('$today_date')";
        $result_update_today_date=$conn->query($sql_update_today_date);

        //inserting today timetable
        $sql = "UPDATE halls SET

                a1='$a1', a2='$a2', a3='$a3',

                b1='$b1', b2='$b2', b3='$b3',

                c1='$c1', c2='$c2', c3='$c3',

                d1='$d1', d2='$d2', d3='$d3',

                e1='$e1', e2='$e2', e3='$e3'

                WHERE date='$today_date'";

        $result=$conn->query($sql);

        if ($result === TRUE) {
        $inserted= "Updated successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='timetablechange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
        } else {
        $insertedErr="Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
<div class="row" style="margin-top: 10em;">
<h4 style="font-weight: 300">You can update time-table below</h4>
    <div class="grey lighten-4">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


    <div style="background-color: dimgrey; color: whitesmoke;">
        <div class="input-field col s4">
            <h5>Subject</h5>
        </div>

        <div class="input-field col s4">
            <h5>Hall</h5>
        </div>

        <div class="input-field col s4">
            <h5>Time</h5>
        </div>
        <hr style="margin-bottom: 2em;"/>
    </div>




    <!--_____________A______________-->
        <div style="background-color: lightgrey">
            <div class="input-field col s4">
                <input id="first_name" type="text" name="a1" value="<?php echo $r-> a1 ?>">
                <label for="first_name">a1</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="a2" value="<?php echo $r-> a2 ?>">
                <label for="first_name">a2</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="a3" value="<?php echo $r-> a3 ?>">
                <label for="first_name">a3</label>
            </div>
            <hr style="margin-bottom: 2em;"/>
        </div>
    <!--_____________A______________-->

    <!--_____________B______________-->
        <div class="input-field col s4">
            <input id="first_name" type="text" name="b1" value="<?php echo $r-> b1 ?>">
            <label for="first_name">b1</label>
        </div>

        <div class="input-field col s4">
            <input id="first_name" type="text" name="b2" value="<?php echo $r-> b2 ?>">
            <label for="first_name">b2</label>
        </div>

        <div class="input-field col s4">
            <input id="first_name" type="text" name="b3" value="<?php echo $r-> b3 ?>">
            <label for="first_name">b3</label>
        </div>
        <hr style="margin-bottom: 2em;"/>
    <!--_____________B______________-->

    <!--_____________C______________-->
        <div style="background-color: lightgrey">
            <div class="input-field col s4">
                <input id="first_name" type="text" name="c1" value="<?php echo $r-> c1 ?>">
                <label for="first_name">c1</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="c2" value="<?php echo $r-> c2 ?>">
                <label for="first_name">c2</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="c3" value="<?php echo $r-> c3 ?>">
                <label for="first_name">c3</label>
            </div>
            <hr style="margin-bottom: 2em;"/>
        </div>
    <!--_____________C______________-->

    <!--_____________D______________-->
        <div class="input-field col s4">
            <input id="first_name" type="text" name="d1" value="<?php echo $r-> d1 ?>">
            <label for="first_name">d1</label>
        </div>

        <div class="input-field col s4">
            <input id="first_name" type="text" name="d2" value="<?php echo $r-> d2 ?>">
            <label for="first_name">d2</label>
        </div>

        <div class="input-field col s4">
            <input id="first_name" type="text" name="d3" value="<?php echo $r-> d3 ?>">
            <label for="first_name">d3</label>
        </div>
        <hr style="margin-bottom: 2em;"/>
        <!--_____________D______________-->

    <!--_____________E______________-->
        <div style="background-color: lightgrey">
            <div class="input-field col s4">
                <input id="first_name" type="text" name="e1" value="<?php echo $r-> e1 ?>">
                <label for="first_name">e1</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="e2" value="<?php echo $r-> e2 ?>">
                <label for="first_name">e2</label>
            </div>

            <div class="input-field col s4">
                <input id="first_name" type="text" name="e3" value="<?php echo $r-> e3 ?>">
                <label for="first_name">e3</label>
            </div>
            <hr style="margin-bottom: 2em;"/>
        </div>
    <!--_____________E______________-->




    <div class="input-field col s12">
        <p>
            <span style="color:grey"><?php echo "$inserted" ?></span>
            <span style="color:grey"><?php echo "$insertedErr" ?></span>
        </p>
    </div>

    <div class="input-field col s12">
        <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submittable" onclick="submittableconfirm(event)">Update Table</button>
        <script type="text/javascript">
            function submittableconfirm(e)
            {
                if(!confirm('Are you sure you want to update time table?'))e.preventDefault();
            }
        </script>
    </div>
</form>


    </div>
<!--__________________________________________END OF INSERTING INTO TIMETABLE___________________________________________-->
</div>

</div>
<!--_______________________________________END OF CONTENT_______________________________________-->


<!--_______________________________________FOOTER_______________________________________-->


<footer class="page-footer grey darken-4" style="font-family: Raleway;">
    <div class="grey darken-4">

        <div class="row">
            <div class="col m3 s12 offset-s2 offset-m1">
                <img class="responsive-img" src="../../../images/LogoLMS.png" style="top: 1em; position: relative;" alt="Logo">
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
                <a href="../../../index.html"><img class="icon" src="../../../images/LogoLMS.png" style="height: 60px; width: 60px;" alt="Logo"></a>
                <a href="http://www.ucd.ie/" target="_blank"><img class="icon" src="../../../images/LogoUCD.png" style="height: 55px; width: 45px;" alt="logoUCD"></a>
            </div>
            <div class="col m2 s12 offset-m1">
                <h6 class="white-text">Visit Us</h6>
                <ul>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://www.facebook.com/universitycollegedublin">
                            <img style="height: 57px; width: 50px;" src="../../../images/fb.png" alt="fb"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://twitter.com/ucddublin">
                            <img style="height: 57px; width: 50px;" src="../../../images/twitter.png" alt="twitter"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://plus.google.com/+universitycollegedublin/about">
                            <img style="height: 57px; width: 50px;" src="../../../images/gplus.png" alt="GPlus"></a>
                    </li>
                </ul>
            </div>
        </div>







        <hr style="display: block; height: 1px; border: 0; border-top: 1px solid #424242; padding: 0; margin-left: 15px; margin-right: 15px;"/>

        <div class="footer-copyright grey darken-4 grey-text text-darken-2 ">
            <div class="container">
                Copyright &copy; SKSC 2015 . All Rights Reserved.
            </div>

        </div>

    </div>
</footer>


<!--______________________________________________END OF FOOTER______________________________________________-->




<!--________________________________________________________________________________________________-->

<!--Import jQuery and materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../../../js/materialize.min.js"></script>

<!--Import jquery.scrollAnimate.js-->
<script type="text/javascript" src="../../../js/jquery.scrollAnimate.js"></script>
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
<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
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








</body>
</html>


