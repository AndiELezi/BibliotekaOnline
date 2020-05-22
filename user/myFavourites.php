<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My favourite books</title>
	<link rel="stylesheet" type="text/css" href="../styles/myFavourites.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php 
			
			include "functions/DBconnection.php";
			include 'header.php';
	 ?>

	<br>
	<h2 class="title">My favourite books</h2>

<?php 

	
	$username=$_SESSION["username"];

		//get the number of page so we can display the corresponding books to that page number
		if(isset($_GET["page"])){
			$page=$_GET["page"];
		}
		else{
			$page=1;
		}

		
		//display the books based on the page nr
		include "functions/favouriteBooks.php";
 ?>
</body>
<script type="text/javascript" src="../scripts/home.js"></script>
</html>