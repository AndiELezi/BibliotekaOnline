<?php
if(!isset($_POST["bookId"])){
	echo "You dont have acces here";
	exit();
}
session_start();
$pageResult="";
$numberOfReviews=3;
$fullReviewId=-1;
$bookId;
if(isset($_POST["userId"])){
	$fullReviewId=$_POST["userId"];
}
if(isset($_POST["bookId"])){
	$bookId=$_POST["bookId"];
}

include 'DBconnection.php';
$username=$_SESSION["username"];
$sql="SELECT id from users where username='{$username}'";
$userResult=$connection->query($sql);
$userResultFetched=$userResult->fetch_assoc();
$currentUserId=$userResultFetched["id"];
$sql="SELECT users.id,users.name,users.surname,review.description,review.book_id,review.review_time FROM review INNER JOIN users on review.user_id=users.id where users.id!='{$currentUserId}'  AND  review.book_id='{$bookId}' ORDER BY review.review_time DESC LIMIT ".$numberOfReviews;
$reviewResult=$connection->query($sql);
while ($i=$reviewResult->fetch_assoc()) {
	if(strlen($i["description"])>150){
			if($i["id"]==$fullReviewId){
				$pageResult.="<div><b>".$i["name"]." ".$i["surname"]."</b><br>".$i["description"]."</div>";
			}
			else{
				$pageResult.="<div><b>".$i["name"]." ".$i["surname"]."</b><br>".substr($i["description"],0,150)."...<span onclick='fullReview(".$i["id"].")'>View More</span></div>";

			}
		
	}
	else{
		$pageResult.="<div><b>".$i["name"]." ".$i["surname"]."</b><br>".$i["description"]."</div>";
	}
	

}

echo $pageResult;

?>