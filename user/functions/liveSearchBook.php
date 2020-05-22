<?php 
if(!isset($_POST["searchQuery"])){
	echo "You dont have acces here";
	exit();
}
include 'DBconnection.php';
$searchQuery=$_GET["searchQuery"];
$sql="SELECT ISBN,cover_photo,title FROM book WHERE title LIKE \"%{$searchQuery}%\"";
$result=$connection->query($sql);
$bookResults="";
$ok=true;
$numberOfWantedResult=4;
while ($numberOfWantedResult!=0) {
	if($i=$result->fetch_assoc()){
		$bookResults.="<a href='bookReservation.php?isbn=".$i["ISBN"]."'>"."<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>".$i["title"]."</a>"."<br>";
		$numberOfWantedResult--;
	}
	else{
		break;
	}

}
echo $bookResults;




 ?>