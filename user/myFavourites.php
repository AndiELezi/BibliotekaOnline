<!DOCTYPE html>
<html>
<head>
	<title>My favourite books</title>
</head>
<body>

	<h2>My favourite books</h2>

	<?php
		if(isset($_GET["page"])){
			$page=$_GET["page"];
		}
		else{
			$page=1;
		}

		$resultsPerPage=5;
		$startFrom=($page - 1) * $resultsPerPage;

		include "functions/DBconnection.php";
		$sql="SELECT id, title, cover_photo FROM online_books WHERE user_id=19 LIMIT $startFrom , $resultsPerPage";
		$result=$connection->query($sql);
		$ok=true;
		$resultsPerRow=3;
		while($ok){
			for ($i=0; $i < $resultsPerRow; $i++) { //displaying a specific number of books per row
				if($book=$result->fetch_assoc()){
		?>
						<a href="book.php?id=<?php echo $book['id']?>">
						<div style="display: inline-block">
							<img src="../images/onlineBooks/<?php echo $book['cover_photo'] ?>"> <br>
							<label><?php echo $book['title'];?></label>
						</div></a>

		<?php
				}
				else{
					$ok=false;
					break;
				}
			}
			echo "<br>";
		}

		//get the total number of results to find the number of total pages
		$sql="SELECT COUNT(id) AS total FROM online_books WHERE user_id=19";
		$result=$connection->query($sql);
		$row=$result->fetch_assoc();
		$totalPages=ceil($row["total"] / $resultsPerPage);

		// display navigation links for all pages
		for ($i=1; $i<=$totalPages; $i++) { 
            echo "<a href='myFavourites.php?page=".$i."'";
            if ($i==$page)  echo " class='currentPage' style='color:red'";
            echo ">".$i."</a> "; 
		}
	?>
</body>
</html>