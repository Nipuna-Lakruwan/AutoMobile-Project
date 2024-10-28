<?php
session_start();
include('../../config/dbconnection.php');

if (isset($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];
    $query = "SELECT a.activity_id, a.activity_type, a.status, a.start_time, ap.app_date, v.license_no FROM activities a JOIN appointment ap ON a.app_id = ap.app_id JOIN vehicle v ON ap.vehicle_id = v.vehicle_id WHERE a.activity_id = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if activity was found
    if ($result->num_rows > 0) {
        $activity = $result->fetch_assoc();

        $response = [
            'license_no' => $activity['license_no'] ?? '',
            'activity_type' => $activity['activity_type'] ?? '',
            'app_date' => $activity['app_date'] ?? '',
            'start_time' => $activity['start_time'] ?? '',
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
