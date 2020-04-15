<!DOCTYPE HTML>
<html>

<head>
  <title>Register</title>
</head>
<body>
   <?php 
  	include "functions/validation.php";
  ?> 




<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<form  method="post" action="register.php"> 
  <input type="text"  name="emri" id="emri" value="<?php echo $emri?>"  placeholder="Emri"><span id="errEmri"><?php echo $ErrEmri ?></span><br>
  <input type="text"  name="mbiemri" id="mbiemri" value="<?php echo $mbiemri?>" placeholder="Mbiemri"><span id="errMbiemri"><?php echo $ErrMbiemri?></span><br>
  <input type="email" name="email" id="email" value="<?php echo $email?>" placeholder="E-Mail"><span id="errEmail"><?php echo $ErrEmail?></span><br>
  <input type="text" name="phone_nr" id="phone_nr" value="<?php echo $phone_nr?>" placeholder="Phone Number"> <br>
  <input type="text"  name="username" id="username" value="<?php echo $username?>" placeholder="Username"><span id="errUsername"><?php echo $ErrUsername?></span><br>
  <input type="date" name="birthday" min='1900-01-01' max='2020-01-01' value="<?php echo $birthday?>"> <span><?php echo $ErrBirthday?></span><br>
  <select name="gjinia"value="<?php echo $gjinia?>"><span><?php echo $ErrGjinia?></span>
    <option value="Male">Male</option> 
    <option value="Female">Female</option> 
    <option value="Other">Other</option> 
  </select>
  <br>
  <input type="password" name="password" id="password" value="<?php echo $password?>" placeholder="Password"><span id="errPassword"><?php echo $ErrPassword?></span><br>
  <input type="password" name="cPassword" id="cPassword" value="<?php echo $cPassword?>" placeholder="Confirm Password"><span id="errCPassword"><?php echo $ErrCPassword?></span><br>
  <input type="submit" name="submit">
  
</form>

<!-- jQyery qe kontrollon nese inputi perdoruesit eshte i pranueshem -->
<script src="/BibliotekaOnline/scripts/checkRegisterInput.js"></script>

  </body>
  </html>