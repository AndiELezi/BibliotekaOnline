<?php 

	include "functions/DBconnection.php";
	$username=$_GET["username"];
	if(isset($_GET["securityStringMail"])){
		$securityString=$_GET["securityStringMail"];
		$sql="SELECT name FROM users WHERE username='{$username}' AND securityString='{$securityString}'";
		$result=$connection->query($sql);
		if($result->num_rows>0){
			$sql="UPDATE `users` SET `activationStatus`=true WHERE username='{$username}' AND securityString='{$securityString}'";
			$connection->query($sql);
			echo "<h2>Account activated successfully</h2> <p>Redirecting to Login</p>";
			header( "refresh:2;url=login.php");
		}

		else{
 			echo "ups dicka ndodhi gabim";	
		}

	}
	else{
		$sql="SELECT email, securityString FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
		$user=$result->fetch_assoc();
		$email=$user["email"];
		$security=$user["securityString"];

?>
		<h2>You need to activate your account first. Check your email!</h2>
		<form method="post">
			<input type="submit" name="resend" value="Resend Email">
		</form>
		<a href="//localhost/BibliotekaOnline/user/login.php">Login</a>

<?php
		if(array_key_exists('resend', $_POST)){
			include "functions/activationMail.php";
		}

	}
	$connection->close();

?>