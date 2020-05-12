<?php 
	function createSlider($result, $type, $booksPerSlider, $slideNumber){
		echo "<div>";
		$ok=true;
		while ($ok) {		
			echo "<div class='slidet".$slideNumber." fade'>";
			for($j=0;$j<$booksPerSlider;$j++){				
				if($book=$result->fetch_assoc()){

					if($type=="offline"){
						echo "<a href='book.php?isbn=".$book['ISBN']."'>";
						echo "<div style='display: inline-block;'>";
						echo "<img src='../images/books/".$book["cover_photo"]."'> <br>";
						echo $book["title"];
						echo "</div></a>";
					}
					else{
						echo "<a href='book.php?id=".$book['id']."'>";
						echo "<div style='display: inline-block;'>";
						echo "<img src='../images/onlineBooks/".$book["cover_photo"]."'> <br>";
						echo $book["title"];
						echo "</div></a>";
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