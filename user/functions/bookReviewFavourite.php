<?php
if(!isset($_POST["favourite"])){
	echo "You dont have acces here";
	exit();
}
$favourite=$_POST["favourite"];
	$sql="SELECT * FROM book_favourite WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
		
		$sql="DELETE FROM book_favourite WHERE  user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO book_favourite(`user_id`,`book_id`,`favourite_time`,`book_type`) VALUES ('{$userId}','{$bookId}','{$data}','{$bookType}')";
		$connection->query($sql);
	}


?>