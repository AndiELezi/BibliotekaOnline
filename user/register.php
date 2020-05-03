<!DOCTYPE HTML>
<html>

<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="../styles/authentication.css">
</head>
<body>
   <?php 
  	include "functions/validation.php";
  ?> 




<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<form  method="post" action="register.php" class="register_form"> 
<h2>Register</h2>
<div class="input_wrap">
    <div class="single_input">
        <input type="text"  name="emri" id="emri" value="<?php echo $emri?>" required>
        <label>First Name</label> <br>
        <span id="errEmri"><?php echo $ErrEmri ?></span><br>
    </div> 
    <div class="single_input">
        <input type="text"  name="mbiemri" id="mbiemri" value="<?php echo $mbiemri?>" required>
        <label>Last Name</label> <br>
        <span id="errMbiemri"><?php echo $ErrMbiemri?></span><br>
    </div>
    <div class="single_input">
        <input type="email" name="email" id="email" value="<?php echo $email?>" required> 
        <label>E-Mail</label><br>
        <span id="errEmail"><?php echo $ErrEmail?></span><br>
    </div>
    <div class="single_input">
        <input type="text" name="phone_nr" id="phone_nr" value="<?php echo $phone_nr?>" optional>
        <label>Phone Number</label>
    </div> <br>
    <div class="single_input">
        <input type="text"  name="username" id="username" value="<?php echo $username?>"required> 
        <label>Username</label><br>
        <span id="errUsername"><?php echo $ErrUsername?></span><br>
    </div>
    <div class="single_input">
        <input type="date" name="birthday" min='1900-01-01' max='2020-01-01' value="<?php echo $birthday?>" required>
        <!-- <label>Birthday</label> --> <br> 
        <span><?php echo $ErrBirthday?></span><br>
    </div>
    <select name="gjinia"value="<?php echo $gjinia?>"><span><?php echo $ErrGjinia?></span>
        <option value="Male">Male</option> 
        <option value="Female">Female</option> 
        <option value="Other">Other</option> 
    </select>
    <br> <br>
    <div class="single_input">
        <input type="password" name="password" id="password" value="<?php echo $password?>" required>
        <label>Password</label> <br>
        <span id="errPassword"><?php echo $ErrPassword?></span><br>
    </div>
    <div class="single_input">
        <input type="password" name="cPassword" id="cPassword" value="<?php echo $cPassword?>" required>
        <label>Confirm Password</label> <br>
        <span id="errCPassword"><?php echo $ErrCPassword?></span><br>
    </div>
  <input type="submit" name="submit" value="Register">
</div>
  <p style="color:#fff; padding-left: 0px; text-align:center; padding-right: 95px;">Already have an account? <a href="login.php">Login</a></p>
  
</form>

<!-- jQyery qe kontrollon nese inputi perdoruesit eshte i pranueshem -->
<script src="/BibliotekaOnline/scripts/checkRegisterInput.js"></script>
<!-- script qe shton classen has-content per inputet qe nuk jane bosh -->
<script type="text/javascript" src="../scripts/addInputClass.js"></script>

  </body>
  </html>