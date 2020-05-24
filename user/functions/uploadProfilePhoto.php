<?php
session_start();
include "DBconnection.php";

if(isset($_POST["change"])){
$file=$_FILES["profilePhoto"];
$fileName=$_FILES["profilePhoto"]["name"];
$fileTempName=$_FILES["profilePhoto"]["tmp_name"];
$fileSize=$_FILES["profilePhoto"]["size"];
$fileError=$_FILES["profilePhoto"]["error"];
$fileType=$_FILES["profilePhoto"]["type"];

//ndajm fjalen kudo ku ka pika
$fileNameSeparated=explode(".", $fileName);
//gjejm prpapashtesen psh jpg  etc
$fileExtension=strtolower(end($fileNameSeparated));

//nje array me t gjitha tipet e mundshme t fileve t lejuara
$allowed=array('jpg','jpeg','png');
if(in_array($fileExtension,$allowed)){
	if($fileError===0){
		$username=$_SESSION["username"];
		$randString=str_shuffle("qwertyuioplkjhgfdsa");
		$fileNewName="\\".$_SESSION["username"].$randString.".jpg";
		$fileDestination='C:\xampp\htdocs\BibliotekaOnline\images\users'.$fileNewName;
		$sql="SELECT profile_photo FROM users WHERE `username`='{$username}'";
		$result=$connection->query($sql);
		$profileArray=$result->fetch_assoc();
		$fileDestinationToDelete='C:\xampp\htdocs\BibliotekaOnline\images\users\\'.$profileArray["profile_photo"];
		if(strcmp("default.jpg", $profileArray["profile_photo"])!==0){
				unlink($fileDestinationToDelete);
		}
		move_uploaded_file($fileTempName, $fileDestination);
		$profilePhoto=$_SESSION["username"].$randString.".jpg";
		$sql="UPDATE users SET `profile_photo`='{$profilePhoto}' WHERE `username`='{$username}'";
		$connection->query($sql);
		header("Location://localhost/BibliotekaOnline/user/profile.php");
		}

	else{
		header("Location://localhost/BibliotekaOnline/user/profile.php");
		}	
	}

else{
		header("Location://localhost/BibliotekaOnline/user/profile.php");
	}

}



  ?>