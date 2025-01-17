<?php
include '../config/dbconnection.php';

// Determine the action from the AJAX request
$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'search_customer':
        searchCustomer($conn);
        break;
    case 'get_customer_details':
        getCustomerDetails($conn);
        break;
    case 'search_vehicle':
        searchVehicle($conn);
        break;
    case 'get_vehicle_details':
        getVehicleDetails($conn);
        break;
    case 'place_appointment':
        placeAppointment($conn);
        break;
    case 'add_customer':
        addCustomer($conn);
        break;
    case 'add_vehicle':
        addVehicle($conn);
        break;
    case 'edit_appointment':
        editAppointment($conn);
        break;
    case 'cancel_appointment':
        cancelAppointment($conn);
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Invalid action"]);
}

// Search for customers (live suggestions)
function searchCustomer($conn)
{
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT cus_Id, fname, lname FROM customer WHERE fname LIKE ? OR lname LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $customers = [];
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $customers]);
}

// Get customer details by ID
function getCustomerDetails($conn)
{
    $customerId = $_POST['customerId'];
    $sql = "SELECT * FROM customer WHERE cus_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $customer]);
}

// Search for vehicles
function searchVehicle($conn)
{
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT vehicle_id, company, model, license_no FROM vehicle WHERE license_no LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("s", $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicles = [];
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $vehicles]);
}

// Get vehicle details by ID
function getVehicleDetails($conn)
{
    $vehicleId = $_POST['vehicleId'];
    $sql = "SELECT v.*, c.fname, c.lname, a.app_date, a.message as description 
            FROM vehicle v 
            JOIN customer c ON v.cus_id = c.cus_Id 
            JOIN appointment a ON v.vehicle_id = a.vehicle_id 
            WHERE v.vehicle_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vehicleId);
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicle = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $vehicle]);
}

// Edit an appointment
function editAppointment($conn)
{
    $vehicleId = $_POST['vehicleId'];
    $appDate = $_POST['appDate'];
    $description = $_POST['description'];

    $sql = "UPDATE appointment SET app_date = ?, message = ? WHERE vehicle_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $appDate, $description, $vehicleId);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Appointment updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating appointment: " . $conn->error]);
    }
}

// Cancel an appointment
function cancelAppointment($conn)
{
    $vehicleId = $_POST['vehicleId'];

    $sql = "UPDATE appointment SET status = 'Cancelled' WHERE vehicle_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vehicleId);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Appointment cancelled successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error cancelling appointment: " . $conn->error]);
    }
}
?>