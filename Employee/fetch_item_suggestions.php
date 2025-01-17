<?php
include '../config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchTerm = $_POST['searchTerm'];
    $field = $_POST['field'];

    // Prepare the SQL statement
    $sql = "SELECT DISTINCT $field FROM inventory WHERE $field LIKE ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $likeTerm = "%$searchTerm%";
        $stmt->bind_param("s", $likeTerm);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $suggestions = [];
            while ($row = $result->fetch_assoc()) {
                $suggestions[] = $row[$field];
            }
            echo json_encode(["status" => "success", "data" => $suggestions]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error executing query: " . $stmt->error]);
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