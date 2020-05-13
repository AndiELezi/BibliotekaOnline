<?php


$id=$_GET["id"];
	$userId=$userData["id"];
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

/***************************************/
$sql="SELECT * FROM review WHERE user_id='{$userId}' AND book_id='{$id}'";
	$reviewResult=$connection->query($sql);

	if($reviewResult->num_rows>0){
			$reviewResultData=$reviewResult->fetch_assoc();
			$liked=$reviewResultData["liked"];
			$favourite=$reviewResultData["favourite"];

			if($liked==0){
				echo "<img id='like' onclick=\"likePressed('onlineBook','".$id."')\"  src='/BibliotekaOnline/images/app/likeEmpty.png'>";

			}
			else if($liked==1){
				echo "<img id='like' onclick=\"likePressed('onlineBook','".$id."')\"  src='/BibliotekaOnline/images/app/likeFilled.png'>";
			}

			if($favourite==0){
				echo "<img id='favourite' onclick=\"favouritePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/favouriteEmpty.png'>";

			}
			else if($favourite==1){
				echo "<img id='favourite' onclick=\"favouritePressed('onlineBook','".$id."')\"  src='/BibliotekaOnline/images/app/favouriteFilled.png'>";
			}



	}
	else{

		echo "<img id='like' onclick=\"likePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/likeEmpty.png'>";
	 echo "<img id='favourite' onclick=\"favouritePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/favouriteEmpty.png'>";
	 echo "<br>";

	}
/***************************************/




	echo "<br>id ".$online_books["id"]."<br>". "titulli ".$online_books["title"]."<br>"."category: ";
	while($online_books_Category=$onlineBookCategory->fetch_assoc()){
		echo $online_books_Category["c_description"]." ";
	}
	echo "<br>".$online_books["publish_date"]."<br>". $online_books["likes"]."<br>".$online_books["description"]."<br>";
	while ($bookUser=$resultOnlineBookUser->fetch_assoc()) {
		echo $bookUser["name"]. " ".$bookUser["surname"];
	}

	$bookPath=$online_books["book_path"];

	
?>