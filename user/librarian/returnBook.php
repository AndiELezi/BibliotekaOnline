<!DOCTYPE html>
<html>
<head>
	<title>Return book</title>
	<link rel="stylesheet" type="text/css" href="../../styles/librarian/takeGiveBook.css">
</head>
<body>
	<div class="wrap">
		<div class="container">
			<span>Enter username:</span><input type="text" name="username" id="username"><br>
			<span>Enter book ISBN:</span><input type="text" name="bookIsbn" id="bookIsbn"><br>
			<button onclick="kerkoRezervim()">Kerko</button><br>
			<div id="returnBookResult" class="result"></div>
			<span id="returnBookConfirmedResult"></span>
		</div>
	</div>

</body>
<script type="text/javascript" src="/BibliotekaOnline/scripts/returnBook.js"></script>
</html>