<?php
include '../config/dbconnection.php';

$vehicleType = isset($_POST['vehicleType']) ? $_POST['vehicleType'] : '';
$mechanic = isset($_POST['mechanic']) ? $_POST['mechanic'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

$sql = "SELECT sr.service_record_id, v.license_no, v.category, m.name as mechanic_name, c.cus_id, s.service_type, sr.date as service_date, sr.amount as total_price 
        FROM servicerecord sr 
        JOIN vehicle v ON sr.vehicle_id = v.vehicle_id 
        JOIN mechanic m ON sr.officer_id = m.mechanic_id 
        JOIN customer c ON v.cus_id = c.cus_id 
        JOIN service s ON sr.service_id = s.service_id 
        WHERE 1=1";

if (!empty($vehicleType)) {
    $sql .= " AND v.category = ?";
}
if (!empty($mechanic)) {
    $sql .= " AND m.name = ?";
}
if (!empty($date)) {
    $sql .= " AND sr.date = ?";
}

$stmt = $conn->prepare($sql);

$bindTypes = '';
$bindValues = [];

if (!empty($vehicleType)) {
    $bindTypes .= 's';
    $bindValues[] = $vehicleType;
}
if (!empty($mechanic)) {
    $bindTypes .= 's';
    $bindValues[] = $mechanic;
}
if (!empty($date)) {
    $bindTypes .= 's';
    $bindValues[] = $date;
}

if (!empty($bindTypes)) {
    $stmt->bind_param($bindTypes, ...$bindValues);
}

$stmt->execute();
$result = $stmt->get_result();
$serviceHistory = [];

while ($row = $result->fetch_assoc()) {
    $serviceHistory[] = $row;
}

echo json_encode(["status" => "success", "data" => $serviceHistory]);
?>