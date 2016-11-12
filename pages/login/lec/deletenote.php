<?php
require_once("../db_const.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}

if(isset($_POST['delete'])){
    $delid= $_POST['delid'];
    $lecuser=$_SESSION['mysesion'];

    $sqllec="SELECT first_name FROM users WHERE username='$lecuser'";
    $resultlec=$mysqli->query($sqllec);
    $re=$resultlec->fetch_object();

    $sqlSel = "SELECT * FROM  lec_note_to_stu WHERE ID='$delid' AND by_lec='$re->first_name' LIMIT 1";
    $result = $mysqli->query($sqlSel);

    if($result->num_rows == 1){

        $sqlDel = "DELETE FROM  lec_note_to_stu where ID='$delid'";
        $resultDel = $mysqli->query($sqlDel);

        echo "<h3>Deleted Successfully!</h3>";
    }
    else{
        echo "<h3>ERROR: Make Sure You Entered Correct ID!</h3>";
    }

    header("refresh:1; url=../acclec.php");
}