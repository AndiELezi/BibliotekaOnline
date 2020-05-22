<?php
if(!isset($_POST["like"])){
	echo "You dont have acces here";
	exit();
}
$like=$_POST["like"];
	$sql="SELECT * FROM book_like WHERE user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);
	echo $like;
	if($reviewResult->num_rows>0){
		
		$sql="DELETE FROM book_like where  user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);

	}
	else{
		
		$sql="INSERT INTO book_like(`user_id`,`book_id`,`like_time`,`book_type`) VALUES ('{$userId}','{$bookId}','{$data}','{$bookType}')";
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