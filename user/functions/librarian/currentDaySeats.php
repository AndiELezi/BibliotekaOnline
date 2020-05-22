<?php 

include '../DBconnection.php';
$pageResult="";
$pageErr="";
if($_POST["libraryHall"]!="default"){
$today=date("Y-m-d H:i:sa");

$libraryHall=$_POST["libraryHall"];
$sql="SELECT * FROM hall_booking WHERE (library_hall='{$libraryHall}') AND (reservation_start_time<='{$today}' AND reservation_end_time>='{$today}')";
$takenSeatsResults=$connection->query($sql);
$takenSeats=array();
$takenSeatsIndex=0;
while($taken=$takenSeatsResults->fetch_assoc()){
	$takenSeats[$takenSeatsIndex]=$taken["seat_number"];
	$takenSeatsIndex++;
}

$sql="SELECT * FROM hall_structure WHERE library_hall='{$libraryHall}'";
$structureResultUnfetched=$connection->query($sql);
$structureResult=$structureResultUnfetched->fetch_assoc();
$separtaionArray=array();
$row_numbers=$structureResult["row_numbers"];
for($i=0;$i<5;$i++){
	$nr=$i+1;
	$kolona="separation_".$nr;
	$separtaionArray[$i]=$structureResult[$kolona];
}

$nrVendit=1;
for($i=1;$i<=$row_numbers;$i++){
	$arrayPoz=0;	
	while (true) {
		if($separtaionArray[$arrayPoz]!=null){
			for($j=1;$j<=$separtaionArray[$arrayPoz];$j++){
			
				if(in_array($nrVendit,$takenSeats)){
					$sql="SELECT user_id FROM hall_booking WHERE (library_hall='{$libraryHall}') AND (reservation_start_time<='{$today}' AND reservation_end_time>='{$today}') AND (seat_number='{$nrVendit}')";
					$userResult=$connection->query($sql);
					$userIdResult=$userResult->fetch_assoc();
					$userId=$userIdResult["user_id"];

					$pageResult .="<img src='/BibliotekaOnline/images/app/takenSeat.png' id=$nrVendit onclick=showReservation('".$userId."')>";
					$pageResult .=" ";
					$nrVendit++;
				}
				else{
					$pageResult .="<img src='/BibliotekaOnline/images/app/freeSeat.png' id=$nrVendit >";
					$pageResult .=" ";
					$nrVendit++;
				}
				
			}
			$pageResult .=str_repeat('&nbsp;', 10);;
			$arrayPoz++;

		}
		else{
			break;
			}
		



		}

	$pageResult .="<br>";
	}


}
else{
	$pageErr="ju lutem plotesoni te gjitha fushat qe te behet afishimi i vendeve";
}

if($pageErr!=""){
	echo $pageErr;
}

else{
	echo $pageResult;
}



 ?>