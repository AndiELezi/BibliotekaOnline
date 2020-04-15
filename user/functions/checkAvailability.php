<?php 

if(!empty($_POST["username"])){
	
include "DBconnection.php";
$username=$_POST["username"];
$sql="SELECT name FROM users WHERE username='{$username}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	echo "username already taken";
}
else{

	echo "username is available";
}


}


else if(!empty($_POST["email"])){
include "DBconnection.php";
$email=$_POST["email"];
$sql="SELECT name FROM users WHERE email='{$email}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	echo "email already taken";
}
else{

	echo "email is available";
}


}





 ?>