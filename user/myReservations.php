<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		include 'functions/Dbconnection.php';
		include 'header.php';

	 ?>
<h2>Book Reservations</h2>
<div id="bookReservation"> Librat qe ka rezervuar</div>
<h2>Place Reservation</h2>
<div id="placeReservation">Vendi qe ka prenotuar</div>	
<script type="text/javascript" src="/BibliotekaOnline/scripts/myReservations.js"></script>
</body>
</html>