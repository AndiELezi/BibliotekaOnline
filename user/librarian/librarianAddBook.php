<!DOCTYPE html>
<html>
<head>
	<title>Add a book</title>
	<link rel="stylesheet" type="text/css" href="../../styles/bookUpload.css">
</head>
<body>
	<?php  
		// duhet te kontrollojme nese ka te drejta librariani per te aksesuar faqen..




		include "../functions/librarian/uploadBookValidation.php";

	?>
<div class="form_wrap">
	<form method="post" enctype="multipart/form-data">
		<input type="text" name="isbn" value="<?php echo $isbn ?>" placeholder="ISBN">
		<span class="error"><?php echo $errIsbn  ?></span><br><br>
		<input type="text" name="publishHouse" value="<?php echo $publishHouse ?>" placeholder="shtepia botuese">
		<span class="error"><?php echo $errPublishHouse  ?></span><br><br>
		<input type="number" name="quantity" value="<?php echo $quantity ?>" placeholder="Sasia Librave">
		<span class="error"><?php echo $errQuantity  ?></span><br><br>
		<input type="number" name="reservationPoints" value="<?php echo $reservationPoints ?>" placeholder="Piket e Rezervimit">
		<span class="error"><?php echo $errReservationPoints  ?></span><br><br>
		<input type="number" name="price" value="<?php echo $price ?>" placeholder="Cmimi Librit">
		<span class="error"><?php echo $errPrice  ?></span><br><br>
		<input type="text" name="title" value="<?php echo $title  ?>" placeholder="Titulli librit">
		<span class="error"><?php echo $errTitle  ?></span><br><br>
		<textarea rows="4" name="description" placeholder="pershkrimi librit"><?php echo $description  ?></textarea><br><br>
		<textarea rows="4" name="author" placeholder="Autoret"><?php echo $author  ?></textarea>
		<span class="error"><?php echo $errAuthor  ?></span><br><br>
		kategorite e librit:<br>
		<?php
			include '../functions/DBconnection.php';
			$sql="SELECT description FROM categories ORDER BY description";
			$categoriesResult=$connection->query($sql);
				while ($i=$categoriesResult->fetch_assoc()) {
					echo "<input type='checkbox' name='category[]' value='".$i["description"]."'>".$i["description"]."<br>";
				}

  	?>
  		<span class="error"><?php echo $errCategory  ?></span><br>
		publication year: <input type="date" name="publication_year"> <br> <br>
		foto e librit:<input type="file" name="cover_photo"><br><br>
		<span class="error"><?php echo $errCoverPhoto  ?></span><br>
		<input type="submit" name="upload" value="upload">
		<br>
		<span><?php echo $successMsg  ?></span>
	</form>
</div>
</body>
</html>