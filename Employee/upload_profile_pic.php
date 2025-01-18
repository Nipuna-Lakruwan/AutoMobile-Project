<?php
include '../config/dbconnection.php';

$customerId = isset($_POST['customerId']) ? $_POST['customerId'] : '';
if (isset($_FILES['newProfilePic']) && $customerId) {
    $file = $_FILES['newProfilePic'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowed) && $fileSize < 5000000) {
        $fileNewName = uniqid('', true) . "." . $fileExt;
        $fileDestination = "../assets/img/profile_pics/" . $fileNewName;
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            $sql = "UPDATE customer SET profile_pic = ? WHERE cus_Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $fileNewName, $customerId);
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "fileName" => $fileNewName]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error updating profile picture in database"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Error moving uploaded file"]);
        }
    } else {
        $errorMessage = $fileSize >= 5000000 ? "File size exceeds limit" : "Invalid file type";
        echo json_encode(["status" => "error", "message" => $errorMessage]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No file uploaded or customer ID missing"]);
}
?>