<?php if(!isset($_POST["month"])){
	echo "You dont have acces here";
	exit();
}
session_start();
$fillimiRezervimit="2020-".$_POST["month"]."-".$_POST["date"]." ".$_POST["startTime"].":00";
if(strtotime($fillimiRezervimit)<strtotime(Date("Y-m-d H:i:s"))){
		echo "<span class='error'>Data e fillimit te rezervimit nuk duhet te jete me e vogel se dita dhe ora  e momentit</span>";
		exit();
}

include 'DBconnection.php';
$pageResponse="";
$pageError="";
$username=$_SESSION["username"];
$sql="SELECT id FROM users WHERE username='{$username}'";
$userResult=$connection->query($sql);
$userResultFetched=$userResult->fetch_assoc();
$userId=$userResultFetched["id"];
$sql="SELECT * FROM hall_booking WHERE user_id='{$userId}'";
$reservationResult=$connection->query($sql);
$reservationResultFetched=$reservationResult->fetch_assoc();
if($reservationResultFetched!=null){
	//do i bashkangjisim dhe linkun my reservations qe ta coj te faqja qe t fhsij rezervimin;
	$pageError="Ju keni nje reservim aktiv vendi.Ju lutem anulloni reservimin tjeter qe te beni nje reservim te ri";
}
else{


$stmt = $connection->prepare("INSERT INTO `hall_booking`( `library_hall`, `seat_number`, `reservation_start_time`, `reservation_end_time`,`user_id`) VALUES (?,?,?,?,?)");
$stmt->bind_param('sssss',$libraryHall,$seatNumber,$reservationStartTime,$reservationEndTime,$userIdReservation);
$libraryHall=$_POST["libraryHall"];
$seatNumber=$_POST["reservedSeatId"];
$reservationStartTime="2020-".$_POST["month"]."-".$_POST["date"]." ".$_POST["startTime"].":00";
$reservationEndTime="2020-".$_POST["month"]."-".$_POST["date"]." ".$_POST["endTime"].":00";
$userIdReservation=$userId;
$stmt->execute();
$pageResponse="Rezervimi u krye me sukses";

}


if($pageError!=""){
	echo "<span class='error'>".$pageError."</span>";
}
else{
	echo "<span class='success'>".$pageResponse."</span>";
}

 ?>