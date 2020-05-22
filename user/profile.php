<?php 

  session_start();
  if(!isset($_SESSION["username"])){
    header("Location:login.php");
  }

?>

<?php 


include "functions/DBconnection.php";
$success="";
		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo`,`email`,`mobile`,`birthday`,`gender` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
				$user = $result->fetch_assoc();

 ?>
 <html>
 <head>
   <link rel="stylesheet" type="text/css" href="../styles/profile.css">
 </head>
 <body>
    <?php  include 'header.php'; ?>
  <?php
  $profilePhotoPath="/BibliotekaOnline/images/users/";
        if(empty($user["profile_photo"])){
            $profilePhotoPath.="default.jpg";
        }
        else{
          $profilePhotoPath.=$user["profile_photo"];
        }
          
        ?>
  <div class="profile_photo">
    <img src="<?php  echo $profilePhotoPath  ?>"> 
    <form  action="functions/uploadProfilePhoto.php" method="POST" enctype="multipart/form-data">
 	    <input type="file" name="profilePhoto">
 	    <input type="submit" value="change" name="change">
    </form>
  </div>
 <br><br><br>

 <?php 
  	include "functions/editAccountValidation.php";
  ?> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="details">
<form  method="post" action="profile.php" onsubmit="return confirm('Are you sure you want to update your data?');" > 
  <input type="text"  name="emri" id="emri" value="<?php echo $emri?>"  placeholder="Emri" readonly><input type="button" id="nameBtn" onclick="allowEdit('emri')" value="edit"><span id="errEmri"><?php echo $ErrEmri ?></span><br>
  <input type="text"  name="mbiemri" id="mbiemri" value="<?php echo $mbiemri?>" placeholder="Mbiemri" readonly><input type="button" id="nameBtn" onclick="allowEdit('mbiemri')" value="edit"><span id="errMbiemri"><?php echo $ErrMbiemri?></span><br>
 
  <input type="text" name="phone_nr" id="phone_nr" value="<?php echo $phone_nr?>" placeholder="Phone Number" readonly><input type="button" id="nameBtn" onclick="allowEdit('phone_nr')" value="edit"> <br>
  
  <input type="date" name="birthday" min='1900-01-01' max='2020-01-01' id="ditlindja" value="<?php echo $birthday?>" readonly><input type="button" id="nameBtn" onclick="allowEdit('ditlindja')" value="edit"><span><?php echo $ErrBirthday?></span><br>

  <select name="gjinia" id="gjinia" disabled><span>
    <option value="Male" <?php echo $gjiniaMale?> >Male</option> 
    <option value="Female" <?php echo $gjiniaFemale?> >Female</option> 
    <option value="Other" <?php echo $gjiniaOther?> >Other</option> 
  </select><input type="button" id="nameBtn" onclick="allowEdit('gjinia')" value="edit"><?php echo $ErrGjinia?></span>
  <br>
  <input type="submit" name="submit" value="Update">
  <br>
  <span class="success"><?php echo $success ?></span>
  
</form>
</div>

<br>
<a class="delete" href="deleteAccount.php">Delete my account</a>

<!-- jQyery qe kontrollon nese inputi perdoruesit eshte i pranueshem -->
<script type="text/javascript" src="../scripts/home.js"></script>
<script src="/BibliotekaOnline/scripts/checkRegisterInput.js"></script>
<script src="/BibliotekaOnline/scripts/editProfile.js"></script>

</body>
</html>