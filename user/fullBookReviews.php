<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<?php
include 'functions/DBconnection.php';
include 'header.php';
$resultPerPage=2;
$pageNr=$_GET["pageNr"];
$start=$pageNr*$resultPerPage-$resultPerPage; 
$bookId=$_GET["bookId"];
$sql="SELECT COUNT(*) as total from review where book_id='{$bookId}'";
$totalResult=$connection->query($sql);
$totalResultFetched=$totalResult->fetch_assoc();
$totalReviews=$totalResultFetched["total"];
$mbetja=$totalReviews%$resultPerPage;
$numbOfPages=1;
if($mbetja>0){
	$numbOfPages=(($totalReviews-$mbetja)/$resultPerPage)+1;
}
else{
	$numbOfPages=$totalReviews/$resultPerPage;
}
if($numbOfPages==0){
	echo "Ky Liber nuk ka asnje review";
}



for($i=1;$i<=$numbOfPages;$i++){
	if($i==$pageNr){
		echo "<a style='color:red' href='fullBookReviews.php?pageNr=$i&bookId=$bookId'>$i</a> ";
	}
	else{
		echo "<a href='fullBookReviews.php?pageNr=$i&bookId=$bookId'>$i</a> ";
	}
}
echo "<br>";

$sql="SELECT users.id,users.name,users.surname,review.description,review.book_id,review.review_time FROM review INNER JOIN users on review.user_id=users.id where  review.book_id='{$bookId}' ORDER BY review.review_time DESC LIMIT ".$start.",".$resultPerPage;
$reviewResult=$connection->query($sql);
while ($i=$reviewResult->fetch_assoc()) {

	echo "<div><b>".$i["name"]." ".$i["surname"]."</b><br>".$i["description"]."<div>";	

}


for($i=1;$i<=$numbOfPages;$i++){
	if($i==$pageNr){
		echo "<a style='color:red' href='fullBookReviews.php?pageNr=$i&bookId=$bookId'>$i</a> ";
	}
	else{
		echo "<a href='fullBookReviews.php?pageNr=$i&bookId=$bookId'>$i</a> ";
	}
}

 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="../scripts/home.js"></script>