<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title></title>
</head>

<body>


	 <?php 
  	include "functions/uploadBookValidation.php";
  	include 'functions/DBconnection.php';
  	include 'header.php';
  ?>




<form method="POST" action="bookUpload.php" enctype="multipart/form-data">
titulli librit:<br><input type="text" name="title" value="<?php echo $title  ?>"><span><?php echo $errTitle  ?></span><br><br>
pershkrimi librit:<br><textarea rows="4" name="description"><?php echo $description  ?></textarea><br><br>
kategorite e librit:<span><?php echo $errCategory  ?><br>
<?php

$sql="SELECT description FROM categories ORDER BY description";
$categoriesResult=$connection->query($sql);
while ($i=$categoriesResult->fetch_assoc()) {
	echo "<input type='checkbox' name='category[]' value='".$i["description"]."'>".$i["description"]."<br>";
}

  ?>



<!--<input type="checkbox" name="category[]" value="romance">romance<br>
<input type="checkbox" name="category[]" value="mystery">mystery<br>
<input type="checkbox" name="category[]" value="comedy">comedy<br>-->
<input type="checkbox" name="category[]" value="adventure">adventure<br><br>
foto e librit:<input type="file" name="cover_photo"><span><?php echo $errCoverPhoto  ?></span><br><br>
libri:<input type="file" name="book"><span><?php echo $errBook  ?></span><br><br>
<input type="submit" name="upload" value="upload">
<br>
</form>
<br>
<span><?php echo $successMsg  ?></span>
<script type="text/javascript" src="../scripts/home.js"></script>
</body>
</html>