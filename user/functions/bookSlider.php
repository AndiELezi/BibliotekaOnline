<link rel="stylesheet" type="text/css" href="../styles/bookSlider.css">
<?php 
	function createSlider($slideTitle, $queryResult, $type, $booksPerSlider, $slideNumber){
		echo "<div class='slideshow-container'>";
		$ok=true;
		echo "<h2>".$slideTitle."</h2>";
		while ($ok) {		
			echo "<div class='myslides slidet".$slideNumber." fade'>";
			for($j=0;$j<$booksPerSlider;$j++){				
				if($book=$queryResult->fetch_assoc()){

					if($type=="offline"){
					?>
						<a href="book.php?isbn=<?php echo $book['ISBN'] ?>">
						<div class="single_book">
						<img src="../images/books/<?php echo $book['cover_photo'] ?>"> <br>
						<div><?php echo $book["title"]; ?></div>
						</div></a>
					<?php
					}
					else{
					?>
						<a href="book.php?id=<?php echo $book['id'] ?>">
						<div class="single_book">
						<img src="../images/onlineBooks/<?php echo $book['cover_photo'] ?>"> <br>
						<div><?php echo $book["title"]; ?></div>
						</div></a>
					<?php
					}
				}
				else{
					$ok=false;
					break;		
				}					
			}
			echo "</div>";
		}
		echo "<br><br>";
		//display navigation buttons
		echo "<a class='prev' onclick='slide(-1,".($slideNumber-1).")'>&#10094;</a> ";
		echo "<a class='next' onclick='slide(1,".($slideNumber-1).")'>&#10095;</a>";

		echo "</div>";
		echo "<br><br><hr>";
	}
?>