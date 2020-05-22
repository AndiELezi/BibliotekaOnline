<?php
if(!isset($_GET["id"])){
	echo "You dont have acces here";
	exit();
}

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

	echo "<div class='book_wrap'>";
	echo "<div class='cover_section'>";
	echo "<img src='$image_path_online_books'>"."<br>";
	echo "<div class='likeFavourite'>";

/***************************************/
	$sql="SELECT * FROM book_like WHERE user_id='{$userId}' AND book_id='{$id}'";
	$likeResult=$connection->query($sql);

	echo "<div class='likes'>";
	if($likeResult->num_rows>0){

		echo "<img id='like' onclick=\"likePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/likeFilled.png'>";

	}
	else{
		echo "<img id='like' onclick=\"likePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/likeEmpty.png'>";
	}
	echo "<br><span id='nrOfLikes'>".$online_books["likes"]."</span></div>";

	$sql="SELECT * FROM book_favourite WHERE user_id='{$userId}' AND book_id='{$id}'";
	$favouriteResult=$connection->query($sql);
	echo "<div>";
	if($favouriteResult->num_rows>0){
		 echo "<img id='favourite' onclick=\"favouritePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/favouriteFilled.png'>";
	}
	else{
		 echo "<img id='favourite' onclick=\"favouritePressed('onlineBook','".$id."')\" src='/BibliotekaOnline/images/app/favouriteEmpty.png'>";
	}
	echo "<br><span>&nbsp</span></div>";
	echo "</div></div></div>";

/***************************************/



	echo "<div class='details'>";
	echo "<span><b>ID:</b> ".$online_books["id"]."</span><br>"
	."<span><b>Titulli:</b> ".$online_books["title"]."</span><br>"
	."<span><b>Category:</b><ul>";
	while($online_books_Category=$onlineBookCategory->fetch_assoc()){
		echo "<li>".$online_books_Category["c_description"]."</li>";
	}
	echo "</ul></span><br>";

	echo "<span><b>Publication year:</b> ".$online_books["publish_date"]."</span><br>"
	."<span><b>Description:</b> <div class='description'>".$online_books["description"]."</div></span>"
	."<span><b>Autori:</b> <ul>";
	while ($bookUser=$resultOnlineBookUser->fetch_assoc()) {
		echo "<li>".$bookUser["name"]. " ".$bookUser["surname"]."</li>";
	}
	echo "</ul></span>";
	

	$bookPath=$online_books["book_path"];

	if(isset($_GET["download"])){

		include 'functions/downloadBookFunction.php';

	}

  

	echo "<br>";

	echo "<a href='/BibliotekaOnline/eBooks/".$bookPath."'><div>Shiko online</div></a>";

	echo "<form method='GET'>";
 	echo "<input type='submit'  name='download' value='Download'> ";
 	echo "<input type='hidden' name='id' value='".$id."'>";
 	echo "</form>";
 	$sql="SELECT name,username from v_user_online_books where book_id='{$id}'";
	$resultOnlineBookUser=$connection->query($sql);
	$bookUser=$resultOnlineBookUser->fetch_assoc();
 	if ($_SESSION["username"]==$bookUser["username"]){
 		echo "<a onclick='deleteBook(".$id.")'><div id='delete'>Delete</div></a>";

 	}
 	echo "<br><br>";
 	echo "</div></div>";
 	

	
?>