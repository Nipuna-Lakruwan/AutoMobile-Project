<?php
include 'includes/header.php';
include 'includes/navbar.php';
include '../config/dbconnection.php';

$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

if ($employeeId) {
    $stmt = $conn->prepare("SELECT * FROM officer WHERE officer_id = ?");
    $stmt->bind_param("i", $employeeId);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
}
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/customers2.css">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('Employee.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Employees</h1>
        <hr>
    </div>
</div>

<div class="makeAppointments">
    <h2>Profile Settings</h2>
    <hr class="search-hr">
    <h2 class="cusName"><?php echo htmlspecialchars($employee['fname'] . ' ' . $employee['lname']); ?> (<?php echo htmlspecialchars($employee['role']); ?>)</h2>
    <hr class="underline">

    <form>
        <div class="form-group-cus">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($employee['fname']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($employee['lname']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($employee['phone']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($employee['type']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="position">Position</label>
            <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($employee['position']); ?>" readonly>
        </div>
    </form>

    <h2 class="pushright address"> Address </h2>
    <form>
        <div class="form-group-cus">
            <label for="address">Street No.</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($employee['address_no']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="StreetName">Street Name</label>
            <input type="text" id="StreetName" name="StreetName" value="<?php echo htmlspecialchars($employee['street']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="City">City</label>
            <input type="text" id="City" name="City" value="<?php echo htmlspecialchars($employee['city']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="District">District</label>
            <input type="text" id="District" name="District" value="<?php echo htmlspecialchars($employee['district']); ?>" readonly>
        </div>
        <div class="form-group-cus">
            <label for="PostalCode">Postal Code</label>
            <input type="text" id="PostalCode" name="PostalCode" value="<?php echo htmlspecialchars($employee['zip_code']); ?>" readonly>
        </div>
    </form>

    <h2> Additional Information </h2>
    <h4>Profile Picture</h4>
    <form>
        <div class="form-group-cus">
            <div class="profile-pic">
                <img src="/AutoMobile Project/Employee/assets/img/profile_pics/<?php echo htmlspecialchars($employee['profile_pic']); ?>" alt="profile">
            </div>
        </div>
    </form>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
</body>
</html>