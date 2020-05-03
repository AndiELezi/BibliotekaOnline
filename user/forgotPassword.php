<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<link rel="stylesheet" type="text/css" href="../styles/authentication.css">
</head>
<body>
<?php
$email="";
$errEmail="";
$mailState="";
	if (isset($_POST["submit"])) {
		if (!empty($_POST["email"])) {
			$email=$_POST["email"];
			include "functions/DBconnection.php";

			//check if an account with this email exists
			$sql="SELECT username FROM users WHERE email='{$email}'";
			$result=$connection->query($sql);
			if($result->num_rows > 0){
				$data=$result->fetch_assoc();
				//save username
				$username=$data["username"];
				//change the user recover password token
				$recoverCode=str_shuffle("qwertyuioplkjhgfdsazxcvbnm1234567890");
				$sql="UPDATE users SET recoverPasswordToken='{$recoverCode}' WHERE email='{$email}' ";
				$connection->query($sql);
				//sent email to change password
				include "functions/recoverPasswordMail.php";
				$mailState="Email sent!";
			}
			else{
				$errEmail="This email doesn't belong to any account";
			}
		}
		else{
			$errEmail="Please enter your email";
		}
	}
?>

<form method="post" action="forgotPassword.php" class="forgot_password_form">
	<h2>Forgot password?</h2>
	<h2>We will send a confirmation email</h2>
	<div class="input_wrap">
		<div class="single_input">
			<input type="email" name="email" value="<?php echo $email; ?>" required>
			<label>Enter Email</label><br>
			<span id="errUsername"><?php echo $errEmail; ?></span>	
		</div> <br>
	<input type="submit" name="submit" value="Send">
	</div>
	<br>
	<span style="color:#28B6C8; font-weight: bold;"><?php echo $mailState ?></span>
</form>

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- script qe shton classen has-content per inputet qe nuk jane bosh -->
<script type="text/javascript" src="../scripts/addInputClass.js"></script>
</body>
</html>