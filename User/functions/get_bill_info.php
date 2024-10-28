<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../../config/dbconnection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bill_no = $_POST['invoice_id'];

    // Fetch customer details and bill info
    $billQuery = "
    SELECT i.invoice_id, c.cus_id, CONCAT(c.fname, ' ', c.lname) AS customer_name, v.license_no, i.date, i.amount
    FROM invoice i
    JOIN servicerecord s ON i.service_id = s.service_record_id
    JOIN vehicle v ON s.vehicle_id = v.vehicle_id
    JOIN customer c ON i.cus_id = c.cus_Id
    WHERE i.invoice_id = ?";

    $stmt = $conn->prepare($billQuery);
    $stmt->bind_param('i', $bill_no);
    $stmt->execute();
    $billResult = $stmt->get_result()->fetch_assoc();

    // Fetch bill charges
    $chargesQuery = "SELECT description, amount FROM billdetail WHERE invoice_no = ?";
    $stmt = $conn->prepare($chargesQuery);
    $stmt->bind_param('i', $bill_no);
    $stmt->execute();
    $chargesResult = $stmt->get_result();
    
    $charges = [];
    while ($charge = $chargesResult->fetch_assoc()) {
        $charges[] = $charge;
    }

    echo json_encode([
        'customerNo' => $billResult['cus_id'],
        'customerName' => $billResult['customer_name'],
        'billNo' => $billResult['invoice_id'],
        'licensePlateNo' => $billResult['license_no'],
        'billingDate' => $billResult['date'],
        'total' => $billResult['amount'],
        'charges' => $charges
    ]);
}

?>
