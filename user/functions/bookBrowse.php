
<?php 
if(!isset($_POST["pageNr"])){
	echo "You dont have acces here";
	exit();
}
session_start();
include 'DBconnection.php';
$numberPerPage=10;
$numberPerColumn=5;
$pageNumber=$_POST["pageNr"];
$startNumber=$pageNumber*$numberPerPage-$numberPerPage;
$pageResult="";
$pageError="";

/* Selektimi nga Dy llojet e librave */

if($_POST["bookType"]=="default"){
	include 'browseOnlineOfflineBooks.php';

}

/* Nqs ben browse per online books */ 

else if($_POST["bookType"]=="onlineBooks"){
	include 'browseOnlineBooks.php';
}

else if($_POST["bookType"]=="offlineBooks"){
	include 'browseOfflineBooks.php';
}



if($pageError!=""){
	echo $pageError;
}
else{
	echo $pageResult;
}


 ?>
