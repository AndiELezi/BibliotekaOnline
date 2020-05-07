<?php
session_start();
include 'DBconnection.php';
$username=$_SESSION["username"];
$sql="SELECT id FROM users WHERE username='{$username}'";
$userResult=$connection->query($sql);
$userResultFetched=$userResult->fetch_assoc();
$userId=$userResultFetched["id"];
$pageResult="";
$pageError="";
if(isset($_POST["delete"])){
	$sql="DELETE FROM hall_booking WHERE user_id='{$userId}'";
	$connection->query($sql);
}

$sql="SELECT * FROM hall_booking WHERE user_id='{$userId}'";
$result=$connection->query($sql);
$placeReservation=$result->fetch_assoc();

if($placeReservation!=null){
$hallId=$placeReservation["library_hall"];
$sql="SELECT name FROM library_halls WHERE id='{$hallId}'";
$hallResult=$connection->query($sql);
$hallResultFetched=$hallResult->fetch_assoc();
$hallName=$hallResultFetched["name"];

$pageResult.="<span>Emri Salles:".$hallName."</span><br>";
$pageResult.="<span>Nr i vendit:".$placeReservation["seat_number"]."</span><br>";
$pageResult.="<span>Koha e fillimit:".$placeReservation["reservation_start_time"]."</span><br>";
$pageResult.="<span>Koha e Mbarimit:".$placeReservation["reservation_end_time"]."</span><br>";
$pageResult.="<a style='cursor:pointer' onclick='deletePlaceReservation()'>delete</a>";



}
else{
	$pageError="ju nuk keni rezervime";
}

if($pageError!=""){
	echo $pageError;
}
else{
	echo $pageResult;
}




  ?>