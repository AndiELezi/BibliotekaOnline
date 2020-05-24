<?php 
	
	include "DBconnection.php";
	//get the user id
	$sql="SELECT id FROM users WHERE username='{$username}'";
	$result=$connection->query($sql);
	$user=$result->fetch_assoc();
	$userID=$user["id"];

	//check if user wants to also delete his books
	if(!empty($_POST["deleteBooks"])){
		include "deleteUserBooks.php";
	}

	else{	//transfer user books to system before deleting account
		include "transferUserBooksToSystem.php";
	}

	//delete user data

	$sql="DELETE FROM review WHERE user_id='{$userID}'";
	$connection->query($sql);

	$sql="DELETE FROM book_like WHERE user_id='{$userID}'";
	$connection->query($sql);

	$sql="DELETE FROM book_favourite WHERE user_id='{$userID}'";
	$connection->query($sql);

	$sql="DELETE FROM book_reservation WHERE user_id='{$userID}'";
	$connection->query($sql);

	$sql="DELETE FROM hall_booking WHERE user_id='{$userID}'";
	$connection->query($sql);


	//delete profile_photo
	$sql="SELECT profile_photo FROM users WHERE id='{$userID}'";
	$result=$connection->query($sql);
	if($result->num_rows >0){
		$userResult=$result->fetch_assoc();
		if($userResult["profile_photo"]!="default.jpg"){
			$photo='C:\xampp\htdocs\BibliotekaOnline\images\users\\'.$userResult["profile_photo"];
			unlink($photo);
		}
	}


	//delete user
	$sql="DELETE FROM users WHERE id='{$userID}'";
	$connection->query($sql);
	echo "Account deleted successfully";
	header( "Location: logout.php");
?>