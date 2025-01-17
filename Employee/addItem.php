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

    <div class="formcontainer">
        <h2>Add Items</h2>
        <hr class="topicLine">
        <div class="form">
            <form id="addItemForm">
                <div class="form-group">
                    <label for="itemName">Item Name</label>
                    <select id="itemName" name="itemName">
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="brandName">Brand Name</label>
                    <select id="brandName" name="brandName">
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="itemqty">Item Quantity</label>
                    <input type="number" id="itemqty" name="itemqty" required>
                </div>
                <div class="form-group">
                    <label for="byingPrice">Buying Price</label>
                    <input type="number" id="byingPrice" name="byingPrice" required>
                </div>
                <div class="form-group">
                    <label for="sellingPrice">Selling Price</label>
                    <input type="number" id="sellingPrice" name="sellingPrice" required>
                </div>
                <button type="submit" class="submit">Add Item</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        fetchItemOptions();

        $("#itemName, #brandName").on("change", function() {
            fetchItemDetails();
        });

        $("#addItemForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.post("/AutoMobile Project/Employee/inventAdditem.php", formData, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    showAlert(data.message, "success");
                    $("#addItemForm")[0].reset();
                } else {
                    showAlert(data.message, "error");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                showAlert("Request failed: " + textStatus + ", " + errorThrown, "error");
            });
        });
    });

    function fetchItemOptions() {
        $.get("/AutoMobile Project/Employee/fetch_item_options.php", function(response) {
            const data = JSON.parse(response);
            populateDropdown("#itemName", data.itemNames);
            populateDropdown("#brandName", data.brandNames);
        });
    }

    function fetchItemDetails() {
        const itemName = $("#itemName").val();
        const brandName = $("#brandName").val();
        if (itemName && brandName) {
            $.post("/AutoMobile Project/Employee/fetch_item_details.php", { itemName, brandName }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    $("#itemqty").val(data.data.quantity);
                    $("#byingPrice").val(data.data.unit_buying_price);
                    $("#sellingPrice").val(data.data.unit_price);
                } else {
                    showAlert(data.message, "error");
                }
            });
        }
    }

    function populateDropdown(selector, options) {
        const dropdown = $(selector);
        dropdown.empty();
        dropdown.append('<option value="">Select</option>');
        options.forEach(option => {
            dropdown.append(`<option value="${option}">${option}</option>`);
        });
    }

    function showAlert(message, type) {
        const alertBox = document.createElement("div");
        alertBox.className = `alert ${type}`;
        alertBox.textContent = message;
        document.body.appendChild(alertBox);

        setTimeout(() => {
            alertBox.remove();
        }, 3000);
    }
</script>

<style>
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px;
        border-radius: 5px;
        z-index: 1000;
        color: #fff;
        font-size: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .alert.success {
        background-color: #4CAF50;
    }
    .alert.error {
        background-color: #f44336;
    }
</style>
</body>
</html>