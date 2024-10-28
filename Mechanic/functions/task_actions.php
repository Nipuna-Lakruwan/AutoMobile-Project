<?php
session_start();
include('../../config/dbconnection.php');

if (isset($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];
    $query = "SELECT a.status, ap.message FROM activities a JOIN appointment ap ON a.app_id = ap.app_id WHERE a.activity_id = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if activity was found
    if ($result->num_rows > 0) {
        $activity = $result->fetch_assoc();

        $response = [
            'activity_id' => $activity_id ?? '',
            'message' => $activity['message'] ?? '',
            'status' => $activity['status'] ?? ''
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Activity not found']);
    }
}

mysqli_close($conn);
?>
