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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/example.css">
</head>
<body>

    <div class="container">
        <h1>Dynamic Table</h1>

        <div id="table-container">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </thead>
            </table>
            <div class="table-toolbar">
                <button id="clearSelection">Clear selection</button>
                &nbsp;
                <button id="editBtn">Edit</button>
                &nbsp;
                <button id="deleteBtn">Delete</button>
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

		$(document).ready(function() {

		    // DataTables options
		    var options = {
		        "processing": true,
                "serverSide": true,
                "ajax": {
		            "url": "ajax.php",
                    "type": "POST"
                },
                "columns": [
                    { "data": "name" },
                    { "data": "position" },
                    { "data": "office" },
                    { "data": "age" },
                    { "data": "start_date" },
                    {
                        "data": "salary",
                        "render": function(data, type, row, meta) {
                            return '$' + number_format(data, 0, '.', ',');
                        }
                    }
                ],
                "pagingType": "full_numbers",
                "lengthChange": false,
                "pageLength": 10,
                "dom": 'if <"#toolbar"> <"action">rt<"bottom"lp>',
                "scrollX": true
            };

		    // init DataTable
		    var table = $('#example').DataTable(options);

		    // customize toolbar
            var toolbarBtns = `
                <button id="importBtn">Import from CSV</button>
                &nbsp;
                <button id="exportBtn">Export to CSV</button>
            `;
            $("div#toolbar").html(toolbarBtns);

            // lines multi-selection
		    $('#example').on('click', 'tbody tr', function(event) {
		       $(this).toggleClass('selected');
		       selection = table.rows('.selected');
            });

		    // clear selection
            $('#clearSelection').on('click', function() {
               if (selection.length > 0) {
                   $('#example tbody tr.selected').each(function() {
                       $(this).toggleClass('selected');
                   });
                   selection = [];
               }
            });

            // delete selection
            $('#deleteBtn').on('click', function() {
                table.rows('.selected').remove().draw(false);
            });

            // edit selection
            $('#editBtn').on('click', function(event) {
                event.preventDefault();
                var ids = table.rows('.selected')[0];
                $.each(ids, function(pos, id) {
                    var row = table.row(id).node();
                    // TODO: change HTML here (solve refresh issue)
                    $(row).find('td').each(function() {
                        var value = $(this).val();
                        $(this).html('<input type="text" value="' + value + '">');
                    });
                    $(row).removeClass('selected');
                });
            });

            // when save changes
            // TODO: handle this use case
            $('body').on('click', '#saveBtn', function(event) {
               event.preventDefault();
               $.ajax({
                   url: 'save.php',
                   method: 'post',
                   data: {
                       changed: changed,
                       deleted: deleted
                   },
                   dataType: 'json'
               }).done(function(response) {
                    table.ajax.reload();
               }).fail(function(error) {
                   console.error(error);
               });
            });
		});
	</script>
</body>
</html>