<?php 
include '../DBconnection.php'; 
$succes="";

if(isset($_POST["delete"])){
	$isbn=$_POST["isbn"];
	
	$sql="DELETE from book_reservation where book_id='{$isbn}'";
	$connection->query($sql);
	$sql="DELETE from review where book_id='{$isbn}'";
	$connection->query($sql);
	$sql="DELETE from book_like where book_id='{$isbn}'";
	$connection->query($sql);
	$sql="DELETE from book_favourite where book_id='{$isbn}'";
	$connection->query($sql);
	$sql="SELECT cover_photo from book where ISBN='{$isbn}'";
	$coverResult=$connection->query($sql);
	$cover_photo_path=$coverResult->fetch_assoc();
	$file='C:\xampp\htdocs\BibliotekaOnline\images\books\\'.$cover_photo_path["cover_photo"];
	unlink($file);
	$sql="DELETE from book where ISBN='{$isbn}'";
	$connection->query($sql);
	echo "<span class='success'>Libri u fshi me sukses</span>";

	exit();

}



if (isset($_POST["update"])){
	$isbn=$_POST["isbn"];
	$title=$_POST["title"];
	$quantity=$_POST["quantity"];
	$price=$_POST["price"];
	$reservation_points=$_POST["reservation_points"];
	$sql="UPDATE book set title='{$title}',quantity='{$quantity}',price='{$price}',reservation_points='{$reservation_points}' where ISBN='{$isbn}'";
	$connection->query($sql);
	$succes.="<span class='success'>Libri u updatu me sukses</span>";
}
$isbn=$_POST["isbn"];
$sql="SELECT title,quantity,price,reservation_points from book where ISBN='{$isbn}'";
$bookDetails=$connection->query($sql);
if($bookDetails->num_rows>0){
$book=$bookDetails->fetch_assoc();

echo "<hr><span>Title</span><input value='".$book["title"]."' readonly placeholder='Title' id='title'><button onclick=allowEdit('title')>Edit</button><br>";
echo "<span>Quantity</span><input value='".$book["quantity"]."'readonly placeholder='Quantity' id='quantity'><button onclick=allowEdit('quantity')>Edit</button><br>";
echo "<span>Price</span><input value='".$book["price"]."'readonly placeholder='Price' id='price'><button onclick=allowEdit('price')>Edit</button><br>";
echo "<span>Reservation Points</span><input value='".$book["reservation_points"]."'readonly placeholder='Points' id='points'><button onclick=allowEdit('points')>Edit</button><br>";
echo "<input class='btn' type='button' name='submit' value='Update' onclick=updateBook()><br>";
echo "<input class='btn delete' type='button' name='submit' value='Delete' onclick=deleteBook()><br>";
echo "<br>".$succes;
echo "<script type='text/javascript' src='../scripts/librarianBookEditable.js'></script>";
} 
else if ($bookDetails->num_rows==0) {
	echo "<span class='error'>S'ka Rezultate</span>";
}

?>