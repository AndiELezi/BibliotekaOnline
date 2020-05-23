<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My reservations</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../styles/myReservations.css">
</head>
<body>
	<?php 
		include 'functions/Dbconnection.php';
		include 'header.php';

	 ?>
<h2>Book Reservations</h2>
<div id="bookReservation"> Librat qe ka rezervuar</div>
<hr>
<h2>Place Reservation</h2>
<div id="placeReservation">Vendi qe ka prenotuar</div>	
<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="/BibliotekaOnline/scripts/myReservations.js"></script>
</body>
</html>