<?php

$response = array(
	'success' => true,
	'message' => '',
	'data' => ''
);

$html = array(
	'<input type="checkbox" class="slaveCheckbox">',
	'<input type="text" name="id">',
	'<input type="text" name="active">',
	'<input type="text" name="age">',
	'<input type="text" name="name">',
	'<input type="text" name="gender">',
	'<input type="text" name="company">',
	'<input type="text" name="email">',
	'<input type="text" name="phone">',
	'<i class="icon-link fa fa-save text-warning validateRowLink" title="Quit edit mode"></i>'
);
$response['data'] = $html;

echo json_encode($response);