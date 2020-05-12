
<?php 
session_start();
include 'DBconnection.php';
	$username=$_SESSION["username"];
	$sql="SELECT * from users where username='{$username}'";
	$userResult=$connection->query($sql);
	$userData=$userResult->fetch_assoc();
	$userId=$userData["id"];
	$bookId=$_POST["bookId"];
	$data=date("Y-m-d");

if (isset($_POST["like"])) {
	$like=$_POST["like"];
	$sql="SELECT * FROM review WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
		
		$sql="UPDATE review SET liked='{$like}' , time_review='{$data}' where  user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO review(`user_id`,`book_id`,`time_review`,`liked`) VALUES ('{$userId}','{$bookId}','{$data}','{$like}')";
		$connection->query($sql);
	}


}

 ?>