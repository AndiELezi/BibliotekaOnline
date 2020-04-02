<?php 

$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";
$username=$_GET["username"];
$securityString=$_GET["securityStringMail"];
$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 
$sql="SELECT name FROM users WHERE username='{$username}' AND securityString='{$securityString}'";
$result=$connnection->query($sql);
if($result->num_rows>0){
	$sql="UPDATE `users` SET `activationStatus`=true WHERE username='{$username}' AND securityString='{$securityString}'";
	$connnection->query($sql);
	echo "activation successful";
}

else{
 echo "ups dicka ndodhi gabim";	
}

$connnection->close();

 ?>