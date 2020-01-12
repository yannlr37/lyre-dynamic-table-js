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
                <select id="action" name="action">
                    <option value="none">Action on selection</option>
                    <option value="edit">Edit</option>
                    <option value="delete">Delete</option>
                </select>&nbsp;
                <button id="applyAction">Apply</button>
                &nbsp;
                <button id="clearSelection">Clear selection</button>
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
                    { "data": "salary" }
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
                <button id="saveBtn">Save changes</button>
                &nbsp;
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
                            // TODO: change to form
                            // empty form content
                            $('#edit-modal .modal-body').html('');
                            // create nav tabs navigation
                            var html = '<ul class="nav nav-tabs" id="dataTab" role="tablist">';
                            var data = selection.data();
                            $.each(data, function(index, item) {
                                html += '<li class="nav-item">';
                                html += '<a class="nav-link" data-toggle="tab" href="#item'+index+'" role="tab" aria-controls="item'+index+'">item #' + (index+1) + '</a>';
                                html += '</li>';
                            });
                            html += '</ul>';
                            // create tabs with data
                            html += '<div class="tab-content" id="dataTabContent">';
                            $.each(data, function(index, item) {
                                html += '<div class="tab-pane fade" role="tabpanel" id="item'+index+'" aria-labbeledby="item'+index+'" aria-selected="false">';
                                $.each(item, function(key, value) {
                                    html += value + '<br>';
                                });
                                html += '</div>';
                            });
                            html += '</div>';
                            $('#edit-modal .modal-body').html(html);
                            // force first tab to be active
                            var firstTab = $('#edit-modal .modal-body #dataTab').find('.nav-item').first();
                            firstTab.find('.nav-link').first().addClass('active');
                            // select first tab
                            var firstPanel = $('#edit-modal .modal-body #dataTabContent').find('.tab-pane').first();
                            firstPanel.attr('aria-selected', true);
                            firstPanel.addClass('show active');
                            // display modal
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