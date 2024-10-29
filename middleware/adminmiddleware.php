<?php
    session_start();

    if(isset($_SESSION['auth'])){
        if($_SESSION['auth_user']['role'] == 'admin'){
            $_SESSION['message'] = 'Welcome to Admin Dashboard';
            header('Location: /AutoMobile Project/admin/dashboard.php');
            exit();
        } elseif ($_SESSION['auth_user']['role'] == 'employee') {
            $_SESSION['message'] = 'Welcome to Employee Dashboard';
            header('Location: /Employee/index.php');
            exit();
        } elseif ($_SESSION['auth_user']['role'] == 'mechanic') {
            $_SESSION['message'] = 'Welcome to Mechanic Dashboard';
            header('Location: /AutoMobile Project/Mechanic/appointment.php');
            exit();
        } else {
            $_SESSION['message'] = 'You are not authorized to access this page';
            header('Location: /AutoMobile Project/User/vehicle.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Login to access this page';
        header('Location: /AutoMobile Project/login.php');
        exit();
    }

?>