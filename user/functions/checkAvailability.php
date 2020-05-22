<?php 
if(!isset($_POST["username"]) && !isset($_POST["email"])){
	echo "You dont have acces here";
	exit();
}

if(!empty($_POST["username"])){
	
include "DBconnection.php";
$username=$_POST["username"];
$sql="SELECT name FROM users WHERE username='{$username}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	echo "Username already taken";
}
else{

	echo "Username is available";
}


}


else if(!empty($_POST["email"])){
include "DBconnection.php";
$email=$_POST["email"];
$sql="SELECT name FROM users WHERE email='{$email}'";
$result=$connection->query($sql);
if($result->num_rows>0){
	echo "Email already taken";
}
else{

	echo "Email is available";
}


}





 ?>