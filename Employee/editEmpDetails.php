<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/customers2.css">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('employeeInfo.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Employee</h1>
        <hr>
    </div>
</div>

<div class="profile-settings">

    <div class="profile-settings-container">

        <h2>Profile Settings</h2>

        <hr class="search-hr">
        <h2 class="cusName">MR. MALAKA PERERA</h2>
        <hr class="underline">
        <div class="form-group-cus">
            <div class="profile-pic">
                <img src="assets/img/default.jpg" alt="profile">
                <div class="label-pp">
                    Change Profile Picture
                </div>
            </div>

            <form>
                <div class="form-group-cus">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name">
                </div>
                <div class="form-group-cus">
                    <label for="lasr-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name">
                </div>
                <div class="form-group-cus">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form-group-cus">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone">
                </div>
            </form>

            <h2 class="pushright address"> Address </h2>

            <form>
                <div class="form-group-cus">
                    <label for="address">Street No.</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="form-group-cus">
                </div>
                <div class="form-group-cus">
                    <label for="StreetName">Street Name</label>
                    <input type="text" id="StreetName" name="StreetName">
                </div>
                <div class="form-group-cus">
                    <label for="state">City</label>
                    <input type="text" id="City" name="City">
                </div>
                <div class="form-group-cus">
                    <label for="District">District</label>
                    <input type="text" id="District" name="District">
                </div>
                <div class="form-group-cus">
                    <label for="PostalCode">Postal Code</label>
                    <input type="text" id="PostalCode" name="PostalCode">
                </div>
                <div class="form-group-cus">
                    <label for="Country">Psssword</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group-cus">
                    <button class="btn-reset" type="submit">Reset Password</button>
                </div>
                <div class="form-group-cus">
                    <button class="btn-save" type="submit">Save Changes</button>
                </div>
            </form>

            <br>
            <hr class="search-hr">

        </div>
    </div>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script src="/Automobile Project/Employee/assets/js/employee.js"></script>
</body>
</html>