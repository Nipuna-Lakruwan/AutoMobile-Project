<?php
include '../config/dbconnection.php';

// Determine the action from the AJAX request
$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'search_item':
        searchItem($conn);
        break;
    case 'get_item_details':
        getItemDetails($conn);
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Invalid action"]);
}

// Search for items (live suggestions)
function searchItem($conn)
{
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT item_id, item_name FROM inventory WHERE item_name LIKE ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        echo json_encode(["status" => "error", "message" => "Database error"]);
        return;
    }
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("s", $likeTerm);
    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(["status" => "error", "message" => "Database error"]);
        return;
    }
    $result = $stmt->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $items]);
}

// Get item details by ID
function getItemDetails($conn)
{
    $itemId = $_POST['itemId'];
    $sql = "SELECT item_id, item_name, unit_price FROM inventory WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        echo json_encode(["status" => "error", "message" => "Database error"]);
        return;
    }
    $stmt->bind_param("i", $itemId);
    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(["status" => "error", "message" => "Database error"]);
        return;
    }
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $item]);
}
?>