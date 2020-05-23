<?php
include '../DBconnection.php'; 
$pageResult="";


if(isset($_POST["username"]) && isset($_POST["bookIsbn"]) && !isset($_POST["returnBook"])){

	$username=$_POST["username"];
	$isbn=$_POST["bookIsbn"];
	$sql="SELECT users.id as userID,users.username,users.name,users.surname,book.ISBN,book.title FROM book_reservation INNER JOIN users on users.id=book_reservation.user_id INNER JOIN book on book_reservation.book_id=book.ISBN  WHERE users.username='{$username}' AND book_reservation.book_id='{$isbn}'";
	$reservationResult=$connection->query($sql);
	if($reservationResult->num_rows>0){
		$reservationResultFetched=$reservationResult->fetch_assoc();
	$pageResult.="userID:".$reservationResultFetched["userID"]."<br>"."username:".$reservationResultFetched["username"]."<br>"."Emri:".$reservationResultFetched["name"]."<br>"."SMbiemri:".$reservationResultFetched["surname"]."<br>"."ISBN:".$reservationResultFetched["ISBN"]."<br>"."Titulli:".$reservationResultFetched["title"]."<br>"."<button onclick=returnBook('".$username."','".$isbn."')>Rikthe Librin</button>";
	}
	else{
		$pageResult="Nuk Ka Rezervim me kete username dhe liber";
	}
	

}
	
else if(isset($_POST["username"]) && isset($_POST["bookIsbn"]) && isset($_POST["returnBook"])){
	$username=$_POST["username"];
	$isbn=$_POST["bookIsbn"];
	$sql="DELETE FROM book_reservation WHERE user_id=(SELECT id from users where username='{$username}') AND book_id='{$isbn}'";
	$connection->query($sql);
	$pageResult="Libri u Rikthye me sukses" ;
}


	
echo $pageResult;




 ?>