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
		if ((int) $row[1] < 0) {

			$values = [
				($row[2] == 'true') ? 1 : 0,
				(int) $row[3],
				$db->conn->quote($row[4]),
				$db->conn->quote($row[5]),
				$db->conn->quote($row[6]),
				$db->conn->quote($row[7]),
				$db->conn->quote($row[8])
			];

			// insert data
			$sql = 'INSERT INTO clients (active, age, name, gender, company, email, phone) VALUES (' . implode(',', $values) . ')';
			$stmt = $db->conn->prepare($sql);

			if ($stmt->execute()) {
				$hash_ids[$db->conn->lastInsertId()] = true;
            } else {
			    $response['messages'][] = 'Client ' . $row[4] . ' not inserted';
            }

		} else {

			$sets = [
				"active = " . (($row[2] == 'true') ? 1 : 0),
				"age = " . ((int) $row[3]),
				"name = " . $db->conn->quote($row[4]),
				"gender = " . $db->conn->quote($row[5]),
				"company = " . $db->conn->quote($row[6]),
				"email = " . $db->conn->quote($row[7]),
				"phone = " . $db->conn->quote($row[8])
			];

			$id = (int) $row[1];
			$sql = 'UPDATE clients SET ' . implode(',', $sets) . ' WHERE id = ' . $id;
			$stmt = $db->conn->prepare($sql);
			if (!$stmt->execute()) {
				$response['messages'][] = 'Client ' . $row[4] . ' not updated';
			}
			$hash_ids[$id] = true;
		}
	}

	// delete obsolete rows
	$toDelete = array_filter($hash_ids, function($bool) {
		return $bool === false;
	});

	if (!empty($toDelete)) {
		$sql = 'DELETE FROM clients WHERE id IN (' . implode(',', array_keys($toDelete)) . ')';
		$stmt = $db->conn->prepare($sql);
		$stmt->execute();
	}

	// get new data
	$sql = "SELECT * FROM clients";
	$stmt = $db->conn->prepare($sql);
	$stmt->execute();
	$response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

echo json_encode($response);