<?php
include '../config/dbconnection.php';

$category = isset($_POST['category']) ? $_POST['category'] : '';
$itemName = isset($_POST['itemName']) ? $_POST['itemName'] : '';

// Prepare the SQL statement
$sql = "SELECT item_id, item_name, category, brand, quantity, unit_buying_price, unit_price FROM inventory WHERE 1=1";

if ($category) {
    $sql .= " AND category = ?";
}
if ($itemName) {
    $sql .= " AND item_name = ?";
}

$stmt = $conn->prepare($sql);
if ($stmt) {
    if ($category && $itemName) {
        $stmt->bind_param("ss", $category, $itemName);
    } elseif ($category) {
        $stmt->bind_param("s", $category);
    } elseif ($itemName) {
        $stmt->bind_param("s", $itemName);
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $inventory = [];
        while ($row = $result->fetch_assoc()) {
            $inventory[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $inventory]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error executing query: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
}
$conn->close();
?>