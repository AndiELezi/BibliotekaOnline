<?php 
$isCorrect=false;
	if(isset($_GET["username"]) && isset($_GET["recoverCode"])){
		$username=$_GET["username"];
		$recoverCode=$_GET["recoverCode"];
		include "functions/DBconnection.php";
		$sql="SELECT name FROM users WHERE username='{$username}' AND recoverPasswordToken='{$recoverCode}'";
		$result=$connection->query($sql);
		if($result->num_rows > 0){
			$isCorrect=true;
		}
		else{
			echo "Wrong link!";
		}
	}
	else{ 
		if(isset($_POST["password"])){
			$password=$_POST["password"];
			if(isset($_POST["cPassword"])){
				if(checkPasswords($password, $cPassword)){
					updatePassword($password);
				}
			}
		}
	}

	if($isCorrect){
?>
			<form method="post" action="addNewPassword.php">
				<input type="password" name="password" id="password" value="<?php echo $password?>" placeholder="New password">
					<span id="errPassword"><?php echo $ErrPassword?></span><br>
  				<input type="password" name="cPassword" id="cPassword" value="<?php echo $cPassword?>" placeholder="Confirm Password">
  					<span id="errCPassword"><?php echo $ErrCPassword?></span>
			</form>
<?php
	}
?>