<?php
session_start();
include('../../config/dbconnection.php');

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
    $employeeId = $_SESSION['auth_user']['userId'];
    $profilePic = $_SESSION['auth_user']['profile_pic'];

    // Initialize the update fields
    $updateFields = "fname = '$firstName', lname = '$lastName', email = '$email', phone = '$phone', address_no = '$addressNo', street = '$street', city = '$city', district = '$district', zip_code = '$zipCode'";

    // Check if the user uploaded a profile picture
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $file = $_FILES['profile_pic'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowed) && $fileSize < 5000000) {
            $fileNewName = uniqid('', true) . "." . $fileExt;
            $fileDestination = "../../assets/img/profile_pics/" . $fileNewName;

            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $updateFields .= ", profile_pic = '$fileNewName'";
                $_SESSION['auth_user']['profile_pic'] = "/AutoMobile Project/Employee/assets/img/profile_pics/" . $fileNewName;
            } else {
                $_SESSION['message'] = "Error uploading file.";
                header('Location: ../profile.php');
                exit();
            }
        } else {
            $_SESSION['message'] = "Invalid file type or file size too large.";
            header('Location: ../profile.php');
            exit();
        }
    }

    // Check if the password is provided and hash it
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateFields .= ", password = '$hashedPassword'";
    }

    // Update the database
    $updateQuery = "UPDATE officer SET $updateFields WHERE officer_id = $employeeId";
    if (mysqli_query($conn, $updateQuery)) {
        $_SESSION['message'] = "Profile updated successfully.";
    } else {
        $_SESSION['message'] = "Database error. Could not update profile.";
    }

    // Update session variables
    $_SESSION['auth_user']['fname'] = $firstName;
    $_SESSION['auth_user']['lname'] = $lastName;
    $_SESSION['auth_user']['email'] = $email;
    $_SESSION['auth_user']['phone'] = $phone;
    $_SESSION['auth_user']['address_no'] = $addressNo;
    $_SESSION['auth_user']['street'] = $street;
    $_SESSION['auth_user']['city'] = $city;
    $_SESSION['auth_user']['district'] = $district;
    $_SESSION['auth_user']['zip_code'] = $zipCode;

    header('Location: ../profile.php');
    exit();
} else {
    $_SESSION['message'] = "No form submitted.";
    header('Location: ../profile.php');
    exit();
}
?>