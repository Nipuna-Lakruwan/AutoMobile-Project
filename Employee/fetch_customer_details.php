<?php
include '../config/dbconnection.php';

$customerId = isset($_GET['customerId']) ? $_GET['customerId'] : '';

if ($customerId) {
    $sql = "SELECT * FROM customer WHERE cus_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    // Fetch city data from the JavaScript file
    $cityData = file_get_contents('../assets/js/updated_city_data.js');
    $cityData = json_decode(str_replace('const cityData = ', '', rtrim($cityData, ';')), true);

    $city = $customer['city'];
    if (isset($cityData[$city])) {
        $customer['district'] = $cityData[$city]['district'];
        $customer['postalCode'] = $cityData[$city]['postalCode'];
        $customer['province'] = $cityData[$city]['province'];
    } else {
        $customer['district'] = '';
        $customer['postalCode'] = '';
        $customer['province'] = '';
    }

    echo json_encode(["status" => "success", "data" => $customer]);
} else {
    echo json_encode(["status" => "error", "message" => "Customer ID is required"]);
}
?>