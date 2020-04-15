<?php 
	$server='localhost';
	$usernameDB='root';
	$passwordDB='';
	$databaze="biblioteka";
	$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

	if($connnection->connect_error){
		die("Error connecting to database");
		header("HTTP/1.0 404 Not Found");
	}
?>