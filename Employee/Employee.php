<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/Automobile Project/Employee/assets/css/customers.css">

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
        <h1>Employees</h1>
        <hr>
    </div>
</div>

<div class="search-box">
    <i class="fa-solid fa-id-card fa-10x" style=" color: #952b1a;"></i>
    <h2>Search Employee</h2>
    <input type="text" id="employeeSearch" placeholder="Search Employee...">
    <button type="submit" class="Search" onclick="searchEmployee()">Search</button>
</div>

<div id="searchResults"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        $("#employeeSearch").on("input", function() {
            searchEmployee();
        });
    });

    function searchEmployee() {
        const searchQuery = $("#employeeSearch").val();
        $.post("/AutoMobile Project/Employee/search_employee.php", { searchQuery }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let results = "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>";
                data.data.forEach((employee) => {
                    results += `<tr>
                                    <td>${employee.officer_id}</td>
                                    <td>${employee.fname}</td>
                                    <td>${employee.lname}</td>
                                    <td>${employee.email}</td>
                                    <td>${employee.phone}</td>
                                    <td><a href="employeeInfo.php?employeeId=${employee.officer_id}" class="view-details-btn">View Details</a></td>
                                </tr>`;
                });
                results += "</table>";
                $("#searchResults").html(results);
            } else {
                $("#searchResults").html("<p>No employees found</p>");
            }
        });
    }
</script>
</body>
</html>