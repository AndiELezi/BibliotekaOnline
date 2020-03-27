<?php
 

/* Kjo do ndryshohet se esht sa per prov */


 $tekst="<html><body><p>Prova</p><br><a href=localhost/BibliotekaOnline/PhpFiles/activation.php?name=$emri&securityStringMail=$security>Click me to activate your account</a></body></html>";

   $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <horizone.event@gmail.com>' . "\r\n";
    $headers .= $email . "\r\n";

   mail($email,"Activation Link",$tekst,$headers);

  ?>