<?php 

include "functions/DBconnection.php";
$username=$_GET["username"];
$securityString=$_GET["securityStringMail"];

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