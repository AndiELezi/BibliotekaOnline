<?php

$like=$_POST["like"];
	$sql="SELECT * FROM review WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
		
		$sql="UPDATE review SET liked='{$like}' , like_time='{$data}' where  user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO review(`user_id`,`book_id`,`like_time`,`liked`,`book_type`) VALUES ('{$userId}','{$bookId}','{$data}','{$like}','{$bookType}')";
		$connection->query($sql);
	}


	if($like=="0"){
		if($bookType=="offlineBook"){
				$sql="UPDATE book SET likes=likes-1,monthly_likes=monthly_likes-1 WHERE ISBN='{$bookId}'";
				$connection->query($sql);

		}
		else{
			$sql="UPDATE online_books SET likes=likes-1,monthly_likes=monthly_likes-1 WHERE id='{$bookId}'";
				$connection->query($sql);
		}
	}
	
	else{

		if($bookType=="offlineBook"){
				$sql="UPDATE book SET likes=likes+1,monthly_likes=monthly_likes+1 WHERE ISBN='{$bookId}'";
				$connection->query($sql);

		}
		else{
			$sql="UPDATE online_books SET likes=likes+1,monthly_likes=monthly_likes+1 WHERE id='{$bookId}'";
				$connection->query($sql);
		}
	}

?>