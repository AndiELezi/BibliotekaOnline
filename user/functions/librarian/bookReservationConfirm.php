<?php
include '../DBconnection.php'; 
$pageResult="";

if(isset($_POST["username"]) && isset($_POST["bookIsbn"]) && !isset($_POST["giveBook"])){
	$username=$_POST["username"];
	$isbn=$_POST["bookIsbn"];
	$sql="SELECT users.id as userID,users.username,users.name,users.surname,book.ISBN,book.title FROM book_reservation INNER JOIN users on users.id=book_reservation.user_id INNER JOIN book on book_reservation.book_id=book.ISBN  WHERE users.username='{$username}' AND book_reservation.book_id='{$isbn}'";
	$reservationResult=$connection->query($sql);
	if($reservationResult->num_rows>0){
		$reservationResultFetched=$reservationResult->fetch_assoc();
	$pageResult.="<div>User ID:<b>".$reservationResultFetched["userID"]."</b><br>"."Username:<b>".$reservationResultFetched["username"]."</b><br>"."Emri:<b>".$reservationResultFetched["name"]."</b><br>"."Mbiemri:<b>".$reservationResultFetched["surname"]."</b><br>"."ISBN:<b>".$reservationResultFetched["ISBN"]."</b><br>"."Titulli:<b>".$reservationResultFetched["title"]."</b></div><br>"."<button onclick=jepLibrin('".$username."','".$isbn."')>Jep Librin</button>";
	}
	else{
		$pageResult="<span class='error'>Nuk Ka Rezervim me kete username dhe liber</span>";
	}
	

}

else if(isset($_POST["username"]) && isset($_POST["bookIsbn"]) && isset($_POST["giveBook"])){
	$username=$_POST["username"];
	$isbn=$_POST["bookIsbn"];
	$sql="UPDATE book_reservation set taken=1 WHERE user_id=(SELECT id from users where username='{$username}') AND book_id='{$isbn}'";
	$connection->query($sql);
	$pageResult="<span class='success'>Rezervimi u konfirmua</span>" ;
}



echo $pageResult;




 ?>