<?php 
	function createSlider($slideTitle, $queryResult, $type, $booksPerSlider, $slideNumber){
		echo "<div>";
		$ok=true;
		echo "<h2>".$slideTitle."</h2>";
		while ($ok) {		
			echo "<div class='slidet".$slideNumber." fade'>";
			for($j=0;$j<$booksPerSlider;$j++){				
				if($book=$queryResult->fetch_assoc()){

					if($type=="offline"){
					?>
						<a href="book.php?isbn=<?php echo $book['ISBN'] ?>">
						<div style="display: inline-block;">
						<img src="../images/books/<?php echo $book['cover_photo'] ?>"> <br>
						<?php echo $book["title"]; ?>
						</div></a>
					<?php
					}
					else{
					?>
						<a href="book.php?id=<?php echo $book['id'] ?>">
						<div style="display: inline-block;">
						<img src="../images/onlineBooks/<?php echo $book['cover_photo'] ?>"> <br>
						<?php echo $book["title"]; ?>
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
		echo "</div>";

		echo "<br>";
		//display navigation buttons
		echo "<button onclick='slide(-1,".($slideNumber-1).")'>Previous</button> ";
		echo "<button onclick='slide(1,".($slideNumber-1).")'>Next</button>";
		echo "<hr>";
	}
?>