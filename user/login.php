<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
<body>

	<?php
	$username="";
	$password="";
	$errUsername="";
	$errPassword="";
	$isCorrect=false;
	$isActivated=false;

	function checkCredentials($usernameToCheck,$passwordToCheck){
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
					$sql="SELECT activationStatus FROM users WHERE username='{$usernameToCheck}'";
					$result=$connection->query($sql);
					$activationStatus=$result->fetch_assoc();
					if($activationStatus["activationStatus"]==1){
						$isActivated=true;
					}
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
				header("Location: home.php");
			}

			else if($isCorrect && !$isActivated){
				// alert user to confirm his email
				$connection->close();
				header("Location: accountActivation.php?username=$username");
			}
		}
	?>
	<div class="background"></div>
	<form method="post" action="login.php" class="login">
		Username : <input type="text" id="username" name="username" value="<?php echo $username;?>" placeholder="username" ><span id="errUsername"><?php echo $errUsername;?> </span><br>
		Password : <input type="password" id="password" name="password" value="<?php echo $password;?>" placeholder="password"><span id="errPassword"><?php echo $errPassword; ?></span><br>
		<input type="submit" name="submit">
		<p class="Duhet Rregullu"> <a href="register.php">Register</a></p> <!-- Ket e shkrujta njeher kshu se di si do e bejm -->
			<a href="forgotPassword.php">Lost your password?</a><br> <!--kjo duhet tna coj ne nje faqe qe kerko email -->
	</form>
</body>
</head>
</html>