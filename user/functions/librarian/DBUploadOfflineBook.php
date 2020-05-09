<?php
include 'functions/DBconnection.php';

$stmt = $connection->prepare("INSERT INTO `book`(`isbn`, `title`, `publication_year`, `publish_house`, `quantity`, `price`, `reservation_points`, `cover_photo`, `description`, `likes`) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssssss',$ISBND,$titleD,$publshDateD,$publish_houseD,$quantityD,$priceD,$reservation_pointsD,$coverPhotoD,$descriptionD,$likesD);
$ISBND=$isbn;
$titleD=$title;
$publshDateD=$publication_year;
$publish_houseD=1;
$quantityD=1;
$priceD=1000;
$reservation_pointsD=0;
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

$author_id="";
$sql="SELECT id FROM author WHERE full_name='{$author}'";
$result=$connection->query($sql);
if($result->num_rows > 0){
	$result_id=$result->fetch_assoc();
	$author_id=$result_id["id"];
}
else{
	//shtimi i nje autori te ri sepse autori vendosur nuk ekziston
}

$sql="INSERT INTO book_author VALUES ('{$isbn}','{$author_id}')";
$connection->query($sql);

foreach ($category as $i) {
	$sql="SELECT id FROM categories WHERE description='{$i}'";
	$result=$connection->query($sql);
	$resultId=$result->fetch_assoc();
	$category_id=$resultId["id"];
	$sql="INSERT INTO `book_categories`(`book_id`, `category_id`) VALUES ('{$isbn}','{$category_id}')";
	$connection->query($sql);
}

$successMsg="libri u uplodua me sukses";
$isbn="";
$title="";
$description="";
$author="";

  ?>