<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php  
		session_start();
		include 'functions/DBconnection.php';
		include 'header.php';
	 ?>
<a href="bookReservation.php">reserve a book</a><br>
<a href="placeReservation.php">reserve a place</a><br>
<a href="myReservations.php">reservimet e mia</a>
</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>