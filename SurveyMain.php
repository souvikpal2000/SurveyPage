<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<style>
		#survey-image img{
			width: 250px;
    		padding-left: 270px;
    		margin-bottom: 20px
		}
		#survey .main #login-logout{
			text-align: center;
			border: 2px solid black;
			margin-top: 20px;
    		margin-bottom: 20px;
    		padding: 10px;
    		width: 350px;
    		border: 2px solid #9ce496;
    		background-color: #9afb9a;
    		border-radius: 5px;
    		color: #3b841d;		
    	}
    	#survey .main #odd{
			background-color: #b8d1e8;
			border: #b8d1e8;
			border-radius: 5px;
		}
		#survey .main p{
			padding: 15px;
			text-align: center;
		}
		#survey .main form{
			width: 700px;
			margin: 0 auto;
		}
		#survey .main #submit{
			color: white;
			width: 500px;
			border-radius: 5px;
			height: 30px;
			background-color: #3b7687;
		}
		#survey .main #error{
			color: #f58080;
			margin-bottom: 10px;
			padding: 10px;
			text-align: center;
			font-weight: bold;
		}
	</style>
	<head>
		<title>SurveyAnyPlace</title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body id="survey">
		<div class="container">
			<header class="header">
				<h1>Your Opinion Matters</h1>
			</header>
			<nav class="menu">
				<a href="Home.php" style="padding-left: 650px">Log Out</a>
			</nav>
			<article class="main">
				<p id="login-logout">
					<?php
						if(!isset($_SESSION['username']))
						{
							echo("You have Logged out");
							echo "<footer>&copy; 2020 SurveyAnyPlace &nbsp;Designed by Souvik Pal</footer>";
							exit();
						}
						else
						{
							echo($_SESSION['username'].", You have Successfully Logged In");
						} 
					?>
				</p>
				<div id="survey-image">
					<img src="Images/SurveyImage.jpg">
				</div>
				<div>
					<form method="post" action="Includes/SurveyMain.inc.php">
						<p id="error">
							<?php
								if(isset($_GET['error'])==False)
								{
									header("Location: SurveyMain.php?error=");
									exit();
								}
								$error = $_GET['error'];
								echo("$error");
							?>
						</p>

						<p id="odd">
							<label for="name"><b>What is Your Gender?</b></label>
							<input type="radio" name="gender" value="Male">Male
							<input type="radio" name="gender" value="Female">Female
						</p>

						<p id="even">
							<label for="bday-month"><b>What is Your Year & Month of Birth?</b></label>
							<input type="date" name="bday" value="2000-08"><br>
						</p>
						
						<p id="odd">
							<label for="anime"><b>Are You a True Anime Fan?</b></label>
							<input type="radio" name="anime" value="Yes">Yes
							<input type="radio" name="anime" value="No">No<br>
						</p>

						<p id="even">
							<label for="street-food"><b>What is Your Favorite Street Food?</b></label>
							<input type="radio" name="streetfood" value="Chowmein">Chowmein
							<input type="radio" name="streetfood" value="Egg Roll">Egg Roll
							<input type="radio" name="streetfood" value="Momo">Momo
							<input type="radio" name="streetfood" value="All">All
							<input type="radio" name="streetfood" value="Nothing">Nothing<br>
						</p>
						
						<p id="odd">
							<label for="fish-lover"><b>Are You a Fish Lover?</b></label>
							<input type="radio" name="fish" value="Yes">Yes
							<input type="radio" name="fish" value="No">No<br>
						</p>

						<p>
							<button type="submit" name="survey-submit" id="submit">Submit</button>
						</p>
					</form>
				</div>
			</article>
			<footer>
				&copy; 2020 SurveyAnyPlace &nbsp;Designed by Souvik Pal
			</footer>
		</div>
	</body>
</html>