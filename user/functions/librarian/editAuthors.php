<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/editAuthors.js"></script>
	<title></title>
<style type="text/css">
body,div{
	background-color: #183d59;
	font-family: sans-serif;
}
.wrap{
	margin: 60px;
	text-align: center;
}

.container{
	display: inline-block;
	text-align: left;
	background-color: rgba(55, 112, 150, 0.3);
	padding: 30px;
	border-radius: 13px;
	width: 500px;
}

.container h2{
	color:#2eabff;
	font-weight: normal
}


.container input{
	font-size: 18px;
	height: 30px;
	width: 340px;
	padding-left: 10px;
	border-radius: 12px;
	border:none;
	color:#d9dadd;
	background-color: #4e697d;
	margin-left: 10px;
	float: right;
	
}
.container span{
	color: #d9dadd;
	line-height: 50px;
}

.container button{
	text-align: center;
	color:#d9dadd;
	background-color: #4e697d;
	margin:7px;
	width: 100%;
	height: 40px;
	font-size: 18px;
	border-radius: 12px;
	border:none;
	display: inline-block;
	cursor: pointer;
}

.container button:hover{
	color: #183d59;
	background-color: #d9dadd;
	box-shadow: 0 0 25px #377096;
}

#editAuthor{
	background: transparent;
    text-align: center;
    color: #1aff1a;
}
.links a{
	text-decoration: none;
}
.links div{
	color:#d9dadd;
	background-color: #4e697d;
	padding: 10px;
	border-radius: 13px;
	width: 200px;
	text-align: center;
}

.links div:hover{
	color: #183d59;
	background-color: #d9dadd;
	box-shadow: 0 0 25px #377096;
}

	</style>
</head>
<body>
	<div class="wrap">
		<div class="container">
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
	echo "<h2>Plotesoni Te dhenat per autorin: <b>".$autori."</b></h2><br><br>";
	echo "<span>Vendlindja:</span><input type='text' name='birthplace$i' value='$authorBirthPlace'><br>";
	echo "<span>Kontakti:</span><input type='text' name='contact$i' value='$authorContact'><br>";
	echo "<span>Datelindja:</span><input type='date' name='birthday$i' value='$authorBirthday'><br>";
	echo "<input type='hidden' name='id$i' value='$authorId' >";
	$i++;
}

echo "<br><br><button onclick='updateAuthors()'>Submit</button>";



  ?>
  			<div id="editAuthor"></div>
		</div>
	</div>
	<div class="links">
	<a href="../../librarian/home.php"><div>Shko Tek menuja</div></a><br>
	<a href="../../librarian/librarianAddBook.php"><div>Shto nje Liber tjeter</div></a>
	</div>
</body>
</html>