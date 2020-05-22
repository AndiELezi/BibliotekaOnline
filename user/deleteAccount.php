<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../styles/deleteAccount.css">
	<title></title>
</head>
<body>
<?php 
	$username=$_SESSION["username"];
	$password="";
	$errPassword="";
	include "functions/DBconnection.php";

	function checkCredentials($usernameToCheck,$passwordToCheck){
		global $errPassword;

		if (strlen($passwordToCheck) < 8) {
				$errPassword="Password too short";
				return false;
			}
			include "functions/DBconnection.php";

		

		$sql="SELECT password FROM users WHERE username='{$usernameToCheck}'";
		$result=$connection->query($sql);
		if($result->num_rows>0){
			$passwordResult=$result->fetch_assoc();

			if(password_verify($passwordToCheck, $passwordResult["password"])){
				return true;
			}
			else{
				$errPassword="Incorrect password";
				return false;
			}
		}
		else{
			return false;
		}
	}


	if(isset($_POST["delete"])){
		if(!empty($_POST["password"])){
			$password=$_POST["password"];
			if(checkCredentials($username, $password)){
				include "functions/accountDeletion.php";
			}
		}
		else{
			$errPassword="Please enter your password";
		}
	}

?>
	<?php  include 'header.php'; ?>
	<div class="form_wrap">
	<form method="post">
		<h2>Enter your password to permanently delete your account</h2>
		<input type="password" name="password" value="<?php echo $password ?>" placeholder='Enter pasword' required> 
		<br><span><?php echo $errPassword?></span> <br>
		<input type="checkbox" name="deleteBooks" value="deleteBooks"><label>Delete my books</label> <br> <br>
		<input type="submit" name="delete" value="Delete">
	</form>
	</div>

</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>