<?php

		$tekst="<html><body><p>Change password</p><br><a href=localhost/BibliotekaOnline/user/addNewPassword.php?username=$username&recoverCode=$recoverCode>Click here to change your password</a></body></html>";

   		$headers = "MIME-Version: 1.0" . "\r\n";
    	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    	$headers .= 'From: <horizone.event@gmail.com>' . "\r\n";
    	$headers .= $email . "\r\n";

   		mail($email,"Recover Password",$tekst,$headers);
?>