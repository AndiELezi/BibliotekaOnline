<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>

<?php 
include 'functions/DBconnection.php';
 ?>
<!DOCTYPE html>

<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../styles/browse.css">
</head>
<body>
	<?php  include 'header.php' ?>
	<br>
<select name="bookType" id="bookType" onchange="bookTypeChange(this.value)">
<option value="default">Book Type</option>	
<option value="onlineBooks">Online Books</option>
<option value="offlineBooks">Offline Books</option>
</select><?php echo "<select"?>
<?php 

/* lista kategorive*/ 

$sql="SELECT description FROM categories ORDER BY description";
$categoriesResult=$connection->query($sql);
echo" name='category' id='category' onchange='categoryChange(this.value)'><option value='default'>Category</option>";
while ($i=$categoriesResult->fetch_assoc()) {
	echo "<option value='".$i["description"]."'>".$i["description"]."</option>";
}
echo "</select>";


/*lista e autoreve*/

$sql="SELECT id,full_name FROM author ORDER BY full_name";
$authorsResult=$connection->query($sql);
echo "<select name='author' id='author' onchange='authorChange(this.value)'><option value='default'>Author</option>";
while ($i=$authorsResult->fetch_assoc()) {
	echo "<option value='".$i["id"]."'>".$i["full_name"]."</option>";
}
echo "</select>";

/*lista e users*/

$sql="SELECT DISTINCT user_id,name,surname FROM `v_user_online_books` ORDER BY name";
$usersResult=$connection->query($sql);
echo "<select name='user' id='user' onchange='userChange(this.value)'><option value='default'>User</option>";
while ($i=$usersResult->fetch_assoc()) {
	echo "<option value='".$i["user_id"]."'>".$i["name"]." ".$i["surname"]."</option>";
}
echo "</select>";



/*lista e viteve*/

$viti=1400;
echo "<select name='year' id='year' onchange='yearChange(this.value)'><option value='default'>Viti</option>";
while ($viti<2021) {
	if($viti==2000){
		$tmp=$viti+20;
		echo "<option value='".$viti."'>".$viti."-".$tmp."</option>";
	}
	else{
		$tmp=$viti+99;
		echo "<option value='".$viti."'>".$viti."-".$tmp."</option>";
	}
	
	$viti=$viti+100;
}
echo "</select>";


/*lista publish house*/

$sql="SELECT  id,name FROM publish_house ORDER BY name";
$publishHouseResult=$connection->query($sql);
echo "<select name='publishHouse' id='publishHouse' onchange='publishHouseChange(this.value)'><option value='default'>Publish House</option>";
while ($i=$publishHouseResult->fetch_assoc()) {
	echo "<option value='".$i["id"]."'>".$i["name"]."</option>";
}
echo "</select>";

 ?>

<select name="orderBy" id="orderBy" onchange="orderByChange(this.value)">
<option value="default">Order By</option>
<option value="name">Name</option>
<option value="likes">Likes</option>	

</select><br>
<div id="bookResult" class="result-container"></div>

<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="/BibliotekaOnline/scripts/browse.js"></script>

</body>
</html>