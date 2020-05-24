<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/BibliotekaOnline/scripts/allBookReservations.js"></script>
	<title>All book reservations</title>
	<link rel="stylesheet" type="text/css" href="../../styles/librarian/allReservations.css">
</head>
<body>
	<div class="container">
		<div class="input_wrap">
			<span>Data fillimit te kerkimit:</span>
			<input id="startDate" type="date" name="startDate" onchange="startDateChange(this.value)"><br>
			<span>Data  mbarimit te kerkimit:</span>
			<input id="endDate" type="date" name="endDate" onchange="endDateChange(this.value)">
		</div>
	</div>
<div id="allBookReservations" class="table_wrap"></div>



</body>
</html>