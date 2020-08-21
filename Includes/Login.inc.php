<?php
	if(isset($_POST['login-submit']))
	{
		require 'Dbh.inc.php';

		$username = $_POST['uid'];
		$password = $_POST['pwd'];

		if(empty($username) || empty($password))
		{
			$error = "*Empty Fields";
			header("Location: ../Login.php?error=".$error);
			exit();
		}
		else
		{
			$sql = "SELECT * FROM users where uidusers=?";
			$stmt = mysqli_stmt_init($connect);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../Login.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0)
				{
					mysqli_stmt_bind_param($stmt,"s",$username);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
					if($password != $row['pwdusers'])
					{
						$error = "*Wrong Password";
						header("Location: ../Login.php?error=".$error);
						exit();
					}
					else
					{
						session_start();
						$_SESSION['username'] = $row['uidusers'];
						header("Location: ../SurveyMain.php?login=success");
						exit();
					}
				}
				else
				{
					$error = "*Username doesn't exist";
					header("Location: ../Login.php?error=".$error);
					exit();
				}
			}
		}
	}
	else
	{
		header("Location: ../Login.php");
		exit();
	}
?>