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
        <h2>Edit Items</h2>
        <hr class="topicLine">

        <div class="items">
            <div class="topcontainer">
                <div class="contitem">
                    <div class="search-wrap">
                        <input type="text" id="searchItems" placeholder="Search Items...">
                        <button type="submit" onclick="searchInventory()"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                    </div>
                </div>

                <div class="contitem">
                    <button onclick="showLowStockModal()">
                        <div class="lowStock">
                            <div class="badge" id="lowStockCount">0</div>
                            <i class="fa-solid fa-triangle-exclamation fa-3x" style=" color: #ffffff;"></i>
                            <p>Low Stock Alert</p>
                        </div>
                    </button>
                </div>
            </div>

            <h3>Edit Items</h3>
            <hr class="topicLine">

            <div class="sort-container">
                <div class="sort-item">
                    <h3>Category</h3>
                    <div class="custom-select">
                        <select id="category">
                            <option value="">Select</option>
                        </select>
                    </div>
                </div>

                <div class="sort-item">
                    <h3>Item Name</h3>
                    <div class="custom-select">
                        <select id="itemName">
                            <option value="">Select</option>
                        </select>
                    </div>
                </div>
                <button class="searchbtn" onclick="fetchInventorySummary()">Search</button>
            </div>

            <table id="inventoryTable">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be added dynamically here -->
                </tbody>
            </table>

            <button class="submit" onclick="redirectTo('editItem.php')">Edit Item</button>
        </div>
    </div>
</div>

<!-- Low Stock Modal -->
<div id="lowStockModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLowStockModal()">&times;</span>
        <h2>Low Stock Items</h2>
        <table id="lowStockTable">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Brand Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows will be added dynamically here -->
            </tbody>
        </table>
    </div>
</div>

<style>
    .suggestions {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        width: 100%; /* Adjust width to match input box */
        z-index: 1000;
        margin-top: 5px; /* Add some space between input and suggestions */
    }

    .suggestions li {
        padding: 10px;
        cursor: pointer;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }

    .custom-select {
        position: relative;
        font-family: Arial;
    }

    .custom-select select {
        display: none; /*hide original SELECT element:*/
    }

    .select-selected {
        background-color: #333;
        color: #e0e0e0;
        padding: 8px 16px;
        border: 1px solid darkred;
        border-radius: 5px;
        cursor: pointer;
        user-select: none;
    }

    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
    }

    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
    }

    .select-items {
        position: absolute;
        background-color: #333;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
        border: 1px solid darkred;
        border-radius: 5px;
    }

    .select-items div {
        color: #e0e0e0;
        padding: 8px 16px;
        cursor: pointer;
        user-select: none;
    }

    .select-items div:hover, .same-as-selected {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        fetchSortOptions();
        fetchInventorySummary();
        fetchLowStockCount();

        // Add event listener for live search
        $("#searchItems").on("input", function() {
            searchInventory();
        });
    });

    function fetchSortOptions() {
        $.get("/AutoMobile Project/Employee/fetch_sort_options.php", function(response) {
            const data = JSON.parse(response);
            populateDropdown("#category", data.categories);
            populateDropdown("#itemName", data.itemNames);
        });
    }

    function fetchInventorySummary() {
        const category = $("#category").val();
        const itemName = $("#itemName").val();
        $.post("/AutoMobile Project/Employee/fetch_inventory_summary.php", { category, itemName }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let rows = "";
                data.data.forEach((item) => {
                    rows += `
                        <tr>
                            <td>${item.item_id}</td>
                            <td>${item.item_name}</td>
                            <td>${item.brand}</td>
                            <td>${item.category}</td>
                            <td>${item.quantity}</td>
                            <td>${item.unit_buying_price}</td>
                            <td>${item.unit_price}</td>
                        </tr>
                    `;
                });
                $("#inventoryTable tbody").html(rows);
            } else {
                $("#inventoryTable tbody").html("<tr><td colspan='7'>No items found</td></tr>");
            }
        });
    }

    function searchInventory() {
        const searchTerm = $("#searchItems").val();
        $.post("/AutoMobile Project/Employee/search_inventory.php", { searchTerm }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let rows = "";
                data.data.forEach((item) => {
                    rows += `
                        <tr>
                            <td>${item.item_id}</td>
                            <td>${item.item_name}</td>
                            <td>${item.brand}</td>
                            <td>${item.category}</td>
                            <td>${item.quantity}</td>
                            <td>${item.unit_buying_price}</td>
                            <td>${item.unit_price}</td>
                        </tr>
                    `;
                });
                $("#inventoryTable tbody").html(rows);
            } else {
                $("#inventoryTable tbody").html("<tr><td colspan='7'>No items found</td></tr>");
            }
        });
    }

    function fetchLowStockCount() {
        $.get("/AutoMobile Project/Employee/fetch_low_stock.php", function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                $("#lowStockCount").text(data.data.length);
            }
        });
    }

    function showLowStockModal() {
        $.get("/AutoMobile Project/Employee/fetch_low_stock.php", function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let rows = "";
                data.data.forEach((item) => {
                    rows += `
                        <tr>
                            <td>${item.item_id}</td>
                            <td>${item.item_name}</td>
                            <td>${item.brand}</td>
                            <td>${item.category}</td>
                            <td>${item.quantity}</td>
                            <td>${item.unit_buying_price}</td>
                            <td>${item.unit_price}</td>
                        </tr>
                    `;
                });
                $("#lowStockTable tbody").html(rows);
                $("#lowStockModal").show();
            }
        });
    }

    function closeLowStockModal() {
        $("#lowStockModal").hide();
    }

    function populateDropdown(selector, options) {
        const dropdown = $(selector);
        dropdown.empty();
        dropdown.append('<option value="">Select</option>');
        options.forEach(option => {
            dropdown.append(`<option value="${option}">${option}</option>`);
        });
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