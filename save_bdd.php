<?php

require_once 'Database.php';

$response = array(
	'success' => true,
	'messages' => [],
	'data' => []
);

$db = new Database();

// get current data
$sql = "SELECT * FROM clients";
$stmt = $db->conn->prepare($sql);
$stmt->execute();
$currentClients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// set hash ids
$hash_ids = [];
foreach ($currentClients as $client) {
    $hash_ids[$client['id']] = false;
}

if (isset($_POST['data'])) {
	$data = $_POST['data'];

	foreach ($data as $row) {
		if ((int) $row[0] < 0) {

			// insert data
			$sql = 'INSERT INTO clients (active, age, name, gender, company, email, phone) VALUES (' . implode(',', $row) . ')';
			$stmt = $db->conn->prepare($sql);
			$ret = $stmt->execute();

			if ($ret) {
			    // TODO: get last inserted id
                $lastInsertedId = 0;
			    $hash_ids[$lastInsertedId] = true;
            } else {
			    $response['messages'][] = 'Client ' . $row['name'] . ' not saved';
            }

		} else {

			// TODO: update data
			// TODO: first, check if data has changed
			$sets = [];
			$id = (int) $row[0];
			$sql = 'UPDATE clients SET ' . implode(',', $sets) . ' WHERE id = ' . $id;
			$stmt = $db->conn->prepare($sql);
			$stmt->execute();

			// TODO: handle deletion
		}
	}
}

echo json_encode($response);