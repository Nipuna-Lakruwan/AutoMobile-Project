<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section>
    <div class="container">
        <div class="item1" onclick="redirectTo('appointments.php')">
            <i class="fa-solid fa-calendar-days" style="font-size: 125px"></i>
            <p style="margin-top: 10px">Appointments</p>
        </div>

        <div class="item2" onclick="redirectTo('billingOptions.php')">
            <i class="fa-solid fa-file-invoice-dollar" style="font-size: 125px"></i>
            <p style="margin-top: 10px">Billing</p>
        </div>

        <div class="item1" onclick="redirectTo('ServiceHistory.php')">
            <i class="fa-solid fa-history" style="font-size: 125px"></i>
            <p style="margin-top: 10px">History</p>
        </div>

        <div class="item2" onclick="redirectTo('customer.php')">
            <i class="fa-solid fa-user" style="font-size: 125px"></i>
            <p style="margin-top: 10px">Customers</p>
        </div>

        <div class="item1" onclick="redirectTo('Employee.php')">
            <i class="fa-solid fa-id-card" style="font-size: 125px"></i>
            <p style="margin-top: 10px">Employees</p>
        </div>
        <div class="item2" onclick="redirectTo('InventoryLogin.php')">
            <i class="fa-solid fa-boxes-stacked" style="font-size: 125px"></i>
            <p style="margin-top: 10px">Inventory</p>
        </div>
    </div>
</section>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
</body>
</html>