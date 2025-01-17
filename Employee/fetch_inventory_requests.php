<?php
include '../config/dbconnection.php';

// Fetch inventory requests
$sql = "SELECT ir.request_id, ir.mechanic_username, ir.request_date, ir.request_time, ir.item_code, ir.item_name, ir.quantity, ir.availability 
        FROM inventory_requests ir";
$result = $conn->query($sql);

$inventoryRequests = [];
while ($row = $result->fetch_assoc()) {
    $inventoryRequests[] = $row;
}

echo json_encode(["status" => "success", "data" => $inventoryRequests]);
?>