<?php 
include "functions/DBconnection.php"; 
if(isset($_GET["search"])){
$onlineBooksResult;
$offlineBooksResult;
$searchQuery=$_GET["searchQuery"];

//nqs ka kerkuar per titull

if(strcmp($_GET["filter"],"title")==0){
 $sql="SELECT ISBN,cover_photo,title FROM book WHERE title LIKE \"%{$searchQuery}%\"";
 $offlineBooksResult=$connection->query($sql);
 $sql="SELECT id,cover_photo,title FROM online_books WHERE title LIKE \"%{$searchQuery}%\"";
 $result=$connection->query($sql);
 $online_books=$result->fetch_assoc();
 echo $online_books["title"];
}

// nqs ka kekuar per autor (dhe user po ne te njejten vend po e vendos)
if(strcmp($_GET["filter"],"author")==0){
//ktu e kam len
}




}
else{
	echo "error";

}



 ?>