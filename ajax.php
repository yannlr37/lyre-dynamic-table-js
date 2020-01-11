<?php

require_once 'Database.php';

// get arguments





$db = new Database();
$stmt = $db->conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

