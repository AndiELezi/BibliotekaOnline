<?php 
if(!isset($_GET["searchQuery"])){
	echo "You dont have acces here";
	exit();
}
include 'DBconnection.php';
$numberOfWantedResult=4;
$searchQuery=$_GET["searchQuery"];
$sql="SELECT ISBN,cover_photo,title FROM book WHERE title LIKE \"%{$searchQuery}%\" LIMIT $numberOfWantedResult";
$result=$connection->query($sql);
$bookResults="";
while ($i=$result->fetch_assoc()) {
	$bookResults.="<a href='bookReservation.php?isbn=".$i["ISBN"]."'><div>"."<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>"."<span>".$i["title"]."<br><br></span></div><hr></a>";

}
echo $bookResults;




 ?>