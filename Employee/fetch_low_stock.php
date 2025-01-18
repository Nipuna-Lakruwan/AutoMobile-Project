<?php
include '../config/dbconnection.php';

// Define the low stock threshold
$lowStockThreshold = 10;

// Fetch low stock items
$sql = "SELECT item_id, item_name, brand, category, supplier, unit_buying_price, unit_price, quantity FROM inventory WHERE quantity <= ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $lowStockThreshold);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $lowStockItems = [];
        while ($row = $result->fetch_assoc()) {
            $lowStockItems[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $lowStockItems]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error executing query: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
}
$conn->close();
?>