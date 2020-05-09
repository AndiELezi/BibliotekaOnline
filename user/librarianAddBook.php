<!DOCTYPE html>
<html>
<head>
	<title>Add a book</title>
</head>
<body>
	<?php  
		// duhet te kontrollojme nese ka te drejta librariani per te aksesuar faqen..




		include "functions/librarian/uploadBookValidation.php";

	?>

	<form method="post" enctype="multipart/form-data">
		isbn: <br> <input type="text" name="isbn" value="<?php echo $isbn ?>"><span><?php echo $errIsbn  ?></span><br><br>
		titulli librit:<br><input type="text" name="title" value="<?php echo $title  ?>"><span><?php echo $errTitle  ?></span><br><br>
		pershkrimi librit:<br><textarea rows="4" name="description"><?php echo $description  ?></textarea><br><br>
		autori: <br> <input type="text" name="author" value="<?php echo $author ?>"><span><?php echo $errAuthor  ?></span><br><br>
		kategorite e librit:<span><?php echo $errCategory  ?><br>
		<input type="checkbox" name="category[]" value="romance">romance<br>
		<input type="checkbox" name="category[]" value="mystery">mystery<br>
		<input type="checkbox" name="category[]" value="comedy">comedy<br>
		<input type="checkbox" name="category[]" value="adventure">adventure<br><br>
		publication year: <input type="date" name="publication_year"> <br> <br>
		foto e librit:<input type="file" name="cover_photo"><span><?php echo $errCoverPhoto  ?></span><br><br>
		<input type="submit" name="upload" value="upload">
		<br>
	</form>
	<br>
	<span><?php echo $successMsg  ?></span>
</body>
</html>