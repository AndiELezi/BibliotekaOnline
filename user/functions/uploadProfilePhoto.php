<?php
session_start();
$server='localhost';
		$usernameDB='root';
		$passwordDB='';
		$databaze="biblioteka";
		$connection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

		if($connection->connect_error){
			die("gabim ne lidhjen ne databaze");
		} 
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
		$fileNewName="\\".$_SESSION["username"].".jpg";
		$fileDestination='C:\xampp\htdocs\BibliotekaOnline\images\users'.$fileNewName;
		$sql="SELECT profile_photo FROM users WHERE `username`='{$username}'";
		$result=$connection->query($sql);
		$profileArray=$result->fetch_assoc();
		if(strcmp("default.jpg", $profileArray["profile_photo"])!==0){
				unlink($fileDestination);
		}
		move_uploaded_file($fileTempName, $fileDestination);
		$profilePhoto=$_SESSION["username"].".jpg";
		$sql="UPDATE users SET `profile_photo`='{$profilePhoto}' WHERE `username`='{$username}'";
		$connection->query($sql);
		header("Location: /BibliotekaOnline/user/profile.php");
		}

	else{
		//dicka nqs ndodh gabim n uplodim;
		}	
	}

else{
		//dicka nqs ndodh gabim n formatin e fotos;
	}

}



  ?>