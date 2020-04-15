<?php 
	$server='localhost';
	$usernameDB='root';
	$passwordDB='';
	$databaze="biblioteka";
	$connection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

	if($connection->connect_error){
		die("Error connecting to database");
		header("HTTP/1.0 404 Not Found");
	}
?>