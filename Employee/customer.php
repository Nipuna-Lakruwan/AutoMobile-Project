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
        <h1>Customers</h1>
        <hr>
    </div>
</div>

<div class="search-box">
    <i class="fa-solid fa-user fa-10x" style="color: #952b1a;"></i>
    <h2>Search Customer</h2>
    <input type="text" id="customerSearch" placeholder="Search customer...">
    <button type="submit" class="Search" onclick="searchCustomer()">Search</button>
</div>

<div id="searchResults"></div>

<table id="customerDetailsTable" class="hidden">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody id="customerDetailsBody">
        <!-- Customer details will be populated here -->
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        $("#customerSearch").on("input", function() {
            searchCustomer();
        });
    });

    function searchCustomer() {
        const searchQuery = $("#customerSearch").val();
        $.post("/AutoMobile Project/Employee/search_customer.php", {
            searchQuery
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let results = "";
                data.data.forEach((customer) => {
                    results += `<tr>
                                    <td>${customer.cus_Id}</td>
                                    <td>${customer.fname}</td>
                                    <td>${customer.lname}</td>
                                    <td>${customer.email}</td>
                                    <td>${customer.phone}</td>
                                </tr>`;
                });
                $("#customerDetailsBody").html(results);
                $("#customerDetailsTable").removeClass('hidden');
            } else {
                $("#customerDetailsBody").html("<tr><td colspan='5'>No customers found</td></tr>");
                $("#customerDetailsTable").removeClass('hidden');
            }
        });
    }
</script>
</body>
</html>