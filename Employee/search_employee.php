<?php
include '../config/dbconnection.php';

$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

$sql = "SELECT officer_id, fname, lname, email, phone, profile_pic, type, role, position, address_no, street, city, district, zip_code FROM officer 
        WHERE fname LIKE ? OR lname LIKE ? OR email LIKE ? OR phone LIKE ?";
$stmt = $conn->prepare($sql);
$likeTerm = "%$searchQuery%";
$stmt->bind_param("ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
$stmt->execute();
$result = $stmt->get_result();

$employees = [];
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

echo json_encode(["status" => "success", "data" => $employees]);
?>