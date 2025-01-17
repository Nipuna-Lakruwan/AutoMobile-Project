<?php
include '../config/dbconnection.php';

$searchQuery = $conn->real_escape_string($_POST['searchQuery']);

$sqlSearch = "SELECT * FROM customer 
              WHERE fname LIKE '%$searchQuery%' 
                 OR lname LIKE '%$searchQuery%' 
                 OR email LIKE '%$searchQuery%' 
                 OR phone LIKE '%$searchQuery%'";

$result = $conn->query($sqlSearch);

$searchResults = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}

echo json_encode($searchResults);
?>