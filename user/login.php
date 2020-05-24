<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../styles/authentication.css">
<body>

	<?php
	$username="";
	$password="";
	$userRights;
	$errUsername="";
	$errPassword="";
	$isCorrect=false;
	$isActivated=false;

	function checkCredentials($usernameToCheck,$passwordToCheck){
		global $userRights;
		global $connection;
		global $errUsername;
		global $errPassword;
		global $isCorrect;
		global $isActivated;
		include "functions/DBconnection.php";

		$sql="SELECT password FROM users WHERE username='{$usernameToCheck}'";
		$result=$connection->query($sql);
		if($result->num_rows>0){
				$passwordResult=$result->fetch_assoc();
			
				if(!password_verify($passwordToCheck, $passwordResult["password"])){
					$errPassword="Incorrect password";
				}
				else{
					$isCorrect=true;
					$sql="SELECT activationStatus, user_rights FROM users WHERE username='{$usernameToCheck}'";
					$result=$connection->query($sql);
					$activationStatus=$result->fetch_assoc();
					if($activationStatus["activationStatus"]==1){
						$isActivated=true;
					}
					$userRights=$activationStatus["user_rights"];
				}
		}
		else{
			$errUsername="This user doesn't exist";
		}
	}	

		if(isset($_POST["submit"])){
			
			if(!empty($_POST["username"])){
				$username=$_POST["username"];

				if(!empty($_POST["password"])){
					$password=$_POST["password"];
					checkCredentials($username, $password);
				}
				else{
					$errPassword="Shkruani passwordin";
				}
			}
			else{
				$errUsername="Shkruani username";
			}
			
			if($isCorrect && $isActivated){
				$connection->close();
				$_SESSION["username"]=$_POST["username"];
				if($userRights==3){
					header("Location: home.php");
				}
				else{
					header("Location: librarian/home.php");
				}
			}

			else if($isCorrect && !$isActivated){
				// alert user to confirm his email
				$connection->close();
				header("Location: accountActivation.php?username=$username");
			}
		}
	?>

	
	<form method="post" action="login.php" class="login_form">
		<img id="userLogo" src="/BibliotekaOnline/images/app/userlogo.png">
		<h2 id="login">Login</h2>
		<div class="input_wrap">
			<div class="single_input">
				<input type="text" id="username" name="username" value="<?php echo $username;?>" required>
				<label>Username</label><br>
				<span id="errUsername"><?php echo $errUsername; ?></span>	
			</div> <br>
			<div class="single_input">
				<input type="password" id="password" name="password" value="<?php echo $password;?>" required>
				<label>Password</label><br>
				<span id="errPassword"><?php echo $errPassword; ?></span>
			</div> <br>
			<input type="submit" name="submit" value="Login">
		</div>
		<br><br>
		<a href="register.php">Register</a> <br><!-- Ket e shkrujta njeher kshu se di si do e bejm -->
		<a href="forgotPassword.php">Lost your password?</a> <!--kjo duhet tna coj ne nje faqe qe kerko email -->
	</form>
	<!-- jquery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- script qe shton classen has-content per inputet qe nuk jane bosh -->
	<script type="text/javascript" src="../scripts/addInputClass.js"></script>

</body>
</head>
</html>