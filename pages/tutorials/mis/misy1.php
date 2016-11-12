<?php


require_once("../../login/db_const.php");
$mysqli =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($mysqli->connect_errno) {
	echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
	exit();
}





if (!isset($_SESSION['mysesion']))
{
	//echo "<script>window.location.assign('login.php')</script>";
	header("Location: ../../login/redirect.php");
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

<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript" src="tablesort.js"></script>




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
				<li style="background-color: dimgrey;"><a href="../../tutorials.php">Tutorials</a></li>
				<!-- Drop-down Trigger -->
				<li><a class="dropdown-button" data-activates="dropdown1">Courses<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" data-activates="dropdown3">Events<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" data-activates="dropdown2">Members<i class="material-icons right">arrow_drop_down</i></a></li>

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

<pre>




</pre>

<div class="container">

	<div class="row">
		<h4 align="center">Management Information Systems Lectures (Year 1)</h4>
		<br />
		<div class="collection">
			<a href="misy1/cpp.php" class="collection-item orange-text text-darken-3">Object Oriented Programming with C++</a>
			<a href="misy1/ct.php" class="collection-item orange-text text-darken-3">Computer Technology</a>
			<a href="misy1/int.php" class="collection-item orange-text text-darken-3">Internet Technology</a>

		</div>


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


<!--__________________________________END OF THE PAGE____________________________________________-->
</body>
</html>
