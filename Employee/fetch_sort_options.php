<?php
include '../config/dbconnection.php';

// Fetch vehicle types
$vehicleTypes = [];
$vehicleTypeQuery = "SELECT DISTINCT category FROM vehicle";
$vehicleTypeResult = $conn->query($vehicleTypeQuery);
while ($row = $vehicleTypeResult->fetch_assoc()) {
    $vehicleTypes[] = $row['category'];
}

// Fetch mechanics
$mechanics = [];
$mechanicQuery = "SELECT CONCAT(fname, ' ', lname) as name FROM officer WHERE role = 'mechanic'";
$mechanicResult = $conn->query($mechanicQuery);
while ($row = $mechanicResult->fetch_assoc()) {
    $mechanics[] = $row['name'];
}

echo json_encode([
    "vehicleTypes" => $vehicleTypes,
    "mechanics" => $mechanics
]);
?>