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
	$sql="SELECT * from author WHERE full_name='{$autori}'";
	$authorResult=$connection->query($sql);
	$authorResultFetched=$authorResult->fetch_assoc();
	$authorId=$authorResultFetched["id"];
	$authorBirthday=$authorResultFetched["birthday"];
	$authorBirthPlace=$authorResultFetched["birthplace"];
	$authorContact=$authorResultFetched["contact"];
	echo "<h2>Plotesoni Te dhenat per autorin ".$autori."</h2><br><br>";
	echo "Vendlindja:<input type='text' name='birthplace$i' value='$authorBirthPlace'>";
	echo "Kontakti:<input type='text' name='contact$i' value='$authorContact'>";
	echo "Datelindja:<input type='date' name='birthday$i' value='$authorBirthday'>";
	echo "<input type='hidden' name='id$i' value='$authorId' >";
	$i++;
}

echo "<br><br><button onclick='updateAuthors()'>Submit</button>";



  ?>
  <div id="editAuthor"></div>
</body>
</html>