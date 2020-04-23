<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>


	 <?php 
  	include "functions/uploadBookValidation.php";
  ?>



<form method="POST" action="bookUpload.php" enctype="multipart/form-data">
titulli librit:<br><input type="text" name="title" value="<?php echo $title  ?>"><span><?php echo $errTitle  ?></span><br><br>
pershkrimi librit:<br><textarea rows="4" name="description"><?php echo $description  ?></textarea><br><br>
kategorite e librit:<span><?php echo $errCategory  ?><br>
<input type="checkbox" name="category[]" value="romance">romance<br>
<input type="checkbox" name="category[]" value="mystery">mystery<br>
<input type="checkbox" name="category[]" value="comedy">comedy<br>
<input type="checkbox" name="category[]" value="adventure">adventure<br><br>
foto e librit:<input type="file" name="cover_photo"><span><?php echo $errCoverPhoto  ?></span><br><br>
libri:<input type="file" name="book"><span><?php echo $errBook  ?></span><br><br>
<input type="submit" name="upload" value="upload">
<br>
</form>
<br>
<span><?php echo $successMsg  ?></span>
</body>
</html>