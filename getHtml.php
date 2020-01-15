<?php

$response = array(
	'success' => true,
	'message' => '',
	'data' => ''
);

// TODO: get newt auto-increment index to be added in DB

$html = array(
	'<input type="checkbox" class="slaveCheckbox">',
	'x',
	'<input type="text" name="active">',
	'<input type="text" name="age">',
	'<input type="text" name="name">',
	'<input type="text" name="gender">',
	'<input type="text" name="company">',
	'<input type="text" name="email">',
	'<input type="text" name="phone">',
	'<i class="icon-link fa fa-save text-warning validateRowLink" title="Validate modifications"></i>'
);
$response['data'] = $html;

echo json_encode($response);