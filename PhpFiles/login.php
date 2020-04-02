<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<body>

	<?php
	$username="";
	$password="";
	$errUsername="";
	$errPassword="";

	function checkUsernameAvailability($usernameToCheck){
		global $errUsername;
		global $errPassword;
		$server='localhost';
		$usernameDB='root';
		$passwordDB='';
		$databaze="biblioteka";
		$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

		if($connnection->connect_error){
			die("gabim ne lidhjen ne databaze");
		} 

		$sql="SELECT name FROM users WHERE username='{$usernameToCheck}'";
		$result=$connnection->query($sql);
		if($result->num_rows<1){
			$errUsername="This user doesn't exist";
		}
	}

		if(isset($_POST["submit"])){
			if(!empty($_POST["username"])){
				$username=$_POST["username"];

				checkUsernameAvailability($username);
			}
			else{
				$errUsername="Shkruani username";
			}
			if(!empty($_POST["password"])){
				$password=$_POST["password"];
			}
			else{
				$errPassword="Shkruani passwordin";
			}

		}
	?>

	<form method="post" action="login.php">
		Username : <input type="text" id="username" name="username" value="<?php echo $username;?>" placeholder="username" ><span id="errUsername"><?php echo $errUsername;?> </span><br>
		Password : <input type="text" id="password" name="password" value="<?php echo $password;?>" placeholder="password"><span id="errPassword"><?php echo $errPassword; ?></span><br>
		<input type="submit" name="submit">
		<p class="Duhet Rregullu"> <a href="Register.php">Register</a></p> <!-- Ket e shkrujta njeher kshu se di si do e bejm -->
			<a href="Forgot.html">Lost your password?</a><br> <!--kjo duhet tna coj ne nje faqe qe kerko email -->
	</form>
</body>
</head>
</html>