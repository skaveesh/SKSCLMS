<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>photo gallery</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css"  media="screen" />
</head>

<body>
<div id="container">

<div id="content">
<ul>
<?php






if ($handle = opendir('gallery1')) {

	while (false !== ($entry = readdir($handle))) {

		if ($entry != "." && $entry != "..") {


				echo "<li><a class='fancybox' rel='group' href='gallery1/$entry'><img src='gallery1/$entry' width='200' height='120' alt=''/></a></li>";

		}
	}

	closedir($handle);
}

echo "</ul>";



?>


</div>

</div>
<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->

<script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>


</body>
</html>
