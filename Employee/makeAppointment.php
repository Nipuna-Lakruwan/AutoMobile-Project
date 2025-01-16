<?php
include 'includes/header.php';
include 'includes/navbar.php';
include '../config/dbconnection.php';
?>

<style>
    .suggestions {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        width: 20%; /* Adjust width to match the search bar */
        z-index: 1000;
        left: 28%; /* Align with the search bar */
    }

    .suggestions li {
        padding: 10px;
        cursor: pointer;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('appointments2.php')">
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

<div class="makeAppointments">

    <h1>Make an Appointment</h1>
    <h2>Personal Details</h2>
    <hr>
    <div class="form-container">
        <div class="search-bar">
            <label>*If Current Customer</label>
            <div class="search-wrapper" style="position: relative;">
                <input type="text" id="customerSearch" placeholder="Search...">
                
            </div>
            <ul id="customerSuggestions" class="suggestions"></ul>
        </div>
        <form id="customerForm">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group mobile-group">
                <label for="mobile">Mobile No</label>
                <input type="tel" id="mobile" name="mobile">
            </div>
        </form>
    </div>

    <h2>Vehicle's Details</h2>
    <hr>

    <div class="form-container">
        <div class="search-bar">
            <label>*If already added vehicle</label>
            <div class="search-wrapper" style="position: relative;">
                <input type="text" id="vehicleSearch" placeholder="Search...">

            </div>
            <ul id="vehicleSuggestions" class="suggestions"></ul>
        </div>
        <form id="vehicleForm">
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model" name="model">
            </div>
            <div class="form-group">
                <label for="manufacturedYear">Manufactured Year</label>
                <input type="text" id="manufacturedYear" name="manufacturedYear">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category">
            </div>
            <div class="form-group">
                <label for="licensePlateNo">License Plate No</label>
                <input type="text" id="licensePlateNo" name="licensePlateNo">
            </div>
            <div class="form-group">
                <label for="engineNo">Engine No</label>
                <input type="text" id="engineNo" name="engineNo">
            </div>
            <div class="form-group chassis-group">
                <label for="chassisNo">Chassis No</label>
                <input type="text" id="chassisNo" name="chassisNo">
            </div>
        </form>
    </div>

    <h2>Fix a Date</h2>
    <hr>

    <div class="form-container">
        <form id="appointmentForm">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="10" cols="50"></textarea>
            </div>
            <input type="submit" value="Place Appointment" class="submit">
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    // Search for customers
    $("#customerSearch").on("input", function() {
        const searchTerm = $(this).val();
        if (searchTerm.length > 0) {
            $.post("/AutoMobile Project/Employee/appointment_handler.php", {
                action: "search_customer",
                searchTerm
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    let suggestions = "";
                    data.data.forEach((customer) => {
                        suggestions += `<li onclick="selectCustomer(${customer.cus_Id})">${customer.fname} ${customer.lname}</li>`;
                    });
                    $("#customerSuggestions").html(suggestions).show();
                }
            });
        } else {
            $("#customerSuggestions").hide();
        }
    });

    // Select customer and autofill form
    function selectCustomer(customerId) {
        $.post("/AutoMobile Project/Employee/appointment_handler.php", {
            action: "get_customer_details",
            customerId
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                $("#first-name").val(data.data.fname);
                $("#last-name").val(data.data.lname);
                $("#email").val(data.data.email);
                $("#mobile").val(data.data.phone);
                $("#customerSearch").data("customerId", customerId);
            }
            $("#customerSuggestions").hide();
        });
    }

    // Search for vehicles
    $("#vehicleSearch").on("input", function() {
        const searchTerm = $(this).val();
        if (searchTerm.length > 0) {
            $.post("/AutoMobile Project/Employee/appointment_handler.php", {
                action: "search_vehicle",
                searchTerm
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    let suggestions = "";
                    data.data.forEach((vehicle) => {
                        suggestions += `<li onclick="selectVehicle(${vehicle.vehicle_id})">${vehicle.company} ${vehicle.model} (${vehicle.license_no})</li>`;
                    });
                    $("#vehicleSuggestions").html(suggestions).show();
                }
            });
        } else {
            $("#vehicleSuggestions").hide();
        }
    });

    // Select vehicle and autofill form
    function selectVehicle(vehicleId) {
        $.post("/AutoMobile Project/Employee/appointment_handler.php", {
            action: "get_vehicle_details",
            vehicleId
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                $("#company").val(data.data.company);
                $("#model").val(data.data.model);
                $("#licensePlateNo").val(data.data.license_no);
                $("#manufacturedYear").val(data.data.year);
                $("#category").val(data.data.category);
                $("#engineNo").val(data.data.engine_no);
                $("#chassisNo").val(data.data.chasis_no);
                $("#vehicleSearch").data("vehicleId", vehicleId);
            }
            $("#vehicleSuggestions").hide();
        });
    }

    // Customize date and time
    const today = new Date().toISOString().split("T")[0];
    $("#date").attr("min", today);

    function generateTimeOptions() {
        const timeSelect = document.getElementById('time');
        const now = new Date();
        const currentHour = now.getHours();
        const currentMinutes = now.getMinutes();
        const startMinutes = Math.ceil(currentMinutes / 10) * 10;

        for (let hour = currentHour; hour < 24; hour++) {
            for (let minutes = (hour === currentHour ? startMinutes : 0); minutes < 60; minutes += 10) {
                const timeOption = document.createElement('option');
                const formattedHour = hour.toString().padStart(2, '0');
                const formattedMinutes = minutes.toString().padStart(2, '0');
                timeOption.value = `${formattedHour}:${formattedMinutes}`;
                timeOption.textContent = `${formattedHour}:${formattedMinutes}`;
                timeSelect.appendChild(timeOption);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', generateTimeOptions);

    // Handle form submission
    $("#appointmentForm").on("submit", function(e) {
        e.preventDefault();
        const customerId = $("#customerSearch").data("customerId");
        const vehicleId = $("#vehicleSearch").data("vehicleId");
        const appDate = $("#date").val();
        const appTime = $("#time").val();
        const description = $("#description").val();

        if (!customerId) {
            const firstName = $("#first-name").val();
            const lastName = $("#last-name").val();
            const email = $("#email").val();
            const password = $("#password").val();
            const mobile = $("#mobile").val();

            $.post("/AutoMobile Project/Employee/appointment_handler.php", {
                action: "add_customer",
                firstName,
                lastName,
                email,
                password,
                mobile
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    addVehicleAndPlaceAppointment(data.customerId, vehicleId, appDate, appTime, description);
                } else {
                    alert(data.message);
                }
            });
        } else {
            addVehicleAndPlaceAppointment(customerId, vehicleId, appDate, appTime, description);
        }
    });

    function addVehicleAndPlaceAppointment(customerId, vehicleId, appDate, appTime, description) {
        if (!vehicleId) {
            const company = $("#company").val();
            const model = $("#model").val();
            const manufacturedYear = $("#manufacturedYear").val();
            const category = $("#category").val();
            const licensePlateNo = $("#licensePlateNo").val();
            const engineNo = $("#engineNo").val();
            const chassisNo = $("#chassisNo").val();

            $.post("/AutoMobile Project/Employee/appointment_handler.php", {
                action: "add_vehicle",
                company,
                model,
                manufacturedYear,
                category,
                licensePlateNo,
                engineNo,
                chassisNo,
                customerId
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    placeAppointment(customerId, data.vehicleId, appDate, appTime, description);
                } else {
                    alert(data.message);
                }
            });
        } else {
            placeAppointment(customerId, vehicleId, appDate, appTime, description);
        }
    }

    function placeAppointment(customerId, vehicleId, appDate, appTime, description) {
        $.post("/AutoMobile Project/Employee/appointment_handler.php", {
            action: "place_appointment",
            customerId,
            vehicleId,
            appDate,
            appTime,
            description
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                alert(data.message);
                // Optionally, redirect to another page or reset the form
            } else {
                alert(data.message);
            }
        });
    }
</script>
</body>
</html>