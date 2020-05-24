<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/currentDayPlaceReservations.js"></script>
	<style type="text/css">
		.container{
			text-align: center;
		}

		.container div{
			display: inline-block;
		}

		.container select{
			margin-left: 20px; 
			padding-left: 10px; 
			font-size: 17px;
			width: 180px;
			height: 30px;
			color: black;
			background-color: #d9dadd;
			border-radius: 7px;
			border:none;
		}

		.container div{
			margin: 20px;
		}

		#userResult{
			text-align: left;
			background-color: rgba(55, 112, 150, 0.3);
			border-radius: 15px;
		}

		#userResult span{
			margin: 20px;
			color:#001a69;
		}

		#userResult button{
			text-align: center;
			color:#d9dadd;
			background-color: #4e697d;
			margin:7px 64px;
			width: 200px;
			height: 33px;
			font-size: 18px;
			border-radius: 12px;
			border:none;
			display: inline-block;
			cursor: pointer;
		}

		#userResult button:hover{
			color: #183d59;
			background-color: #d9dadd;
			box-shadow: 0 0 25px #377096;
		}
	</style>

</head>
<body>
	<div class="container">
		<?php 
			include '../functions/DBconnection.php';
			$sql="SELECT * FROM library_halls";
			$libraryHallResults=$connection->query($sql);

	 

			echo "<select name='libraryHall' onchange='libraryHallChange(this.value)'>";
			echo "<option value='default'>library hall</option>";
			while($i=$libraryHallResults->fetch_assoc()){
				echo "<option value='".$i["id"]."'>".$i["name"]."</option>";
				}
			echo "</select><br>";	
		?>
	 	<div id="seatResult"></div><br>
	 	<div id="userResult"></div>
	 </div>


</body>
</html>