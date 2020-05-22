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
	<title></title>
</head>
<body>
	<?php 
			include 'functions/DBconnection.php';
			include 'header.php';

	 ?>
	 <div>Thank You</div>

</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>