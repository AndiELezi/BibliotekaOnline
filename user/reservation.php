<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>

			body{
				background-color: #183d59;
			}

			.wrap_links{
				margin-top:30px; 
				text-align: center;
			}

			.wrap_links div{
				margin: 28px;
    			box-shadow: 10px 10px 8px #377096;
    			display: inline-block;
    			border-radius: 25px;
    			text-align: center;
    			width: 600px;
    			height: 50px;
    			background-color: #4e697d;
    			padding: 20px;
    			padding-top: 30px;
    			font-size: 40px;
			}
			.wrap_links a{
				margin: 20px;
				color:#d9dadd;
				text-decoration: none;
				text-align: center;
			}

			.wrap_links div:hover{
				color: #183d59;
				background-color: #d9dadd;
			}
		</style>
</head>
<body>
	<?php  
		include 'functions/DBconnection.php';
		include 'header.php';
	 ?>
<div class="wrap_links">
	<a href="myReservations.php"><div>My reservations</div></a><br>
	<a href="bookReservation.php"><div>Reserve a book</div></a><br>
	<a href="placeReservation.php"><div>Reserve a place</div></a>
</div>
</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>