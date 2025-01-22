<?php
include 'includes/header.php';
include 'includes/navbar.php';
include '../config/dbconnection.php';
include '../functions/alert.php';

$employee_id = $_SESSION['auth_user']['userId'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM officer WHERE officer_id = ?");
$stmt->bind_param("i", $employee_id); // Assuming officer_id is an integer
$stmt->execute(); // Execute the statement
$query_run = $stmt->get_result(); // Get the result
$user = mysqli_fetch_assoc($query_run);
?>
<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/profile.css">
<!-- Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('home.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Profile Settings</h1>
        <hr>
    </div>
</div>

<div class="col-md-9 flex-grow-1 p-3">
    <div class="text-center">
        <div class="profile-container">
            <h1>PROFILE SETTINGS</h1>
            <hr class="divider">
            <form action="functions/update_profile.php" method="POST" class="profile-form" enctype="multipart/form-data">
                <div class="profile-picture-section">
                    <div class="wrapper" id="wrapper" style="background: url('<?php echo $_SESSION['auth_user']['profile_pic']; ?>'); background-size: cover;">
                        <input type="file" class="my_file" id="fileInput" name="profile_pic" accept="image/*">
                    </div>
                    <p>Change Profile Picture</p>
                </div>
                <div class="form-group">
                    <div class="left-half">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" value="<?php echo htmlspecialchars($user['fname']); ?>" placeholder="First Name">
                    </div>
                    <div class="right-half">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" value="<?php echo htmlspecialchars($user['lname']); ?>" placeholder="Last Name">
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="left-half">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="example@gmail.com">
                    </div>

                    <div class="right-half">
                        <label for="phone">Phone No</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" placeholder="Phone No">
                    </div>
                </div><br>

                <h2>Address</h2><br>
                
                <div class="form-group">
                    <div class="left-half">
                        <label for="no">No.</label>
                        <input type="text" id="no" name="address_no" value="<?php echo htmlspecialchars($user['address_no']); ?>" placeholder="Address Number">
                    </div>
                    <div class="right-half">
                        <label for="street-name">Street</label>
                        <input type="text" id="street-name" name="street_name" value="<?php echo htmlspecialchars($user['street']); ?>" placeholder="Street Name">
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="left-half">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" placeholder="City">
                    </div>
                    <div class="right-half">
                        <label for="district">District</label>
                        <input type="text" id="district" name="district" value="<?php echo htmlspecialchars($user['district']); ?>" placeholder="District">
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="left-half">
                        <label for="zip-code">Zip Code</label>
                        <input type="text" id="zip-code" name="zip_code" value="<?php echo htmlspecialchars($user['zip_code']); ?>" placeholder="Zip Code">
                    </div>
                </div><br>

                <div class="form-group-center password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password">
                    <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                </div>
                <button type="submit" class="edit-btn" name="updateBtn">Update</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal for cropping the profile picture -->
<div id="crop-modal" class="crop-modal" style="display: none;">
    <div class="crop-modal-content">
        <div class="modal-body">
            <img id="image-to-crop" src="" alt="Selected Image" style="max-width: 100%; display: block;">
        </div>
        <div class="modal-footer">
            <button id="crop-cancel" class="btn btn-danger">Cancel</button>
            <button id="crop-save" class="btn btn-success">Save</button>
        </div>
    </div>
</div>

<script src="/AutoMobile Project/Employee/assets/js/index.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/profile.js"></script>
<!-- Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
</body>
</html>