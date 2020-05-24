<?php

include 'DBconnection.php';
if(isset($_POST["id"])){
	$id=$_POST["id"];
}

$pageResult="";

$sql="Select cover_photo,book_path from online_books where id='{$id}'";
$result=$connection->query($sql);
$bookResult=$result->fetch_assoc();

$file='C:\xampp\htdocs\BibliotekaOnline\eBooks\\'.$bookResult["book_path"];
unlink($file);
if($bookResult["cover_photo"]!="default.jpg"){
	$photo='C:\xampp\htdocs\BibliotekaOnline\images\onlineBooks\\'.$bookResult["cover_photo"];
	unlink($photo);
}
$sql="DELETE FROM `book_online_categories` WHERE book_online_id='{$id}'";
$connection->query($sql);

$sql="DELETE FROM `review` WHERE book_id='{$id}' AND book_type='onlineBook'";
$connection->query($sql);

$sql="DELETE FROM `book_like` WHERE book_id='{$id}' AND book_type='onlineBook'";
$connection->query($sql);

$sql="DELETE FROM `book_favourite` WHERE book_id='{$id}' AND book_type='onlineBook'";
$connection->query($sql);

$sql="DELETE FROM `online_books` WHERE id='{$id}'";
$connection->query($sql);

$pageResult="Success";
echo $pageResult;

?>