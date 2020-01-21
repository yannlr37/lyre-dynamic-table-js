<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Lyre Dynamic Table</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
			integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/example.css">
</head>
<body>

<div class="container">

	<?php
		include 'Database.php';
		$clients = [];
		$db = new Database();
		$sql = 'SELECT * FROM clients';
		$stmt = $db->conn->prepare($sql);
		$stmt->execute();
		$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	<h1>Dynamic Table</h1>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger" id="alerts" hidden>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Filters : </h2>
			<div>
				<input type="text" class="search-field" data-field="name" placeholder="Search name ..." data-id="4">
				<input type="text" class="search-field" data-field="company" placeholder="Search company ..." data-id="6">
				<select class="search-field" data-id="5">
					<option value="female">female</option>
					<option value="male">male</option>
				</select>
			</div>
			<br>
		</div>
	</div>

	<div id="table-container">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>
						<input type="checkbox" id="masterCheckbox">
					</th>
					<th>Id</th>
					<th>Active</th>
					<th>Age</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Company</th>
					<th>email</th>
					<th>Phone</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($clients as $client) : ?>
				<tr>
					<td>
						<input type="checkbox" class="slaveCheckbox">
					</td>
					<td><?= $client['id'] ?></td>
					<td><?= ($client['active']) ? 'true' : 'false' ?></td>
					<td><?= $client['age'] ?></td>
					<td><?= $client['name'] ?></td>
					<td><?= $client['gender'] ?></td>
					<td><?= $client['company'] ?></td>
					<td><?= $client['email'] ?></td>
					<td><?= $client['phone'] ?></td>
					<td>
						<i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>
						&nbsp;/&nbsp;
						<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="table-toolbar">
			<button id="clearSelection" disabled>Clear selection</button>
			&nbsp;
			<button id="deleteBtn" disabled>Delete selection</button>
			&nbsp;
			<button id="saveBtn">Save changes</button>
			&nbsp;
		</div>
	</div>

	<div id="edit-modal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">

	function ToggleActionButtons(selection) {
		if (selection.length > 0) {
			$('#clearSelection').prop('disabled', false);
			$('#deleteBtn').prop('disabled', false);
		} else {
			$('#clearSelection').prop('disabled', true);
			$('#deleteBtn').prop('disabled', true);
		}
	}

	$(document).ready(function () {

		var normalHtmlActions = '<i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i>';
		var slaveCheckboxHtml = '<input type="checkbox" class="slaveCheckbox">';

		/* -------------------------------------------------------------------------------------------------------------
		 * Initialisation, Configuration & Customisation
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// DataTables options
		var options = {
			"pagingType": "full_numbers",
			"lengthChange": false,
			"pageLength": 10,
			"dom": 'if <"#toolbar"> <"action">rt<"bottom"lp>',
			"scrollX": true,
			"order": [[ 1, "asc" ]],
			"columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": true,
                    "searchable": false,
                    "orderable": false
                },
				{
					"targets": [ 1 ],
					"visible": false,
					"searchable": false
				},
				{
					"targets": [ 9 ],
					"visible": true,
					"searchable": false,
					"orderable": false
				}
			]
		};

		/* -------------------------------------------------------------------------------------------------------------
		 * Init table
		 * -------------------------------------------------------------------------------------------------------------
		 */
		var context = '#example';
		var table = $(context).DataTable(options);
		var selection = [];
		var editionModeActive = false;

		/* -------------------------------------------------------------------------------------------------------------
		 * Customize toolbar
		 * -------------------------------------------------------------------------------------------------------------
		 */
		var toolbarBtns = `
				<button id="addBtn">Add new row</button>
                &nbsp;
                <button id="importBtn">Import from CSV</button>
                &nbsp;
                <button id="exportBtn">Export to CSV</button>
            `;
		$("div#toolbar").html(toolbarBtns);

		/* -------------------------------------------------------------------------------------------------------------
		 * Handle Selection
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// lines multi-selection (handle checkbox click)
		$('#masterCheckbox').on('change', function(event) {
			if ($(this).is(':checked')) {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', true);
				});
				$(context + ' tr').addClass('selected');
			} else {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', false);
				});
				$(context + ' tr').removeClass('selected');
			}
			selection = table.rows('.selected')[0];
			ToggleActionButtons(selection);
		});

		// single line selection
		$(context).on('change', '.slaveCheckbox', function(event) {
			if ($(this).is(':checked')) {
				$(this).parent('td').parent('tr').addClass('selected');
			} else {
				$(this).parent('td').parent('tr').removeClass('selected');
			}
			selection = table.rows('.selected')[0];
			ToggleActionButtons(selection);
		});

		// clear selection
		$('#clearSelection').on('click', function () {
			if (selection.length > 0) {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', false);
				});
				$(context + ' tbody tr.selected').each(function () {
					$(this).toggleClass('selected');
				});
				selection = [];
				ToggleActionButtons(selection);
				$('#masterCheckbox').prop('checked', false);
			}
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Delete data (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// delete a single row
		$(context).on('click', 'tbody .deleteRowLink', function (event) {
			var row = $(this).parent('td').parent('tr');
			table.row(row).remove().draw();
		});

		// delete multi selection
		$('#deleteBtn').on('click', function () {
			table.rows('.selected').remove().draw(false);
			$('#clearSelection').prop('disabled', true);
			$('#deleteBtn').prop('disabled', true);
			$('#masterCheckbox').prop('checked', false);
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Add data (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// add new row
		$('#addBtn').on('click', function () {

			$.ajax({
				url: 'getHtml.php',
				method: 'post',
				data: {},
				dataType: 'json'
			}).done(function(response) {
				if (response.success) {
					var newRow = table.row.add(response.data).draw().node();
					$(newRow).addClass('editable');
				} else {
					console.error(response.message);
				}
			}).fail(function(error) {
				console.error(error);
			});
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Edit mode (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// edition mode
		$(context).on('click', 'tbody .editRowLink', function (event) {
			var row = $(this).parent('td').parent('tr');
			editionModeActive = true;
			$.ajax({
				url: 'getHtml.php',
				method: 'post',
				data: {data: table.row(row).data()},
				dataType: 'json'
			}).done(function(response) {
				if (response.success) {
					table.row(row).data(response.data).draw(false);
					$(table.row(row).node()).addClass('editable');
					$('#saveBtn').prop('disabled', true);
				} else {
					console.error(response.message);
				}
			}).fail(function(error) {
				console.error(error);
			});
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Save data (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */
		$(context).on('click', 'tbody .validateRowLink', function(event) {
			var row = $(this).parent('td').parent('tr');
			var htmlData = table.row(row).data();
			var data = [];
			for (var i = 0; i < htmlData.length-1; i++) {
				data[i] = htmlData[i];
			}
			data[1] = htmlData[1];
			row.find('.editableField').each(function(index, item) {
				data[index+2] = $(item).val();
			});
			data.push(normalHtmlActions);
			table.row(row).data(data).draw(false);
			$(table.row(row).node()).removeClass('editable');
			// if there is still one row editable, disable save button
			if (table.rows('.editable')[0].length > 0) {
				$('#saveBtn').prop('disabled', true);
			} else {
				console.log('all rows are clear');
				$('#saveBtn').prop('disabled', false);
				editionModeActive = false;
			}
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Save data to database (server-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// when save changes
		$('#saveBtn').on('click', function (event) {
			event.preventDefault();
			if (!editionModeActive) {
				var data = [];
				table.rows().every(function (rowIdx, tableLoop, rowLoop) {
					data.push(this.data());
				});

				$.ajax({
					url: 'save_bdd.php',
					method: 'post',
					data: {data: data},
					dataType: 'json'
				}).done(function (response) {
					// reload page
					//window.location.href = 'index.php';
					table.clear();
					$.each(response.data, function(index, item) {
						var values = [
							slaveCheckboxHtml,
							item.id,
							(parseInt(item.active) === 1) ? 'true' : 'false',
							item.age,
							item.name,
							item.gender,
							item.company,
							item.email,
							item.phone,
							normalHtmlActions
						];
						console.log(values);
						table.row.add(values);
					});
					table.draw();

					if (response.messages.length > 0) {
						$('#alerts').html(response.messages.join('<br>'));
						$('#alerts').prop('hidden', false);
					}
				}).fail(function (error) {
					console.error(error);
				});
			}
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Edition value handle
		 * -------------------------------------------------------------------------------------------------------------
		 */

		$(context).on('keyup', 'tbody .editableField', function(event) {
			var value = $(this).val();
			$(this).val(value);
		});

		$(context).on('change', 'tbody select', function(event) {
			var value = $(this).find('option:selected').val();
			$(this).find('option').removeAttr('selected');
			$(this).find('option:selected').attr('selected', 'selected');
			$(this).val(value);
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Individual column searching
		 * TODO: for select/option fields, search with regex to match only exact values
		 * -------------------------------------------------------------------------------------------------------------
		 */
		$('.search-field').on('keyup change clear', function(event) {
			var col = $(this).attr('data-id');
			var value = $(this).val();
			table.column(col).search(value).draw();
		});

	});
</script>
</body>
</html>