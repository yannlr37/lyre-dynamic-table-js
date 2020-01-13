<?php

require_once 'Database.php';
require_once 'functions.php';

$response = array(
    'success' => true,
    'messages' => []
);

// Database connection
$db = new Database();

// apply changes if requested
// TODO: start transaction
if (isset($_POST['deleted'])) {
    $deleted = $_POST['deleted'];
    $toDelete = [];
    foreach ($deleted as $item) {
        if ($item !== '') {
            $toDelete[] = (int)$item['DT_RowId'];
        }
    }
    if (!empty($toDelete)) {
        $sql = "DELETE FROM employees WHERE id in (" . implode(',', $toDelete) . ")";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();
    }
} else if (isset($_POST['changed'])) {
    $changed = $_POST['changed'];
    if (!empty($changed)) {
        foreach ($changed as $item) {
            $sets = [];
            foreach ($item as $key => $value) {
                if ($key !== 'DT_RowId')
                    $sets[] = $key . " = " . $value;
            }
            $sql = "UPDATE employees SET " . implode(',', $sets) . " WHERE id = " . $item['DT_RowId'];
            $stmt = $db->conn->prepare($sql);
            $stmt->execute();
        }
    }
}
// TODO: commit or rollback then close transaction

return json_encode($response);