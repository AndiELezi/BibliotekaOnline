<?php
if(!isset($_GET["isbn"])){
	echo "You dont have acces here";
	exit();
}

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
	$userId=$userData["id"];


	echo "<div class='book_wrap'>";
	echo "<div class='cover_section'>";
	echo "<img src='$image_path'>"."<br>";
	echo "<div class='likeFavourite'>";
	$sql="SELECT * FROM book_like WHERE user_id='{$userId}' AND book_id='{$isbn}'";
	$likeResult=$connection->query($sql);

	echo "<div class='likes'>";
	if($likeResult->num_rows>0){
		echo "<img id='like' onclick=\"likePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/likeFilled.png'>";
	}
	else{
		echo "<img id='like' onclick=\"likePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/likeEmpty.png'>";
	}
	echo "<br><span id='nrOfLikes'>".$book["likes"]."</span></div>";

	$sql="SELECT * FROM book_favourite WHERE user_id='{$userId}' AND book_id='{$isbn}'";
	$favouriteResult=$connection->query($sql);

	echo "<div>";
	if($favouriteResult->num_rows>0){
		 echo "<img id='favourite' onclick=\"favouritePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/favouriteFilled.png'>";
	}
	else{
		echo "<img id='favourite' onclick=\"favouritePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/favouriteEmpty.png'>";
	}
	echo "<br><span>&nbsp</span></div>";
	echo "</div></div>";


		echo "<div class='details'>";
		echo "<span><b>ISBN:</b> ".$book["ISBN"]."</span><br>".
		"<span><b>Titulli:</b> ".$book["title"]."</span><br>".
		"<span><b>Categories:</b><ul>";
		while ($resultBookCategories=$bookCategories->fetch_assoc()) {
			echo "<li>".$resultBookCategories["c_description"]."</li>";
		}
		echo "</ul></span><br>";

			echo "<span><b>Publication year:</b> ".$book["publication_year"]."</span><br>"
			."<span><b>Quantity:</b> ".$book["quantity"]." </span><br>"
			."<span><b>Price:</b> ".$book["price"]."</span><br>"
			."<span><b>Reservation points:</b> ".$book["reservation_points"]."</span><br>"
			."<span><b>Description:</b><br> <div class='description'>".$book["description"]."</div></span>"
			."<span><b>Publish house:</b> ".$book_publish_house["name"]."</span><br>"
			."<span><b>Autoret:</b><ul>";
			while($author=$resultAuthor->fetch_assoc()){
				echo "<li>".$author["full_name"]."</li>";
			}
			echo "</ul></span>";

		echo "<br><a href='bookReservation.php?isbn=".$book["ISBN"]."'><div>Rezervo</div></a>";
		echo "</div></div><br><br><br><br>";



?>