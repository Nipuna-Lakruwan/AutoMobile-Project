<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

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
        <h2>Appointments</h2>
        <hr>
    </div>
</div>

<section>
    <div class="container">
        <div class="item1" onclick="redirectTo('appointments2.php')">
            <i class="fa-solid fa-calendar-days" style="font-size: 125px"></i>
            <p style="margin-top: 15px">Make / Edit Appointments</p>
        </div>

        <div class="item2" onclick="redirectTo('mechanic.php')">
            <i class="fa-solid fa-wrench" style="font-size: 125px"></i>
            <p style="margin-top: 15px">Mechanics</p>
        </div>
    </div>
</section>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
</body>
</html>