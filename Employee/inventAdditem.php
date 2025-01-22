<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $brandName = $_POST['brandName'];
    $itemQty = $_POST['itemqty'];
    $buyingPrice = $_POST['byingPrice'];
    $sellingPrice = $_POST['sellingPrice'];

    // Prepare the SQL statement
    $sql = "INSERT INTO inventory (item_name, category, brand, quantity, unit_buying_price, unit_price) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssidd", $itemName, $category, $brandName, $itemQty, $buyingPrice, $sellingPrice);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Item added successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error adding item"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error preparing statement"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>