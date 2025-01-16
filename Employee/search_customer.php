<?php
include '../config/dbconnection.php';

$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

$sql = "SELECT cus_Id, fname, lname, email, phone FROM customer 
        WHERE fname LIKE ? OR lname LIKE ? OR email LIKE ? OR phone LIKE ?";
$stmt = $conn->prepare($sql);
$likeTerm = "%$searchQuery%";
$stmt->bind_param("ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
$stmt->execute();
$result = $stmt->get_result();

$customers = [];
while ($row = $result->fetch_assoc()) {
    $customers[] = $row;
}

echo json_encode(["status" => "success", "data" => $customers]);
?>