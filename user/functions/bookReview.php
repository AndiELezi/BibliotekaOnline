
<?php 
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

 ?>