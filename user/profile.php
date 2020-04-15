<?php 
session_start();


$server='localhost';
		$usernameDB='root';
		$passwordDB='';
		$databaze="biblioteka";
		$connection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

		if($connection->connect_error){
			die("gabim ne lidhjen ne databaze");
		} 
		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo`,`email`,`mobile`,`birthday`,`gender` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
				$user = $result->fetch_assoc();

 ?>
 <form  action="functions/uploadProfilePhoto.php" method="POST" enctype="multipart/form-data">
 	
 	<input type="file" name="profilePhoto">
 	<input type="submit" value="change" name="change">

 </form>