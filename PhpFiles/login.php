<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<body>
	<form method="Post" action="Login.php">
		Username : <input type="text" id="username" name="username" value="<?php echo $username;?>" placeholder="username" ><span id="errUsername"><?php echo $errUsername;?> </span><br>
		Password : <input type="text" id="password" name="password" value="<?php echo $password;?>" placeholder="password"><span id="errPassword"><?php echo $errPassword; ?></span><br>
		<input type="submit" name="submit">
		<p class="Duhet Rregullu"> <a href="Register.php">Register</a></p> <!-- Ket e shkrujta njeher kshu se di si do e bejm -->
			<a href="Forgot.html">Lost your password?</a><br> <!--kjo duhet tna coj ne nje faqe qe kerko email -->
	</form>
</body>
</head>
</html>