<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login.php");
	}

?>

<?php
$paketa=$_GET["paketa"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
echo "<form id='form' action=thankYouRedirect.php method='POST'><input type='hidden' value='".$paketa."' name='paketa'><input type='submit' style='display:none'></form>"
?>
<script type="text/javascript" src="/BibliotekaOnline/scripts/tmpThankYou.js"></script>
</body>
</html>
