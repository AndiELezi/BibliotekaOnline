<?php
$selectedBook=""; 
$reservation_points;
if(isset($_GET["isbn"])){
	$isbn=$_GET["isbn"];
include 'functions/DBconnection.php';
$sql="SELECT title,cover_photo,reservation_points from book WHERE ISBN='{$isbn}'";
$result=$connection->query($sql);
$book=$result->fetch_assoc();
$reservation_points=$book["reservation_points"];
$selectedBook="<div>"."<img src='/BibliotekaOnline/images/books/".$book["cover_photo"]."'>".$book["title"]."<br>"."Piket per reservimin e librit:".$reservation_points."</div><input type='text' name='isbn' value='".$isbn."'"."style='display:none'>";

}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	Kerkoni per librin:
 	<input type="text" name="search" onkeyup="kerko(this.value)" autocomplete="off"><br>
 	<div id="rezultatet"></div><br>
 	or browse for a book:<a href="browse.php?bookType=offline">Browse</a><br>
 	
 	<form method="POST" action="functions/bookReservationDatabase.php">
 	Libri zgjedhur:<?php echo $selectedBook ?><br>
 	vendosni daten qe deshironi per te reservuar kete liber:
 	<input type="date" name="dataResezrvimit"><br>
 	vendosni daten qe deshironi te ktheni librin:
 	<input type="date" name="dataRikthimit"><br>
 	<input type="submit" name="Reservo" value="Reservo">
	</form>
<script type="text/javascript" src="/BibliotekaOnline/scripts/bookReservation.js"></script>
 
 </body>
 </html>