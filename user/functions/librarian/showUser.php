<?php 
include '../DBconnection.php';
$userId=$_POST["userId"];
$delete="";
if(isset($_POST["delete"])){
	$sql="DELETE FROM hall_booking WHERE user_id='{$userId}'";
	$connection->query($sql);
	$delete="Rezervimi u fshi me sukses";
}

$sql="SELECT users.id,users.name,users.surname,users.email,hall_booking.reservation_start_time,hall_booking.reservation_end_time FROM hall_booking INNER JOIN users on users.id=hall_booking.user_id where id='{$userId}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	$userResult=$result->fetch_assoc();
	echo "User ID:".$userResult["id"];
	echo "<br>Emri:".$userResult["name"];
	echo "<br>Mbiemri:".$userResult["surname"];
	echo "<br>E-mail:".$userResult["email"];
	echo "<br>Fillimi Rezervimit:".$userResult["reservation_start_time"];
	echo "<br>Perfundimi Rezervimit:".$userResult["reservation_end_time"];
	echo "<br><button onclick=fshiRezervimin('".$userResult["id"]."')>Fshi Rezervimin</button>";
}

echo $delete;

 ?>