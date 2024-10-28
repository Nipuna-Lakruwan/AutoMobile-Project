<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Check if the user is logged in
if (!isset($_SESSION['auth'])) {
    // If the user is not authenticated, redirect them to the login page
    header('Location: /AutoMobile Project/login.php');
    exit(); // Make sure to stop further script execution
}
?>
