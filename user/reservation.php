<!DOCTYPE html>
<html>
<head>
	<title></title>
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