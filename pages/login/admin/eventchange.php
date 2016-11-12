<?php

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

<!--_________________________________________________NOTICE_______________________________________________-->

<div class="container">
    <div class="row">

        <h4 style="font-weight: 300; text-align: center; margin-bottom: 3em;">Event Updater</h4>


        <div  style="background-color: orangered;border:1px saddlebrown solid; padding: 2em; margin-bottom: 2em; font-size: 110%;">

            <p><b>NOTE : </b></p>
            <p>"Events" page contain 6 of article base events.</p>
            <p>You can update those one by one, below.</p>
            <p>You can use basic HTML when updating "Title" and "Details" fields.</p>

        </div>
    </div>
</div>

<!--____________________________________________END OF NOTICE_______________________________________________-->

<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class="blue-grey lighten-4">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='1'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img class="responsive-img"  src="../../events/events_images/event1.jpg" height="50%" width="50%" alt="event 1" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 1ST EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails1']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title1']);
                $details = $mysqli->real_escape_string($_POST['form_details1']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=1";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title1" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="form_details1" required></textarea>
                    <label for="textarea1">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails1" onclick="submitdetails1confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails1confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 1 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal1" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal1" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded1"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg1" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg1'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded1']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded1"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded1"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event1.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 1 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


        </div>

        <!--____________________________________________END OF EVENT UPDATER________________________________________-->



<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->


<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class=" purple lighten-5">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='2'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img class="responsive-img" src="../../events/events_images/event2.jpg" height="50%" width="50%" alt="event 2" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 2ND EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails2']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title2']);
                $details = $mysqli->real_escape_string($_POST['form_details2']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=2";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title2" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea2" class="materialize-textarea" name="form_details2" required></textarea>
                    <label for="textarea2">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails2" onclick="submitdetails2confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails2confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 2 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal2" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal2" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded2"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg2" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg2'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded2']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded2"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded2"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event2.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 2 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


</div>

<!--____________________________________________END OF EVENT UPDATER________________________________________-->


<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->




<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class="blue-grey lighten-4">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='3'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img class="responsive-img" src="../../events/events_images/event3.jpg" height="50%" width="50%" alt="event 3" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 3RD EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails3']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title3']);
                $details = $mysqli->real_escape_string($_POST['form_details3']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=3";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title3" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea3" class="materialize-textarea" name="form_details3" required></textarea>
                    <label for="textarea3">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails3" onclick="submitdetails3confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails3confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 3 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal3" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal3" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded3"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg3" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg3'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded3']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded3"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded3"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event3.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 3 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


</div>

<!--____________________________________________END OF EVENT UPDATER________________________________________-->


<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->




<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class=" purple lighten-5">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='4'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img class="responsive-img" src="../../events/events_images/event4.jpg" height="50%" width="50%" alt="event 4" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 4TH EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails4']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title4']);
                $details = $mysqli->real_escape_string($_POST['form_details4']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=4";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title4" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea4" class="materialize-textarea" name="form_details4" required></textarea>
                    <label for="textarea4">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails4" onclick="submitdetails4confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails4confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 4 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal4" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal4" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded4"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg4" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg4'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded4']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded4"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded4"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event4.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 4 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


</div>

<!--____________________________________________END OF EVENT UPDATER________________________________________-->



<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->




<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class="blue-grey lighten-4">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='5'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img class="responsive-img" src="../../events/events_images/event5.jpg" height="50%" width="50%" alt="event 5" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 5TH EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails5']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title5']);
                $details = $mysqli->real_escape_string($_POST['form_details5']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=5";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title5" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea5" class="materialize-textarea" name="form_details5" required></textarea>
                    <label for="textarea5">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails5" onclick="submitdetails5confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails5confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 5 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal5" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal5" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded5"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg5" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg5'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded5']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded5"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded5"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event5.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 5 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


</div>

<!--____________________________________________END OF EVENT UPDATER________________________________________-->




<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->


<!--_______________________________________________ EVENT UPDATER___________________________________________-->
<div class=" purple lighten-5">

    <div class="row">
        <div class="container">

            <?php
            //this is the table of inserted notes
            $db =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($db->connect_errno) {
                echo "Failed to connect to MySQL: ("
                    . $db->connect_errno . ") " . $db->connect_error;
            }

            $sql = "SELECT id, title, details, timestamp FROM events where id='6'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
            <table border="1" style="margin-top: 5em;">
                <tr><td>Title:</td>   <td><?php echo $r->title ?> </td></tr>
                <tr><td>Image</td>   <td><img  class="responsive-img" src="../../events/events_images/event6.jpg" height="50%" width="50%" alt="event 6" /></td></tr>
                <tr><td>Details:</td>   <td><?php echo $r->details ?></td></tr>
                <tr><td>Last Update:</td>   <td><?php echo $r->timestamp ?></td></tr>
            </table>
            <h5 style="margin-top: 4em;">Update</h5>
            <?php

            ///////////////////////////////////////////// 6TH EVENT////////////////////////////////////////////
            //this is the  inserting detail to notes
            $inserted=$insertedErr="";
            if(isset($_POST['submitdetails6']))
            {

                $title = $mysqli->real_escape_string($_POST['form_title6']);
                $details = $mysqli->real_escape_string($_POST['form_details6']);

                // Create connection
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " UPDATE events SET title='$title' , details='$details' WHERE id=6";

                $result=$conn->query($sql);

                if ($result === TRUE) {
                    $inserted= "New record created successfully. Can't see it? <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.";
                } else {
                    $insertedErr="Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="input-field col s12">
                    <input id="first_name" type="text" name="form_title6" required>
                    <label for="first_name">Title</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea6" class="materialize-textarea" name="form_details6" required></textarea>
                    <label for="textarea6">Details</label>
                </div>

                <div class="input-field col s12">
                    <p>
                        <span style="color:grey"><?php echo "$inserted" ?></span>
                        <span style="color:grey"><?php echo "$insertedErr" ?></span>
                    </p>
                </div>

                <div class="input-field col s12">
                    <button class='btn waves-effect waves-light indigo accent-3' type="submit" name="submitdetails6" onclick="submitdetails6confirm(event)">Update Event</button>
                    <script type="text/javascript">
                        function submitdetails6confirm(e)
                        {
                            if(!confirm('Are you sure you want to update event?'))e.preventDefault();
                        }
                    </script>
                </div>
            </form>




            <!--_______________________________________________EVENT 6 IMAGE UPLOAD_________________________________________________________-->



            <!--Modal Trigger-->
            <div class="center" style="margin: 1em;">
                <a class="waves-effect waves-light btn modal-trigger indigo accent-3" href = "#modal6" >Update Image/Details</a >
            </div>

            <!--Modal Structure-->
            <div id = "modal6" class="modal" >
                <div class="modal-content" >
                    <h4 > Upload a Image..! </h4 >



                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->
                    <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        Please choose a file: <input name="uploaded6"  type="file" /><br />
                        <input type="submit" value="Upload" name="submitimg6" />
                        <input type="button" value="Clear" onClick="reset();">

                        <p style="color: grey">Only JPG, JPEG, PNG image files are allowed.<br />
                            After uploading a file, open this "Modal" again to see the uploaded details.</p>
                    </form>


                    <?php
                    if(isset($_POST['submitimg6'])){


                        $target = "../../events/events_images/";
                        $target = $target . basename($_FILES['uploaded6']['name']);
                        $ok = 1;
                        $FileType = pathinfo($target, PATHINFO_EXTENSION);

// Allow certain file formats
                        if ($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "JPEG"

                        ) {

                            $ok = 0;
                        } else {


//Checking that $ok was not set to 0 by an error
                            if ($ok == 0) {
                                echo"Sorry, there was a problem uploading your file.";
                            } //If everything is ok we try to upload it
                            else {
                                if (move_uploaded_file($_FILES["uploaded6"]['tmp_name'], $target)) {
                                    $oldimage=$_FILES["uploaded6"]['name'];
                                    rename("../../events/events_images/$oldimage", "../../events/events_images/event6.jpg");
                                    echo "";
                                    echo "<p>The file has been uploaded. If it's not there <a class='btn waves-effect waves-light indigo accent-3' href='eventchange.php'>Reload<i class='material-icons right'>replay</i></a> to see.</p>";
                                } else {
                                    echo "Sorry, there was a problem uploading your file.";
                                }
                            }
                        }

                    }
                    ?>


                    <!--_________________________________________________UPLOADER PHP______________________________________________________-->

                </div >
                <div class="modal-footer" >
                    <a href = "#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CLOSE</a >
                </div >
            </div >




            <!--_______________________________________________END EVENT 6 IMAGE UPLOAD_________________________________________________________-->






        </div>

    </div>


</div>

<!--____________________________________________END OF EVENT UPDATER________________________________________-->





<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->
<!--_______________________________________________________________________________________________________________________________-->



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