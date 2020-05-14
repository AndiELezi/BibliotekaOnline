<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
session_start();
include 'functions/DBconnection.php';
$username=$_SESSION["username"];
$sql="SELECT * from users where username='$username'";
$userResult=$connection->query($sql);
$userData=$userResult->fetch_assoc();

if(isset($_GET["isbn"])){
	
	include 'functions/offlineBookDetails.php';
	echo "<br><h1>reviews</h1><hr>";

 		$sql="SELECT * FROM review WHERE book_id='{$isbn}' AND user_id='{$userId}'";
 		$reviewResult=$connection->query($sql);
 		if($reviewResult->num_rows>0){
 			$reviewResultData=$reviewResult->fetch_assoc();
 			if(strlen($reviewResultData["description"])<10){
 				echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly style='border:none'>".$reviewResultData["description"]."</textarea>";
 			}
 			else{
 				echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review'readonly style='border:none'>".substr($reviewResultData["description"],0,20)."...</textarea>";
 			
 			}
 			echo "<button onclick=\"editReview('offlineBook','$isbn')\">edit</button>";
 			echo "<button id='postBtn' style='display:none' onclick=\"postReview('offlineBook','$isbn')\">Post</button>";
 				echo "<button  onclick=\"deleteReview('offlineBook','$isbn')\" >Delete</button>";
 		}

 		else{
 			echo "<br><textarea id='review' placeholder='write a review'></textarea><button onclick=\"postReview('offlineBook','$isbn')\">Post</button>";
 		}
 		echo "<br><span id='errorMsg'></span>";



}


else if (isset($_GET["id"])){

	include 'functions/onlineBookDetails.php';


	if(isset($_GET["download"])){

		include 'downloadBookFunction.php';

	}

  

	echo "<br>";

	echo "<a href='/BibliotekaOnline/eBooks/".$bookPath."'>Shiko online </a>";

	echo "<form method='GET'>";
 	echo "<input type='submit'  name='download' value='download'> ";
 	echo "<input type='hidden' name='id' value='".$id."'>";
 	echo "</form>";
 	echo "<br>";
 	$sql="SELECT name,username from v_user_online_books where book_id='{$id}'";
	$resultOnlineBookUser=$connection->query($sql);
	$bookUser=$resultOnlineBookUser->fetch_assoc();
 	if ($_SESSION["username"]==$bookUser["username"]){
 		echo "<button onclick='deleteBook(".$id.")'>Delete </button>";

 	}

 	echo "<br><h1>reviews</h1><hr>";

 	$sql="SELECT * FROM review WHERE book_id='{$id}' AND user_id='{$userId}'";
 	$reviewResult=$connection->query($sql);
 	if($reviewResult->num_rows>0){
 		$reviewResultData=$reviewResult->fetch_assoc();
 		if(strlen($reviewResultData["description"])<10){
 			echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly style='border:none'>".$reviewResultData["description"]."</textarea>";
 		}
 		else{
 			echo "<br><span><b>".$userData["name"]." ".$userData["surname"]."</b>:</span><br><textarea id='review' readonly style='border:none'>".substr($reviewResultData["description"],0,20)."...</textarea>";
 			
 		}
 		echo "<button  onclick=\"editReview('onlineBook','$id')\" >edit</button>";
 		echo "<button id='postBtn' style='display:none' onclick=\"postReview('onlineBook','$id')\">Post</button>";
 		echo "<button  onclick=\"deleteReview('onlineBook','$id')\" >Delete</button>";
 	}
 	else{
 		echo "<br><textarea placeholder='write a review' id='review'></textarea><button onclick=\"postReview('onlineBook','$id')\">Post</button>";
 	}
 		echo "<br><span id='errorMsg'></span>";

 	
}

  ?>

  <div id="deleteResponse"></div>

  <script type="text/javascript" src="/BibliotekaOnline/scripts/book.js"></script>
</body>
</html>