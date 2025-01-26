<?php
include '../config/dbconnection.php';

$date = isset($_POST['date']) ? $_POST['date'] : '';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

$sql = "SELECT a.app_id, a.app_date, a.app_time, a.status, a.activity_type, a.message, o.fname, o.lname, v.license_no, v.model 
        FROM appointment a 
        LEFT JOIN officer o ON a.officer_id = o.officer_id 
        JOIN vehicle v ON a.vehicle_id = v.vehicle_id 
        WHERE 1=1";

$params = [];
$types = '';

if (!empty($date)) {
    $sql .= " AND a.app_date = ?";
    $params[] = $date;
    $types .= 's';
}

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND a.app_date BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;
    $types .= 'ss';
}

if (!empty($searchQuery)) {
    $sql .= " AND (o.fname LIKE ? OR o.lname LIKE ?)";
    $likeTerm = "%$searchQuery%";
    $params[] = $likeTerm;
    $params[] = $likeTerm;
    $types .= 'ss';
}

$stmt = $conn->prepare($sql);
if ($types) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$appointments = [];
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode(["status" => "success", "data" => $appointments, "appointments" => array_column($appointments, 'app_date')]);
?>