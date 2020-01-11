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
                <tbody>

                </tbody>
            </table>
            <div class="table-toolbar">
                <select id="action" name="action">
                    <option value="none">Action on selection</option>
                    <option value="edit">Edit</option>
                    <option value="delete">Delete</option>
                </select>&nbsp;
                <button id="applyAction">Apply</button>
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
                        <p>Edition form goes here</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

	<script type="text/javascript">
		$(document).ready(function() {

		    // lines selected
		    var selection = [];
		    // selected on action to apply
            var action = 'none';

		    // DataTables options
		    var options = {
                "pagingType": "full_numbers",
                "lengthChange": false,
                "pageLength": 10,
                "dom": '<"toolbar"if <"action">>rt<"bottom"lp>'
            };

		    // init DataTable
		    var table = $('#example').DataTable(options);

            // lines multi-selection
		    $('#example').on('click', 'tbody tr', function(event) {
		       $(this).toggleClass('selected');
		       selection = table.rows('.selected');
            });

		    // choose action
		    $('#action').on('change', function(event) {
		        action = $(this).val();
            });

		    // apply action on selection
            $('#applyAction').on('click', function(event) {
                var error = false;
                if (action === 'none' || action === '') {
                    error = true;
                    console.error('No action selected');
                }
                if (selection.length === 0) {
                    error = true;
                    console.error('No selection available');
                }
                if (!error) {
                    switch (action) {
                        case 'none':
                            console.log('no action');
                            break;
                        case 'edit':
                            $('#edit-modal').modal('show');
                            break;
                        case 'delete':
                            console.log('delete selected lines ...');
                            console.log(selection.data());
                            selection.remove().draw(false);
                            selection = [];
                            console.log('selected lines removed');
                            break;
                    }
                }
            });
		});
	</script>
</body>
</html>