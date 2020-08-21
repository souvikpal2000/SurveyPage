<!DOCTYPE html>
<html>
	<style>
		.signup-image{
			padding-top: 20px;
			padding-left: 300px;
		}
		img{
			width: 168px;
			height: 118px;
		}
	</style>
	<head>
		<title>SurveyAnyPlace</title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body id="sign">
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
			<div class="signup-image">
				<img src="Images/SignUpImage.jpg">
			</div>

			<div class="form">
				<form method="post" action="Includes/Signup.inc.php">
					<p id="text">
						<?php
							if(isset($_GET['text'])==False)
							{
								header("Location: Signup.php?text=");
								exit();
							}
							$text = $_GET['text'];
							echo("$text");
						?>
					</p>
					<p>
						<label for="name">Username :</label>
						<input type="text" name="uid">
					</p>
					<p>
						<label for="name">Email ID :</label>
						<input type="text" name="mail">
					</p>
					<p>
						<label for="name">Password :</label>
						<input type="password" name="pwd">
					</p>
					<p>
						<label for="name">Confirm Password :</label>
						<input type="password" name="pwd-repeat">
					</p>
					<p>
						<button type="submit" name="signup-submit" id="submit">Sign Up</button>
					</p>
			</form>
			</div>
			
			<footer>
				&copy; 2020 SurveyAnyPlace &nbsp;Designed by Souvik Pal
			</footer>
		</div>
	</body>
</html>