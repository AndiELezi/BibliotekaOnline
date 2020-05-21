<?php 
session_start();
include 'functions/DBconnection.php';
$sql="SELECT * FROM library_halls";
$libraryHallResults=$connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles/placeReservation.css">
</head>
<body>
	<?php  include 'header.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<div class="reservation_wrap">

	<form>
<?php 
echo "<select name='libraryHall' onchange='libraryHallChange(this.value)'>";
echo "<option value='default'>library hall</option>";
while($i=$libraryHallResults->fetch_assoc()){
	echo "<option value='".$i["id"]."'>".$i["name"]."</option>";

	}
echo "</select>&nbsp";	


echo "<select name='month' onchange='monthChange(this.value)'>";
echo "<option value='default'>muaji</option>";
$i=1;
while ($i<=12) {
	if($i<10){
		echo "<option value='0".$i."'>".$i."</option>";
	}
	else{
		echo "<option value='".$i."'>".$i."</option>";
	}
	$i++;
}
echo "</select>&nbsp";


echo "<select id='data' name='date' onchange='dateChange(this.value)'>";
echo "<option value='default'>data</option>";
$i=1;
while ($i<=30) {
	if($i<10){
		echo "<option value='0".$i."'>".$i."</option>";
	}
	else{
		echo "<option value='".$i."'>".$i."</option>";
	}
	$i++;
}
echo "</select>&nbsp";



 ?>
<div class="time_selector">
 	<span>Start Time</span><br>
 	<input type="time" id="startTime" value="08:00" name="startTime" onchange="startTimeChange(this.value)">
</div>
<div class="time_selector">
 	<span>End Time</span><br>
 	<input type="time" id="endTime" value="09:00" name="endTime" onchange="endTimeChange(this.value)">
</div>
</form>

<div id="seatResult"></div>

<div id="reservationResponse"></div>
</div>
<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="/BibliotekaOnline/scripts/placeReservation.js"></script>

</body>
</html>









