<?php 
session_start();
include 'DBconnection.php';
$pageResult="";
$pageErr="";
$username=$_SESSION["username"];
$sql="SELECT id FROM users WHERE username='{$username}'";
$userResult=$connection->query($sql);
$userResultFetched=$userResult->fetch_assoc();
$userId=$userResultFetched["id"];

if(isset($_POST["delete"])){

	$book_reservation_id=$_POST["bookId"];
	$user_reservation_id=$_POST["userId"];
	$sql="DELETE FROM book_reservation WHERE user_id='{$user_reservation_id}' AND book_id='{$book_reservation_id}'";
	$connection->query($sql);
	$sql="UPDATE book SET quantity=quantity+1 WHERE ISBN='{$book_reservation_id}'";
	$connection->query($sql);
}

$sql="SELECT * FROM book_reservation WHERE user_id='{$userId}'";
$result=$connection->query($sql);

$i=0;
$pageResult.="<table><tr><th>Number</th><th>bookId</th><th>Book Title</th><th>reservationTime</th><th>returnTime</th><th>delayFine</th></tr>";
while ($bookReservation=$result->fetch_assoc()) {
	$i++;
	$bookId=$bookReservation["book_id"];
	$sql="SELECT title FROM book WHERE ISBN='{$bookId}'";
	$bookResult=$connection->query($sql);
	$bookResultFetched=$bookResult->fetch_assoc();
	$bookTitle=$bookResultFetched["title"];
	$pageResult.="<tr><td>".$i."</td><td>".$bookReservation["book_id"]."</td><td>".$bookTitle."</td><td>".$bookReservation["reservation_time"]."</td><td>".$bookReservation["returnTime"]."</td><td>".$bookReservation["delay_fine"]."</td><td><a style='cursor:pointer' onclick=deleteBookReservation('".$bookReservation["book_id"]."','".$bookReservation["user_id"]."')".">delete</a></td></tr>";



}
$pageResult.="</table>";


if($i==0){
	$pageErr.="nuk ka rezervime";
}



if($pageErr!=""){
	echo $pageErr;
}
else{
	echo $pageResult;
}

?>