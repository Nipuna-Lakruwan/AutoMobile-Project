<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/inventory.css">

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

<div class="invenContainer">
    <?php include 'includes/inventorynav.php' ?>

    <div class="line"></div>

    <div class="table">
        <h2>Pending Requests</h2>
        <hr class="topicLine">
        <table>
            <tr>
                <th></th>
                <th>Mechanic User Name</th>
                <th>Date</th>
                <th>Time</th>
                <th></th>

            </tr>
            <tr>
                <td> 1 </td>
                <td>John Doe</td>
                <td>12/12/2021</td>
                <td>12:00 PM</td>
                <td><button class="view">View Order</button></td>
            </tr>
            <tr>
                <td> 2 </td>
                <td>John Doe</td>
                <td>12/12/2021</td>
                <td>12:00 PM</td>
                <td><button class="view">View Order</button></td>
            </tr>
        </table>
    </div>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/pendingrequest.js"></script>
</body>
</html>