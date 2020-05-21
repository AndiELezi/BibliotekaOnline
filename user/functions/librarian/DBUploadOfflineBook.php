<?php
include '../functions/DBconnection.php';
$sql="SELECT * FROM book where ISBN='{$isbn}'";
$bookResult=$connection->query($sql);
if($bookResult->num_rows>0){
	echo "ky liber eshte ne databaze";
	exit();
}

$sql="SELECT id from publish_house where name='{$publishHouse}'";
$publishHouseResult=$connection->query($sql);
$publishHouseId;
if($publishHouseResult->num_rows>0){
	$publishHouseResultFetched=$publishHouseResult->fetch_assoc();
	$publishHouseId=$publishHouseResultFetched["id"];
}
else{
	$sql="INSERT INTO publish_house(`name`) values ('{$publishHouse}')";
	$connection->query($sql);
	$sql="SELECT id from publish_house where name='{$publishHouse}'";
	$publishHouseResult=$connection->query($sql);
	$publishHouseResultFetched=$publishHouseResult->fetch_assoc();
	$publishHouseId=$publishHouseResultFetched["id"];
}

$stmt = $connection->prepare("INSERT INTO `book`(`isbn`, `title`, `publication_year`, `publish_house`, `quantity`, `price`, `reservation_points`, `cover_photo`, `description`, `likes`) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssssss',$ISBND,$titleD,$publshDateD,$publish_houseD,$quantityD,$priceD,$reservation_pointsD,$coverPhotoD,$descriptionD,$likesD);
$ISBND=$isbn;
$titleD=$title;
$publshDateD=$publication_year;
$publish_houseD=$publishHouseId;
$quantityD=$quantity;
$priceD=$price;
$reservation_pointsD=$reservationPoints;
$coverPhotoD="";
if(!empty($cover_photo)){
$coverPhotoD=$coverPhotoNewName;
}
else{
	$coverPhotoD="default.jpg";
}

$descriptionD=$description;
$likesD=0;

$stmt->execute();

$authors=explode(",",$author);

foreach ($authors as $autori) {
	$sql="SELECT id from author WHERE full_name='{$autori}'";
	$authorResult=$connection->query($sql);
	$authorId;
	if($authorResult->num_rows>0){
		$authorResultFetched=$authorResult->fetch_assoc();
		$authorId=$authorResultFetched["id"];
	}
	else{
		$sql="INSERT INTO author(`full_name`) VALUES('{$autori}')";
		$connection->query($sql);
		$sql="SELECT id from author WHERE full_name='{$autori}'";
		$authorResult=$connection->query($sql);
		$authorResultFetched=$authorResult->fetch_assoc();
		$authorId=$authorResultFetched["id"];
	}

	$sql="INSERT INTO book_author(`book_id`,`author_id`) VALUES('{$isbn}','{$authorId}')";
	$connection->query($sql);

}

foreach ($category as $i) {
	$sql="SELECT id FROM categories WHERE description='{$i}'";
	$result=$connection->query($sql);
	$resultId=$result->fetch_assoc();
	$category_id=$resultId["id"];
	$sql="INSERT INTO `book_categories`(`book_id`, `category_id`) VALUES ('{$isbn}','{$category_id}')";
	$connection->query($sql);
}

$isbn="";
$title="";
$description="";
$publishHouse="";
$price="";
$reservationPoints="";
$quantity="";
	header("Location:../functions/librarian/editAuthors.php?author=".$author);
  ?>