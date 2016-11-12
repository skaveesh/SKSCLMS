<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'sksc_lms';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>


    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <style>

        .today{

            border-radius: 40px;
            border: 1px solid  lightskyblue;
        }
        .event{
            background-color:lightpink ;
            border: 1px solid grey;
            border-radius: 1px;
        }

    </style>


</head>

<body style="margin:0;">

<div class="container">

    <div class="row">

        <div class="col l6 offset-l3 m6 offset-m3 s12 grey lighten-3 hoverable">

            <?php
            if (isset($_GET['day'])){
                $day = $_GET['day'];
            } else {
                $day = date("j");
            }
            if(isset($_GET['month'])){
                $month = $_GET['month'];
            } else {
                $month = date("n");
            }
            if(isset($_GET['year'])){
                $year = $_GET['year'];
            }else{
                $year = date("Y");
            }
            $currentTimeStamp = strtotime( "$day-$month-$year");
            $monthName = date("F", $currentTimeStamp);
            $numDays = date("t", $currentTimeStamp);
            $counter = 0;
            ?>
            <?php
            if(isset($_GET['add'])){
                $title =$_POST['txttitle'];
                $detail =$_POST['txtdetail'];
                $eventdate = $month."/".$day."/".$year;


            }
            ?>

            <table border="1" class="centered" style="border-collapse: collapse;">
                <tr>
                    <td><button class="btn waves-effect waves-light indigo accent-3"  style='width:50px;' name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"><</button></td>
                    <td colspan='5' align='center'><?php echo $monthName.", ".$year; ?></td>
                    <td><button class="btn waves-effect waves-light indigo accent-3"  style='width:50px;' name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)">></button></td>
                </tr>

                <tr>
                    <td width='50px' align='center'>Sun</td>
                    <td width='50px' align='center'>Mon</td>
                    <td width='50px' align='center'>Tue</td>
                    <td width='50px' align='center'>Wed</td>
                    <td width='50px' align='center'>Thu</td>
                    <td width='50px' align='center'>Fri</td>
                    <td width='50px' align='center'>Sat</td>
                </tr>
                <?php
                echo "<tr><td align='center' colspan='7' style='padding: 0; margin: 0;'><p  style='padding: 0; margin: 0; font-size: 300%;'>$day</p><p  style='padding: 0; margin: 0;'>$month-$year</p>   </td></tr>";
                echo "<tr>";
                for($i = 1; $i < $numDays+1; $i++, $counter++){
                    $timeStamp = strtotime("$year-$month-$i");
                    if($i == 1) {
                        $firstDay = date("w", $timeStamp);
                        for($j = 0; $j < $firstDay; $j++, $counter++) {
                            echo "<td>&nbsp;</td>";
                        }
                    }
                    if($counter % 7 == 0) {
                        echo"</tr><tr>";
                    }
                    $monthstring = $month;
                    $monthlength = strlen($monthstring);
                    $daystring = $i;
                    $daylength = strlen($daystring);
                    if($monthlength <= 1){
                        $monthstring = "0".$monthstring;
                    }
                    if($daylength <=1){
                        $daystring = "0".$daystring;
                    }
                    $todaysDate = date("m/d/Y");
                    $dateToCompare = $monthstring. '/' . $daystring. '/' . $year;
                    echo "<td align='center' ";
                    if ($todaysDate == $dateToCompare){
                        echo "class ='today'";
                    } else{
                        $sqlCount = "select * from eventcalendar where eventDate='".$dateToCompare."'";
                        $noOfEvent = mysqli_num_rows($mysqli->query($sqlCount));
                        if($noOfEvent >= 1){
                            echo "class='event'";
                        }
                    }
                    echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
                }
                echo "</tr>";
                ?>
            </table>

            <?php
            if(isset($_GET['v'])) {

                if(isset($_GET['f'])) {

                }
                $sqlEvent = "select * FROM eventcalendar where eventDate='".$month."/".$day."/".$year."'";
                $resultEvents = $mysqli->query($sqlEvent);

                echo "<hr />";
                while ($events = mysqli_fetch_array($resultEvents)){

                    echo "<h4 align='center'>".$events['Title']."</h4><br>";
                    echo "<p class='flow-text'>".$events['Detail']."</p><br><hr>";

                }

            }

            ?>



        </div>

    </div>
</div>






<script>

    //this is buttons inside the calendar
    function goLastMonth(month, year){
        if(month == 1) {
            --year;
            month = 13;
        }
        --month
        var monthstring= ""+month+"";
        var monthlength = monthstring.length;
        if(monthlength <=1){
            monthstring = "0" + monthstring;
        }
        document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
    }
    function goNextMonth(month, year){
        if(month == 12) {
            ++year;
            month = 0;
        }
        ++month
        var monthstring= ""+month+"";
        var monthlength = monthstring.length;
        if(monthlength <=1){
            monthstring = "0" + monthstring;
        }
        document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
    }


</script>


</body>
</html>