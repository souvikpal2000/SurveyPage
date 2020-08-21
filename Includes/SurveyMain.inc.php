<?php
	if(isset($_POST['survey-submit']))
	{
		require 'Dbh.inc.php';
		session_start();

		$username = $_SESSION['username'];
		$gender = $_POST['gender'];
		$bday = $_POST['bday'];
		$anime = $_POST['anime'];
		$streetfood = $_POST['streetfood'];
		$fish = $_POST['fish'];

		if(empty($gender) || empty($bday) || empty($anime) || empty($streetfood) || empty($fish))
		{
			$error = "*Fill up each and every Survey";
			header("Location: ../SurveyMain.php?error=".$error);
			exit();
		}
		else
		{
			$sql = "INSERT INTO info(uidusers, gender, bday, anime, food, fish) VALUES(?,?,?,?,?,?)";
			$stmt = mysqli_stmt_init($connect);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../SurveyMain.php?error=sqlerror");
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"ssssss",$username, $gender, $bday, $anime, $streetfood, $fish);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$text = "Thank You for Giving the Survey";
				header("Location: ../Home.php?text=".$text);
				exit();
			}
		}		
	}
	else
	{
		header("Location: ../SurveyMain.php");
		exit();
	}
?>