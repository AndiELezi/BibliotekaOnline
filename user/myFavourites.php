<!DOCTYPE html>
<html>
<head>
	<title>My favourite books</title>
</head>
<body>

	<h2>My favourite books</h2>

<?php 

	session_start();
	$username=$_SESSION["username"];

		//get the number of page so we can display the corresponding books to that page number
		if(isset($_GET["page"])){
			$page=$_GET["page"];
		}
		else{
			$page=1;
		}

		include "functions/DBconnection.php";
		//display the books based on the page nr
		include "functions/favouriteBooks.php";
 ?>
</body>
</html>