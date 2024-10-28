<?php
    session_start();
    include('../../config/dbconnection.php');


    if(isset($_POST['place_app'])) {
        $vehicle_id = $_POST['selectVehicle'];
        $appointment_date = $_POST['dateTime'];
        $message = $_POST['message'];
        $cus_id = $_SESSION['auth_user']['userId'];

        // Insert appointment into the database
        $insert_query = "INSERT INTO appointment (vehicle_id, app_date, app_time, status, message) VALUES ('$vehicle_id', DATE('$appointment_date'), TIME('$appointment_date'), 'Pending', '$message')";
        $insert_quert_run = mysqli_query($conn,$insert_query);

        if($insert_quert_run){
            $_SESSION['message'] = "Appointment Created Successfully";
            header("location: ../appointment.php");
        }
        else {
            $_SESSION['message'] = "Database error";
            header("location: ../appointment.php");
        }
    }

    if(isset($_POST['app_id'])) {
        $appointment_id = $_POST['app_id'];

        // Update the appointment status
        $query = "UPDATE appointment SET status = 'Cancelled' WHERE app_id = '$appointment_id'";
        
        if ($conn->query($query)) {
            echo "Appointment canceled!";
            header("location: ../appointment.php");
        } else {
            echo "Error: " . $conn->error;
            header("location: ../appointment.php");
        }
    }

?>