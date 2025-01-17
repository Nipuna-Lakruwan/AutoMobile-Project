<?php
include '../config/dbconnection.php';

// Fetch item names
$itemNames = [];
$itemNameQuery = "SELECT DISTINCT item_name FROM inventory";
$itemNameResult = $conn->query($itemNameQuery);
while ($row = $itemNameResult->fetch_assoc()) {
    $itemNames[] = $row['item_name'];
}

// Fetch brand names
$brandNames = [];
$brandNameQuery = "SELECT DISTINCT brand FROM inventory";
$brandNameResult = $conn->query($brandNameQuery);
while ($row = $brandNameResult->fetch_assoc()) {
    $brandNames[] = $row['brand'];
}

echo json_encode([
    "itemNames" => $itemNames,
    "brandNames" => $brandNames
]);
?>