<?php

$favourite=$_POST["favourite"];
	$sql="SELECT * FROM review WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
		
		$sql="UPDATE review SET favourite='{$favourite}' , favourite_time='{$data}' where  user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO review(`user_id`,`book_id`,`favourite_time`,`favourite`,`book_type`) VALUES ('{$userId}','{$bookId}','{$data}','{$favourite}','{$bookType}')";
		$connection->query($sql);
	}


?>