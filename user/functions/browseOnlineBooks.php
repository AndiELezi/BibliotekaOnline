<?php
if(!isset($_POST["category"])){
	echo "You dont have acces here";
	exit();
}
$category=$_POST["category"];
	$user=$_POST["user"];
	$sqlOnline="SELECT DISTINCT id,cover_photo,title FROM v_online_books_categories";



if($category!="default"){
	
		$sqlOnline.=" WHERE c_description='{$category}'"; //nqs ka kategori
	

		if($_POST["year"]!="default"){

		$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
		$vitiFundi=$_POST["year"]+99;
		$vitiFundi=$vitiFundi."-01-01 00:00:00";
		$sqlOnline.=" AND  publish_date >= '{$vitiFillimi}' AND publish_date <='{$vitiFundi}'"; //nqs ka kategori dhe vit
		
		}
		if($user!="default"){
			$sqlOnline.=" AND  user_id='{$user}'";//nqs ka kategori dhe user
		}

	}
	else{
		if($_POST["year"]!="default"){
			$vitiFillimi=$_POST["year"]."-01-01 00:00:00";
			$vitiFundi=$_POST["year"]+99;
			$vitiFundi=$vitiFundi."-01-01 00:00:00";
			$sqlOnline.=" WHERE  publish_date >= '{$vitiFillimi}' AND publish_date <='{$vitiFundi}'"; //nqs ka vit
			
			if($user!="default"){
				$sqlOnline.=" AND user_id='{$user}'"; //nqs ka vit dhe user
			}

		}

		else{
			if($user!="default"){
				$sqlOnline.=" WHERE user_id='{$user}'"; //nqs ka user
			}
		}
		
	}




$sql=str_replace("DISTINCT id,cover_photo,title", " COUNT(DISTINCT id) as nr", $sqlOnline);
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
	$numriFaqeve=$nrFaqeveTeLibraveOnline;

	$sqlOnline.=" LIMIT $startNumber,$numberPerPage ";

                    $onlineBookResult=$connection->query($sqlOnline);
                
					while ($libratOnline=$onlineBookResult->fetch_assoc()) {
						$numberPerColumn--;
						$pageResult.="<a href='book.php?id=".$libratOnline["id"]."'>"."<div class='single_book'><img src='/BibliotekaOnline/images/onlineBooks/".$libratOnline["cover_photo"]."'><div>".$libratOnline['title']."</div></div></a>";
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