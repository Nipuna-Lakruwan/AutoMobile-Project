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

    <h1>Edit Appointments</h1>
    <hr>
    <div class="form-container">
        <div class="search-bar">
            <label>Enter Vehicle Number</label>
            <div class="search-wrapper" style="position: relative;">
                <input type="text" id="vehicleSearch" placeholder="Search...">
            </div>
            <ul id="vehicleSuggestions" class="suggestions"></ul>
        </div>
        <form id="editAppointmentForm">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" readonly>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" readonly>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" cols="50"></textarea>
            </div>
            <input type="submit" value="Edit Appointment" class="submit">
            <button type="button" id="cancelAppointmentBtn" class="submit">Cancel Appointment</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
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
                        suggestions += `<li onclick="selectVehicle(${vehicle.vehicle_id})">${vehicle.license_no}</li>`;
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
                $("#first-name").val(data.data.fname);
                $("#last-name").val(data.data.lname);
                $("#date").val(data.data.app_date);
                $("#description").val(data.data.description);
                $("#vehicleSearch").data("vehicleId", vehicleId);
            }
            $("#vehicleSuggestions").hide();
        });
    }

    // Handle form submission for editing appointment
    $("#editAppointmentForm").on("submit", function(e) {
        e.preventDefault();
        const vehicleId = $("#vehicleSearch").data("vehicleId");
        const appDate = $("#date").val();
        const description = $("#description").val();

        $.post("/AutoMobile Project/Employee/appointment_handler.php", {
            action: "edit_appointment",
            vehicleId,
            appDate,
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
    });

    // Handle appointment cancellation
    $("#cancelAppointmentBtn").on("click", function() {
        const vehicleId = $("#vehicleSearch").data("vehicleId");

        $.post("/AutoMobile Project/Employee/appointment_handler.php", {
            action: "cancel_appointment",
            vehicleId
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                alert(data.message);
                // Optionally, redirect to another page or reset the form
            } else {
                alert(data.message);
            }
        });
    });
</script>
</body>
</html>