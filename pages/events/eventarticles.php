<?php
error_reporting(0);
require_once("../login/db_const.php");
$mysqli =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Event Articles</title>

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body style="margin:0;">




        <div class="container">
            <div class="row">
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

                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event1.jpg" style="height: 100%; width: 100%;" alt="event 1" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                 </div>

            <?php

            $sql = "SELECT id, title, details, timestamp FROM events where id='2'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event2.jpg" style="height: 100%; width: 100%;" alt="event 2" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                </div>


            <?php

            $sql = "SELECT id, title, details, timestamp FROM events where id='3'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event3.jpg" style="height: 100%; width: 100%;" alt="event 3" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                </div>


            <?php

            $sql = "SELECT id, title, details, timestamp FROM events where id='4'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event4.jpg" style="height: 100%; width: 100%;" alt="event 4" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                </div>



            <?php

            $sql = "SELECT id, title, details, timestamp FROM events where id='5'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event5.jpg" style="height: 100%; width: 100%;" alt="event 5" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                </div>


            <?php

            $sql = "SELECT id, title, details, timestamp FROM events where id='6'";
            $result_db = $db->query($sql) or die('Error perform connection to the database!');
            $r = $result_db->fetch_object()
            ?>
                <div class="col s12 grey lighten-2" style=" padding: 3em; border: solid darkgrey 1px; margin-bottom: 3em;">
                    <h4 style="text-align: center; margin-bottom: 2em;"><?php echo $r->title ?> </h4>
                    <img class="responsive-img center-block"  src="../events/events_images/event6.jpg" style="height: 100%; width: 100%;" alt="event 6" />
                    <p> <?php echo $r->details ?></p>
                    <p style="float: right"><?php echo $r->timestamp ?></p>
                </div>

            </div>
        </div>

        <!--Import jQuery and materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>

</html>