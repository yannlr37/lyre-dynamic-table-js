<?php

$response = array(
	'success' => true,
	'message' => '',
	'data' => ''
);

$values = [];
$id = -1;

if (isset($_POST['data'])) {
	$data = $_POST['data'];
	for ($i=1; $i < count($data); $i++) {
		$values[] = $data[$i];
	}

	$active = ($values[1] === 'true') ? true : false;
	$gender = ($values[4] == 'female') ? 'female' : 'male';
	$id = $values[0];
}


$html = array(
	'<input type="checkbox" class="slaveCheckbox">',
	$id,
	'<select name="active"><option value="none"></option><option value="true" ' . (($active) ? 'selected' : '') . '>true</option><option value="false" ' . (($active) ? '' : 'selected') . '>false</option></select>',
	'<input type="text" name="age" value="' . ((count($values) > 0) ?  $values[2] : '' ) . '">',
	'<input type="text" name="name" value="' . ((count($values) > 0) ?  $values[3] : '' ) . '">',
	'<select name="gender"><option value="none"></option><option value="female" ' . (($gender === 'female') ? 'selected' : '') . '>female</option><option value="male" ' . (($gender === 'male') ? 'selected' : '') . '>male</option></select>',
	'<input type="text" name="company" value="' . ((count($values) > 0) ?  $values[5] : '' ) . '">',
	'<input type="text" name="email" value="' . ((count($values) > 0) ?  $values[6] : '' ) . '">',
	'<input type="text" name="phone" value="' . ((count($values) > 0) ?  $values[7] : '' ) . '">',
	'<i class="icon-link fa fa-save text-warning validateRowLink" title="Validate modifications"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>'
);
$response['data'] = $html;

echo json_encode($response);