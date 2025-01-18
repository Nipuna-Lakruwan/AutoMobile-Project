<?php
include '../config/dbconnection.php';

$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

// Prepare the SQL statement
$sql = "SELECT item_id, item_name, category, brand, quantity, unit_buying_price, unit_price 
        FROM inventory 
        WHERE item_name LIKE ? OR category LIKE ? OR brand LIKE ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("sss", $likeTerm, $likeTerm, $likeTerm);

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