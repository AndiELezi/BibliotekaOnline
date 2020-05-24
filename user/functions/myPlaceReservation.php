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

$pageResult.="<div class='place_reservation_wrap'><table>";
$pageResult.="<tr><th>Hall:</th> <td>".$hallName."</td></tr>";
$pageResult.="<tr><th>Seat number:</th> <td>".$placeReservation["seat_number"]."</td></tr>";
$pageResult.="<tr><th>Start time:</th> <td>".date('d / F / Y H:i', strtotime($placeReservation["reservation_start_time"]))."</td></tr>";
$pageResult.="<tr><th>End time:</th><td>".date('d / F / Y H:i', strtotime($placeReservation["reservation_end_time"]))."</td></tr></table>";
$pageResult.="<br><a style='cursor:pointer' onclick='deletePlaceReservation()'><div>Delete</div></a>";
$pageResult.="</div>";



}
else{
	$pageError="<b>Nuk ka rezervime<b>";
}

if($pageError!=""){
	echo $pageError;
}
else{
	echo $pageResult;
}




  ?>