<?php
if(!isset($_POST["category"])){
	echo "You dont have acces here";
	exit();
}
$category=$_POST["category"];
	$author=$_POST["author"];
	$publishHouseId=$_POST["publishHouse"];
	


	$sqlOffline="SELECT DISTINCT ISBN,cover_photo,title FROM v_book_categories";

	if($category!="default"){
		$sqlOffline.=" WHERE c_description='{$category}'"; //nqs eshte zgjedhur kategoria

		if($_POST["year"]!="default"){

		$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
		$vitiFundi=$_POST["year"]+99;
		$vitiFundi=$vitiFundi."-01-01 00:00:00";
		$sqlOffline.=" AND publication_year >= '{$vitiFillimi}' AND publication_year <='{$vitiFundi}'"; //kategori dhe vit
		}

		if($publishHouseId!="default"){
			$sqlOffline.=" AND publish_house='{$publishHouseId}'"; //kategori,vit dhe publishHouse
		}

		if($author!="default"){
			$sqlOffline.=" AND ISBN IN (SELECT book_id FROM book_author WHERE author_id='{$author}')"; //kategori,vit,publish house,author
		}


	}
	else{
		if($_POST["year"]!="default"){
			$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
			$vitiFundi=$_POST["year"]+99;
			$vitiFundi=$vitiFundi."-01-01 00:00:00";
			$sqlOffline.=" WHERE publication_year >= '{$vitiFillimi}' AND publication_year <='{$vitiFundi}'";//nqs ka vit

			if($publishHouseId!="default"){
				$sqlOffline.=" AND publish_house='{$publishHouseId}'";//vit dhe publish house
			}

			if($author!="default"){
				$sqlOffline.=" AND ISBN IN (SELECT book_id FROM book_author WHERE author_id='{$author}')"; //vit,publish house,autor
			}

		}

		else{
			if($publishHouseId!="default"){
				$sqlOffline.=" WHERE publish_house='{$publishHouseId}'";//nqs ka publish house
				
				if($author!="default"){
					$sqlOffline.=" AND ISBN IN (SELECT book_id FROM book_author WHERE author_id='{$author}')";//publish house dhe autor
				}
			}

			else{
				if($author!="default"){
					$sqlOffline.=" WHERE ISBN IN (SELECT book_id FROM book_author WHERE author_id='{$author}')";//nqs ka autor
				}
			}

		}
		
	}


	$sql=str_replace("DISTINCT ISBN,cover_photo,title", "COUNT(DISTINCT ISBN) as nr", $sqlOffline);
	$result=$connection->query($sql);
	$offlineBookNumberResult=$result->fetch_assoc();
	$offlineBookNumber=$offlineBookNumberResult["nr"];
	$mbetja=$offlineBookNumber%$numberPerPage;
	$numriFaqeve;
	if($mbetja!=0){
		$numriFaqeve=(($offlineBookNumber-$mbetja)/$numberPerPage)+1;
	}
	else if($mbetja==0){
		$numriFaqeve=$offlineBookNumber/$numberPerPage;
	}

	$sqlOffline.=" LIMIT $startNumber,$numberPerPage ";


	  $offlineBookResult=$connection->query($sqlOffline);
                
					while ($libratOffline=$offlineBookResult->fetch_assoc()) {
						$numberPerColumn--;
						$pageResult.="<a href='book.php?isbn=".$libratOffline["ISBN"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/books/".$libratOffline["cover_photo"]."'><div>".$libratOffline['title']."</div></div></a>";
							if($numberPerColumn==0){
								$pageResult.="<br>";
							}
						
					}


					$pageResult.="<br><br><br><hr><br><div class='nav_links'>";
					$pageIterator=1;
					while ($pageIterator<=$numriFaqeve) {
						if($pageIterator==$pageNumber){
							$pageResult.="<a onclick='pageNrChange(".$pageIterator.")'"." id='currentPageLink'>".$pageIterator."</a>";
						}
						else{
							$pageResult.="<a onclick='pageNrChange(".$pageIterator.")'>".$pageIterator."</a>";
						}
						$pageIterator++;
						
					}
					$pageResult.="</div><br>";


?>