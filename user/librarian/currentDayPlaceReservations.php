<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/currentDayPlaceReservations.js"></script>

</head>
<body>
	<?php 
		include '../functions/DBconnection.php';
		$sql="SELECT * FROM library_halls";
		$libraryHallResults=$connection->query($sql);

	 

		echo "<span>salla</span>&nbsp<select name='libraryHall' onchange='libraryHallChange(this.value)'>";
		echo "<option value='default'>library hall</option>";
		while($i=$libraryHallResults->fetch_assoc()){
			echo "<option value='".$i["id"]."'>".$i["name"]."</option>";
			}
		echo "</select>";	
	?>
	 <div id="seatResult"></div>
	 <div id="userResult"></div>


</body>
</html>