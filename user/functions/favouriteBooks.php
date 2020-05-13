<?php 

$resultsPerPage=6;	//max number of books in a single page
$startFrom=($page - 1) * $resultsPerPage; //calculate the index where to select our elements on DB depending on page nr


//select all book_id and book_type that the user has marked as favourite
$sql="SELECT book_id, book_type FROM review
	INNER JOIN users ON review.user_id=users.id
	WHERE users.username='{$username}' AND favourite=1 
	LIMIT $startFrom, $resultsPerPage";

$result=$connection->query($sql);
		
if($result->num_rows > 0){
	$resultsPerRow=3;	//number of books per row
	$ok=true;
	while($ok){
		for ($i=0; $i < $resultsPerRow; $i++) {
			if($review=$result->fetch_assoc()){
				$bookId=$review["book_id"];
				$bookType=$review["book_type"];

				//if book type is offline set query and paths of offline book
				if($bookType=="offlineBook"){
					$bookSql="SELECT title, cover_photo FROM book WHERE ISBN='{$bookId}'";
					$bookDetailsPath="book.php?isbn=$bookId";
					$coverPhotoPath="../images/books/";
				}
				//else set online book query and paths
				else{
					$bookSql="SELECT title, cover_photo FROM online_books WHERE id='{$bookId}'";
					$bookDetailsPath="book.php?id=$bookId";
					$coverPhotoPath="../images/onlineBooks/";
				}
				$resultBook=$connection->query($bookSql);
				$book=$resultBook->fetch_assoc();
				//display the current book
 ?> 
				<a href="<?php echo $bookDetailsPath ?>">
				<div style="display: inline-block">
					<img src="<?php echo $coverPhotoPath.$book['cover_photo'] ?>"> <br>
					<?php echo $book['title'] ?>
				</div></a>
<?php 
			}
			else{
				//no more books to show, stop the loop
				$ok=false;
				break;
			}
		}
		//start e new row after finishing displaying a specific nr of books in the previous row
		echo "<br>"; 

	}


	//get the total number of favourite books to find the number of total pages
	$sql="SELECT COUNT(id_review) AS total FROM review
		INNER JOIN users ON review.user_id=users.id
		WHERE users.username='{$username}' AND favourite=1";
	$result=$connection->query($sql);
	$row=$result->fetch_assoc();
	$totalPages=ceil($row["total"] / $resultsPerPage);

	// display navigation links for all pages
	echo "<br> <br>";
	for ($i=1; $i<=$totalPages; $i++) { 
      	echo "<a href='myFavourites.php?page=".$i."'";
       	if ($i==$page)  echo " class='currentPage' style='color:red'";
	      	echo ">".$i."</a> "; 
	}
}
?>