<?php
if(!isset($_POST["category"])){
	echo "You dont have acces here";
	exit();
}
$sqlOnline="SELECT DISTINCT id,cover_photo,title FROM v_online_books_categories";
	$sqlOffline="SELECT DISTINCT ISBN,cover_photo,title FROM v_book_categories";

	if($_POST["category"]!="default"){
		$category=$_POST["category"];
		$sqlOnline.=" WHERE c_description='{$category}'";
		$sqlOffline.=" WHERE c_description='{$category}'";

		if($_POST["year"]!="default"){

		$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
		$vitiFundi=$_POST["year"]+99;
		$vitiFundi=$vitiFundi."-01-01 00:00:00";
		$sqlOnline.=" AND  publish_date >= '{$vitiFillimi}' AND publish_date <='{$vitiFundi}'";
		$sqlOffline.=" AND publication_year >= '{$vitiFillimi}' AND publication_year <='{$vitiFundi}'";
		}
	}
	else{
		if($_POST["year"]!="default"){
			$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
			$vitiFundi=$_POST["year"]+99;
			$vitiFundi=$vitiFundi."-01-01 00:00:00";
			$sqlOnline.=" WHERE  publish_date >= '{$vitiFillimi}' AND publish_date <='{$vitiFundi}'";
			$sqlOffline.=" WHERE publication_year >= '{$vitiFillimi}' AND publication_year <='{$vitiFundi}'";

		}
		
	}

	

	$sql=str_replace("DISTINCT id,cover_photo,title", "COUNT(DISTINCT id) as nr", $sqlOnline);
	$result=$connection->query($sql);
	$onlineBookNumberResult=$result->fetch_assoc();
	$onlineBookNumber=$onlineBookNumberResult["nr"];
	$mbetjaOnline=$onlineBookNumber%$numberPerPage;
	$nrFaqeveTeLibraveOnline;
	if($mbetjaOnline!=0){
		$nrFaqeveTeLibraveOnline=(($onlineBookNumber-$mbetjaOnline)/$numberPerPage)+1;
	}
	else{
		$nrFaqeveTeLibraveOnline=$onlineBookNumber/$numberPerPage;
	}
	$_SESSION["i"]=$mbetjaOnline; // sa libra do ket faqja e fundit e librave online 

	$sql=str_replace("DISTINCT ISBN,cover_photo,title", "COUNT(DISTINCT ISBN) as nr", $sqlOffline);
	$result=$connection->query($sql);
	$offlineBookNumberResult=$result->fetch_assoc();
	$offlineBookNumber=$offlineBookNumberResult["nr"];
	$total=$offlineBookNumber+$onlineBookNumber;
	$mbetja=$total%$numberPerPage;
	$numriFaqeve;
	if($mbetja!=0){
		$numriFaqeve=(($total-$mbetja)/$numberPerPage)+1;
	}
	else if($mbetja==0){
		$numriFaqeve=$total/$numberPerPage;
	}
				$sqlOnline.=" LIMIT $startNumber,$numberPerPage ";

                    $onlineBookResult=$connection->query($sqlOnline);
                    $i=0;
					while ($libratOnline=$onlineBookResult->fetch_assoc()) {
						$numberPerColumn--;
						$pageResult.="<a href='book.php?id=".$libratOnline["id"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/onlineBooks/".$libratOnline["cover_photo"]."'><div>".$libratOnline['title']."<br></div></div></a>";
							if($numberPerColumn==0){
								$pageResult.="<br>";
							}
						$i++;
						
					}
					

					if($i!=0 & $i!=10 & $pageNumber<=$nrFaqeveTeLibraveOnline){
						
						$startNumber=0;$numberPerPage=$numberPerPage-$i;

						$sqlOffline.=" LIMIT $startNumber,$numberPerPage";

						 $offlineBookResult=$connection->query($sqlOffline);

						while ($libratOffline=$offlineBookResult->fetch_assoc()) {
							$numberPerColumn--;
								$pageResult.="<a href='book.php?isbn=".$libratOffline["ISBN"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/books/".$libratOffline["cover_photo"]."'><div>".$libratOffline['title']."</div></div></a>";
								
								if($numberPerColumn==0){
								$pageResult.="<br>";
							}
						
						}


					}



					if($pageNumber>$nrFaqeveTeLibraveOnline || $onlineBookNumber==0){
							if($_SESSION["i"]==0){
								$_SESSION["i"]=10;
							}
						$startNumber=($pageNumber*$numberPerPage)-($nrFaqeveTeLibraveOnline*$numberPerPage)-$numberPerPage+($numberPerPage-$_SESSION["i"]);

						$sqlOffline.=" LIMIT $startNumber,$numberPerPage";

						 $offlineBookResult=$connection->query($sqlOffline);
						while ($libratOffline=$offlineBookResult->fetch_assoc()) {
							$numberPerColumn--;
								$pageResult.="<a href='book.php?isbn=".$libratOffline["ISBN"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/books/".$libratOffline["cover_photo"]."'><div>".$libratOffline['title']."</div></div></a>";
								if($numberPerColumn==0){
								$pageResult.="<br>";
							}
								
						
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