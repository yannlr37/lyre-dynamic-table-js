<?php

require_once 'Database.php';

$response = array(
	'success' => true,
	'messages' => [],
	'data' => []
);

$db = new Database();

if (isset($_POST['data'])) {
	$data = $_POST['data'];

	foreach ($data as $row) {
		if ((int) $row[0] < 0) {

			// TODO: insert data

			$sql = 'INSERT INTO clients (active, age, name, gender, company, email, phone) VALUES (' . implode(',', $row) . ')';
			$stmt = $db->conn->prepare($sql);
			$stmt->execute();

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