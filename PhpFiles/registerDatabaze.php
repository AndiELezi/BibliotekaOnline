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







$stmt = $connnection->prepare("INSERT INTO `users`( `name`, `password`, `username`, `email`, `phone_nr`, `birthday`, `gender`, `user_rights`, `surname`, `activationStatus`) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssssss',$emri,$password,$username,$email,$phone_nr,$birthday,$gender,$user_rights,$mbiemri,$statusi);


$emri=$_POST['emri'];
$password=password_hash($_POST["password"], PASSWORD_DEFAULT);
$username=$_POST["username"];
$email=$_POST["email"];
$phone_nr="0684935250";
$birthday=$_POST["birthday"];
$gender=$_POST["gjinia"];
$user_rights=3;
$mbiemri=$_POST["mbiemri"];
$statusi=false;

$stmt->execute();


 ?>