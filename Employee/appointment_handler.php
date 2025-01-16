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

// Search for vehicles (live suggestions)
function searchVehicle($conn)
{
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT vehicle_id, company, model, license_no FROM vehicle WHERE company LIKE ? OR model LIKE ? OR license_no LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("sss", $likeTerm, $likeTerm, $likeTerm);
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
    $sql = "SELECT * FROM vehicle WHERE vehicle_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vehicleId);
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicle = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $vehicle]);
}

// Place an appointment
function placeAppointment($conn)
{
    $customerId = $_POST['customerId'];
    $vehicleId = $_POST['vehicleId'];
    $appDate = $_POST['appDate'];
    $appTime = $_POST['appTime'];
    $description = $_POST['description'];

    $sql = "INSERT INTO appointment (cus_id, vehicle_id, app_date, app_time, message, status) 
            VALUES (?, ?, ?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $customerId, $vehicleId, $appDate, $appTime, $description);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Appointment placed successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error placing appointment: " . $conn->error]);
    }
}

// Add a new customer
function addCustomer($conn)
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO customer (fname, lname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $mobile, $password);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Customer added successfully", "customerId" => $stmt->insert_id]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding customer: " . $conn->error]);
    }
}

// Add a new vehicle
function addVehicle($conn)
{
    $company = $_POST['company'];
    $model = $_POST['model'];
    $manufacturedYear = $_POST['manufacturedYear'];
    $category = $_POST['category'];
    $licensePlateNo = $_POST['licensePlateNo'];
    $engineNo = $_POST['engineNo'];
    $chassisNo = $_POST['chassisNo'];
    $customerId = $_POST['customerId'];

    $sql = "INSERT INTO vehicle (company, model, year, category, license_no, engine_no, chasis_no, cus_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $company, $model, $manufacturedYear, $category, $licensePlateNo, $engineNo, $chassisNo, $customerId);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Vehicle added successfully", "vehicleId" => $stmt->insert_id]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding vehicle: " . $conn->error]);
    }
}
?>