<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="assets/css/customers.css">

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
        <h1>Inventory System</h1>
        <hr>
    </div>
</div>

<div class="search-box">
    <i class="fa-solid fa-key fa-10x" style="color: #952b1a;"></i>
    <input type="text" placeholder="@username">
    <input type="password" placeholder="Password">
    <button type="submit" class="Search">Login</button>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/inventory.js"></script>
</body>
</html>