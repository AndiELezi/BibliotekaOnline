<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload a book</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../styles/bookUpload.css">
</head>

<body>


	 <?php 
  	include "functions/uploadBookValidation.php";
  	include 'functions/DBconnection.php';
  	include 'header.php';
  ?>



<div class="form_wrap">
<form method="POST" action="bookUpload.php" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to reserve this book?');">
	<input type="text" name="title" value="<?php echo $title  ?>" placeholder="Title"><span class="error"><?php echo $errTitle  ?></span>
	<br><br>
	<textarea rows="4" name="description" placeholder="Description"><?php echo $description  ?></textarea><br><br>
	Select categories:<br>
<?php

	$sql="SELECT description FROM categories ORDER BY description";
	$categoriesResult=$connection->query($sql);
	while ($i=$categoriesResult->fetch_assoc()) {
		echo "<input type='checkbox' name='category[]' value='".$i["description"]."'>".$i["description"]."<br>";
	}
?>
	<span class="error"><?php echo $errCategory  ?></span>
	<br><br>
	<span>Book cover:</span>
	<input type="file" name="cover_photo"><span class="error"><?php echo $errCoverPhoto  ?></span><br><br>
	<span>Book file:</span>
	<input type="file" name="book"><br>
	<span class="error"><?php echo $errBook  ?></span><br>
	<input type="submit" name="upload" value="Upload">
	<br>
	<span><?php echo $successMsg  ?></span>
</form>
</div>

<script type="text/javascript" src="../scripts/home.js"></script>
</body>
</html>