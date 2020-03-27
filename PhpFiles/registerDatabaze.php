<?php 

$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";

$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 







$stmt = $connnection->prepare("INSERT INTO `users`( `name`, `password`, `username`, `email`, `phone_nr`, `birthday`, `gender`, `user_rights`, `surname`, `activationStatus`,`securityString`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssss',$emriD,$passwordD,$usernameD,$emailD,$phone_nrD,$birthdayD,$genderD,$user_rightsD,$mbiemriD,$statusiD,$securityString);


$emriD=$_POST['emri'];
$passwordD=password_hash($_POST["password"], PASSWORD_DEFAULT);
$usernameD=$_POST["username"];
$emailD=$_POST["email"];
$phone_nrD="0684935250";
$birthdayD=$_POST["birthday"];
$genderD=$_POST["gjinia"];
$user_rightsD=3;
$mbiemriD=$_POST["mbiemri"];
$statusiD=false;
$securityString=$security;
$stmt->execute();


 ?>