<?php
include 'functions/DBconnection.php';

if(isset($_GET["isbn"])){
	$isbn=$_GET["isbn"];
	$sql="SELECT * from book WHERE isbn='{$isbn}'";
	$resultBook=$connection->query($sql);
	$book=$resultBook->fetch_assoc();
	$sql="SELECT c_description from v_book_categories where isbn='{$isbn}'";
	$bookCategories=$connection->query($sql);
	$sql="SELECT full_name FROM v_author_book WHERE isbn='{$isbn}'";
	$resultAuthor=$connection->query($sql);
	$publishHouseId=$book["publish_house"];
	$sql="SELECT name FROM publish_house WHERE id='{$publishHouseId}'";
	$publish_house=$connection->query($sql);
	$book_publish_house=$publish_house->fetch_assoc();
	$image_path="/BibliotekaOnline/images/books/";
	$image_path.=$book["cover_photo"];
	echo "<img src='$image_path'>"."<br>";
		echo "isbn  ".$book["ISBN"]." <br> "."titulli  ".$book["title"]." <br>"."categories: ";
		while ($resultBookCategories=$bookCategories->fetch_assoc()) {
			echo $resultBookCategories["c_description"]." ";
		}

			echo "<br>".$book["publication_year"]."<br> ".$book["quantity"]." <br>".$book["price"]."<br> ".$book["reservation_points"]." <br>".$book["description"]."<br> ".$book["likes"]."<br>".$book_publish_house["name"]."<br>"."autoret: ";
		while($author=$resultAuthor->fetch_assoc()){
			echo $author["full_name"]." ";
		}




}


else if (isset($_GET["id"])){
	$id=$_GET["id"];
	$sql="SELECT * from online_books where id='{$id}'";
	$resultOnlineBook=$connection->query($sql);
	$online_books=$resultOnlineBook->fetch_assoc();
	$sql="SELECT name,surname from v_user_online_books where book_id='{$id}'";
	$resultOnlineBookUser=$connection->query($sql);
	$sql="SELECT c_description from v_online_books_categories where id='{$id}'";
	$onlineBookCategory=$connection->query($sql);
	$image_path_online_books="/BibliotekaOnline/images/onlineBooks/";
	$image_path_online_books.=$online_books["cover_photo"];
	echo "<img src='$image_path_online_books'>"."<br>";
	echo "id ".$online_books["id"]."<br>". "titulli ".$online_books["title"]."<br>"."category: ";
	while($online_books_Category=$onlineBookCategory->fetch_assoc()){
		echo $online_books_Category["c_description"]." ";
	}
	echo "<br>".$online_books["publish_date"]."<br>". $online_books["likes"]."<br>".$online_books["description"]."<br>";
	while ($bookUser=$resultOnlineBookUser->fetch_assoc()) {
		echo $bookUser["name"]. " ".$bookUser["surname"];
	}

	$bookPath=$online_books["book_path"];

	
	/*kur jepet requesti i  download*/

if(isset($_GET["download"])){


$bookNameSeparated=explode(".", $bookPath);
$bookExtension=strtolower(end($bookNameSeparated));
$bookDownload=$online_books["title"].".".$bookExtension;

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($bookDownload));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
$fileDestination='C:\xampp\htdocs\BibliotekaOnline\eBooks\\'.$bookPath;
header('Content-Length: ' . filesize($fileDestination));
ob_clean();
flush();
readfile($fileDestination);
exit;

}

/***************************************/



	echo "<br>";

	echo "<a href='/BibliotekaOnline/eBooks/".$bookPath."'>Shiko online </a>";

	echo "<form method='GET'>";
 	echo "<input type='submit'  name='download' value='download'> ";
 	echo "<input type='hidden' name='id' value='".$id."'>";
 	echo "</form>";


}

		else{
	//ktu do bejm dicka ;
}







  ?>