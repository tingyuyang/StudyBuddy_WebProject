<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Class List</title>
		<link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
		<link href="cow.css" type="text/css" rel="stylesheet" />
		<link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
		<script src="https://webster.cs.washington.edu/js/todolist/provided.js" type="text/javascript"></script>
	</head>

	<body>
		<div class="headfoot">
			<h1>
				<img src="http://1.bp.blogspot.com/-qJA7dW3W-M0/VH4l2LQUIEI/AAAAAAAAACo/ZJqeqHgpmBs/s1600/books.png" alt="logo" />
				class list<br />
			</h1>
		</div>
		
		
		<div id="main">
			<h2><?= $_SESSION["username"]?>'s Class List</h2>
		
			<ul id="classlist">
				<?php
				$count=0;
				foreach(file("classlist_".$_SESSION["username"].".txt") as $i){?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="index" value=<?php echo $count++?> />
						<input type="submit" value="Delete" />
					</form>
					<?= 
					$i
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
			$_SESSION['time']  = time();
			?>
			<div>
				<a href="start.php"><strong>Log Out</strong></a>
				<em>(logged in since <?php
		echo date('Y m d H:i:s', $_SESSION['time']);
		?>)</em>
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
