<?php 

$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";
$username=$_POST["username"];
$email=$_POST["email"];
$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 

$sql="SELECT name FROM users WHERE username='{$username}'";
$result=$connnection->query($sql);

if($result->num_rows>0){
	$ErrUsername="username alredy taken";
	$isCorrect=0;
}

$sql="SELECT name FROM users WHERE email='{$email}'";
$result=$connnection->query($sql);
if($result->num_rows>0){
	$ErrEmail="email alredy taken";
	$isCorrect=0;
}
$connnection->close();












 ?>