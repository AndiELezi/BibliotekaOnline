<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/editAuthors.js"></script>
	<title></title>
</head>
<body>
<?php

include '../DBconnection.php';

$author=$_GET["author"];
$authors=explode(",", $author);

$i=1;
foreach ($authors as $autori) {
	$sql="SELECT id from author WHERE full_name='{$autori}'";
	$authorResult=$connection->query($sql);
	$authorResultFetched=$authorResult->fetch_assoc();
	$authorId=$authorResultFetched["id"];
	echo "<h2>Plotesoni Te dhenat per autorin ".$autori."</h2><br><br>";
	echo "Vendlindja:<input type='text' name='birthplace$i'>";
	echo "Kontakti:<input type='text' name='contact$i'>";
	echo "Datelindja:<input type='date' name='birthday$i'>";
	echo "<input type='hidden' name='id$i' value='$authorId' >";
	$i++;
}

echo "<br><br><button onclick='updateAuthors()'>Submit</button>";



  ?>
  <div id="editAuthor"></div>
</body>
</html>