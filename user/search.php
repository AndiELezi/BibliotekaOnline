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
	else if(strcmp($_GET["filter"],"publishHouse")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_publish_house_book WHERE publish_house_name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		//ktu do mendojm dicka tjt po me pak fjal dua t m sjelli dicka bosh;
		$sql="SELECT ISBN,cover_photo,title FROM v_publish_house_book WHERE ISBN=-2";
		$onlineBooksResult=$connection->query($sql);
		
	}


	/*tn do bej ndertimin e div per online dhe per ofline*/



}
else if(isset($_GET["AdvanceSearch"])){
	//kjo do jet per rastin kur behet nje kerkim i avancuar qe do na vij nga faqja avanceSearch.php po se kam menduar se ca paramatrash do ket tn per tn

}



 ?>