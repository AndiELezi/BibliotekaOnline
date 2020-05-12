<?php


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

	
?>