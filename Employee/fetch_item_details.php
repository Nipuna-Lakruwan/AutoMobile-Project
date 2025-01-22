<?php
include '../config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['itemName'];
    $brandName = $_POST['brandName'];

    // Prepare the SQL statement
    $sql = "SELECT item_id, category, quantity, unit_buying_price, unit_price FROM inventory WHERE item_name = ? AND brand = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $itemName, $brandName);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $itemDetails = $result->fetch_assoc();
                echo json_encode(["status" => "success", "data" => $itemDetails]);
            } else {
                echo json_encode(["status" => "error", "message" => "No item found"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Error executing query: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>