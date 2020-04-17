<?php
$errEmail="";
$mailState="";
	if (isset($_POST["submit"])) {
		if (!empty($_POST["email"])) {
			$email=$_POST["email"];
			include "functions/recoverPasswordMail.php";
			$mailState="Email sent!";
		}
		else{
			$errEmail="Please enter your email";
		}
	}
?>


<h3>Forgot password? We will send you an email to recover your password</h3>
<form method="post" action="forgotPassword.php">
	<span><?php echo $errEmail; ?></span> <br>
	<input type="email" name="email" placeholder="Enter your email here">
	<input type="submit" name="submit">
	<br>
	<span><?php echo $mailState ?></span>
</form>

