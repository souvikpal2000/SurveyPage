<?php
	if(isset($_POST["signup-submit"])==True)
	{
		require 'Dbh.inc.php';

		$username = $_POST["uid"];
		$email = $_POST["mail"];
		$password = $_POST["pwd"];
		$passwordRepeat = $_POST["pwd-repeat"];

		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
		{
			$text = "*Empty Fields";
			header("Location: ../SignUp.php?text=".$text);
			exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
		{
			$text = "*Invalid Email & Username";
			header("Location: ../SignUp.php?text=".$text);
			exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$text = "*Invalid Email";
			header("Location: ../SignUp.php?text=".$text);
			exit();
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username))
		{
			$text = "*Invalid Username";
			header("Location: ../SignUp.php?text=".$text);
			exit();
		}
		elseif($password !== $passwordRepeat)
		{
			$text = "*The Passwords are not Matching";
			header("Location: ../SignUp.php?text=".$text);
			exit();
		}
		else
		{
			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($connect);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../SignUp.php?error=sqlerror");
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0)
				{
					$text = "*Username is Already Taken";
					header("Location: ../SignUp.php?text=".$text);
					exit();
				}
				else
				{
					$sql = "INSERT INTO users(uidusers, emailusers, pwdusers) VALUES(?,?,?)";
					$stmt = mysqli_stmt_init($connect);
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: ../SignUp.php?error=sqlerror");
					}
					else
					{
						mysqli_stmt_bind_param($stmt,"sss",$username, $email, $password);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						$text = "Successfully Signed Up";
						header("Location: ../SignUp.php?text=".$text);
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connect);
	}
	else
	{
		header("Location: ../SignUp.php");
		exit();
	}
?>