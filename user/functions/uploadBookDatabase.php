<?php
include 'DBconnection.php';
$username=$_SESSION["username"];
$sql="SELECT id FROM users WHERE username='{$username}'";
$result=$connection->query($sql);
$usernameId=$result->fetch_assoc();



$stmt = $connection->prepare("INSERT INTO `online_books`(`user_id`, `title`, `publish_date`, `likes`, `cover_photo`, `description`, `book_path`) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param('sssssss',$usernameD,$titleD,$publshDateD,$likesD,$coverPhotoD,$descriptionD,$bookPathD);
$usernameD=$usernameId["id"];
$titleD=$title;
$publshDateD=date('Y-m-d H:i:s');
$likesD=0;
$coverPhotoD="";
if(!empty($cover_photo)){
$coverPhotoD=$coverPhotoNewName;
}
else{
	$coverPhotoD="default.jpg";
}

$descriptionD=$description;
$bookPathD=$bookNewName;

$stmt->execute();

$sql="SELECT id FROM online_books WHERE book_path='{$bookNewName}'";
$result=$connection->query($sql);
$resultId=$result->fetch_assoc();
$book_id=$resultId["id"];
foreach ($category as $i) {
	$sql="SELECT id FROM categories WHERE description='{$i}'";
	$result=$connection->query($sql);
	$resultId=$result->fetch_assoc();
	$category_id=$resultId["id"];
	$sql="INSERT INTO `book_online_categories`(`book_online_id`, `category_id`) VALUES ('{$book_id}','{$category_id}')";
	$connection->query($sql);
}

$successMsg="libri u uplodua me sukses";
header("Location: book.php?id={$book_id}");
$title="";
$description="";

  ?>