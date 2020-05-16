<?php 

	$sysUsername="system";
	$sql="SELECT id FROM users WHERE username='{$sysUsername}'";
	$result=$connection->query($sql);
	if($result->num_rows > 0){
		$system=$result->fetch_assoc();
		$sysID=$system["id"];

		//make the book transfer query
		$sql="UPDATE online_books SET user_id='{$sysID}' WHERE user_id='{$userID}'";
		$connection->query($sql);
	}
?>