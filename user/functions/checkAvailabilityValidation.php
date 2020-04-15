<?php 

include "functions/DBconnection.php";

$username=$_POST["username"];
$email=$_POST["email"];


$sql="SELECT name FROM users WHERE username='{$username}'";
$result=$connection->query($sql);

if($result->num_rows>0){
	$ErrUsername="username already taken";
	$isCorrect=0;
}

$sql="SELECT name FROM users WHERE email='{$email}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	$ErrEmail="email already taken";
	$isCorrect=0;
}
$connection->close();












 ?>