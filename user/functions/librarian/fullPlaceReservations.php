<?php  
include '../DBconnection.php';

$pageNr=$_POST["pageNr"];
$numberPerPage=2;
$queryStart=$pageNr*$numberPerPage-$numberPerPage;
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$sql;
if($startDate!="" && $endDate!=""){
	$sql="SELECT * FROM hall_booking WHERE (reservation_start_time >='{$startDate}' AND reservation_start_time<='{$endDate}') AND (reservation_end_time >='{$startDate}' AND reservation_end_time<='{$endDate}')";
}
else if ($startDate!="" && $endDate=="") {

	$sql="SELECT * FROM hall_booking WHERE reservation_start_time>='{$startDate}' AND reservation_end_time>='{$startDate}'";
}

else if ($startDate=="" && $endDate!="") {
	$sql="SELECT * FROM hall_booking WHERE reservation_start_time<='{$endDate}' AND reservation_end_time<='{$endDate}'";
}
else{
	$sql="SELECT * FROM hall_booking";
}

$sqlCount=str_replace("*", " Count(*) as totali ", $sql);
$totalResult=$connection->query($sqlCount);
$totalResultFetched=$totalResult->fetch_assoc();
$totali=$totalResultFetched["totali"];
$mbetja=$totali%$numberPerPage;
$nrFaqeve;
if($mbetja>0){
	$nrFaqeve=(($totali-$mbetja)/$numberPerPage)+1;
}
else{
	$nrFaqeve=$totali/$numberPerPage;
}
echo "<table>";
echo "<tr><th>user id</th><th>library hall id</th><th>start time</th><th>end time</th><th>seat number</th></tr>";
$sql.=" LIMIT $queryStart,$numberPerPage ";
$reservationResult=$connection->query($sql);
while ($i=$reservationResult->fetch_assoc()) {
	echo "<tr><td>".$i["user_id"]."</td>"."<td>".$i["library_hall"]."</td>"."<td>".$i["reservation_start_time"]."</td>"."<td>".$i["reservation_end_time"]."</td>"."<td>".$i["seat_number"]."</td></tr>";
	
}
echo "</table>";
echo "<br>";
$i=1;
while ($i <= $nrFaqeve) {
	if($i==$pageNr){
		echo "<a style='color:red' onclick=changePageNr(".$i.")>".$i."</a> ";
	}
	else{
		echo "<a onclick=changePageNr(".$i.")>".$i."</a> ";
	}

	$i++;
}

?>