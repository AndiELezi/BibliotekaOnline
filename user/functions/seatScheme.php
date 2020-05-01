<?php 




include 'DBconnection.php';
$pageResult="";
$pageErr="";
if($_POST["libraryHall"]!="default" && $_POST["month"]!="default" && $_POST["date"]!="default"){

$reservationStartTime="2020-".$_POST["month"]."-".$_POST["date"]." ".$_POST["startTime"].":00";
$reservationEndTime="2020-".$_POST["month"]."-".$_POST["date"]." ".$_POST["endTime"].":00";
if(strtotime($reservationStartTime)>=strtotime($reservationEndTime)){
	$pageErr="koha e perfundimit te rezervimit nuk mund te jete me e vogel ose e barabarte me kohen e fillimit te rezervimit";
}
$libraryHall=$_POST["libraryHall"];
$sql="SELECT * FROM hall_booking WHERE (library_hall='{$libraryHall}') AND (reservation_start_time < '{$reservationStartTime}' AND reservation_end_time>'{$reservationStartTime}' OR reservation_start_time<'{$reservationEndTime}' AND reservation_end_time>'{$reservationEndTime}' OR reservation_start_time>'{$reservationStartTime}' AND reservation_end_time<'{$reservationEndTime}')  ";
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
					$pageResult .="<img src='/BibliotekaOnline/images/app/takenSeat.jpg' id=$nrVendit>";
					$pageResult .=" ";
					$nrVendit++;
				}
				else{
					$pageResult .="<img src='/BibliotekaOnline/images/app/freeSeat.jpg' id=$nrVendit>";
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