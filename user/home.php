<?php
session_start();
//kjo ktu m duket e perseritur shum her...me mir ta vendosim ne nje file tjt dhe i japim include
		
	include "functions/DBconnection.php"; 
		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
		$user = $result->fetch_assoc();

		$numberOfBooksLimited=10;

		$sql="SELECT `ISBN`, title, cover_photo FROM book ORDER BY publication_year DESC LIMIT ".$numberOfBooksLimited;
		$libratSipasDates=$connection->query($sql);	
		$sql="SELECT `ISBN`, title, cover_photo FROM book ORDER BY likes DESC LIMIT ".$numberOfBooksLimited;
		$libratSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`, title, cover_photo FROM online_books ORDER BY likes DESC LIMIT ".$numberOfBooksLimited;
		$libratOnlineSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`, title, cover_photo FROM online_books ORDER BY publish_date DESC LIMIT ".$numberOfBooksLimited;
		$libratOnlineSipasDates=$connection->query($sql);
		$sql="SELECT `ISBN`, title, cover_photo FROM book WHERE reservation_points!=0 ORDER BY reservation_points DESC LIMIT ".$numberOfBooksLimited;
		$libratPremium=$connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/BibliotekaOnline/Styles/home.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<div>
		<a href="home.php"><img src="/BibliotekaOnline/images/app/libraryLogo.ico"></a>
		<ul>
			<li><a href="bookUpload.php"> bookUpload </a></li>
			<li><a href="browse.php"> Browse </a></li>
			<li><a href="reservation.php">Reservation</a></li>
			<li><a href="myBooks.php">My Books</a></li>
		</ul>
		<form action="search.php" method="get">
		<input type="text" name="searchQuery" onkeyup="liveSearch(this.value)" autocomplete="off">
		<select name="filter" id="filter">
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="publishHouse">Publish House</option>
			<option value="advanced">Advanced</option>
		<!--vendsosim dhe opsione shtes pstj-->
		</select>
		<input type="submit" name="search" value="search">
		</form>
		<div id="liveSearchResult"></div>
	</div>
	<br>
		<a href="profile.php">
			<div  id="profili">
			<?php
			
				echo $user["name"]." ".$user["surname"]." ".$user["points"];
				$profilePhotoPath="/BibliotekaOnline/images/users/";
				if(empty($user["profile_photo"])){
						$profilePhotoPath.="default.jpg";
				}
				else{
					$profilePhotoPath.=$user["profile_photo"];
				}
					
				?>
			<img id="profile_photo" src="<?php  echo $profilePhotoPath  ?>">	
			</div>
		</a>
		<a href="logout.php" onclick="return confirm('Are You sure you want to logout?');">Log out</a>
				<br>


			<!-- Book sliders -->
			<?php
				include "functions/bookSlider.php";
				createSlider("Librat me te fundit",$libratSipasDates,"offline",3,1);
				createSlider("Librat me te pelqyer",$libratSipasPelqimeve,"offline",3,2);
				createSlider("Librat online me te pelqyer",$libratOnlineSipasPelqimeve,"online",3,3);
				createSlider("Librat online me te fundit",$libratOnlineSipasDates,"online",3,4);
				createSlider("Librat Premium",$libratPremium,"offline",3,5);
			?>

	<!-------------Ktu do vendoset Footeri----------->		

</body>
<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="../scripts/bookSlider.js"></script>
</html>