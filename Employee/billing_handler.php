<?php
include '../config/dbconnection.php';

$action = $_POST['action'];

if ($action == 'search_item') {
    $searchTerm = $_POST['searchTerm'];
    $query = "SELECT * FROM inventory WHERE item_name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);
    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $items]);
} elseif ($action == 'get_item_details') {
    $itemId = $_POST['itemId'];
    $query = "SELECT * FROM inventory WHERE item_id = $itemId";
    $result = mysqli_query($conn, $query);
    $item = mysqli_fetch_assoc($result);
    echo json_encode(['status' => 'success', 'data' => $item]);
} elseif ($action == 'checkout') {
    $appId = $_POST['appId'];
    $summaryItems = $_POST['summaryItems'];

    // Process the billing and update the appointment status
    $query = "UPDATE appointment SET status = 'Completed' WHERE app_id = $appId";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update appointment status']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}
?>