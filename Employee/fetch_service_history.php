<?php
include '../config/dbconnection.php';

$vehicleType = isset($_POST['vehicleType']) ? $_POST['vehicleType'] : '';
$mechanic = isset($_POST['mechanic']) ? $_POST['mechanic'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

$sql = "SELECT sr.service_record_id, v.license_no, v.category, CONCAT(o.fname, ' ', o.lname) as mechanic_name, c.cus_Id as cus_id, s.service_type, sr.date as service_date, sr.amount as total_price 
        FROM servicerecord sr 
        JOIN vehicle v ON sr.vehicle_id = v.vehicle_id 
        JOIN officer o ON sr.officer_id = o.officer_id 
        JOIN customer c ON v.cus_id = c.cus_Id 
        JOIN service s ON sr.service_id = s.service_id 
        WHERE 1=1";

$params = [];
$types = '';

if (!empty($vehicleType)) {
    $sql .= " AND v.category = ?";
    $params[] = $vehicleType;
    $types .= 's';
}

if (!empty($mechanic)) {
    $sql .= " AND CONCAT(o.fname, ' ', o.lname) = ?";
    $params[] = $mechanic;
    $types .= 's';
}

if (!empty($date)) {
    $sql .= " AND sr.date = ?";
    $params[] = $date;
    $types .= 's';
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$serviceHistory = [];

while ($row = $result->fetch_assoc()) {
    $serviceHistory[] = $row;
}

echo json_encode(["status" => "success", "data" => $serviceHistory]);
?>