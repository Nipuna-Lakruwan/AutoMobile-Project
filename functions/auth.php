<?php

    session_start();
    include('../config/dbconnection.php');

    if(isset($_POST['register_btn'])) {

        $fname = mysqli_real_escape_string($conn,$_POST['F_name']);
        $lname = mysqli_real_escape_string($conn,$_POST['L_name']);
        $email = mysqli_real_escape_string($conn,$_POST['Email']);
        $password = mysqli_real_escape_string($conn,$_POST['Password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['Re-Password']);

        $check_email_query = "SELECT * FROM customer WHERE email = '$email'";
        $check_email_query_run = mysqli_query($conn,$check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0){
            $_SESSION['message'] = "Email already exists";
            header("location: ../login.php");
        } else {
            if($password==$cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $insert_query = "INSERT INTO customer(fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
                $insert_quert_run = mysqli_query($conn,$insert_query);

                if($insert_quert_run){
                    $_SESSION['message'] = "You are now registered";
                    $_SESSION['name'] = $fname;
                    header("location: ../login.php");
                }
                else {
                    $_SESSION['message'] = "Database error";
                    header("location: ../login.php");
                }
    
            } else {
                $_SESSION['message'] = "Passwords does not match";
                header("location: ../login.php");
            }
        }   
    } else if(isset($_POST['login_btn'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $login_query = "SELECT * FROM customer WHERE email='$email'";
        $login_query_run = mysqli_query($conn, $login_query);

        // Check in admin table
        $admin_login_query = "SELECT * FROM officer WHERE email='$email'";
        $admin_login_query_run = mysqli_query($conn, $admin_login_query);

        if (mysqli_num_rows($admin_login_query_run) > 0) {
    
            $admin_data = mysqli_fetch_array($admin_login_query_run);
            $hashed_password = $admin_data['password']; // Hashed password from DB
        
            if (password_verify($password, $hashed_password)) {
                $_SESSION['auth'] = true;

                $first_name = $admin_data['fname'];
                $last_name = $admin_data['lname'];
                $full_name = $first_name . ' ' . $last_name;
                $email = $admin_data['email'];
                $profile_pic = $admin_data['profile_pic'];
                $adminId = $admin_data['officer_id'];
                $role = $admin_data['role'];
                $position = $admin_data['position'];
            
                if (empty($profile_pic)) {
                    $profile_pic = "/AutoMobile Project/admin/assets/img/profile_pics/default.jpg";
                } else {
                    $profile_pic = "/AutoMobile Project/admin/assets/img/profile_pics/" . $profile_pic;
                }
            
                $_SESSION['auth_user'] = [
                    'name' => $full_name,
                    'fname' => $first_name,
                    'lname' => $last_name,
                    'email' => $email,
                    'profile_pic' => $profile_pic,
                    'userId' => $adminId,
                    'role' => $role,
                    'position' => $position
                ];

                $_SESSION['message'] = "Admin Logged In Successfully";
                header('Location: ../admin/index.php');
            } else {
                $_SESSION['message'] = "Invalid Credentials";
                header('Location: ../login.php');
            }
    
        } elseif(mysqli_num_rows($login_query_run) > 0) {
            
            $userdata = mysqli_fetch_array($login_query_run);
            $hashed_password = $userdata['password']; // Hashed password from DB

            if (password_verify($password, $hashed_password)) {
                $_SESSION['auth'] = true;

                $first_name = $userdata['fname'];
                $last_name = $userdata['lname'];  // Fetching last name
                $full_name = $first_name . ' ' . $last_name;
                $email = $userdata['email'];
                $profile_pic = $userdata['profile_pic'];
                $membership_status = $userdata['membership'];
                $userId = $userdata['cus_Id'];
                $role = 'User';

                if (empty($profile_pic)) {
                    $profile_pic = "/AutoMobile Project/User/assets/img/profile_pics/default.jpg"; // Default profile picture path
                } else {
                    $profile_pic = "/AutoMobile Project/User/assets/img/profile_pics/" . $profile_pic;
                }

                if (empty($membership_status)) {
                    $membership_status = "Basic Member"; // Default Name
                } else {
                    $membership_status = $membership_status . " Member";
                }

                $_SESSION['auth_user'] = [
                    'name' => $full_name,
                    'fname' => $first_name,
                    'lname' => $last_name,
                    'email' => $email,
                    'profile_pic' => $profile_pic,
                    'membership' => $membership_status,
                    'userId' => $userId,
                    'role' => $role
                ];

                $_SESSION['message'] = "Logged In Successfully";
                header('Location: ../User/vehicle.php');
            } else {
                $_SESSION['message'] = "Invalid Credentials";
                header('Location: ../login.php');
            }

        } else {
            $_SESSION['message'] = "Account does not exist";
            header('Location: ../login.php');
        }
    }
?>