<?php
    include '../../config/dbconnection.php';

    if (isset($_POST['service_record_id'])) {
        $service_record_id = $_POST['service_record_id'];

        // Prepare the SQL query to fetch the details of the service record
        $stmt = $conn->prepare("SELECT s.service_record_id, s.date, s.time, v.category, v.license_no, o.fname, o.lname, s.description 
                                FROM vehicle v, servicerecord s, officer o 
                                WHERE s.vehicle_id = v.vehicle_id 
                                AND s.officer_id = o.officer_id 
                                AND s.service_record_id = ?");
        $stmt->bind_param("i", $service_record_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $serviceRecord = $result->fetch_assoc();
            echo json_encode($serviceRecord);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No record found']);
        }
    }
?>