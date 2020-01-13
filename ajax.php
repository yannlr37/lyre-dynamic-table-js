<?php

require_once 'Database.php';
require_once 'functions.php';

// set default response
$response = array(
    'draw' => 1,
    'recordsTotal' => 0,
    'recordsFiltered' => 0,
    'data' => []
);

// get arguments
$start = $_POST['start'];
$length = $_POST['length'];
$draw = $_POST['draw'];


// Database connection
$db = new Database();

// get columns ("id" column is set by default)
$columns = ['id'];
foreach ($_POST['columns'] as $column) {
    $columns[] = $column['data'];
}

// count total data (for now, also filtered data)
$query = "SELECT count(*) as total FROM employees";
$stmt = $db->conn->prepare($query);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$response['recordsTotal'] = $res[0]['total'];
$response['recordsFiltered'] = $res[0]['total'];

// TODO: add filteres
// query & get results
$query = "SELECT " . implode(',', $columns) .
        " FROM employees" .
        " LIMIT " . $length .
        " OFFSET " . $start;

$stmt = $db->conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if results not empty
if (!empty($results)) {

    // format output
    array_walk($results, function(&$item) {

        // turn id field into DataTbale recognizable field
        $item['DT_RowId'] = $item['id'];
        unset($item['id']);

        // format start_date column
        $item['start_date'] = number_format_english($item['start_date']);

        // format salary column (use native "number_format" php function)
        //$item['salary'] = format_low_salary($item['salary']);

    });


    // export data
    $response['data'] = $results;

    // ensure page refresh
    $response['draw'] = $draw + 1;

}

echo json_encode($response);

