<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<?php 
include "functions/DBconnection.php"; 
if(isset($_GET["search"])){
$onlineBooksResult;
$offlineBooksResult;
$searchQuery=$_GET["searchQuery"];

//nqs ka kerkuar per titull

	if(strcmp($_GET["filter"],"title")==0){
 	$sql="SELECT ISBN,cover_photo,title FROM book WHERE title LIKE \"%{$searchQuery}%\"";
 	$offlineBooksResult=$connection->query($sql);
 	$sql="SELECT id,cover_photo,title FROM online_books WHERE title LIKE \"%{$searchQuery}%\"";
 	$onlineBooksResult=$connection->query($sql);

	}	

// nqs ka kekuar per autor (dhe user po ne te njejten vend po e vendos)
	else if(strcmp($_GET["filter"],"author")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_author_book WHERE full_name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		$sql="SELECT book_id as id,cover_photo,title FROM v_user_online_books WHERE name LIKE \"%{$searchQuery}%\" OR surname LIKE \"%{$searchQuery}%\"";
		$onlineBooksResult=$connection->query($sql);

	}
	else if(strcmp($_GET["filter"],"publishHouse")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_publish_house_book WHERE name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		//ktu do mendojm dicka tjt po me pak fjal dua t m sjelli dicka bosh;
		$sql="SELECT id,cover_photo,title FROM online_books WHERE id=-2";
		$onlineBooksResult=$connection->query($sql);
		
	}
?>
<!DOCTYPE html>
<html>
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title></title>
		<link rel="stylesheet" type="text/css" href="/BibliotekaOnline/Styles/search.css">
</head>
<body>
	<?php  include 'header.php'; ?>

<div class="radio_btn">
<label class="container">Online
	<input type="radio" id="online" name="tipi" value="online" onchange="ndryshoDiv(-1)" checked >
	<span class="checkmark"></span>
</label>
<label class="container">Offline
	<input type="radio" id="offline" name="tipi" value="offline" onchange="ndryshoDiv(1)" >
	<span class="checkmark"></span>
</label>
</div>
		<div class="result_wrap">
			<!----------online-------------------->
			<div>
				<?php
				 $ok=true;
				
					while ($ok) {
						
						echo "<div class='online'>";
						for($j=0;$j<5;$j++){
						
							if($i=$onlineBooksResult->fetch_assoc()){
								echo "<a href='book.php?id=".$i["id"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/onlineBooks/".$i["cover_photo"]."'><br>
								<div>".$i["title"]."</div></div></a>";
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
		


<!------------------offline -------------------------->
			<div>
				<?php
				 $ok=true;
				
					while ($ok ) {
						
						echo "<div class='offline'>";
						for($j=0;$j<5;$j++){
						
							if($i=$offlineBooksResult->fetch_assoc()){
								echo "<a href='book.php?isbn=".$i["ISBN"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'><br>
								<div>".$i["title"]."</div></div></a>";
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<a class="prev" onclick="slide(-1)">&#10094;</a>
			<a class="next" onclick="slide(1)">&#10095;</a>
		</div>
</body>
<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="/BibliotekaOnline/scripts/search.js"></script>
</html>


<?php
}

?>