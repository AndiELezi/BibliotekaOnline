<?php 
session_start();


include "functions/DBconnection.php";

		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo`,`email`,`mobile`,`birthday`,`gender` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
				$user = $result->fetch_assoc();

 ?>
 <form  action="functions/uploadProfilePhoto.php" method="POST" enctype="multipart/form-data">
 	
 	<input type="file" name="profilePhoto">
 	<input type="submit" value="change" name="change">

 </form>