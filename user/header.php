<?php 
$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
		$headerUser = $result->fetch_assoc();


 ?>
 	<div class="header">
 		<link rel="stylesheet" type="text/css" href="../styles/header.css">
 		<!--search icon-->
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<div class="logo">
			<a href="home.php"><img id="logo" src="/BibliotekaOnline/images/app/libraryLogo.png"></a>
		</div>

		<div class="menu">
			<ul>
				<li><a href="bookUpload.php"> bookUpload </a></li>
				<li><a href="browse.php"> Browse </a></li>
				<li><a href="reservation.php">Reservation</a></li>
				<li><a href="myBooks.php">My Books</a></li>
			</ul>
			<form action="search.php" method="get">
				<input type="text" name="searchQuery" onkeyup="liveSearch(this.value)" autocomplete="off" placeholder="Search">
				<select name="filter" id="filter">
					<option value="title">Title</option>
					<option value="author">Author</option>
					<option value="publishHouse">Publish House</option>
					<option value="advanced">Advanced</option>
					<!--vendsosim dhe opsione shtes pstj-->
				</select>
				<button type="submit" id="searchHeader" name="search"><i class="fa fa-search"></i></button>
			</form>
			<br><br>
		</div>

		<div class="profile_section">
			<a href="profile.php">
				<div  id="profili">
					<?php
			
						echo "<span>".$headerUser["name"]." ".$headerUser["surname"]."<br><br></span>";
						$profilePhotoPath="/BibliotekaOnline/images/users/";
						if(empty($headerUser["profile_photo"])){
								$profilePhotoPath.="default.jpg";
						}
						else{
							$profilePhotoPath.=$headerUser["profile_photo"];
						}
						
					?>
					<img id="profile_photo" src="<?php  echo $profilePhotoPath  ?>"> <br>
				</div>
			</a>
			<br>
			<?php echo "Points: ".$headerUser["points"]; ?>
			<a id="buyPoints" href="buyPoints.php">More points?</a>
			<br>
			<a style="float: right;" href="logout.php" onclick="return confirm('Are You sure you want to logout?');">Log out</a>
		</div>
	</div>
	<div id="liveSearchResult"></div>