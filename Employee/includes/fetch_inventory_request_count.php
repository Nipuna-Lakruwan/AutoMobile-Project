<?php
include '../config/dbconnection.php';

// Fetch the count of inventory requests
$sql = "SELECT COUNT(*) as request_count FROM inventory_requests";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(["status" => "success", "data" => $row['request_count']]);
?>