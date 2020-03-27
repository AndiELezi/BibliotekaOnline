<?php 

$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";
$emri=$_GET["name"];
$securityString=$_GET["securityStringMail"];
$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 
$sql="SELECT name FROM users WHERE name='{$emri}' AND securityString='{$securityString}'";
$result=$connnection->query($sql);
if($result->num_rows>0){
	$sql="UPDATE `users` SET `activationStatus`=true WHERE name='{$emri}' AND securityString='{$securityString}'";
	$connnection->query($sql);
	echo "activation successful";
}

else{
 echo "ups dicka ndodhi gabim";	
}

$connnection->close();

 ?>