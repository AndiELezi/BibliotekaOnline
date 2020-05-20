<?php  
include '../DBconnection.php';

$pageNr=$_POST["pageNr"];
$numberPerPage=2;
$queryStart=$pageNr*$numberPerPage-$numberPerPage;
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$sql;
if($startDate!="" && $endDate!=""){
	$sql="SELECT * FROM book_reservation WHERE (reservation_time >='{$startDate}' AND reservation_time<='{$endDate}') AND (returnTime >='{$startDate}' AND returnTime<='{$endDate}')";
}
else if ($startDate!="" && $endDate=="") {

	$sql="SELECT * FROM book_reservation WHERE reservation_time>='{$startDate}' AND returnTime>='{$startDate}'";
}

else if ($startDate=="" && $endDate!="") {
	$sql="SELECT * FROM book_reservation WHERE reservation_time<='{$endDate}' AND returnTime<='{$endDate}'";
}
else{
	$sql="SELECT * FROM book_reservation";
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
echo "<tr><th>user id</th><th>book ISBN</th><th>reservation time</th><th>return time</th><th>status</th></tr>";
$sql.=" LIMIT $queryStart,$numberPerPage ";
$reservationResult=$connection->query($sql);
while ($i=$reservationResult->fetch_assoc()) {
	echo "<tr><td>".$i["user_id"]."</td>"."<td>".$i["book_id"]."</td>"."<td>".$i["reservation_time"]."</td>"."<td>".$i["returnTime"]."</td>";
	if($i["taken"]==0){
		echo "<td>not taken</td></tr>";
	}
	else{
		echo "<td>taken</td></tr>";
	}

	
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