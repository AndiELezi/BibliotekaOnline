<?php 
session_start();
include 'DBconnection.php';
$pageResult="";
$pageErr="";
$pageDel="";
$username=$_SESSION["username"];
$sql="SELECT id FROM users WHERE username='{$username}'";
$userResult=$connection->query($sql);
$userResultFetched=$userResult->fetch_assoc();
$userId=$userResultFetched["id"];

if(isset($_POST["delete"])){

	$book_reservation_id=$_POST["bookId"];
	$user_reservation_id=$_POST["userId"];

	$sql="SELECT taken FROM book_reservation WHERE user_id='{$user_reservation_id}' AND book_id='{$book_reservation_id}'";
	$takenResult=$connection->query($sql);
	$takenResultFetched=$takenResult->fetch_assoc();
	if($takenResultFetched["taken"]==0){

		$sql="DELETE FROM book_reservation WHERE user_id='{$user_reservation_id}' AND book_id='{$book_reservation_id}'";
		$connection->query($sql);
		$sql="UPDATE book SET quantity=quantity+1 WHERE ISBN='{$book_reservation_id}'";
		$connection->query($sql);
	}
	else{
		$pageDel="<br><b>Ju nuk mund ta fshini dot kete rezervim pasi libri eshte marre ne biblioteke<b>";
	}

}

$sql="SELECT * FROM book_reservation WHERE user_id='{$userId}'";
$result=$connection->query($sql);

$i=0;

$pageResult.="<div class='book_reservation_wrap'>";
$pageResult.="<table><tr><th>Number</th><th>Book ID</th><th>Book Title</th><th>Reservation Time</th><th>Return Time</th><th>Delay Fine</th><th></th></tr>";
while ($bookReservation=$result->fetch_assoc()) {
	$i++;
	$bookId=$bookReservation["book_id"];
	$sql="SELECT title FROM book WHERE ISBN='{$bookId}'";
	$bookResult=$connection->query($sql);
	$bookResultFetched=$bookResult->fetch_assoc();
	$bookTitle=$bookResultFetched["title"];
	$pageResult.="<tr><td>".$i."</td><td>".$bookReservation["book_id"]."</td><td class='title'>".$bookTitle."</td><td>".date('d / F / Y', strtotime($bookReservation["reservation_time"]))."</td><td>".date('d / F / Y', strtotime($bookReservation["returnTime"]))."</td><td>".$bookReservation["delay_fine"]."</td><td class='delete_reservation'><a style='cursor:pointer' onclick=deleteBookReservation('".$bookReservation["book_id"]."','".$bookReservation["user_id"]."')".">Delete</a></td></tr>";



}
$pageResult.="</table></div>";


if($i==0){
	$pageErr.="<b>Nuk ka rezervime<b>";
}



if($pageErr!=""){
	echo $pageErr;
}
else{
	echo $pageResult."<br>".$pageDel;
}

?>