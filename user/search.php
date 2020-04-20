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
 	$online_books=$connection->query($sql);

	}	

// nqs ka kekuar per autor (dhe user po ne te njejten vend po e vendos)
	else if(strcmp($_GET["filter"],"author")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_author_book WHERE full_name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		$sql="SELECT book_id,cover_photo,title FROM v_user_online_books WHERE name LIKE \"%{$searchQuery}%\" OR surname LIKE \"%{$searchQuery}%\"";
		$onlineBooksResult=$connection->query($sql);

	}




}
else{
	echo "error";

}



 ?>