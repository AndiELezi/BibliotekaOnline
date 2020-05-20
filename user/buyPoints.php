<!DOCTYPE html>
<html>
<?php
	 session_start();
	 include 'functions/checkoutSession.php';
	 include 'functions/DBconnection.php';


  ?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script type="text/javascript" src="../scripts/home.js"></script>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/buyPoints.js"></script>

		

	<title></title>
</head>
<body>
	<?php  include 'header.php'; ?>
	<?php  
	$paketa1=$session1["id"];
	$paketa2=$session2["id"];
	$paketa3=$session3["id"];
	?>
	
	<div>Paketa 1<br>
		Sasia e pikeve:100<br>
		Cmimi:10$;
	</div>
	<button onclick="paketa1(<?php echo "'".$paketa1."'" ?>)">Bli</button><br><br>

	<div>Paketa 2<br>
		Sasia e pikeve:500<br>
		Cmimi:40$;
	</div>
	<button onclick="paketa2(<?php echo "'".$paketa2."'" ?>)">Bli</button><br><br>
	<div>Paketa 3<br>
		Sasia e pikeve:1000<br>
		Cmimi:75$;
	</div>
	<button onclick="paketa3(<?php echo "'".$paketa3."'" ?>)">Bli</button><br>


	


</body>
</html>