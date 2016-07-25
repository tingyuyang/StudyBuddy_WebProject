<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Class List</title>
		<link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
		<link href="project.css" type="text/css" rel="stylesheet" />
		<link href="http://www.nathab.com/uploaded-files/global/book-icon.png" type="image/ico" rel="shortcut icon" />
		<script src="https://webster.cs.washington.edu/js/todolist/provided.js" type="text/javascript"></script>
	</head>

	<body>
		<div class="headfoot">
			<h1>
				<img src="http://www.nathab.com/uploaded-files/global/book-icon.png" alt="logo" />
					<div id ="book">
					<img src="http://www.nathab.com/uploaded-files/global/book-icon.png" alt="logo" />
				    </div>
				    <div id="banner">
				Class List<br />
				</div>
			</h1>
		</div>
		
		
		<div id ="click">
			<h2><?= $_SESSION["username"]?>'s Class List</h2>
			<p>
				Enter your list of classes in the form below. <br>
				Please enter your abbreviated subject then course number separated by a dash, eg: CS-393
			</p>
			<ul id="classlist">
				<?php//will go to submit file this part(add/delete class)
				$count=0;
				foreach(file("classlist_".$_SESSION["username"].".txt", FILE_IGNORE_NEW_LINES) as $i){?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="delete" /> 
						<input type="hidden" name="index" value= <?php echo $count++?> />
						<input type="submit" value="Delete" />
					</form>
					<?php //to find who is taking the user input class
					$withcount=0;
					$commacount=2;
					echo $i;//showing you which class you got
					$files=glob("classlist_*");//pay ###attention give you an array of the class list files. put them all into the file variable
					foreach($files as $j){
						$classes=file($j, FILE_IGNORE_NEW_LINES);//ignore / n
						foreach($classes as $k){
							if ($k == $i && "classlist_".$_SESSION["username"].".txt" != $j){//whoever is login is i, everyone else is k.
								if ($withcount == 0){
								 echo " with ";
								 $withcount=1;
								}
								if ($commacount > 2){//if more than 1 classmates
									echo ", ";
								}
								 $name=explode("classlist_", $j)[1];
								 $name=explode(".txt", $name)[0];//so it can get rid of the txt...
								echo $name;//therefore we can echo the name.without .txt
								$commacount++;
								
							}
						}
					}
					
					?>
				</li>
				<?php
				}
				?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>
				
			
			<?php
			date_default_timezone_set('America/Los_Angeles');
			$_SESSION['time']  = time();
			?>
			<div>
				<a href="start.php"><strong>Log Out</strong></a>
				<em>(logged in since <?php
		echo date('Y m d H:i:s', $_SESSION['time']);
		?>)</em></br></br>
			</div>

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
