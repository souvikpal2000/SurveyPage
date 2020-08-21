<?php
	session_start();
	session_unset();
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<style>
		#home .main #success{
			padding-top: 10px;
			padding-left: 240px;
    		width: 350px;
    		color: #3b841d;
    		font-weight: bold;
		}
	</style>
	<head>
		<title>SurveyAnyPlace</title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body id="home">
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
			<article class="main">
				<div class="home-image">
					<img src="Images/HomeImage.png">
				</div>
				<p id="success">
					<?php
						if(isset($_GET['text'])==False)
						{
							header("Location: Home.php?text=");
							exit();
						}
						$text = $_GET['text'];
						echo("$text");
					?>
				</p>
				<p class="home-article">
					Thank you for using our service that improves Personal communities. We would like you to take a few minutes to complete our survey. It is important for all groups to understand why you give, the groups you give to and the methods of approach you prefer. It will also help us to make giving easier and more satisfying for you. All information is strictly private and confidential and will not be linked or identified to your name. Individual data will not be maintained. It will not be used for direct approaches asking you to give. If you feel uncomfortable in answering any question, just skip that question. When you have answered all the questions click "SUBMIT" at the bottom of the survey page.
Submitted responses are added to a database and used solely by Our Community for statistical purposes.
				</p>
			</article>
			<footer>
				&copy; 2020 SurveyAnyPlace &nbsp;Designed by Souvik Pal
			</footer>
		</div>
	</body>
</html>