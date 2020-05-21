<!DOCTYPE html>
<html>
<head>
	<title>Add a book</title>
</head>
<body>
	<?php  
		// duhet te kontrollojme nese ka te drejta librariani per te aksesuar faqen..




		include "../functions/librarian/uploadBookValidation.php";

	?>

	<form method="post" enctype="multipart/form-data">
		isbn: <br> <input type="text" name="isbn" value="<?php echo $isbn ?>"><span><?php echo $errIsbn  ?></span><br><br>
		shtepia botuese: <br> <input type="text" name="publishHouse" value="<?php echo $publishHouse ?>"><span><?php echo $errPublishHouse  ?></span><br><br>
		Sasia Librave: <br> <input type="number" name="quantity" value="<?php echo $quantity ?>"><span><?php echo $errQuantity  ?></span><br><br>
		Piket e Rezervimit: <br> <input type="number" name="reservationPoints" value="<?php echo $reservationPoints ?>"><span><?php echo $errReservationPoints  ?></span><br><br>
		Cmimi Librit: <br> <input type="number" name="price" value="<?php echo $price ?>"><span><?php echo $errPrice  ?></span><br><br>
		titulli librit:<br><input type="text" name="title" value="<?php echo $title  ?>"><span><?php echo $errTitle  ?></span><br><br>
		pershkrimi librit:<br><textarea rows="4" name="description"><?php echo $description  ?></textarea><br><br>
		Autoret:<br><textarea rows="4" name="author"><?php echo $author  ?></textarea><br><br>
		kategorite e librit:<span><?php echo $errAuthor  ?><br>
		<?php
			include '../functions/DBconnection.php';
			$sql="SELECT description FROM categories ORDER BY description";
			$categoriesResult=$connection->query($sql);
				while ($i=$categoriesResult->fetch_assoc()) {
					echo "<input type='checkbox' name='category[]' value='".$i["description"]."'>".$i["description"]."<br>";
				}

  	?>
		publication year: <input type="date" name="publication_year"> <br> <br>
		foto e librit:<input type="file" name="cover_photo"><span><?php echo $errCoverPhoto  ?></span><br><br>
		<input type="submit" name="upload" value="upload">
		<br>
	</form>
	<br>
	<span><?php echo $successMsg  ?></span>
</body>
</html>