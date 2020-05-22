<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Books</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="../styles/myBooks.css">
	<?php 
		include "functions/DBconnection.php";
		include 'header.php';
	 ?>

	<br><br>



	<!-- myBooks section-->
	<?php  
		
		$username=$_SESSION["username"];
		$sql="SELECT online_books.id, title, cover_photo FROM online_books 
				INNER JOIN users ON online_books.user_id=users.id  
				WHERE users.username='{$username}'";
		$result=$connection->query($sql);

		//check if user has uploaded books before displaying them
		if($result->num_rows > 0){
			include "functions/bookSlider.php";
			createSlider("My books",$result,"online",5,1);
		}

		//if user hasn't uploaded any books:
		else{
			echo"<p>You haven't uploaded any books. Upload one now!</p>";
		}
	?>
	<br>
	<div class="wrap_links">
	<a href="myFavourites.php"><div>My favourite books</div></a>
	<a href="bookUpload.php"><div>Upload a book</div></a>
	</div>
</body>
<script type="text/javascript" src="../scripts/bookSlider.js"></script>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>