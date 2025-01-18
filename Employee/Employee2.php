<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/servicehistory.css">

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

<h2 class="heading"> Search Result! </h2>
<hr class="line2">

<table>
    <tr>
        <th>Emp Id</th>
        <th>User Name</th>
        <th>Name</th>
        <th>Role</th>
        <th> </th>
    </tr>

    <tr>
        <td>1</td>
        <td>KL-07-AB-1234</td>
        <td>MALAKA</td>
        <td>Mechanic</td>
        <td class="info">View More Info</td>
    </tr>

    <tr>
        <td>2</td>
        <td>KL-07-AB-1234</td>
        <td>PERERA</td>
        <td>Service Manager</td>
        <td class="info">View More Info</td>
    </tr>

    <tr>
        <td>3</td>
        <td>KL-07-AB-1234</td>
        <td>CHAMARA</td>
        <td>Service Manager</td>
        <td class="info">View More Info</td>
    </tr>

    <tr>
        <td>4</td>
        <td>KL-07-AB-1234</td>
        <td>RAJITHA</td>
        <td>Service Manager</td>
        <td class="info">View More Info</td>
    </tr>

    <tr>
        <td>5</td>
        <td>KL-07-AB-1234</td>
        <td>RAJITHA</td>
        <td>Service Manager</td>
        <td class="info">View More Info</td>
    </tr>
</table>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script src="/Automobile Project/Employee/assets/js/employee.js"></script>
</body>
</html>