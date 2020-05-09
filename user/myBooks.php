<!DOCTYPE html>
<html>
<head>
	<title>My Books</title>
</head>
<body>
	<a href="myFavourites.php">My favourite books</a>
	<hr>
	<a href="bookUpload.php">Upload a book</a>
	<hr> <br>
	<!-- myBooks div -->
	<h2>My books</h2>
	<div>
	<?php  
		session_start();
		include "functions/DBconnection.php";
		$username=$_SESSION["username"];
		$sql="SELECT online_books.id, title, cover_photo FROM online_books 
				INNER JOIN users ON online_books.user_id=users.id  
				WHERE users.username='{$username}'";
		$result=$connection->query($sql);
		for($i=0; $i<$result->num_rows; $i++){
			if($book=$result->fetch_assoc()){
				echo "<a href='book.php?id=".$book['id']."'>";
				echo '<div style="display: inline-block;">';
				echo "<img src='/BibliotekaOnline/images/onlineBooks/".$book["cover_photo"]."'> <br>";
				echo $book["title"];
				echo "</div></a>";
			}
		}
	?>
	<br>
	<button onclick="slide(-1)">Previous</button>
	<button onclick="slide(1)">Next</button>
	</div>
</body>
</html>