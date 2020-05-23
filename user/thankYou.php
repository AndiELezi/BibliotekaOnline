<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thank you</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style type="text/css">
		body{
			background-color: #183d59;
		}
		.thank_you{
			position: absolute;
    		top: 50%;
    		left: 50%;
    		margin-top: -50px;
    		margin-left: -150px;
    		background-color: rgba(55, 112, 150, 0.3);
			padding-top: 40px;
			padding-bottom: 40px;
			padding-left: 70px;
			padding-right: 70px;
			border-radius: 12px;
			text-align: center;
			font-size: 30px;
			color: #d9dadd;
		}
	</style>
</head>
<body>
	<?php 
			include 'functions/DBconnection.php';
			include 'header.php';

	 ?>
	 <div class="thank_you">Thank You</div>

</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>