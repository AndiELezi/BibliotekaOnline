<?php 
include 'functions/DBconnection.php';
$sql="SELECT * FROM library_halls";
$libraryHallResults=$connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<form>
<?php 
echo "<span>salla</span>&nbsp<select name='libraryHall' onchange='libraryHallChange(this.value)'>";
echo "<option value='default'>library hall</option>";
while($i=$libraryHallResults->fetch_assoc()){
	echo "<option value='".$i["id"]."'>".$i["name"]."</option>";

	}
echo "</select>";	


echo "&nbsp&nbsp<span>muaji</span>&nbsp<select name='month' onchange='monthChange(this.value)'>";
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
echo "</select>";


echo "&nbsp&nbsp<span>data</span>&nbsp<select id='data' name='date' onchange='dateChange(this.value)'>";
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
echo "</select>";



 ?>
 <span>oraFillimit</span><input type="time" id="startTime" value="01:00" name="startTime" onchange="startTimeChange(this.value)" >
 <span>oraMbarimit</span><input type="time" id="endTime" value="01:00" name="endTime" onchange="endTimeChange(this.value)">
</form><br>
<div id="seatResult"></div>
<script type="text/javascript" src="/BibliotekaOnline/scripts/placeReservation.js"></script>

</body>
</html>









