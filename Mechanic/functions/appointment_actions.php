<?php
    session_start();
    include '../../config/dbconnection.php';

    if (isset($_POST['app_id'])) {
        $app_id = $_POST['app_id'];

        $stmt = $conn->prepare("SELECT a.app_id, a.app_date, a.app_time, a.message, v.license_no, v.category FROM appointment a JOIN vehicle v ON a.vehicle_id = v.vehicle_id WHERE a.status = 'Pending' AND a.app_id = ? ;");
        $stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $appointments = $result->fetch_assoc();
            echo json_encode($appointments);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No record found']);
        }
    }

    if (isset($_POST['btn_accept'])) {
        $app_id = $_POST['btn_accept'];

        $officerId = $_SESSION['auth_user']['userId'];

        $stmt = $conn->prepare("UPDATE appointment SET status = 'Confirmed', officer_id = ? WHERE app_id = ?;");
        $stmt->bind_param("ii", $officerId, $app_id);
        $stmt->execute();

        header ('Location: ../appointment.php');
    }
?>