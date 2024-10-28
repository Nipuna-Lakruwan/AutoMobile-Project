<?php
session_start();
include('../../config/dbconnection.php');

// Check if the user clicked the upload button
if (isset($_POST['updateBtn'])) {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addressNo = $_POST['address_no'];
    $street = $_POST['street_name'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $zipCode = $_POST['zip_code'];
    $password = $_POST['password'];
    $userId = $_SESSION['auth_user']['userId'];
    $profile_pic = $_SESSION['auth_user']['profile_pic'];

    // Initialize the update fields
    $updateFields = "fname = '$firstName', lname = '$lastName', email = '$email' , phone = '$phone', address_no = '$addressNo', street = '$street', city = '$city', district = '$district', zip_code = '$zipCode'";

    // Check if the user uploaded a profile picture
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $file = $_FILES['profile_pic'];
        
        // Get file properties
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        
        // Allowed file extensions
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file is valid
        if (in_array($fileExt, $allowed)) {
            if ($fileSize < 5000000) {
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/AutoMobile Project/admin/assets/img/profile_pics/" . $fileNewName;

                // Move uploaded file to the destination
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Add profile picture to the update fields
                    $updateFields .= ", profile_pic = '$fileNewName'";

                    // Update the session profile picture
                    $_SESSION['auth_user']['profile_pic'] = "/AutoMobile Project/admin/assets/img/profile_pics/" . $fileNewName;
                } else {
                    $_SESSION['message'] = "Error uploading file.";
                    header('Location: ../profile.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = "File is too large.";
                header('Location: ../profile.php');
                exit();
            }
        } else {
            $_SESSION['message'] = "Invalid file type.";
            header('Location: ../profile.php');
            exit();
        }
    }

    $_SESSION['auth_user']['fname'] = $firstName;
    $_SESSION['auth_user']['lname'] = $lastName;
    $_SESSION['auth_user']['name'] = $firstName . ' ' . $lastName;

    // Update database with all the details including the profile picture if uploaded
    $update_query = "UPDATE officer SET $updateFields WHERE officer_Id = $userId";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['message'] = "Profile updated successfully.";
    } else {
        $_SESSION['message'] = "Database error. Could not update profile.";
    }

    // Redirect after process completion
    header('Location: ../profile.php');
    exit();
} else {
    $_SESSION['message'] = "No form submitted.";
    header('Location: ../profile.php');
    exit();
}

/*
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addressNo = $_POST['address_no'];
    $street = $_POST['street_name'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $zipCode = $_POST['zip_code'];
    $password = $_POST['password'];
    $userId = $_SESSION['auth_user']['userId'];
    $profile_pic = $_SESSION['auth_user']['profile_pic'];

    // Initialize the update query parts
    $updateFields = "
    fname = '$firstName',
    lname = '$lastName',
    email = '$email',
    phone = '$phone',
    address_no = '$addressNo',
    street = '$street',
    city = '$city',
    district = '$district',
    zip_code = '$zipCode'";

    if (isset($_FILES['profile_pic'])) {
        // Get the file details
        $file = $_FILES['profile_pic'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Define allowed file types and max size
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxFileSize = 10 * 1024 * 1024; // 10 MB

        // Check file type and size
        if (in_array($file['type'], $allowedTypes) && $fileSize <= $maxFileSize) {
            // Create a unique name for the file and define the upload path
            $uniqueName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // Move the uploaded file to the desired location
            if (move_uploaded_file($fileTmp, $uniqueName)) {
                // Store the file path in the database
                $updateFields .= ", profile_pic = '$uniqueName' ";

                // Redirect or provide a success message
                header("Location: upload.php?success=1");
                exit();
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "Invalid file type or size exceeds limit.";
        }
    } else {
        echo "Error uploading the file.";
    }

    // Prepare the final SQL query
    $query = "UPDATE customer SET $updateFields WHERE cus_id = $userId";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true, 'message' => 'Profile updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Database update failed: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}*/

?>
