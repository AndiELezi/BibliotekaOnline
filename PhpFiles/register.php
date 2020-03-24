<!DOCTYPE HTML>
<html>

<head>
  <title>Register</title>
</head>
<body>

  <?php 
  	include "Validation.php";
  ?>
 

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<form  method="post" action="register.php"> 
  <input type="text"  name="emri" id="emri" value="<?php echo $emri?>"  placeholder="Emri"> <span id="errEmri"><?php echo $ErrEmri ?></span><br>
  <input type="text"  name="mbiemri" id="mbiemri" value="<?php echo $mbiemri?>" placeholder="Mbiemri"><span id="errMbiemri"><?php echo $ErrMbiemri?></span><br>
  <input type="email" name="email" value="<?php echo $email?>" placeholder="E-Mail"><span><?php echo $ErrEmail?></span><br>
  <input type="text"  name="username" value="<?php echo $username?>" placeholder="Username"><span><?php echo $ErrUsername?></span><br>
  <input type="date" name="birthday" min='1900-01-01' max='2020-01-01' value="<?php echo $birthday?>"> <span><?php echo $ErrBirthday?></span><br>
  <select name="gjinia"value="<?php echo $gjinia?>"><span><?php echo $ErrGjinia?></span>
    <option value="Male">Male</option> 
    <option value="Female">Female</option> 
    <option value="Other">Other</option> 
  </select>
  <input type="password" name="password" id="password" value="<?php echo $password?>" placeholder="Password"><span id="errPassword"><?php echo $ErrPassword?></span><br>
  <input type="password" name="cPassowrd" id="cPassword" value="<?php echo $cPassword?>" placeholder="Confirm Password"><span id="errCPassword"><?php echo $ErrCPassword?></span><br>
  <input type="submit" name="submit">
  
</form>

<script src="/BibliotekaOnline/jQuery/checkRegisterInput.js"></script>

  </body>
  </html>