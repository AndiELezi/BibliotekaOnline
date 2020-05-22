<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<?php
include 'functions/DBconnection.php';
$username=$_SESSION["username"];
$paketa=$_POST["paketa"];
$sql;
if($paketa=="paketa1"){
	$sql="UPDATE users set points=points+100 where username='{$username}'";
}
else if($paketa=="paketa2"){
	$sql="UPDATE users set points=points+500 where username='{$username}'";
}
else if($paketa=="paketa3"){
	$sql="UPDATE users set points=points+1000 where username='{$username}'";
}
$connection->query($sql);

header("Location: /BibliotekaOnline/user/thankYou.php");

?>