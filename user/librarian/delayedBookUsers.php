<!DOCTYPE html>
<html>
<head>
	<title>Delayed books</title>
	<link rel="stylesheet" type="text/css" href="../../styles/librarian/allReservations.css">
</head>
<body>
<?php
include '../functions/DBconnection.php';
$date=date("Y-m-d");
$pageNr=$_GET["pageNr"];
$numberPerPage=8;
$startPage=$pageNr*$numberPerPage-$numberPerPage;
$sql="SELECT COUNT(*) as totali FROM book_reservation where returnTime<='{$date}' AND taken=1";
$totalResult=$connection->query($sql);
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
$sql="SELECT users.id,users.username,users.name,users.surname,users.email,users.mobile,book_reservation.book_id,book_reservation.reservation_time,book_reservation.returnTime,book_reservation.delay_fine  FROM book_reservation INNER JOIN users on users.id=book_reservation.user_id where returnTime<='{$date}' AND taken=1 LIMIT $startPage,$numberPerPage";

$result=$connection->query($sql);
echo "<div class='table_wrap'>";
echo "<table>";
echo "<tr><th>User Id</th><th>username</th><th>Emri</th><th>Mbiemri</th><th>email</th><th>Mobile</th><th>Book Isbn</th><th>Koha Rezervimit</th><th>Koha Kthimit</th><th>Gjoba</th></tr>";
while ($i=$result->fetch_assoc()) {
	echo "<tr><td>".$i["id"]."</td>"."<td>".$i["username"]."</td>"."<td>".$i["name"]."</td>"."<td>".$i["surname"]."</td>"."<td>".$i["email"]."</td>"."<td>".$i["mobile"]."</td>"."<td>".$i["book_id"]."</td>"."<td>".$i["reservation_time"]."</td>"."<td>".$i["returnTime"]."</td>"."<td>".$i["delay_fine"]."</td>"."</tr>";
}
echo "</table></div><br><br><hr>";
echo "<div class='nav_links'>";
$i=1;

while ($i <= $nrFaqeve) {
	if($i==$pageNr){
		echo "<a id='currentPageLink' href='delayedBookUsers.php?pageNr=".$i."'>".$i."</a> ";
	}
	else{
		echo "<a href='delayedBookUsers.php?pageNr=".$i."'>".$i."</a> ";
	}

	$i++;
}

echo "</div>";

  ?>

</body>
</html>

