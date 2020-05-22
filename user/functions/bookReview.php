
<?php 
if(!isset($_POST["like"]) && !isset($_POST["favourite"]) && !isset($_POST["editReview"]) && !isset($_POST["delete"]) && !isset($_POST["review"]) ){

			echo "You dont have acess here";
			exit();			
}


session_start();
include 'DBconnection.php';
	$username=$_SESSION["username"];
	$sql="SELECT * from users where username='{$username}'";
	$userResult=$connection->query($sql);
	$userData=$userResult->fetch_assoc();
	$userId=$userData["id"];
	$bookId=$_POST["bookId"];
	$data=date("Y-m-d");
	$bookType=$_POST["bookType"];

if (isset($_POST["like"])) {
	include 'bookReviewLike.php';

}
else if(isset($_POST["favourite"])){
	include 'bookReviewFavourite.php';
}
else if(isset($_POST["review"])){
	include 'bookReviewPost.php';
}
else if(isset($_POST["editReview"])){
	$sql="SELECT description from review where user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);
	$description=$reviewResult->fetch_assoc();
	echo $description["description"];
}
else if(isset($_POST["delete"])){
	
	$sql="SELECT * from review where user_id='{$userId}' AND book_id='{$bookId}'";
	$reviewResult=$connection->query($sql);
	if($reviewResult->num_rows>0){
		$sql="DELETE from review where user_id='{$userId}' AND book_id='{$bookId}'";
		$connection->query($sql);
	}
}

 ?>