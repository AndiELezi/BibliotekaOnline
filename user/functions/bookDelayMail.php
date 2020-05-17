<?php

include "DBconnection.php";
$date=date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime("+1 day"));
$sql="SELECT * from book_reservation where returnTime<='{$tomorrow}'";
$book_reservationResult=$connection->query($sql);
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <horizone.event@gmail.com>' . "\r\n";
while ($book_reservation=$book_reservationResult->fetch_assoc()) {
	$userId=$book_reservation["user_id"];
	$sql="SELECT email from users where id='{$userId}'";
	$emailConnection=$connection->query($sql);
	$emailResult=$emailConnection->fetch_assoc();
	$email=$emailResult["email"];
	$bookId=$book_reservation["book_id"];
	$sql="SELECT title from book where isbn='{$bookId}'";
	$bookTitleResult=$connection->query($sql);
	$bookTitle=$bookTitleResult->fetch_assoc();
	if ($date>$book_reservation["returnTime"]) {

		$tekst="<html><body><p><b>Biblioteka Online ju njofton qe duhet te dorzoni librin <i>".$bookTitle["title"]."</i> sepse data ".$book_reservation["returnTime"]." ka kaluar</p></body></html>";
		$subject="You are late";
    	
	}
	else if ($date==date('Y-m-d', strtotime($book_reservation["returnTime"]) - 86400)) {
		$tekst="<html><body><p><b>Biblioteka Online ju Kujton qe ne date ".$book_reservation["returnTime"]." Ju duhet te dorzoni Librin <i>".$bookTitle["title"]."</i> qe keni rezervuar</b></p></body></html>";

   		$subject="Reminder";
    	

	}	
		//$headers .= $email . "\r\n";

   		mail($email,$subject,$tekst,$headers);
}

?>