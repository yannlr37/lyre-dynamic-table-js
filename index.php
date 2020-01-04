<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Lyre Dynamic Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
    <style>
        .text-blue {
            color: #188ECD;
        }
        .text-red {
            color: #CD2E18;
        }
        .text-green {
            color: #0FB268;
        }
        .text-center {
            text-align: center;
        }
        .lyre-table {
            width: 100%;
            border: 1px solid darkgray;
        }
        .lyre-table thead {
            background-color: #1F9CDF;
            color: white;
            font-family: "Arial Hebrew", Arial, sans-serif;
        }
        .lyre-table thead th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-transform: capitalize;
        }
        .lyre-line:hover {
            background-color: lightgrey;
        }
        .lyre-btn:hover {
            cursor: pointer;
        }
    </style>

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