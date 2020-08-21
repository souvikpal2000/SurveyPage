<!DOCTYPE html>
<html>
	<style>
		.login-image{
			padding-top: 20px;
			padding-left: 250px;
		}
		img{
			width: 300px;
			height: 120px;
		}
	</style>
	<head>
		<title>SurveyAnyPlace</title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body id="login">
		<div class="container">
			<header class="header">
				<h1>Your Opinion Matters</h1>
			</header>
			<nav class="menu">
				<a href="Home.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="About.html">About</a>
				<a href="SignUp.php" style="padding-left: 500px">Sign up</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="Login.php">Login</a>
			</nav>
			<div class="login-image">
				<img src="Images/LoginImage.jpg">
			</div>
			<div class="form">
				<form method="post" action="Includes/Login.inc.php">
					<p id="text">
						<?php
							if(isset($_GET['error'])==False)
							{
								header("Location: Login.php?error=");
								exit();
							}
							$error = $_GET['error'];
							echo("$error");
						?>
					</p>
					<p>
						<label for="name">Username :</label>
						<input type="text" name="uid">
					</p>
					<p>
						<label for="name">Password :</label>
						<input type="text" name="pwd">
					</p>
					<p>
						<button type="submit" name="login-submit" id="submit">Login</button>
					</p>
			</form>
			</div>
			
			<footer>
				&copy; 2020 SurveyAnyPlace &nbsp;Designed by Souvik Pal
			</footer>
		</div>
	</body>
</html>