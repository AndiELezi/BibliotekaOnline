<!DOCTYPE html>
<html>
<head>
	<title>Add new password</title>
	<link rel="stylesheet" type="text/css" href="../styles/authentication.css">
</head>
<body>
<?php 
$showForm=false;
$password="";
$cPassword="";
$errPassword="";
$errCpassword="";
include "functions/DBconnection.php";

	function checkRights($username, $recoverCode){
		global $connection;
		$sql="SELECT name FROM users WHERE username='{$username}' AND recoverPasswordToken='{$recoverCode}'";
		$result=$connection->query($sql);
		if($result->num_rows > 0){
			return true;
		}
		return false;
	}

	function checkPasswords($password , $cPassword){
		if(strlen($password) >= 8){
			if(strcmp($password, $cPassword)===0){
				return true;
			}
		}
	}

	function setNewPassword($username, $password){
		global $connection;
		$encryptedPassword=password_hash($password, PASSWORD_DEFAULT);
		$sql="UPDATE users SET password='{$encryptedPassword}' WHERE username='{$username}'";
		$connection->query($sql);
	}

	function updateSecurityCode($username){
		global $connection;
		$recoverCode=str_shuffle("qwertyuioplkjhgfdsazxcvbnm1234567890");
		$sql="UPDATE users SET recoverPasswordToken='{$recoverCode}' WHERE username='{$username}' ";
		$connection->query($sql);
	}

	if(isset($_GET["username"]) && isset($_GET["recoverCode"])){
		$username=$_GET["username"];
		$recoverCode=$_GET["recoverCode"];
		if(checkRights($username, $recoverCode)){
			$showForm=true;
			if(isset($_POST["submit"])){
				if(!empty($_POST["password"])){
					$password=$_POST["password"];
					if(!empty($_POST["cPassword"])){
						$cPassword=$_POST["cPassword"];
						if(checkPasswords($password, $cPassword)){
							setNewPassword($username, $password);
							updateSecurityCode($username);
							$connection->close();
							echo "<h2>Password changed successfully</h2>";
							$showForm=false;
							header( "refresh:2;url=login.php");
						}
						else{
							$errPassword="Make sure your password is at least 8 characters long and match with each other";
						}
					}else{
						$errCpassword="Confirm password";
					}
				}else{
					$errPassword="Enter your password";
				}
			}
		}
		else{
			header("HTTP/1.0 404 Not Found");
		}	
	}

	if($showForm){
?>
		<form method="post" class="add_new_password_form">
			<h2>Type your new password</h2>
			<div class="input_wrap">
				<div class="single_input">
        			<input type="password" name="password" id="password" value="<?php echo $password?>" required>
        			<label>New Password</label> <br>
        			<span id="errPassword"><?php echo $errPassword?></span><br>
    			</div>
    			<div class="single_input">
        			<input type="password" name="cPassword" id="cPassword" value="<?php echo $cPassword?>" required>
        			<label>Confirm</label> <br>
        			<span id="errCPassword"><?php echo $errCpassword?></span><br>
    			</div>
  				<input type="submit" name="submit" value="Change">
  			</div>
		</form>

	<!-- jquery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- script qe shton classen has-content per inputet qe nuk jane bosh -->
	<script type="text/javascript" src="../scripts/addInputClass.js"></script>
<?php
	}
?>

</body>
</html>