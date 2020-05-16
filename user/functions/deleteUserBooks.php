<?php 

	$sql="SELECT book_id as id FROM `v_user_online_books` WHERE username='{$username}'";
	$id_result=$connection->query($sql);
	if($id_result->num_rows > 0){
		while ($book=$id_result->fetch_assoc()) {
			$id=$book["id"];
			include "deleteBook.php";
		}
	}
?>