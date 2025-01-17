<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $brandName = $_POST['brandName'];
    $itemQty = $_POST['itemqty'];
    $buyingPrice = $_POST['byingPrice'];
    $sellingPrice = $_POST['sellingPrice'];

    // Prepare the SQL statement
    $sql = "UPDATE inventory SET item_name = ?, category = ?, brand = ?, quantity = ?, unit_buying_price = ?, unit_price = ? WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssiddi", $itemName, $category, $brandName, $itemQty, $buyingPrice, $sellingPrice, $itemId);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Item updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating item: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>