<?php 

if(!empty($_POST["username"])){
$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";
$username=$_POST["username"];
$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 

$sql="SELECT name FROM users WHERE username='{$username}'";
$result=$connnection->query($sql);
if($result->num_rows>0){
	echo "username alredy taken";
}
else{

	echo "username is available";
}


}


else if(!empty($_POST["email"])){
$server='localhost';
$usernameDB='root';
$passwordDB='';
$databaze="biblioteka";
$email=$_POST["email"];
$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

if($connnection->connect_error){
	die("gabim ne lidhjen ne databaze");
} 

$sql="SELECT name FROM users WHERE email='{$email}'";
$result=$connnection->query($sql);
if($result->num_rows>0){
	echo "email alredy taken";
}
else{

	echo "email is available";
}


}





 ?>