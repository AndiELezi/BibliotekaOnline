<?php


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
	echo "<img src='$image_path'>"."<br>";
	$sql="SELECT * FROM book_like WHERE user_id='{$userId}' AND book_id='{$isbn}'";
	$likeResult=$connection->query($sql);

	if($likeResult->num_rows>0){
		
		echo "<img id='like' onclick=\"likePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/likeFilled.png'>";
	}
	else{
		echo "<img id='like' onclick=\"likePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/likeEmpty.png'>";
	}

	$sql="SELECT * FROM book_favourite WHERE user_id='{$userId}' AND book_id='{$isbn}'";
	$favouriteResult=$connection->query($sql);

	if($favouriteResult->num_rows>0){
		 echo "<img id='favourite' onclick=\"favouritePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/favouriteFilled.png'>";
	}
	else{
		echo "<img id='favourite' onclick=\"favouritePressed('offlineBook','".$isbn."')\" src='/BibliotekaOnline/images/app/favouriteEmpty.png'>";
	}


	
		echo "<br>isbn  ".$book["ISBN"]." <br> "."titulli  ".$book["title"]." <br>"."categories: ";
		while ($resultBookCategories=$bookCategories->fetch_assoc()) {
			echo $resultBookCategories["c_description"]." ";
		}

			echo "<br>".$book["publication_year"]."<br> ".$book["quantity"]." <br>".$book["price"]."<br> ".$book["reservation_points"]." <br>".$book["description"]."<br> ".$book["likes"]."<br>".$book_publish_house["name"]."<br>"."autoret: ";
		while($author=$resultAuthor->fetch_assoc()){
			echo $author["full_name"]." ";
		}




?>