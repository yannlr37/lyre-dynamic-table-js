<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Lyre Dynamic Table</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>

	<h1>Dynamic Table</h1>

	<div id="container"></div>
	<script type="text/javascript" src="js/Row.js"></script>
	<script type="text/javascript" src="js/Table.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var table = new Table();
			table.init('#container');
		});
	</script>
</body>
</html>