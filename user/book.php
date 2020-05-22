<?php 
session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles/book.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php
include 'functions/DBconnection.php';
$username=$_SESSION["username"];
$sql="SELECT * from users where username='$username'";
$userResult=$connection->query($sql);
$userData=$userResult->fetch_assoc();
  include 'header.php';

if(isset($_GET["isbn"])){
	
	include 'functions/offlineBookDetails.php';

	echo "<br><div class='review_wrap'>";
	echo "<h2>Reviews</h2><hr>";
	echo "<div id='bookId' style='display:none'>$isbn</div>";
 		$sql="SELECT * FROM review WHERE book_id='{$isbn}' AND user_id='{$userId}'";
 		$reviewResult=$connection->query($sql);

 		echo "<div class='my_review'>";

 		if($reviewResult->num_rows>0){
 			$reviewResultData=$reviewResult->fetch_assoc();
 			if(strlen($reviewResultData["description"])<70){
 				echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly>".$reviewResultData["description"]."</textarea>";
 			}
 			else{
 				echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review'readonly>".substr($reviewResultData["description"],0,70)."...</textarea>";
 			
 			}
 			echo "<button onclick=\"editReview('offlineBook','$isbn')\">Edit</button>";
 			echo "<button id='postBtn' style='display:none' onclick=\"postReview('offlineBook','$isbn')\">Post</button>";
 			echo "<button  onclick=\"deleteReview('offlineBook','$isbn')\" >Delete</button>";
 		}

 		else{
 			echo "<br><textarea id='review' placeholder='Write a review'></textarea><button onclick=\"postReview('offlineBook','$isbn')\">Post</button>";
 		}
 		echo "<br><span id='errorMsg'></span>";
 		echo "</div>";
 		echo "<div id='bookReviewByUsers'></div>";

 		echo "<a href='fullBookReviews.php?bookId=$isbn&pageNr=1'><div>View all Reviews</div></a>";



}


else if (isset($_GET["id"])){

	include 'functions/onlineBookDetails.php';


	echo "<br><div class='review_wrap'>";
 	echo "<h2>Reviews</h2><hr>";
 	echo "<div id='bookId' style='display:none'>$id</div>";

 	$sql="SELECT * FROM review WHERE book_id='{$id}' AND user_id='{$userId}'";
 	$reviewResult=$connection->query($sql);

 	echo "<div class='my_review'>";
 	if($reviewResult->num_rows>0){
 		$reviewResultData=$reviewResult->fetch_assoc();
 		if(strlen($reviewResultData["description"])<70){
 			echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly>".$reviewResultData["description"]."</textarea>";
 		}
 		else{
 			echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly>".substr($reviewResultData["description"],0,70)."...</textarea>";
 			
 		}
 		echo "<button  onclick=\"editReview('onlineBook','$id')\" >edit</button>";
 		echo "<button id='postBtn' style='display:none' onclick=\"postReview('onlineBook','$id')\">Post</button>";
 		echo "<button  onclick=\"deleteReview('onlineBook','$id')\" >Delete</button>";
 	}
 	else{
 		echo "<br><textarea placeholder='Write a review' id='review'></textarea><button onclick=\"postReview('onlineBook','$id')\">Post</button>";
 	}
 	echo "<br><span id='errorMsg'></span>";
 	echo "</div>";

 	echo "<div id='bookReviewByUsers'></div>";
 	echo "<a href='fullBookReviews.php?bookId=$id&pageNr=1'><div>View all Reviews</div></a>";
 	echo "</div>";
}


  ?>

  <div id="deleteResponse"></div>
 
  <script type="text/javascript" src="../scripts/home.js"></script>
  <script type="text/javascript" src="/BibliotekaOnline/scripts/book.js"></script>
</body>
</html>