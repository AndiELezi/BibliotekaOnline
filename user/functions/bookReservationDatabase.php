<?php 


session_start();
$errMessage="";
include 'DBconnection.php';
if($_POST["isbn"]!=""){
$username=$_SESSION["username"];
$isbn=$_POST["isbn"];
$sql="SELECT id,points FROM users WHERE username='{$username}'";
$userResult=$connection->query($sql);
$userResultData=$userResult->fetch_assoc();
$sql="SELECT * FROM book WHERE ISBN='{$isbn}'";
$bookResult=$connection->query($sql);
$bookResultData=$bookResult->fetch_assoc();

$pointsLeft=$userResultData["points"]-$bookResultData["reservation_points"];

if($pointsLeft>=0){
	if($bookResultData["quantity"]>0){
		if($_POST["dataRezervimit"]!=""){
			if($_POST["dataRikthimit"]!=""){
				//behet rezervimi
				$stmt = $connection->prepare("INSERT INTO `book_reservation`(`user_id`, `book_id`, `reservation_time`, `returnTime`, `delay_fine`) VALUES (?,?,?,?,?)");
				$stmt->bind_param('sssss',$user_idD,$book_idD,$reservation_dateD,$return_dateD,$delay_fineD);
				$user_idD=$userResultData["id"];
				$book_idD=$isbn;
				$reservation_dateD=$_POST["dataRezervimit"];
				$return_dateD=$_POST["dataRikthimit"];
				$delay_fineD=60;
				$stmt->execute();
				//behet updetimi pikeve
				$sql="UPDATE users SET points='{$pointsLeft}' WHERE username='{$username}'";
				$connection->query($sql);
				//behet updetimi i nr t librave	
				$sql="UPDATE book SET quantity=quantity-1 WHERE isbn='{$isbn}'";
				$connection->query($sql);
			}
			else{
				$errMessage="zgjidhni daten e rikthimit";
			}
			
		}

		else{
			$errMessage="zgjidhni daten e rezervimit";
		}
		

	}
	else{
		$errMessage="ju nuk mund ta rezervoni dot kete liber pasi nk ka me sasi te disponueshme te ketij libri ne biblioteke";
	}


}

else{
	$errMessage="ju nuk mund ta rezervoni dot kete liber pasi nuk keni pike te mjaftueshme";
}





}
else{
	$errMessage="ju nuk keni perzgjedhur librin qe deshironi te rezervoni";
}


if($errMessage!=""){
	echo $errMessage;
}
else{
	echo "Rezervimi u krye me sukses";
}


?>