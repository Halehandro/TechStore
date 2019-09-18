<?php
	if(isset($_POST['register-submit'])){

		require './db.php';

		$username=($_POST['username']);
		$email=($_POST['email']);
		$password=($_POST['password']);
		$passwordRepeat=($_POST['passwordRepeat']);
		$imeKorisnika=($_POST['ime']);
		$prezimeKorisnika=($_POST['prezime']);

		if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
			header("Location: ../registerForm.php?error=emptyfields&username=".$username."&mail=".$email);
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../registerForm.php?error=invalidusername&mail");
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../registerForm.php?error=invalidmail&username=".$username);
			exit();
		}
		else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../registerForm.php?error=invalidusername&mail=".$email);
			exit();
		}
		else if ($password !== $passwordRepeat) {
			header("Location: ../registerForm.php?error=passwordCheck&username=".$username."&mail=".$email);
			exit();
		}
		else {
				$sql="SELECT username FROM users WHERE username=?";
			  	$statement = mysqli_stmt_init($con);
			  	if (!mysqli_stmt_prepare($statement,$sql)) {
			  	header("Location: ../registerForm.php?error=sqlerror");
				exit();
			  	}
			  	else {
			  	mysqli_stmt_bind_param($statement, "s", $username);
			  	mysqli_stmt_execute($statement);
			  	mysqli_stmt_store_result($statement);
			  	$resultCheck = mysqli_stmt_num_rows($statement);
				  	if ($resultCheck > 0) {
				  		header("Location: ../registerForm.php?error=usernametaken&mail=".$email);
				  		exit();
				  	}
				  	else{

				  		$sql="INSERT INTO users(username, email, password, ime, prezime) VALUES (?, ?, ?, ?, ?)";
			  			$statement = mysqli_stmt_init($con);
			  				if (!mysqli_stmt_prepare($statement,$sql)) {
			  					header("Location: ../registerForm.php?error=sqlerror");
								exit();

				  			}
				  			else{
							  	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

							  	mysqli_stmt_bind_param($statement, "sssss", $username, $email,
									 $hashedPassword, $imeKorisnika, $prezimeKorisnika);
							  	mysqli_stmt_execute($statement);
							  	header("Location: ../loginForm.php?register=success");
							  	exit();
			  				}

			  	}


				}

		}
	mysqli_stmt_close($statement);
	mysqli_close($con);

}
else{
	header("Location: ../registerForm.php");
	exit();
}
