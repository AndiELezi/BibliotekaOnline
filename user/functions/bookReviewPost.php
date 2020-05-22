<?php
if(!isset($_POST["review"])){
	echo "You dont have acces here";
	exit();
}
$review=$_POST["review"];
	$sql="SELECT * FROM review WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
		
		$sql="UPDATE review SET description='{$review}',review_time='{$data}' WHERE user_id='{$userId}' AND book_id='{$bookId}' ";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO review(`user_id`,`book_id`,`review_time`,`description`,`book_type`) VALUES ('{$userId}','{$bookId}','{$data}','{$review}','{$bookType}')";
		$connection->query($sql);
	}


?>