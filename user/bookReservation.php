<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>

<?php
include 'functions/DBconnection.php';
$selectedBook=""; 
$reservation_points;
$isbn="";
if(isset($_GET["isbn"])){
	$isbn=$_GET["isbn"];

$sql="SELECT title,cover_photo,reservation_points from book WHERE ISBN='{$isbn}'";
$result=$connection->query($sql);
$book=$result->fetch_assoc();
$reservation_points=$book["reservation_points"];
$selectedBook="<div class='single_book'>"."<label>Reservation points: ".$reservation_points."</label><img src='/BibliotekaOnline/images/books/".$book["cover_photo"]."'><div>".$book["title"]."</div>"."</div>";

}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reserve a book</title>
 	<link rel="stylesheet" type="text/css" href="../styles/bookReservation.css">
 </head>
 <body>
 	<?php  include 'header.php'; ?>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<div class="results">
 		<div id="rezultatet"></div><br>
 		<div id="selectedBook" class="selectedBook"><?php echo $selectedBook ?></div>
 	</div>

 	<div class="form_wrap">
 	<input type="text" name="search" onkeyup="kerko(this.value)" autocomplete="off" placeholder="Search for a book"><br><br>
 	 <a href="browse.php?bookType=offline">Or Browse for a book</a>
 	<br><br>
 		<form>
 			<label>Select reservation date: </label>
 			<input type="date" name="dataRezervimit" id="dataRezervimit" required><br>
 			<?php echo "<input type='text' id='isbn' name='isbn' value='".$isbn."'"."style='display:none'>" ?><br><br>
 			<label>Select return date: </label>
 			<input type="date" name="dataRikthimit" id="dataRikthimit" required ><br><br>
 			<input type="button" id="rezervo" name="Reservo" value="Reserve">
		</form><br>
		<span id="pergjigjaRezervimit"></span>
		<div id="test"></div>
	</div>
	<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="../scripts/bookReservation.js"></script>
 
 </body>
 </html>