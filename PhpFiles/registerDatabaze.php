<?php 
 echo "test";
$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";

$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 
$emri=$_POST['emri'];
$password=$_POST["password"];
$username=$_POST["username"];
$email=$_POST["email"];
$phone_nr="0684935250";
$birthday=$_POST["birthday"];
$gender=$_POST["gjinia"];
$user_rights=3;
$mbiemri=$_POST["mbiemri"];
$statusi=false;




$query="INSERT INTO `users`( `name`, `password`, `username`, `email`, `phone_nr`, `birthday`, `gender`, `user_rights`, `surname`, `activationStatus`) VALUES ('{$emri}','{$password}','{$username}','{$email}','{$phone_nr}','{$birthday}','{$gender}','{$user_rights}','{$mbiemri}','{$statusi}')";

$connnection->query($query);







 ?>