<?php 
include "functions/DBconnection.php";




//duhet bere dhe shtimi phone_nr ne database nqs !empty


$stmt = $connection->prepare("INSERT INTO `users`( `name`, `surname`, `username`, `email`,`mobile`, `password`, `birthday`, `gender`, `points`, `user_rights`,profile_photo,`activationStatus`, `securityString`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssssss',$nameD,$surnameD,$usernameD,$emailD,$phone_nr,$passwordD,$birthdayD,$genderD,$pointsD,$user_rightsD,$profile_pohoto,$statusiD,$securityString);


$nameD=$_POST['emri'];
$surnameD=$_POST["mbiemri"];
$usernameD=$_POST["username"];
$emailD=$_POST["email"];
$phone_nr=null;
if(!empty($_POST["phone_nr"])){
	$phone_nr=$_POST["phone_nr"];
}
$passwordD=password_hash($_POST["password"], PASSWORD_DEFAULT);
$birthdayD=$_POST["birthday"];
$genderD=$_POST["gjinia"];
$pointsD=0;
$user_rightsD=3;
$profile_photo='default.png';
$statusiD=0;
$securityString=$security;
$stmt->execute();


 ?>