<?php
    session_start();
    include '../../config/dbconnection.php';

    $officer_id = $_SESSION['auth_user']['userId'];
    header('Content-Type: application/json');
    $query = "SELECT ap.app_date, ap.app_time, a.activity_type FROM activities a JOIN appointment ap ON a.app_id = ap.app_id WHERE ap.officer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $officer_id);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $appointments = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
        }
        echo json_encode($appointments);
    } else {
        error_log("Failed to execute SQL query: " . $conn->error);
        echo json_encode(["error" => "Failed to retrieve appointments"]);
    }
?>