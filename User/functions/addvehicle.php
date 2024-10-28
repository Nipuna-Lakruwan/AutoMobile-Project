<?php
    session_start();
    include('../../config/dbconnection.php');

    // Add Vehicle Functionality
    if(isset($_POST['add_vehicle'])) {

        $company = mysqli_real_escape_string($conn, $_POST['company']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $manufacturedYear = mysqli_real_escape_string($conn, $_POST['manufacturedYear']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $licensePlateNo = mysqli_real_escape_string($conn, $_POST['licensePlateNo']);
        $engineNo = mysqli_real_escape_string($conn, $_POST['engineNo']);
        $chassisNo = mysqli_real_escape_string($conn, $_POST['chassisNo']);
        $userId = $_SESSION['auth_user']['userId'];

        $insert_query = "INSERT INTO vehicle (company, model, year, category, license_no, engine_no, chasis_no, cus_id)
                        VALUES ('$company', '$model', '$manufacturedYear', '$category', '$licensePlateNo', '$engineNo', '$chassisNo', '$userId')";
        $insert_quert_run = mysqli_query($conn,$insert_query);

        if($insert_quert_run){
            $_SESSION['message'] = "Vehicle Added Successfully";
            header("location: ../vehicle.php");
        }
        else {
            $_SESSION['message'] = "Database error";
            header("location: ../vehicle.php");
        }  
    }

    // Edit Vehicle Data Loading Functionality
    if (isset($_POST['vehicle_id'])) {
        $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);

        // Query to get vehicle details
        $query = "SELECT company, model, year, category, license_no, engine_no, chasis_no FROM vehicle WHERE vehicle_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $vehicle_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $vehicleData = $result->fetch_assoc();
            echo json_encode($vehicleData);
        } else {
            echo json_encode([]);
        }
    }

    // Edit Vehicle Functionality
    if (isset($_POST['edit_vehicle'])) {
        // Get the form data
        $vehicle_id = mysqli_real_escape_string($conn, $_POST['selectVehicle']);
        $company = mysqli_real_escape_string($conn, $_POST['editCompany']);
        $model = mysqli_real_escape_string($conn, $_POST['editModel']);
        $year = mysqli_real_escape_string($conn, $_POST['editManufacturedYear']);
        $category = mysqli_real_escape_string($conn, $_POST['editCategory']);
        $license_no = mysqli_real_escape_string($conn, $_POST['editLicensePlateNo']);
        $engine_no = mysqli_real_escape_string($conn, $_POST['editEngineNo']);
        $chasis_no = mysqli_real_escape_string($conn, $_POST['editChassisNo']);
        
        // Validation
        if (!empty($vehicle_id) && !empty($company) && !empty($model) && !empty($year) &&
            !empty($category) && !empty($license_no) && !empty($engine_no) && !empty($chasis_no)) {
            
            // Prepare the update query
            $sql = "UPDATE vehicle SET 
                        company = '$company',
                        model = '$model',
                        year = '$year',
                        category = '$category',
                        license_no = '$license_no',
                        engine_no = '$engine_no',
                        chasis_no = '$chasis_no'
                    WHERE vehicle_id = '$vehicle_id'";
            
            // Execute the query
            if (mysqli_query($conn, $sql)) {
                // Store success message in session and redirect
                $_SESSION['message'] = "Vehicle updated successfully!";
                header("Location: ../vehicle.php");
                exit();
            } else {
                // Store error message in session and redirect
                $_SESSION['message'] = "Error updating vehicle: " . mysqli_error($conn);
                header("Location: ../vehicle.php");
                exit();
            }
        } else {
            // Store validation error message in session and redirect
            $_SESSION['message'] = "All fields are required!";
            header("Location: ../vehicle.php");
            exit();
        }
    }
    
    // Close the database connection
    mysqli_close($conn);

?>