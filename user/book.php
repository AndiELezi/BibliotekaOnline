<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();

include 'functions/DBconnection.php';

if(isset($_GET["isbn"])){
	
	include 'functions/offlineBookDetails.php';

}


else if (isset($_GET["id"])){

	include 'functions/onlineBookDetails.php';


	if(isset($_GET["download"])){

		include 'downloadBookFunction.php';

	}



	echo "<br>";

	echo "<a href='/BibliotekaOnline/eBooks/".$bookPath."'>Shiko online </a>";

	echo "<form method='GET'>";
 	echo "<input type='submit'  name='download' value='download'> ";
 	echo "<input type='hidden' name='id' value='".$id."'>";
 	echo "</form>";
 	echo "<br>";
 	$sql="SELECT name,username from v_user_online_books where book_id='{$id}'";
	$resultOnlineBookUser=$connection->query($sql);
	$bookUser=$resultOnlineBookUser->fetch_assoc();
 	if ($_SESSION["username"]==$bookUser["username"]){
 		echo "<button onclick='deleteBook(".$id.")'>Delete </button>";

 	}
 	
}

		else{
	//ktu do bejm dicka ;
}







  ?>
  <div id="deleteResponse"></div>
  <script type="text/javascript" src="/BibliotekaOnline/scripts/book.js"></script>
</body>
</html>