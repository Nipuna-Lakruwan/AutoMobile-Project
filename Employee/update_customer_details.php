<?php
include '../config/dbconnection.php';

$customerId = isset($_POST['customerId']) ? $_POST['customerId'] : '';
$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$address_no = isset($_POST['address_no']) ? $_POST['address_no'] : '';
$street = isset($_POST['street']) ? $_POST['street'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$district = isset($_POST['district']) ? $_POST['district'] : '';
$zip_code = isset($_POST['zip_code']) ? $_POST['zip_code'] : '';

if ($customerId && $fname && $lname && $email && $phone && $address_no && $street && $city && $district && $zip_code) {
    $sql = "UPDATE customer SET fname = ?, lname = ?, email = ?, phone = ?, address_no = ?, street = ?, city = ?, district = ?, zip_code = ? WHERE cus_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $fname, $lname, $email, $phone, $address_no, $street, $city, $district, $zip_code, $customerId);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Customer information updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating customer information"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
}
?>