<?php 

$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";

$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 




//duhet bere dhe shtimi phone_nr ne database nqs !empty


$stmt = $connnection->prepare("INSERT INTO `users`( `name`, `surname`, `username`, `email`, `password`, `birthday`, `gender`, `points`, `user_rights`, `activationStatus`, `securityString`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssss',$nameD,$surnameD,$usernameD,$emailD,$passwordD,$birthdayD,$genderD,$pointsD,$user_rightsD,$statusiD,$securityString);


$nameD=$_POST['emri'];
$surnameD=$_POST["mbiemri"];
$usernameD=$_POST["username"];
$emailD=$_POST["email"];
$passwordD=password_hash($_POST["password"], PASSWORD_DEFAULT);
$birthdayD=$_POST["birthday"];
$genderD=$_POST["gjinia"];
$pointsD=0;
$user_rightsD=3;
$statusiD=0;
$securityString=$security;
$stmt->execute();


 ?>