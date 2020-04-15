<?php
session_start();
//kjo ktu m duket e perseritur shum her...me mir ta vendosim ne nje file tjt dhe i japim include
		
$server='localhost';
		$usernameDB='root';
		$passwordDB='';
		$databaze="biblioteka";
		$connection=new mysqli($server,$usernameDB,$passwordDB,$databaze);

		if($connection->connect_error){
			die("gabim ne lidhjen ne databaze");
		} 
		$username=$_SESSION["username"];
		$sql="SELECT `name`,`surname`,`points`,`profile_photo` FROM users WHERE username='{$username}'";
		$result=$connection->query($sql);
				$user = $result->fetch_assoc();
		$sql="SELECT `ISBN`,cover_photo FROM book ORDER BY publication_year DESC";
		$libratSipasDates=$connection->query($sql);	
		$sql="SELECT `ISBN`,cover_photo FROM book ORDER BY likes DESC";
		$libratSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`,cover_photo FROM online_books ORDER BY likes DESC";
		$libratOnlineSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`,cover_photo FROM online_books ORDER BY publish_date DESC";
		$libratOnlineSipasDates=$connection->query($sql);
		$sql="SELECT `ISBN`,cover_photo FROM book WHERE reservation_points!=0 ORDER BY reservation_points DESC";
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
			<li><a href="browse.php"> Browse </a></li>
			<li><a href="reservation.php">Reservation</a></li>
			<li><a href="myBooks.php">My Books</a></li>
		</ul>
		<form action="search.php" method="get">
		<input type="text" name="search">
		<select name="filter">
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="publishHouse">Publish House</option>
			<option value="advanced">Advanced</option>
		<!--vendsosim dhe opsione shtes pstj-->
		</select>
		<input type="submit" name="search" value="search">
		</form>
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
			<img src="<?php  echo $profilePhotoPath  ?>">	
			</div>
		</a>
				<br>
			
<!----------------do gjej na nje menyr me t mir me for per kto 5 divet po pertoja tn----------------------->
<!----------Div par -------------------->

			<div>
				<?php
				 $ok=true;
				 $nrLibr=7;
					while ($ok && $nrLibr!=0) {
						
						echo "<div class='slidet1 fade'>";
						for($j=0;$j<3;$j++){
						
							if($i=$libratSipasDates->fetch_assoc()){
								echo "<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>";
									$nrLibr--;
									if($nrLibr==0){
										break;
									}
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<button onclick="slide(-1,0)">prev</button>
			<button onclick="slide(1,0)">next</button>
	

<br>

<!------------------Div 2 -------------------------->
			<div>
				<?php
				 $ok=true;
				 $nrLibr=7;
					while ($ok && $nrLibr!=0) {
						
						echo "<div class='slidet2 fade'>";
						for($j=0;$j<3;$j++){
						
							if($i=$libratSipasPelqimeve->fetch_assoc()){
								echo "<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>";
									$nrLibr--;
									if($nrLibr==0){
										break;
									}
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<button onclick="slide(-1,1)">prev</button>
			<button onclick="slide(1,1)">next</button>


<!------------------Div 3 -------------------------->


<div>
				<?php
				 $ok=true;
				 $nrLibr=7;
					while ($ok && $nrLibr!=0) {
						
						echo "<div class='slidet3 fade'>";
						for($j=0;$j<3;$j++){
						
							if($i=$libratOnlineSipasPelqimeve->fetch_assoc()){
								echo "<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>";
									$nrLibr--;
									if($nrLibr==0){
										break;
									}
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<button onclick="slide(-1,2)">prev</button>
			<button onclick="slide(1,2)">next</button>



<!------------Div4------------------->

<div>
				<?php
				 $ok=true;
				 $nrLibr=7;
					while ($ok && $nrLibr!=0) {
						
						echo "<div class='slidet4 fade'>";
						for($j=0;$j<3;$j++){
						
							if($i=$libratOnlineSipasDates->fetch_assoc()){
								echo "<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>";
									$nrLibr--;
									if($nrLibr==0){
										break;
									}
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<button onclick="slide(-1,3)">prev</button>
			<button onclick="slide(1,3)">next</button>

<!----------------------Div5--------------------->

<div>
				<?php
				 $ok=true;
				 $nrLibr=7;
					while ($ok && $nrLibr!=0) {
						
						echo "<div class='slidet5 fade'>";
						for($j=0;$j<3;$j++){
						
							if($i=$libratPremium->fetch_assoc()){
								echo "<img src='/BibliotekaOnline/images/books/".$i["cover_photo"]."'>";
									$nrLibr--;
									if($nrLibr==0){
										break;
									}
							}
							else{
								$ok=false;
								break;		
							}
							
						}
						echo "</div>";
					}

				  ?>

			</div>	
			<button onclick="slide(-1,4)">prev</button>
			<button onclick="slide(1,4)">next</button>

	<!-------------Ktu do vendoset Footeri----------->		

</body>
<script type="text/javascript" src="/BibliotekaOnline/scripts/home.js"></script>
</html>