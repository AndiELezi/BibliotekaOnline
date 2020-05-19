<?php 
include "DBconnection.php"; 
$pageResult="";
$pageError="";
$desiredSearchNumber=5;
$onlineBooksResult;
$offlineBooksResult;
$searchQuery=$_GET["searchQuery"];

//nqs ka kerkuar per titull

	if(strcmp($_GET["filter"],"title")==0){
 	$sql="SELECT ISBN,cover_photo,title FROM book WHERE title LIKE \"%{$searchQuery}%\"";
 	$offlineBooksResult=$connection->query($sql);
 	$sql="SELECT id,cover_photo,title FROM online_books WHERE title LIKE \"%{$searchQuery}%\"";
 	$onlineBooksResult=$connection->query($sql);

	}	

// nqs ka kekuar per autor (dhe user po ne te njejten vend po e vendos)
	else if(strcmp($_GET["filter"],"author")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_author_book WHERE full_name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		$sql="SELECT book_id as id,cover_photo,title FROM v_user_online_books WHERE name LIKE \"%{$searchQuery}%\" OR surname LIKE \"%{$searchQuery}%\"";
		$onlineBooksResult=$connection->query($sql);

	}
	else if(strcmp($_GET["filter"],"publishHouse")==0){
		$sql="SELECT ISBN,cover_photo,title FROM v_publish_house_book WHERE name LIKE \"%{$searchQuery}%\"";
		$offlineBooksResult=$connection->query($sql);
		//ktu do mendojm dicka tjt po me pak fjal dua t m sjelli dicka bosh;
		$sql="SELECT id,cover_photo,title FROM online_books WHERE id=-3";
		$onlineBooksResult=$connection->query($sql);
		
	}

	while ($desiredSearchNumber>0) {
			if($libratOnline=$onlineBooksResult->fetch_assoc()){
					$pageResult.="<div><a href='book.php?id=".$libratOnline["id"]."'>"."<img src='/BibliotekaOnline/images/onlineBooks/".$libratOnline["cover_photo"]."'>"."<span>".$libratOnline["title"]."<br><br></span></a></div><hr>";
						$desiredSearchNumber--;
			}
			else{
				break;
			}
		
	}

	while ($desiredSearchNumber>0) {
		if($libratOffline=$offlineBooksResult->fetch_assoc()){
			$pageResult.="<div><a href='book.php?isbn=".$libratOffline["ISBN"]."'>"."<img src='/BibliotekaOnline/images/books/".$libratOffline["cover_photo"]."'>"."<span>".$libratOffline["title"]."<br><br></span></a></div><hr>";
			$desiredSearchNumber--;
		}
		else{
			break;
		}
		
	}

	if($pageError!=""){
		echo $pageError;
	}
	else{
		echo $pageResult;
	}
	


?>