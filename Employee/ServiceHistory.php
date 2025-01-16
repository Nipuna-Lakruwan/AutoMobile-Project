<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/servicehistory.css">

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
        <h1>Service History</h1>
        <hr>
    </div>
</div>

<div class="heading">
    <h2>Sort By</h2>
    <hr class="line2">
</div>

<div class="sort-container">
    <div class="sort-item">
        <h3>Vehicle Type</h3>
        <div class="custom-select">
            <select id="vehicleType" class="select">
                <option value="">Select</option>
                <option value="Audi">Audi</option>
                <option value="BMW">BMW</option>
                <option value="Citroen">Citroen</option>
                <option value="Ford">Ford</option>
                <option value="Honda">Honda</option>
                <option value="Jaguar">Jaguar</option>
                <option value="Land Rover">Land Rover</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Mini">Mini</option>
                <option value="Nissan">Nissan</option>
                <option value="Toyota">Toyota</option>
                <option value="Volvo">Volvo</option>
            </select>
        </div>
    </div>
    <div class="sort-item">
        <h3>Mechanic</h3>
        <div class="custom-select">
            <select id="mechanic" class="select">
                <option value="">Select</option>
                <option value="Mechanic 1">Mechanic 1</option>
                <option value="Mechanic 2">Mechanic 2</option>
                <option value="Mechanic 3">Mechanic 3</option>
                <option value="Mechanic 4">Mechanic 4</option>
            </select>
        </div>
    </div>
    <div class="sort-item">
        <h3>Date</h3>
        <input type="date" id="date" name="date" class="select">
    </div>
</div>

<div class="searchbtn" onclick="fetchServiceHistory()">
    Search
</div>

<table>
    <thead>
        <tr>
            <th> </th>
            <th>Vehicle Number</th>
            <th>Vehicle Type</th>
            <th>Service Mechanic</th>
            <th>Service Customer ID</th>
            <th>Service Type</th>
            <th>Service Date</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody id="serviceHistoryTableBody">
        <!-- Rows will be added dynamically here -->
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    function fetchServiceHistory() {
        const vehicleType = $("#vehicleType").val();
        const mechanic = $("#mechanic").val();
        const date = $("#date").val();

        $.post("/AutoMobile Project/Employee/fetch_service_history.php", {
            vehicleType,
            mechanic,
            date
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let rows = "";
                data.data.forEach((service, index) => {
                    rows += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${service.license_no}</td>
                            <td>${service.category}</td>
                            <td>${service.mechanic_name}</td>
                            <td>${service.cus_id}</td>
                            <td>${service.service_type}</td>
                            <td>${service.service_date}</td>
                            <td>Rs. ${service.total_price}</td>
                        </tr>
                    `;
                });
                $("#serviceHistoryTableBody").html(rows);
            } else {
                $("#serviceHistoryTableBody").html("<tr><td colspan='8'>No records found</td></tr>");
            }
        });
    }
</script>
</body>
</html>