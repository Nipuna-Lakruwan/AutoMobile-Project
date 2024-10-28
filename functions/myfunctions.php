<?php
    function redirect($location, $message) {
        $_SESSION['message'] = $message;
        header("Location: $location");
        exit();
    }
?>