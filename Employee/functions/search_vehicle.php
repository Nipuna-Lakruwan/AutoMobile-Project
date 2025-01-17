<?php
include '../config/dbconnection.php';

$query = $_POST['query'];
$sql = "SELECT * FROM vehicles WHERE company LIKE ? OR model LIKE ? OR license_plate_no LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$query%";
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div>" . $row['company'] . " " . $row['model'] . "</div>";
}
?>