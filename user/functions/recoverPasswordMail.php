<?php 

	$recoverCode=str_shuffle("qwertyuioplkjhgfdsazxcvbnm1234567890");
	include "DBconnection.php";
	$sql="UPDATE users SET recoverPasswordToken='{$recoverCode}' WHERE email='{$email}' ";
	$connection->query($sql);
	$sql="SELECT username FROM users WHERE email='{$email}'";
	$result=$connection->query($sql);
	$data=$result->fetch_assoc();
	$username=$data["username"];


	$tekst="<html><body><p>Prova</p><br><a href=localhost/BibliotekaOnline/user/addNewPassword.php?username=$username&recoverCode=$recoverCode>Click me to change your password</a></body></html>";

   	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <horizone.event@gmail.com>' . "\r\n";
    $headers .= $email . "\r\n";

   mail($email,"Recover Password",$tekst,$headers);
?>