<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Find a Study Buddy!</title>
		<link href="project.css" type="text/css" rel="stylesheet" />
		<link href="http://www.nathab.com/uploaded-files/global/book-icon.png" type="image/ico" rel="shortcut icon" />
		
	</head>

	<body>
		<div class="headfoot">
			<h1>
					<img src="http://www.nathab.com/uploaded-files/global/book-icon.png" alt="logo" />
					<div id ="book">
					<img src="http://www.nathab.com/uploaded-files/global/book-icon.png" alt="logo" />
				    </div>

		 		<div id ="banner">
				Study With a Classmate!<br />
				</div>
				

			</h1>
		</div>

		<div id="main">
			<p>
				Find someone to study with! <br />
				
			</p>

			<p>
				Log in now to manage your class list and find other students. <br />
				If you do not have an account, one will be created for you.
			</p>
			<form id="error">
	<?php
	if (isset($_SESSION["error"]) && !empty($_SESSION["error"])){
		echo "<p>".$_SESSION["error"]."</p>";
		$_SESSION["error"]="";
	}
	?>
	</form>
			<form id="loginform" action="login.php" method="post"> 
				
				<div><input name="name" type="text" size="8" autofocus="autofocus" required/> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8"  required/> <strong>Password</strong></div>
				
				<div><input type="submit" value="Log in" /></div>
				

			</form>

			<p>
				<em>(last login from this computer was <?php
			date_default_timezone_set('America/Los_Angeles');
		echo date('Y m d H:i:s', $_SESSION['time']);
		?>)</em>
			</p>
		</div>

		<div class="headfoot">

			<div id="w3c">
				<a href="https://webster.cs.washington.edu/validate-html.php">
					<img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
				<a href="https://webster.cs.washington.edu/validate-css.php">
					<img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
			</div>
		</div>
	</body>
</html>
