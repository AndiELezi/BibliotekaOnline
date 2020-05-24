<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script type="text/javascript" src="../scripts/home.js"></script>
	<script type="text/javascript" src="../scripts/buyPoints.js"></script>

		

	<title>Buy more points</title>
	<link rel="stylesheet" type="text/css" href="../styles/buyPoints.css">
</head>
<body>
	<?php

	 include 'functions/DBconnection.php';
	 include 'header.php'; 

	 ?>
	<div class="package_wrap">
	<div><h2>Paketa 1</h2><br>
		Sasia e pikeve: <b>100</b><br>
		Cmimi: <b>10$</b>
		<br><button onclick="bliPaketen('paketa1')">Bli</button>
	</div>
	
	<div><h2>Paketa 2</h2><br>
		Sasia e pikeve: <b>500</b><br>
		Cmimi: <b>40$</b>
		<br><button onclick="bliPaketen('paketa2')">Bli</button>
	</div>
	
	<div><h2>Paketa 3</h2><br>
		Sasia e pikeve: <b>1000</b><br>
		Cmimi: <b>75$</b>
		<br><button onclick="bliPaketen('paketa3')">Bli</button>
	</div>
	<br>
	<div id="loader"></div>
	</div>


	


</body>
</html>