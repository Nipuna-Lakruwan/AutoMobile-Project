<?php
session_start();
include('../../config/dbconnection.php');

$user_id = $_SESSION['auth_user']['userId'];

// Check the action type from the request
$action = $_REQUEST['action'] ?? null;

switch ($action) {
    case 'fetch':
        fetchNotifications($user_id);
        break;

    case 'mark_all_read':
        markAllAsRead($user_id);
        break;

    case 'delete_read':
        deleteReadMessages($user_id);
        break;

    case 'mark_as_read':
        $notification_id = $_REQUEST['id'] ?? null;
        if ($notification_id) {
            markAsRead($notification_id);
        } else {
            echo json_encode(['success' => false, 'error' => 'Notification ID is missing']);
        }
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
}

function fetchNotifications($user_id) {
    global $conn;
    
    $sql = "SELECT notify_id, date, description,status,delete_status FROM notification WHERE officer_id = ? AND delete_status != 1 ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $notifications = array();
    while($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }

    echo json_encode($notifications);
}

function markAllAsRead($user_id) {
    global $conn;

    $sql = "UPDATE notification SET status = 1 WHERE officer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

function deleteReadMessages($user_id) {
    global $conn;

    $sql = "UPDATE notification SET delete_status = 1 WHERE officer_id = ? AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

// Function to mark a specific notification as read
function markAsRead($notification_id) {
    global $conn;

    // Log the received notification ID for debugging
    error_log("Received notification ID: " . $notification_id);

    $sql = "UPDATE notification SET status = 1 WHERE notify_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $notification_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>