<!DOCTYPE html>
<html lang="en">
<head>
    <title>SKSC LMS</title>

    <meta charset="UTF-8">
    <meta name="description" content="SKSC is a Learning Management Hub for UCD (University College Dublin)">
    <meta name="keywords" content="SKSC, LMS, Tutorials, HTML, Learning Management, Learning Hub, ">
    <meta name="author" content="SKSC Team">

    <!--Importing materialize.css style files-->
    <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="all">

</head>
<body>
<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year; ?>&v=true&add=true">
    <table width='400px' border='0'>
        <tr>
            <td width='150px'>Title</td>
            <td width='250px'><input title="title" type='text' name='txttitle' required></td>
        </tr>
        <tr>
            <td width='150px'>Detail</td>
            <td width='250px'><textarea title="details" name='txtdetail' class="materialize-textarea" required></textarea></td>
        </tr>
        <tr>
            <td colspan='2' align='center' class="center">
                <button class="btn waves-effect waves-light indigo accent-3" type='submit' name='btnadd'>Add Event
                    <i class='material-icons right'>playlist_add</i>
                </button></td>
        </tr>
    </table>
</form>
</body>
</html>