<?php

require_once("db_const.php");
$mysqli =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}



if (!isset($_SESSION['mysesion']))
{
    //echo "<script>window.location.assign('login.php')</script>";
    header("Location: redirect.php");
}
else {

//This code will prohibit the entering a student & admin into the lectures' page.
    $sqlStu = "SELECT * from users WHERE indexnum LIKE '%UCD%' AND username='{$_SESSION['mysesion']}' LIMIT 1";
    $resultStu = $mysqli->query($sqlStu);

    $sqlAdmin = "SELECT * from users WHERE username='{$_SESSION['mysesion']}' AND email='admin@sksc.com' LIMIT 1";
    $resultAdmin = $mysqli->query($sqlAdmin);

    if ($resultStu->num_rows == 0) {
        if ($resultAdmin->num_rows == 1) {
            //echo "<script>window.location.assign('accadmin.php')</script>";
            header("Location: accadmin.php");
        }
    }
    else {
        //echo "<script>window.location.assign('acc.php')</script>";
        header("Location: accstu.php");
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
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">

    <!--Importing fonts-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--footer css-->
    <link type="text/css" rel="stylesheet" href="../../css/footer.css">

    <!--CSS IMPORT-->
    <link type="text/css" rel="stylesheet" media="all" href="../../css/style_main.css">
    <link type="text/css" rel="stylesheet" media="all" href="../../css/style_sub1.css">
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
    <img style="height: 50px; width: 50px;" src="../../images/backtotop.png" alt="back to top button">
</a>
<!--_______________________________________END OF BACK TO TOP BUTTON_______________________________________-->


<!--_______________________________________NAV BAR_______________________________________-->



<div class="navbar-fixed">

    <ul id="dropdown1" class="dropdown-content">
        <li><a class="grey-text text-darken-3" href="../courses.html">Courses</a></li>
        <li><a  class="grey-text text-darken-3" href="../hallallocations.html">Hall Allocations</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="../login/redirect.php">My Account</a></li>
        <li><a class="grey-text text-darken-3" href="../signup.html">Sign-Up</a></li>
    </ul>

    <ul id="dropdown3" class="dropdown-content">
        <li><a  class="grey-text text-darken-3" href="../events.html">Events</a></li>
        <li><a class="grey-text text-darken-3" href="../gallery.html">Gallery</a></li>
    </ul>



    <nav class="grey darken-3 navbaropacity navbarlogo"  style="font-family: Raleway;">
        <div class="nav-wrapper">
            <a class="brand-logo center">SKSC</a>
            <img class="responsive-img  hide-on-med-and-down" id="navbarlogo1" src="../../images/LogoLMS.png" style="margin-left: 1em;" alt="Logo">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../tutorials.php">Tutorials</a></li>
                <!-- Drop-down Trigger -->
                <li><a class="dropdown-button" data-activates="dropdown1">Courses<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" data-activates="dropdown3">Events<i class="material-icons right">arrow_drop_down</i></a></li>
                <li style="background-color: dimgrey;"><a class="dropdown-button" data-activates="dropdown2">Members<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>

        </div>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="../../index.html">Home</a></li>
            <li><a href="../tutorials.php">Tutorials</a></li>
            <li class="divider"></li>
            <li><a href="../courses.html">Courses</a></li>
            <li><a href="../hallallocations.html">Hall Allocations</a></li>
            <li class="divider"></li>
            <li><a href="../events.html">Events</a></li>
            <li><a href="../gallery.html">Gallary</a></li>
            <li class="divider"></li>
            <li><a href="../login/redirect.php">My Account</a></li>
            <li><a href="../signup.html">Sign-Up</a></li>
        </ul>

    </nav>
</div>
<!--_______________________________________END OF NAV BAR_______________________________________-->

<!--_______________________________________CONTENT_______________________________________-->

<div class=" grey darken-4"  style=" padding: 2em; padding-top: 3em;   border-bottom:2px grey dashed;  width: 100%; ">
    <br />
    <p id="welcome" style="color: whitesmoke; font-size: 140%; font-family: Raleway;">Welcome <b><?php if (isset($_SESSION['mysesion'])) { echo $_SESSION['mysesion']; } ?></b></p>
    <a href="myacc.php" class="waves-effect waves-light btn deep-purple darken-2" ><i class="material-icons left">perm_contact_calendar</i>My Account</a>
    <a href="logout.php" class="waves-effect waves-light btn  pink accent-2" style="float: right; "><i class="material-icons left">recent_actors</i>Logout</a>
</div>



<div class="container">

    <div class="row">

<h3 style="font-weight: 100; margin-top: 2em; margin-bottom: 3em; text-align: center;">Lecturer's Dashboard</h3>



<?php
//this is the  inserting detail to notes
        $inserted=$insertedErr="";
        if(isset($_POST['submit']))
        {
            $lecuser = $_SESSION['mysesion'];
            $title = $_POST['title'];
            $details = $mysqli->real_escape_string($_POST['details']);




        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            $sqllec="SELECT first_name FROM users WHERE username='$lecuser'";
            $resultlec=$conn->query($sqllec);
            $re=$resultlec->fetch_object();


            $sql = "INSERT INTO lec_note_to_stu (title, details, by_lec)
                       VALUES ('$title', '$details','$re->first_name')";
            $result=$conn->query($sql);

        if ($result === TRUE) {
            $inserted= "New record created successfully";
        } else {
            $insertedErr="Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        }
        ?>

        <div class="grey lighten-3" style="padding: 3em; margin-top: 3em; border: 1px solid gainsboro">

            <h4 style="font-weight: 300">Event Invitations to Students</h4>
            <p style="font-size: 150%; font-weight: 200; color: grey">You can send special notes or event invitations to students by this form.</p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">




                            <div class="input-field">
                                <input type="text" name="title" id="form__title" title="title" required>
                                <label for="form__title">Title</label>
                            </div>





                            <div class="input-field">
                                <textarea class="materialize-textarea" name="details" id="form_details" title="details" required></textarea>
                                <label for="form_details">Details</label>
                            </div>

                        <p>

                            <span style="color:grey"><?php echo "$inserted" ?></span>

                            <span style="color:grey"><?php echo "$insertedErr" ?></span>

                        </p>

                        <button class="btn waves-effect waves-light indigo accent-3" type="submit"  name="submit">Add Note
                            <i class="material-icons right">send</i>
                        </button>

                    </form>



                    <?php
                    //this is the table of inserted notes
                    $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                    if ($db->connect_errno) {
                        echo "Failed to connect to MySQL: ("
                            . $db->connect_errno . ") " . $db->connect_error;
                    }

                    $sql = "SELECT id, title, details, by_lec, date FROM lec_note_to_stu";
                    $result_db = $db->query($sql) or die('Error perform query!');
                    ?>
                    <table border="1" style="margin-top: 5em;">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Posted by</th>
                            <th>Date</th>

                        </tr>
                        <?php
                        while ($r = $result_db->fetch_object()) {

                            echo '<tr>';
                            echo '<td>' . $r->id . '</td>';
                            echo '<td>' . $r->title . '</td>';
                            echo '<td><span  style="color: chocolate; font-family: Tahoma;"> ' . $r->details . '</span></td>';
                            echo '<td><span  style="color: darkgrey;">Lec. ' . $r->by_lec . '</span></td>';
                            echo '<td><span  style="color: darkgrey;">' . $r->date . '</span></td>';
                            echo '</tr>';
                            echo '<tr><td colspan="5"><hr /></td></tr>';
                        }
                        $db->close();
                        ?>
                    </table>


        </div>
                    <br />

                    <form method="post" action="lec/deletenote.php">

                        <div class="input-field col s7">
                            <input id="last_name" type="text" class="validate" name="delid" required>
                            <label for="last_name">Delete Note By ID</label>
                        </div>

                        <div class="input-field col s6">
                            <button class="btn waves-effect waves-light grey darken-2" type="submit" name="delete">Delete
                                <i class="material-icons right">send</i>
                            </button>
                        </div>


            </form>










    </div>
</div>

<br />

<div class="container">
    <div class="row">
    <div style="background-color: orangered; padding: 1em; border: 1px solid saddlebrown; font-size: 110%;">
        <p><b>Note :</b></p>
        You Can Upload Tutorials by Visiting Each Tutorials Page<br /><br />
        Notes/Invitations Can Be Only Deleted by Lecturer, Who Uploaded Those.<br /><br />
        You Can Use Simple &lt;br /&gt; Tag to Jump to a New Line When Updating Notes/Invitations.<br /><br />
    </div></div>
</div>






<!--_______________________________________END OF CONTENT_______________________________________-->


<!--_______________________________________FOOTER_______________________________________-->


<footer class="page-footer grey darken-4" style="font-family: Raleway;">
    <div class="grey darken-4">

        <div class="row">
            <div class="col m3 s12 offset-s2 offset-m1">
                <img class="responsive-img" src="../../images/LogoLMS.png" style="top: 1em; position: relative;" alt="Logo">
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
                <a href="../../index.html"><img class="icon" src="../../images/LogoLMS.png" style="height: 60px; width: 60px;" alt="Logo"></a>
                <a href="http://www.ucd.ie/" target="_blank"><img class="icon" src="../../images/LogoUCD.png" style="height: 55px; width: 45px;" alt="logoUCD"></a>
            </div>
            <div class="col m2 s12 offset-m1">
                <h6 class="white-text">Visit Us</h6>
                <ul>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://www.facebook.com/universitycollegedublin">
                            <img style="height: 57px; width: 50px;" src="../../images/fb.png" alt="fb"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://twitter.com/ucddublin">
                            <img style="height: 57px; width: 50px;" src="../../images/twitter.png" alt="twitter"></a>
                    </li>
                    <li><a class="grey-text text-lighten-3 icon" target="_blank" href="https://plus.google.com/+universitycollegedublin/about">
                            <img style="height: 57px; width: 50px;" src="../../images/gplus.png" alt="GPlus"></a>
                    </li>
                </ul>
            </div>
        </div>





        <!--______________________________________________VALIDATORS______________________________________________-->
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="width:88px;height:31px; position: relative; left: 1em; top: 1em;"
                     src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                     alt="Valid CSS!">
            </a>
            <a href="http://validator.w3.org/check?uri=referer"><img
                    src="http://www.w3.org/Icons/valid-xhtml10"
                    alt="Valid XHTML 1.0!" style="width:88px; height:31px; position: relative; left: 1em; top: 1em;" />
            </a>
        </p>
        <!--____________________________________END OF THE VALIDATORS_________________________________________-->

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
<script type="text/javascript" src="../../js/materialize.min.js"></script>

<!--Import jquery.scrollAnimate.js-->
<script type="text/javascript" src="../../js/jquery.scrollAnimate.js"></script>
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



    //SLIDESHOW script below
    $(document).ready(function(){
        $('.slider').slider({full_width: true});
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

