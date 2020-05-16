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
echo "<form id='form' action=thankYou.php method='POST'><input type='hidden' value='".$paketa."' name='paketa'><input type='submit'></form>"
?>
<script type="text/javascript" src="/BibliotekaOnline/scripts/tmpThankYou.js"></script>
</body>
</html>
