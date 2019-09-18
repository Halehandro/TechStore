<?php  
if(isset($_POST['login-submit'])){

	require './db.php';

	$userEmail= $_POST['userEmail'];
	$password= $_POST['password'];

	if (empty($userEmail) || empty($password)) {
		header("Location: ../loginForm.php?error=emptyfields");
		exit();
	}
	else {
		$sql="SELECT * FROM users WHERE username=? OR email=?";	
		$stmt= mysqli_stmt_init($con);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location: ../loginForm.php?error=sqlerror");
				exit();
			}
			else {
				mysqli_stmt_bind_param($stmt,"ss", $userEmail, $userEmail);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
					if ($row = mysqli_fetch_assoc($result)) {
						$pwdCheck = password_verify($password, $row['password']);
						if ($pwdCheck==false) {
							header("Location: ../loginForm.php?error=wrongpassword");
							exit();
						}
						else if($pwdCheck==true) {
							session_start();
							$_SESSION['username'] = $row['username'];
							header("Location: ../index.php?login=success");
							exit();
						}
						else {
							header("Location: ../loginForm.php?error=wrongpassword");
							exit();
						}
					}
					else {
						header("Location: ../loginForm.php?error=nouser");
						exit();
					}

			}

	}



}

else {
	header("Location: ../index.php");
	exit();
}


