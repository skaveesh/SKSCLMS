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
		.error {color: #FF0000;}


		/* label color */
		.input-field label {
			color: grey;
		}
		/* label focus color */
		.input-field input[type=text]:focus + label {
			color: #3d5afe;
		}
		/* label underline focus color */
		.input-field input[type=text]:focus {
			border-bottom: 1px solid #3d5afe;
			box-shadow: 0 1px 0 0 #3d5afe;
		}
		/* label underline focus color */
		.input-field input[type=password]:focus {
			border-bottom: 1px solid #3d5afe;
			box-shadow: 0 1px 0 0 #3d5afe;
		}
		/* valid color */
		.input-field input[type=text].valid {
			border-bottom: 1px solid #3d5afe;
			box-shadow: 0 1px 0 0 #3d5afe;
		}
		/* invalid color */
		.input-field input[type=text].invalid {
			border-bottom: 1px solid #3d5afe;
			box-shadow: 0 1px 0 0 #3d5afe;
		}
		/* icon prefix focus color */
		.input-field .prefix.active {
			color: #3d5afe;
		}





		@font-face {
			font-family: Roboto-Light;
			src: url(../../font/roboto/Roboto-Light.woff);
		}

	</style>

</head>
<body bgcolor="white">

<?php
require_once("../login/db_const.php");
## connect mysql server
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
	echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
	exit();
}

// define variables and set to empty values
$usernameErr = $emailErr = $indexnumErr=$keycodeErr= "";
$username = $email = $indexnum = $first_name = $last_name =$keycode= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
## query database
# prepare data for insertion
	$indexnum	= $_POST['indexnum'];
	$username	= $_POST['username'];
	$email		= $_POST['email'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$keycode	= $_POST['keycode'];

    $hashedpw = md5($password);




	$resultindex = $mysqli->query("SELECT indexnum from users WHERE indexnum = '{$indexnum}' LIMIT 1");
	$resultusername = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
	$resultemail = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
	$resultkeycode = $mysqli->query("SELECT keycode from keycode WHERE keycode = '{$keycode}' LIMIT 1");


		if ($resultindex->num_rows == 1) {
			$indexnumErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Index Number already exists! </p>";

			if (!$resultkeycode->num_rows == 1) {
				$keycodeErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Keycode Error! (Ask lecturer or someone in charge for valid Keycode) </p>";
			}

			if ($resultusername->num_rows == 1) {
				$usernameErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Username already exists! </p>";
			}

			if ($resultemail->num_rows == 1) {
				$emailErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* E-mail already exists! </p>";
			}
		}

		else if (!$resultkeycode->num_rows == 1) {
			$keycodeErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Keycode Error! (Ask lecturer or someone in charge for valid Keycode) </p>";

				if ($resultusername->num_rows == 1) {
					$usernameErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Username already exists! </p>";
				}

				if ($resultemail->num_rows == 1) {
					$emailErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* E-mail already exists! </p>";
				}
		}

		else if ($resultusername->num_rows == 1) {
			$usernameErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* Username already exists! </p>";

			if ($resultemail->num_rows == 1) {
				$emailErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* E-mail already exists! </p>";
			}
		}

		else if ($resultemail->num_rows == 1) {
			$emailErr = "<p style='font-size: 80%; padding-bottom: 1em;'>* E-mail already exists! </p>";
		}


		else {
			# insert data into mysql database
			$sql = "INSERT  INTO `users` (`id`,`indexnum` , `username`, `password`, `first_name`, `last_name`, `email`)
				VALUES (NULL,  '{$indexnum}', '{$username}', '{$hashedpw}', '{$first_name}', '{$last_name}', '{$email}')";
			//$sql = "INSERT  INTO `users`(`id`,`username`) VALUES (NULL, '{$username}')";


			if ($mysqli->query($sql)) {
				//echo "New Record has id ".$mysqli->insert_id;

				header("Location: successful.html"); /* Redirect browser */
				exit();



			} else {
				echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
				exit();
			}


			}



	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>

	<div class="row col s10">
		<div class="col s12">
			<h4 style="padding-bottom: 1em; padding-top:1em ; font-family: Roboto-Light;" class="center">Register Form</h4>
		</div>


		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


		<div class="input-field col s12">
			<i class="material-icons prefix">supervisor_account</i>
			<input id="form_index" type="text" value="<?php echo "$indexnum"; ?>" name="indexnum"  pattern='[LECSBUDMI0-9-]{13,19}'  title="Only 13-18 characters eg: LEC-CS-XXXXXX or UCD-BSC-MIS-XXX-XXX" required />
			<span class="error"> <?php echo "$indexnumErr" ?></span>
			<label for="form_index">Student/Lecture Index Number</label>
		</div>
		<br>

		<div class="input-field col s12">
			<i class="material-icons prefix">subtitles</i>
			<input id="form_keycode" type="text" value="<?php echo "$keycode"; ?>" name="keycode"  pattern='.{8}'  title="Only 8 characters" required />
			<span class="error"> <?php echo "$keycodeErr" ?></span>
			<label for="form_keycode">Key Code</label>
		</div>
		<br>


		<div class="input-field col s12">
			<i class="material-icons prefix">assignment_ind</i>
			<input id="form_username" type="text" value="<?php echo "$username"; ?>" name="username" pattern='.{5,10}'  title="5 to 10 characters" required />
			<span class="error"><?php echo "$usernameErr"?></span>
			<label for="form_username">Username</label>
		</div>


		<div class="input-field col s12">
			<i class="material-icons prefix">email</i>
			<input id="form_email" type="text" name="email" value="<?php echo "$email"?>" title="Enter Valid E-mail" required />
			<span class="error"><?php echo "$emailErr"?></span>
			<label for="form_email">Email</label>
		</div>


		<div class="input-field col s12">
				<i class="material-icons prefix">album</i>
				<input id="form_pass" type="password" name="password"  pattern=".{8,}" title="8 characters minimum" required/><br />
				<label for="form_pass">Password</label>
		</div>


		<div class="input-field col s12">
			<i class="material-icons prefix">album</i>
			<input id="form_cnfrmpass" type="password" name="confirm_password"  pattern=".{8,}" required  /><br />
			<label for="form_cnfrmpass">Confirm Password</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">account_circle</i>
			<input id="form_fname" type="text" value="<?php echo "$first_name"; ?>" name="first_name" pattern='[a-zA-Z\s]+' title="Only letters and spaces allowed"  required /><br />
			<label for="form_fname">First Name</label>
		</div>

		<div class="input-field col s12"  style="padding-bottom: 3em;">
			<i class="material-icons prefix">account_circle</i>
			<input id="form_lname" type="text" value="<?php echo "$last_name"; ?>" name="last_name" pattern='[a-zA-Z\s]+' title="Only letters and space allowed" required /><br />
			<label for="form_lname">Last Name</label>
		</div>


		<div class="input-field col s12 center">
			<button id="submitbutton" class="btn waves-effect waves-light btn-large indigo accent-3" type="submit" name="submit">Register
				<i class="material-icons right">person_pin</i>
			</button>
		</div>

		</form>

	</div>
<script>

//Confirming the password
	var password = document.getElementById("form_pass")
		, confirm_password = document.getElementById("form_cnfrmpass");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
<!--Import jQuery and materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>