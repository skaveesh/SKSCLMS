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
    //echo "<script>window.location.assign('../login.php')</script>";
    header("Location: ../login.php");
}
else{

//This code will prohibit the entering a lecture into the students' page.
    $sqlLec = "SELECT * from users WHERE indexnum LIKE '%LEC%' AND username='{$_SESSION['mysesion']}'";
    $resultLec = $mysqli->query($sqlLec);

    $sqlStu = "SELECT * from users WHERE indexnum NOT LIKE '%LEC%' AND username='{$_SESSION['mysesion']}'";
    $resultStu = $mysqli->query($sqlStu);

    $sqlAdmin = "SELECT * from users WHERE email='admin@sksc.com' AND username='{$_SESSION['mysesion']}'";
    $resultAdmin = $mysqli->query($sqlAdmin);

    if ($resultLec->num_rows == 1){

        //echo "<script>window.location.assign('acclec.php')</script>";
        header("Location: acclec.php");

    }

     if ($resultStu->num_rows == 1){

        //echo "<script>window.location.assign('acc.php')</script>";
         header("Location: accstu.php");

    }

    if ($resultAdmin->num_rows == 1){

        //echo "<script>window.location.assign('accadmin.php')</script>";
        header("Location: accadmin.php");

    }


}
