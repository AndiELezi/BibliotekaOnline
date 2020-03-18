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

<script>

// nese inputi emri permban numer afishohet warning
$('#emri').bind('keyup blur',function(){ 
	$('#errEmri').text("");

    var emri=$(this).val();
    if(contains_number(emri)){
    	$('#errEmri').text("Nuk lejohen numrat");
    }
});


//nese inputi mbiemer permban numer afishohet warning
$('#mbiemri').bind('keyup blur',function(){ 
	$('#errMbiemri').text("");

    var mbiemri=$(this).val();
    if(contains_number(mbiemri)){
    	$('#errMbiemri').text("Nuk lejohen numrat");
    }
});


// kontrollojme nese passwordi eshte konfirmuar sakte
$('#cPassword').bind('keyup blur',function(){ 
	$('#errCPassword').text("");

	var password=$('#password').val();
    var cPassword=$(this).val();
    if(password!==cPassword){
    	$('#errCPassword').text("Passwordet nuk perputhen");
    }
});


// funksion qe kthen true nese nje string permban nje numer
function contains_number(str){
	for (var i = 0; i < str.length; i++) {
  		if(is_numeric_char(str.charAt(i))){
  			return true;
  		}
  	}
  	return false;
}

//funksion qe kontrollon nese nje char eshte numer
function is_numeric_char(c) { return /\d/.test(c); }
</script>

  </body>
  </html>