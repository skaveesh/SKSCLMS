<?php
error_reporting(0);
require_once("../login/db_const.php");
$mysqli =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}



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
$r = $result_db->fetch_object();
?>

<html>
<head>

    <!--Importing fonts-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: Roboto-Light;
            src: url(../../font/roboto/Roboto-Light.woff);
        }
    </style>

</head>
<body bgcolor="white">
<div class="container">

    <div class="row">

<h4 style="font-weight: 300; text-align: center;">Today's Hall Allocations</h4>
<table  class="striped hoverable" style="margin-top: 5em;">

    <tr>  <td colspan="3" style="text-align: center; font-size:xx-large; font-weight: 300;" class="grey lighten-1"><?php echo $today_date ?> </td> </tr>
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

</div>
<script>
    window.onload =function myadjust(){
        parent.document.getElementById("timetable").style.height = "40em";

    }
</script>
</body>


</html>