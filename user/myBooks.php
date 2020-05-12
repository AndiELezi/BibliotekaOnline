<!DOCTYPE html>
<html>
<head>
	<title>My Books</title>
	<link rel="stylesheet" type="text/css" href="../styles/myBooks.css">
</head>
<body>
	<a href="myFavourites.php">My favourite books</a>
	<hr>
	<a href="bookUpload.php">Upload a book</a>
	<hr> <br>



	<!-- myBooks section-->
	<h2>My books</h2>
	<?php  
		session_start();
		include "functions/DBconnection.php";
		$username=$_SESSION["username"];
		$sql="SELECT online_books.id, title, cover_photo FROM online_books 
				INNER JOIN users ON online_books.user_id=users.id  
				WHERE users.username='{$username}'";
		$result=$connection->query($sql);

		//check if user has uploaded books before displaying them
		if($result->num_rows > 0){
			include "functions/bookSlider.php";
			createSlider($result,"online",6,1);
		}

		//if user hasn't uploaded any books:
		else{
			echo"<p>You haven't uploaded any books. Upload one now!</p>";
		}
	?>
</body>
<script type="text/javascript" src="../scripts/bookSlider.js"></script>
</html>