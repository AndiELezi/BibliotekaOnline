<?php
session_start();
$server='localhost';
		$usernameDB='root';
		$passwordDB='';
		$databaze="biblioteka";
		$connnection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

		if($connnection->connect_error){
			die("gabim ne lidhjen ne databaze");
		} 
		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo` FROM users WHERE username='{$username}'";
		$result=$connnection->query($sql);
				$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<a href="home.php"><img src="/BibliotekaOnline/AppImages/libraryLogo.ico"></a>
		<ul>
			<li><a href="browse.php"> Browse </a></li>
			<li><a href="reservation.php">Reservation</a></li>
			<li><a href="myBooks.php">My Books</a></li>
		</ul>
		<input type="text" name="search">
		<select name="filter">
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="publishHouse">Publish House</option>
			<option value="advanced">Advanced</option>
		<!--vendsosim dhe opsione shtes pstj-->
		</select>
		<img src="/BibliotekaOnline/AppImages/search.png" >
		<div>
			<?php
			//kjo ktu m duket e perseritur shum her...me mir ta vendosim ne nje file tjt dhe i japim include
		
				echo $user["name"]." ".$user["surname"]." ".$user["points"];
				$profilePhotoPath="/BibliotekaOnline/UserImages/";
				if(empty($user["profile_photo"])){
						$profilePhotoPath.="default.jpg";
				}
				else{
					$profilePhotoPath.=$user["profile_photo"];
				}
					
				?>
			<img src="<?php  echo $profilePhotoPath  ?>">	


		</div>
	</div>

</body>
</html>