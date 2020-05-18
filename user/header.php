<?php 
$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
		$headerUser = $result->fetch_assoc();


 ?>

 <div>
		<a href="home.php"><img src="/BibliotekaOnline/images/app/libraryLogo.ico"></a>
		<ul>
			<li><a href="bookUpload.php"> bookUpload </a></li>
			<li><a href="browse.php"> Browse </a></li>
			<li><a href="reservation.php">Reservation</a></li>
			<li><a href="myBooks.php">My Books</a></li>
			<li><a href="buyPoints.php">buy Points</a></li>
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
			
				echo $headerUser["name"]." ".$headerUser["surname"]." ".$headerUser["points"];
				$profilePhotoPath="/BibliotekaOnline/images/users/";
				if(empty($headerUser["profile_photo"])){
						$profilePhotoPath.="default.jpg";
				}
				else{
					$profilePhotoPath.=$headerUser["profile_photo"];
				}
					
				?>
			<img id="profile_photo" src="<?php  echo $profilePhotoPath  ?>">	
			</div>
		</a>
		<a href="logout.php" onclick="return confirm('Are You sure you want to logout?');">Log out</a>
				<br>
