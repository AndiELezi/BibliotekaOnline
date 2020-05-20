<?php 
include '../DBconnection.php'; 
$succes="";
if (isset($_POST["update"])){
	$isbn=$_POST["isbn"];
	$title=$_POST["title"];
	$quantity=$_POST["quantity"];
	$price=$_POST["price"];
	$reservation_points=$_POST["reservation_points"];
	$sql="UPDATE book set title='{$title}',quantity='{$quantity}',price='{$price}',reservation_points='{$reservation_points}' where ISBN='{$isbn}'";
	$connection->query($sql);
	$succes.="<span>Libri u updatu me sukses</span>";
}
$isbn=$_POST["isbn"];
$sql="SELECT title,quantity,price,reservation_points from book where ISBN='{$isbn}'";
$bookDetails=$connection->query($sql);
if($bookDetails->num_rows>0){
$book=$bookDetails->fetch_assoc();

echo "Title <br><input value='".$book["title"]."' readonly placeholder='Title' id='title'><button onclick=allowEdit('title')>Edit</button><br>";
echo "Quantity <br><input value='".$book["quantity"]."'readonly placeholder='Quantity' id='quantity'><button onclick=allowEdit('quantity')>Edit</button><br>";
echo "Price <br><input value='".$book["price"]."'readonly placeholder='Price' id='price'><button onclick=allowEdit('price')>Edit</button><br>";
echo "Reservation Points <br><input value='".$book["reservation_points"]."'readonly placeholder='Points' id='points'><button onclick=allowEdit('points')>Edit</button><br>";
echo "<input type='button' name='submit' value='Update' onclick=updateBook()>";
echo "<br>".$succes;
echo "<script type='text/javascript' src='../scripts/librarianBookEditable.js'></script>";
} 
else if ($bookDetails->num_rows=0) {
	echo "S'ka Rezultate";
}

?>