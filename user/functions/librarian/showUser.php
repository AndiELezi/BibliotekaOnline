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
	echo "<br><span>User ID:<b>".$userResult["id"]."</b></span>";
	echo "<br><span>Emri:<b>".$userResult["name"]."</b></span>";
	echo "<br><span>Mbiemri<b>:".$userResult["surname"]."</b></span>";
	echo "<br><span>E-mail<b>:".$userResult["email"]."</b></span>";
	echo "<br><span>Fillimi Rezervimit:<b>".$userResult["reservation_start_time"]."</b></span>";
	echo "<br><span>Perfundimi Rezervimit:<b>".$userResult["reservation_end_time"]."</b></span>";
	echo "<br><button onclick=fshiRezervimin('".$userResult["id"]."')>Fshi Rezervimin</button><br><br>";
}

echo $delete;

 ?>